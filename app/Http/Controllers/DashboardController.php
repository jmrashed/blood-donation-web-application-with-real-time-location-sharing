<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
 var $data = array();
	var $panelInit ;
	var $layout = 'dashboard';

	public function __construct(){
		$this->panelInit = new \DashboardInit();
		$this->data['panelInit'] = $this->panelInit;
		$this->data['breadcrumb']['User Settings'] = \URL::to('/dashboard/user');
		$this->data['users'] = \Auth::user();
	}

	public function index($method = "main")
	{
		if($this->data['users']->role == "admin" AND $this->panelInit->version != $this->panelInit->settingsArray['latestVersion']){
			$this->data['latestVersion'] = $this->panelInit->settingsArray['latestVersion'];
		}
		$this->data['role'] = $this->data['users']->role;
		$this->panelInit->viewop($this->layout,'welcome',$this->data);
	}

	public function baseUser()
	{
		return array("fullName"=>$this->data['users']->fullName,"username"=>$this->data['users']->username,"role"=>$this->data['users']->role);
	}

	public function dashboardData(){
		$toReturn = array();
		$toReturn['siteTitle'] = $this->data['panelInit']->settingsArray['siteTitle'];
		$toReturn['dateformat'] = $this->data['panelInit']->settingsArray['dateformat'];
		$toReturn['enableSections'] = $this->data['panelInit']->settingsArray['enableSections'];
		$toReturn['emailIsMandatory'] = $this->data['panelInit']->settingsArray['emailIsMandatory'];
		$toReturn['allowTeachersMailSMS'] = $this->data['panelInit']->settingsArray['allowTeachersMailSMS'];
		$toReturn['selectedAcYear'] = $this->panelInit->selectAcYear;
		$toReturn['language'] = $this->panelInit->language;
		$toReturn['languageUniversal'] = $this->panelInit->languageUniversal;
		$toReturn['role'] = $this->data['users']->role;
		if($this->data['users']->role == "admin"){
			if($this->data['users']->customPermissionsType == "full"){
				$toReturn['adminPerm'] = "full";
			}else{
				$toReturn['adminPerm'] = json_decode($this->data['users']->customPermissions,true);
			}
		}

		$toReturn['stats'] = array();
		$toReturn['stats']['classes'] = classes::where('classAcademicYear',$this->panelInit->selectAcYear)->count();
		$toReturn['stats']['students'] = User::where('role','student')->where('activated',1)->count();
		$toReturn['stats']['teachers'] = User::where('role','teacher')->where('activated',1)->count();
		$toReturn['stats']['newMessages'] = messages_list::where('userId',$this->data['users']->id)->where('messageStatus',1)->count();

		$toReturn['messages'] = DB::select(DB::raw("SELECT messages_list.id as id,messages_list.lastMessageDate as lastMessageDate,messages_list.lastMessage as lastMessage,messages_list.messageStatus as messageStatus,users.fullName as fullName,users.id as userId FROM messages_list LEFT JOIN users ON users.id=IF(messages_list.userId = '".$this->data['users']->id."',messages_list.toId,messages_list.userId) where userId='".$this->data['users']->id."' order by id DESC limit 5" ));

		$toReturn['attendanceModel'] = $this->data['panelInit']->settingsArray['attendanceModel'];
		if($this->data['panelInit']->settingsArray['attendanceModel'] == "subject"){
			$subjects = subject::get();
			foreach ($subjects as $subject) {
				$toReturn['subjects'][$subject->id] = $subject->subjectTitle ;
			}
		}

		$date = date('m/Y');
		$startTime = $this->panelInit->dateToUnix("1/".$date);
		$endTime = $this->panelInit->dateToUnix("31/".$date);
		if($this->data['users']->role == "student"){
			$attendanceArray = attendance::where('studentId',$this->data['users']->id)->where('date','>=',$startTime)->where('date','<=',$endTime)->get();
			foreach ($attendanceArray as $value) {
				$toReturn['studentAttendance'][] = array("date"=>$value->date,"status"=>$value->status,"subject"=>isset($toReturn['subjects'][$value->subjectId])?$toReturn['subjects'][$value->subjectId]:"" ) ;
			}
		}elseif($this->data['users']->role == "parent"){
			if($this->data['users']->parentOf != ""){
				$parentOf = json_decode($this->data['users']->parentOf,true);
				if(!is_array($parentOf)){
					$parentOf = array();
				}
				$ids = array();
				while (list(, $value) = each($parentOf)) {
					$ids[] = $value['id'];
				}

				if(count($ids) > 0){
					$studentArray = User::where('role','student')->whereIn('id',$ids)->get();
					foreach ($studentArray as $stOne) {
						$students[$stOne->id] = array('name'=>$stOne->fullName,'studentRollId'=>$stOne->studentRollId);
					}

					$attendanceArray = attendance::whereIn('studentId',$ids)->where('date','>=',$startTime)->where('date','<=',$endTime)->get();
					foreach ($attendanceArray as $value) {
						if(!isset($toReturn['studentAttendance'][$value->studentId])){
							$toReturn['studentAttendance'][$value->studentId]['n'] = $students[$value->studentId];
							$toReturn['studentAttendance'][$value->studentId]['d'] = array();
						}
						$toReturn['studentAttendance'][$value->studentId]['d'][] = array("date"=>$value->date,"status"=>$value->status,"subject"=>$value->subjectId);
					}
				}
			}
		}

		$toReturn['teacherLeaderBoard'] = User::where('role','teacher')->where('isLeaderBoard','!=','')->where('isLeaderBoard','!=','0')->get()->toArray();
		$toReturn['studentLeaderBoard'] = User::where('role','student')->where('isLeaderBoard','!=','')->where('isLeaderBoard','!=','0')->get()->toArray();

		$toReturn['newsEvents'] = array();
		$newsboard = newsboard::where('newsFor',$this->data['users']->role)->orWhere('newsFor','all')->orderBy('id','desc')->limit(5)->get();
		foreach ($newsboard as $event ) {
			$eventsArray['id'] =  $event->id;
			$eventsArray['title'] =  $event->newsTitle;
			$eventsArray['type'] =  "news";
	    	$eventsArray['start'] = $this->panelInit->unixToDate($event->newsDate);
	    	$toReturn['newsEvents'][] = $eventsArray;
		}

		$events = events::orderBy('id','desc')->where('eventFor',$this->data['users']->role)->orWhere('eventFor','all')->limit(5)->get();
		foreach ($events as $event ) {
	    	$eventsArray['id'] =  $event->id;
			$eventsArray['title'] =  $event->eventTitle;
			$eventsArray['type'] =  "event";
		    $eventsArray['start'] = $this->panelInit->unixToDate($event->eventDate);
		    $toReturn['newsEvents'][] = $eventsArray;
		}

		$toReturn['academicYear'] = academic_year::get()->toArray();

		$toReturn['baseUser'] = array("id"=>$this->data['users']->id,"fullName"=>$this->data['users']->fullName,"username"=>$this->data['users']->username);

		$polls = polls::where('pollTarget',$this->data['users']->role)->orWhere('pollTarget','all')->where('pollStatus','1')->first();
		if(count($polls) > 0){
			$toReturn['polls']['title'] = $polls->pollTitle;
			$toReturn['polls']['id'] = $polls->id;
			$toReturn['polls']['view'] = "vote";
			$userVoted = json_decode($polls->userVoted,true);
			if(is_array($userVoted) AND in_array($this->data['users']->id,$userVoted)){
				$toReturn['polls']['voted'] = true;
				$toReturn['polls']['view'] = "results";
			}
			$toReturn['polls']['items'] = json_decode($polls->pollOptions,true);
			$toReturn['polls']['totalCount'] = 0;
			if(is_array($toReturn['polls']['items']) AND count($toReturn['polls']['items']) > 0){
				while (list($key, $value) = each($toReturn['polls']['items'])) {
					if(isset($value['count'])){
						$toReturn['polls']['totalCount'] += $value['count'];
					}
					if(!isset($toReturn['polls']['items'][$key]['prec'])){
						$toReturn['polls']['items'][$key]['prec'] = 0;
					}
				}
			}

		}

		return json_encode($toReturn);
	}

	public function dashaboardData(){
		$toReturn = array();
		$toReturn['siteTitle'] = $this->data['panelInit']->settingsArray['siteTitle'];
		$toReturn['dateformat'] = $this->data['panelInit']->settingsArray['dateformat'];
		$toReturn['enableSections'] = $this->data['panelInit']->settingsArray['enableSections'];
		$toReturn['emailIsMandatory'] = $this->data['panelInit']->settingsArray['emailIsMandatory'];
		$toReturn['selectedAcYear'] = $this->panelInit->selectAcYear;
		$toReturn['language'] = $this->panelInit->language;
		$toReturn['languageUniversal'] = $this->panelInit->languageUniversal;
		$toReturn['role'] = $this->data['users']->role;
		$toReturn['overall'] = dashboardLaravelStamp();

		if(!Input::has('nLowAndVersion')){
			return array("error"=>"androidNotCompatible","low"=> $this->panelInit->lowAndVersion);
		}
		if( Input::get('nLowAndVersion') < $this->panelInit->nLowAndVersion ){
			return array("error"=>"androidNotCompatible","low"=> $this->panelInit->lowAndVersion);
		}

		$toReturn['stats'] = array();
		$toReturn['stats']['classes'] = classes::where('classAcademicYear',$this->panelInit->selectAcYear)->count();
		$toReturn['stats']['students'] = User::where('role','student')->where('activated',1)->count();
		$toReturn['stats']['teachers'] = User::where('role','teacher')->where('activated',1)->count();
		$toReturn['stats']['newMessages'] = messages_list::where('userId',$this->data['users']->id)->where('messageStatus',1)->count();

		$toReturn['messages'] = DB::select(DB::raw("SELECT messages_list.id as id,messages_list.lastMessageDate as lastMessageDate,messages_list.lastMessage as lastMessage,messages_list.messageStatus as messageStatus,users.fullName as fullName,users.id as userId FROM messages_list LEFT JOIN users ON users.id=IF(messages_list.userId = '".$this->data['users']->id."',messages_list.toId,messages_list.userId) where userId='".$this->data['users']->id."' order by id DESC limit 5" ));

		$toReturn['attendanceModel'] = $this->data['panelInit']->settingsArray['attendanceModel'];
		if($this->data['panelInit']->settingsArray['attendanceModel'] == "subject"){
			$subjects = subject::get();
			foreach ($subjects as $subject) {
				$toReturn['subjects'][$subject->id] = $subject->subjectTitle ;
			}
		}

		$date = date('m/Y');
		$startTime = $this->panelInit->dateToUnix("1/".$date);
		$endTime = $this->panelInit->dateToUnix("31/".$date);
		if($this->data['users']->role == "student"){
			$attendanceArray = attendance::where('studentId',$this->data['users']->id)->where('date','>=',$startTime)->where('date','<=',$endTime)->get();
			foreach ($attendanceArray as $value) {
				$toReturn['studentAttendance'][] = array("date"=>$value->date,"status"=>$value->status,"subject"=>isset($toReturn['subjects'][$value->subjectId])?$toReturn['subjects'][$value->subjectId]:"" ) ;
			}
		}elseif($this->data['users']->role == "parent"){
			if($this->data['users']->parentOf != ""){
				$parentOf = json_decode($this->data['users']->parentOf,true);
				if(!is_array($parentOf)){
					$parentOf = array();
				}
				$ids = array();
				while (list(, $value) = each($parentOf)) {
					$ids[] = $value['id'];
				}

				if(count($ids) > 0){
					$studentArray = User::where('role','student')->whereIn('id',$ids)->get();
					foreach ($studentArray as $stOne) {
						$students[$stOne->id] = array('name'=>$stOne->fullName,'studentRollId'=>$stOne->studentRollId);
					}

					$attendanceArray = attendance::whereIn('studentId',$ids)->where('date','>=',$startTime)->where('date','<=',$endTime)->get();
					foreach ($attendanceArray as $value) {
						if(!isset($toReturn['studentAttendance'][$value->studentId])){
							$toReturn['studentAttendance'][$value->studentId]['n'] = $students[$value->studentId];
							$toReturn['studentAttendance'][$value->studentId]['d'] = array();
						}
						$toReturn['studentAttendance'][$value->studentId]['d'][] = array("date"=>$value->date,"status"=>$value->status,"subject"=>$value->subjectId);
					}
				}
			}
		}

		$toReturn['teacherLeaderBoard'] = User::where('role','teacher')->where('isLeaderBoard','!=','')->where('isLeaderBoard','!=','0')->get()->toArray();
		$toReturn['studentLeaderBoard'] = User::where('role','student')->where('isLeaderBoard','!=','')->where('isLeaderBoard','!=','0')->get()->toArray();

		$toReturn['newsEvents'] = array();
		$newsboard = newsboard::where('newsFor',$this->data['users']->role)->orWhere('newsFor','all')->orderBy('id','desc')->limit(5)->get();
		foreach ($newsboard as $event ) {
			$eventsArray['id'] =  $event->id;
			$eventsArray['title'] =  $event->newsTitle;
			$eventsArray['type'] =  "news";
	    	$eventsArray['start'] = $this->panelInit->unixToDate($event->newsDate);
	    	$toReturn['newsEvents'][] = $eventsArray;
		}

		$events = events::orderBy('id','desc')->where('eventFor',$this->data['users']->role)->orWhere('eventFor','all')->limit(5)->get();
		foreach ($events as $event ) {
	    	$eventsArray['id'] =  $event->id;
			$eventsArray['title'] =  $event->eventTitle;
			$eventsArray['type'] =  "event";
		    $eventsArray['start'] = $this->panelInit->unixToDate($event->eventDate);
		    $toReturn['newsEvents'][] = $eventsArray;
		}

		$toReturn['academicYear'] = academic_year::get()->toArray();

		$toReturn['baseUser'] = array("id"=>$this->data['users']->id,"fullName"=>$this->data['users']->fullName,"username"=>$this->data['users']->username);

		$polls = polls::where('pollTarget',$this->data['users']->role)->orWhere('pollTarget','all')->where('pollStatus','1')->first();
		if(count($polls) > 0){
			$toReturn['polls']['title'] = $polls->pollTitle;
			$toReturn['polls']['id'] = $polls->id;
			$toReturn['polls']['view'] = "vote";
			$userVoted = json_decode($polls->userVoted,true);
			if(is_array($userVoted) AND in_array($this->data['users']->id,$userVoted)){
				$toReturn['polls']['voted'] = true;
				$toReturn['polls']['view'] = "results";
			}
			$toReturn['polls']['items'] = json_decode($polls->pollOptions,true);
			$toReturn['polls']['totalCount'] = 0;
			if(is_array($toReturn['polls']['items']) AND count($toReturn['polls']['items']) > 0){
				while (list($key, $value) = each($toReturn['polls']['items'])) {
					if(isset($value['count'])){
						$toReturn['polls']['totalCount'] += $value['count'];
					}
					if(!isset($toReturn['polls']['items'][$key]['prec'])){
						$toReturn['polls']['items'][$key]['prec'] = 0;
					}
				}
			}

		}

		return json_encode($toReturn);
	}

	public function changeAcYear(){
		Session::put('selectAcYear', Input::get('year'));
		return "1";
	}

	public function profileImage($id){
		header('Content-Type: image/jpeg');
		if(file_exists('uploads/profile/profile_'.$id.'.jpg')){
			echo file_get_contents('uploads/profile/profile_'.$id.'.jpg');
		}
		echo file_get_contents('uploads/profile/user.jpg');
		exit;
	}

	public function classesList($academicYear = ""){
		$toReturn = array();
		$classesList = array();

		if($academicYear == ""){
			if(!Input::has('academicYear')){
				return $classesList;
			}
			$academicYear = Input::get('academicYear');
		}

		if(is_array($academicYear)){
			$classesList = classes::whereIn('classAcademicYear',$academicYear)->get()->toArray();
		}else{
			$classesList = classes::where('classAcademicYear',$academicYear)->get()->toArray();
		}
		$toReturn['classes'] = $classesList;

		$classesListIds = array();
		while (list($key, $value) = each($classesList)) {
			$classesListIds[] = $value['id'];
		}

		$sectionsList = array();
		if(count($classesListIds) > 0){
			$sections = sections::whereIn('classId',$classesListIds)->get()->toArray();
			while (list($key, $value) = each($sections)) {
				$sectionsList[$value['classId']][] = $value;
			}
		}
		$toReturn['sections'] = $sectionsList;

		return $toReturn;
	}

	public function sectionsSubjectsList($classes = ""){
		$toReturn = array();
		$toReturn['sections'] = $this->sectionsList($classes);
		$toReturn['subjects'] = $this->subjectList($classes);
		return $toReturn;
	}

	public function sectionsList($classes = ""){
		$sectionsList = array();

		if($classes == ""){
			if(!Input::has('classes')){
				return $sectionsList;
			}
			$classes = Input::get('classes');
		}

		if(is_array($classes)){
			return sections::whereIn('classId',$classes)->get()->toArray();
		}else{
			return sections::where('classId',$classes)->get()->toArray();
		}
	}

	public function subjectList($classes = ""){
		$subjectList = array();
		$classesCount = 1;

		if($classes == ""){
			$classes = Input::get('classes');

			if(!Input::has('classes')){
				return $subjectList;
			}

		}

		if(is_array($classes)){
			$classes = classes::whereIn('id',$classes);
			$classesCount = count($classes);
		}else{
			$classes = classes::where('id',$classes);
		}

		$classes = $classes->get()->toArray();

		while (list(, $value) = each($classes)) {
			$value['classSubjects'] = json_decode($value['classSubjects'],true);
			if(is_array($value['classSubjects'])){
				while (list(, $value2) = each($value['classSubjects'])) {
					$subjectList[] = $value2;
				}
			}
		}

		if($classesCount == 1){
			$finalClasses = $subjectList;
		}else{
			$subjectList = array_count_values($subjectList);

			$finalClasses = array();
			while (list($key, $value) = each($subjectList)) {
				if($value == $classesCount){
					$finalClasses[] = $key;
				}
			}
		}

		if(count($finalClasses) > 0){
			if($this->data['users']->role == "teacher"){
				return subject::where('teacherId','LIKE','%"'.$this->data['users']->id.'"%')->whereIn('id',$finalClasses)->get()->toArray();
			}else{
				return subject::whereIn('id',$finalClasses)->get()->toArray();
			}
		}

		return array();
	}

	public function savePolls(){
		$toReturn = array();

		$polls = polls::where('pollTarget',$this->data['users']->role)->orWhere('pollTarget','all')->where('pollStatus','1')->where('id',Input::get('id'))->first();
		if(count($polls) > 0){
			$userVoted = json_decode($polls->userVoted,true);
			if(!is_array($userVoted)){
				$userVoted = array();
			}
			if(is_array($userVoted) AND in_array($this->data['users']->id,$userVoted)){
				return json_encode(array("jsTitle"=>$this->panelInit->language['votePoll'],"jsMessage"=>$this->panelInit->language['alreadyvoted']));
				exit;
			}
			$userVoted[] = $this->data['users']->id;
			$polls->userVoted = json_encode($userVoted);

			$toReturn['polls']['items'] = json_decode($polls->pollOptions,true);
			$toReturn['polls']['totalCount'] = 0;
			while (list($key, $value) = each($toReturn['polls']['items'])) {
				if($value['title'] == Input::get('selected')){
					if(!isset($toReturn['polls']['items'][$key]['count'])) $toReturn['polls']['items'][$key]['count'] = 0;
					$toReturn['polls']['items'][$key]['count']++;
				}
				if(isset($toReturn['polls']['items'][$key]['count'])){
					$toReturn['polls']['totalCount'] += $toReturn['polls']['items'][$key]['count'];
				}
			}
			reset($toReturn['polls']['items']);
			while (list($key, $value) = each($toReturn['polls']['items'])) {
				if(isset($toReturn['polls']['items'][$key]['count'])){
					$toReturn['polls']['items'][$key]['perc'] = ($toReturn['polls']['items'][$key]['count'] * 100) / $toReturn['polls']['totalCount'];
				}
			}
			$polls->pollOptions = json_encode($toReturn['polls']['items']);
			$polls->save();

			$toReturn['polls']['title'] = $polls->pollTitle;
			$toReturn['polls']['id'] = $polls->id;
			$toReturn['polls']['view'] = "results";
			$toReturn['polls']['voted'] = true;
		}

		return $toReturn['polls'];
		exit;
	}


	public function calender()
	{
		$daysArray = $this->panelInit->rangeDates(Input::get('start'),Input::get('end'),"Y-m-d");

		$toReturn = array();

		if($this->data['users']->role == "admin"){
			$assignments = assignments::where('AssignDeadLine','>',$daysArray['start'])->where('AssignDeadLine','<',$daysArray['end'])->get();
		}elseif($this->data['users']->role == "teacher"){
			$assignments = assignments::where('AssignDeadLine','>',$daysArray['start'])->where('AssignDeadLine','<',$daysArray['end'])->where('teacherId',$this->data['users']->id)->get();
		}elseif($this->data['users']->role == "student"){
			$assignments = assignments::where('AssignDeadLine','>',$daysArray['start'])->where('AssignDeadLine','<',$daysArray['end'])->where('classId','like','%"'.$this->data['users']->studentClass.'"%')->get();
		}
		if(isset($assignments)){
			foreach ($assignments as $event ) {
				$eventsArray['id'] =  $event->id;
				$eventsArray['title'] = $this->panelInit->language['Assignments']." : ".$event->AssignTitle;
			    $eventsArray['start'] = $this->panelInit->unixToDate($event->AssignDeadLine,"c");
			    $eventsArray['backgroundColor'] = 'green';
			    $eventsArray['textColor'] = '#fff';
				$eventsArray['url'] = "#assignments";
			    $eventsArray['allDay'] = true;
			    $toReturn[] = $eventsArray;
			}
		}

		$events = events::where('eventFor',$this->data['users']->role)->orWhere('eventFor','all')->where('eventDate','>',$daysArray['start'])->where('eventDate','<',$daysArray['end'])->get();
		foreach ($events as $event ) {
			$eventsArray['id'] =  $event->id;
			$eventsArray['title'] = $this->panelInit->language['events']." : ".$event->eventTitle;
		    $eventsArray['start'] = $this->panelInit->unixToDate($event->eventDate,"c");
		    $eventsArray['backgroundColor'] = 'blue';
			$eventsArray['url'] = "#events/".$event->id;
		    $eventsArray['textColor'] = '#fff';
		    $eventsArray['allDay'] = true;
		    $toReturn[] = $eventsArray;
		}

		$examsList = exams_list::where('examDate','>',$daysArray['start'])->where('examDate','<',$daysArray['end'])->get();
		foreach ($examsList as $event ) {
			$eventsArray['id'] =  $event->id;
			$eventsArray['title'] = $this->panelInit->language['examName']." : ".$event->examTitle;
		    $eventsArray['start'] = $this->panelInit->unixToDate($event->examDate,"c");
		    $eventsArray['backgroundColor'] = 'red';
			$eventsArray['url'] = "#examsList";
		    $eventsArray['textColor'] = '#fff';
		    $eventsArray['allDay'] = true;
		    $toReturn[] = $eventsArray;
		}

		$newsboard = newsboard::where('newsFor',$this->data['users']->role)->orWhere('newsFor','all')->where('creationDate','>',$daysArray['start'])->where('creationDate','<',$daysArray['end'])->get();
		foreach ($newsboard as $event ) {
			$eventsArray['id'] =  $event->id;
			$eventsArray['title'] =  $this->panelInit->language['newsboard']." : ".$event->newsTitle;
		    $eventsArray['start'] = $this->panelInit->unixToDate($event->creationDate,"c");
			$eventsArray['url'] = "#newsboard/".$event->id;
		    $eventsArray['backgroundColor'] = 'white';
		    $eventsArray['textColor'] = '#000';
		    $eventsArray['allDay'] = true;
		    $toReturn[] = $eventsArray;
		}

		if($this->data['users']->role == "admin"){
			$onlineExams = online_exams::where('examDate','>',$daysArray['start'])->where('examDate','<',$daysArray['end'])->get();
		}elseif($this->data['users']->role == "teacher"){
			$onlineExams = online_exams::where('examDate','>',$daysArray['start'])->where('examDate','<',$daysArray['end'])->where('examTeacher',$this->data['users']->id)->get();
		}elseif($this->data['users']->role == "student"){
			$onlineExams = online_exams::where('examDate','>',$daysArray['start'])->where('examDate','<',$daysArray['end'])->where('examClass','like','%"'.$this->data['users']->studentClass.'"%')->get();
		}
		if(isset($onlineExams)){
			foreach ($onlineExams as $event ) {
				$eventsArray['id'] =  $event->id;
				$eventsArray['title'] =  $this->panelInit->language['onlineExams']." : ".$event->examTitle;
			    $eventsArray['start'] = $this->panelInit->unixToDate($event->examDate,"c");
			    $eventsArray['backgroundColor'] = 'red';
				$eventsArray['url'] = "#onlineExams";
			    $eventsArray['textColor'] = '#000';
			    $eventsArray['allDay'] = true;
			    $toReturn[] = $eventsArray;
			}
		}

		return $toReturn;
	}

	public function image($section,$image){
		if(!file_exists("uploads/".$section."/".$image)){
			$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg") {
	    	header('Content-type: image/jpg');
	    } elseif ($ext == "png") {
	      header('Content-type: image/png');
	    } elseif ($ext == "gif") {
	      header('Content-type: image/gif');
	    }
	    if($section == "profile"){
				echo file_get_contents("uploads/".$section."/user.png");
			}
			if($section == "media"){
				echo file_get_contents("uploads/".$section."/default.png");
			}
		}
		exit;
	}

	public function readNewsEvent($type,$id){
		if($type == "news"){
			return newsboard::where('id',$id)->first();
		}
		if($type == "event"){
			return events::where('id',$id)->first();
		}
	}

	public function mobNotif($id = ""){
		$toRetrun = array();

		if (!Auth::check()){ exit; }

		$userId = $this->data['users']->id;

		if($this->data['users']->role == "admin"){
			$mobNotifications = mob_notifications::where('notifTo','users')->where('notifToIds','LIKE','%"'.$userId.'"%')->orWhere('notifTo','all');
		}
		if($this->data['users']->role == "teacher"){
			$mobNotifications = mob_notifications::where('notifTo','teachers')->orWhere(function($query) use($userId) {
																						        $query->where('notifTo', 'users')
																						              ->where('notifToIds','LIKE','%"'.$userId.'"%');
																						})->orWhere('notifTo','all');
		}
		if($this->data['users']->role == "parent"){
			$mobNotifications = mob_notifications::where('notifTo','parents')->orWhere(function($query) use($userId) {
																						        $query->where('notifTo', 'users')
																						              ->where('notifToIds','LIKE','%"'.$userId.'"%');
																						})->orWhere('notifTo','all');
		}
		if($this->data['users']->role == "studnet"){
			$userClass = $this->data['users']->studentClass;
			$mobNotifications = mob_notifications::where(function($query) use($userClass) {
																	        $query->where('notifTo', 'students')
																	              ->whereIn('notifToIds',array(0,$userClass));
																	})->orWhere(function($query) use($userId) {
																				        $query->where('notifTo', 'users')
																				              ->where('notifToIds','LIKE','%"'.$userId.'"%');
																				})->orWhere('notifTo','all');
		}

		if($id == "" || $id == "0"){
			$mobNotifications = $mobNotifications->select('id','notifData','notifDate')->limit(1)->orderBy('id','DESC')->limit(1)->get();
		}else{
			$mobNotifications = $mobNotifications->where('id','>',$id)->select('id','notifData','notifDate')->orderBy('id','asc')->get();
		}

		return $mobNotifications;
	}
}
