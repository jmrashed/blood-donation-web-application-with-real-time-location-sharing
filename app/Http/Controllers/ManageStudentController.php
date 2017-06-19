<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests; 
use DB;
use App\Student; 
use App\Libraries\Common;
use Session;
use PDF;
use File;
use Storage;
use League\Flysystem\Filesystem;
use Excel;
use Illuminate\Support\Facades\Input;

class ManageStudentController extends Controller {

    private $viewFolderPath = 'admin/';
    private $breadcrumb = 'Manage Student';

     

    public function index(Request $request) {
        //return PDF::loadFile(public_path().'/equation.html')->save(public_path().'/std_pdf')->stream('download.pdf');  	

        $student = new Student;
        $school_row_id = session('school_row_id');
        $current_class = 0;
        $current_shift = 0;
        $current_section = '';
        $current_department = '';
        $student_list = array();
        $total_student = 0;
        $show_students_list = 0;

        $breadcrumb = $this->breadcrumb;
        $allclasses = getSchoolClasses($school_row_id);
        $selectedSections = academic_session_options();

        if ($request->isMethod('post')) {
            $academic_department_array = config('site_config.academic_department');
            $class_name = \App\Models\Master_class::where('class_row_id', $request->academic_class)->first()->class_name;
            $shift_title = \App\Models\SchoolShift::where('shift_row_id', $request->academic_shift)->first()->shift_title;
            $section_name = \App\Models\SchoolSection::where('section_row_id', $request->academic_section)->first()->section_name;
            $department_name = $academic_department_array[$request->academic_department];

            $query = DB::table('students AS std')
                    ->leftjoin('master_classes AS mc', 'mc.class_row_id', '=', 'std.current_class')
                    ->leftjoin('school_sections AS ss', 'ss.section_row_id', '=', 'std.current_section')
                    ->leftjoin('students_details AS sd', 'sd.student_row_id', '=', 'std.student_row_id')
                    ->select('std.student_id as studentid', 'std.*', 'mc.*', 'ss.*', 'sd.*')
                    ->where([['std.school_row_id', $school_row_id], ['std.current_session', session('academic_session_row_id')]])
                    ->where('std.current_session', '=', session('academic_session_row_id'))
                    ->where('std.current_class', '=', $request->academic_class)
                    ->where('std.current_shift', '=', $request->academic_shift)
                    ->where('std.current_section', '=', $request->academic_section)
                    ->where('std.current_department', '=', $request->academic_department)
                    ->orderBy('std.student_row_id', 'ASC');

            $current_class = $request->academic_class;
            $current_shift = $request->academic_shift;
            $current_section = $request->academic_section;
            $current_department = $request->academic_department;

            $student_list = $query->get();
            $total_student = $query->count();
            //dd($student_list);
            //echo '<pre>'.print_r ($student_list, true).'</pre>'; exit;
            $breadcrumb = $this->breadcrumb;
            $allclasses = getSchoolClasses($school_row_id);
            $selectedSections = academic_session_options();
            $show_students_list = 1;

            return view($this->viewFolderPath . 'home', compact('breadcrumb', 'allclasses', 'student_list', 'current_class', 'current_shift', 'current_section', 'current_department', 'siblings_data', 'total_student', 'show_students_list'));
        } else {


            return view($this->viewFolderPath . 'home', compact('breadcrumb', 'allclasses', 'current_class', 'current_shift', 'current_section', 'current_department', 'total_student', 'show_students_list'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createstudent() {
        $school_row_id = session('school_row_id');
        $breadcrumb = $this->breadcrumb;
        $alldistricts = DB::table('districts')->select('id', 'full_name')->orderBy('full_name', 'asc')->get();
        $allclasses = getSchoolClasses($school_row_id);
        $blood_group = config('site_config.blood_group');
        $religion = config('site_config.religion');
        $divisionlist = config('site_config.divisionlist');
        $relationship = config('site_config.relationship');
        //echo '<pre>'.print_r ($blood_group, true).'</pre>'; exit;
        return view($this->viewFolderPath . 'create', compact('breadcrumb', 'alldistricts', 'allclasses', 'blood_group', 'religion', 'divisionlist', 'relationship'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $student = new Student;
        $guardian = new Guardian;
        $students_academic_details = new StudentsAcademicDetail;
        $student_details = new StudentsDetail;
        $guardian_login = new StudentsGuardianLogin;
        $common = new Common;

        $input = $request->all();
        unset($input['_token']);

        //$jsonencode = json_encode($visitor_info);
        //$jsondecode = json_decode($jsonencode);
        //echo '<pre>'.print_r ($jsonencode, true).'</pre>';
        //echo '<pre>'.print_r ($input, true).'</pre>'; exit;

        $guardiantype = $input['who_is_gurdian'];
        if ($guardiantype == 3) {
            $guardian->guardian_name = isset($input['guardian_name']) ? $input['guardian_name'] : '';
            $guardian->guardian_name_bangla = isset($input['guardian_name_bangla']) ? $input['guardian_name_bangla'] : '';
            $guardian->guardian_email = isset($input['guardian_email']) ? $input['guardian_email'] : '';
            $guardian->guardian_mobile = isset($input['guardian_mobile']) ? $input['guardian_mobile'] : '';
            $guardian->guardian_occupation = isset($input['guardian_occupation']) ? $input['guardian_occupation'] : '';
            $guardian->guardian_office_address = isset($input['guardian_office_address']) ? $input['guardian_office_address'] : '';
            $guardian->guardian_phone_office = isset($input['guardian_phone_office']) ? $input['guardian_phone_office'] : '';
            $guardian->guardian_relationship = isset($input['guardian_relationship']) ? $input['guardian_relationship'] : '';
            $guardian->guardian_address = isset($input['guardian_address']) ? $input['guardian_address'] : '';
            $guardian->guardian_division_present = isset($input['guardian_division_present']) ? $input['guardian_division_present'] : '';
            $guardian->guardian_district_present = isset($input['guardian_district_present']) ? $input['guardian_district_present'] : '';
            $guardian->guardian_upazila_present = isset($input['guardian_upazila_present']) ? $input['guardian_upazila_present'] : '';
            $guardian->guardian_postcode_present = isset($input['guardian_postcode_present']) ? $input['guardian_postcode_present'] : '';
            $guardian->created_at = \Carbon\Carbon::now();
            $guardian->save();
            $guardian_row_id = $guardian->guardian_row_id;
        }

        if (isset($input['guardian_login_email'])) {
            $gl_email = $input['guardian_login_email'];
            $guardiandata = DB::table('students_guardian_login')->select('guardian_login_row_id', 'guardian_login_email')->where('guardian_login_email', $gl_email)->first();
            if ($guardiandata != '') {
                $guardian_login_row_id = $guardiandata->guardian_login_row_id;
            } else {
                $guardian_login->guardian_login_email = isset($input['guardian_login_email']) ? $input['guardian_login_email'] : '';
                $guardian_login->guardian_login_password = isset($input['guardian_login_password']) ? bcrypt($input['guardian_login_password']) : '';
                $guardian_login->guardian_login_password_text = isset($input['guardian_login_password']) ? $input['guardian_login_password'] : '';
                $guardian_login->created_at = \Carbon\Carbon::now();
                $guardian_login->save();
                $guardian_login_row_id = $guardian_login->guardian_login_row_id;
            }
        }


        $student->student_name = isset($input['student_name']) ? $input['student_name'] : '';
        $student->student_name_bangla = isset($input['student_name_bangla']) ? $input['student_name_bangla'] : '';
        $student->student_email = isset($input['student_email']) ? $input['student_email'] : '';
        $student->student_password = isset($input['student_password']) ? bcrypt($input['student_password']) : '';
        $student->student_password_text = isset($input['student_password']) ? $input['student_password'] : '';
        $student->school_row_id = session('school_row_id');
        $student->current_session = session('academic_session_row_id');
        $student->current_class = isset($input['academic_class']) ? $input['academic_class'] : '';
        $student->current_shift = isset($input['academic_shift']) ? $input['academic_shift'] : '';
        $student->current_department = isset($input['academic_department']) ? $input['academic_department'] : '';
        $student->current_section = isset($input['academic_section']) ? $input['academic_section'] : '';
        $student->current_rollnumber = isset($input['academic_rollnumber']) ? $input['academic_rollnumber'] : '';
        $student->student_gender = isset($input['student_gender']) ? $input['student_gender'] : '';
        $student->guardian_row_id = isset($input['guardian_row_id']) ? $input['guardian_row_id'] : '';
        $student->guardian_login_row_id = isset($guardian_login_row_id) ? $guardian_login_row_id : '';
        $student->student_phone = isset($input['student_phone']) ? $input['student_phone'] : '';
        $student->created_by = Auth()->guard('schoolAdmins')->user()->admin_row_id;
        $student->created_at = \Carbon\Carbon::now();
        $student->save();

        $insertedId = $student->student_row_id;
        $student_id = getStudentId($insertedId);
        $student->student_id = $student_id;
        $student->save();

        $students_academic_details->student_row_id = $insertedId;
        $students_academic_details->date_of_admission = isset($input['date_of_admission']) ? $input['date_of_admission'] : '';
        $students_academic_details->academic_session = session('academic_session_row_id');
        $students_academic_details->academic_class = isset($input['academic_class']) ? $input['academic_class'] : '';
        $students_academic_details->academic_shift = isset($input['academic_shift']) ? $input['academic_shift'] : '';
        $students_academic_details->academic_department = isset($input['academic_department']) ? $input['academic_department'] : '';
        $students_academic_details->academic_rollnumber = isset($input['academic_rollnumber']) ? $input['academic_rollnumber'] : '';
        $students_academic_details->created_at = \Carbon\Carbon::now();
        $students_academic_details->save();



        $student_name = $input['student_name'];
        $permanentaspresent = isset($input['permanentaspresent']) ? $input['permanentaspresent'] : 0;
        $student_details->student_row_id = $insertedId;
        $student_details->student_blood_group = isset($input['student_blood_group']) ? $input['student_blood_group'] : '';
        $student_details->student_dob = isset($input['student_dob']) ? $input['student_dob'] : '';
        $student_details->student_birth_place = isset($input['student_birth_place']) ? $input['student_birth_place'] : '';
        $student_details->student_religion = isset($input['student_religion']) ? $input['student_religion'] : '';
        $student_details->is_physically_disabled = isset($input['is_physically_disabled']) ? $input['is_physically_disabled'] : '';
        $student_details->student_medical_problem = isset($input['student_medical_problem']) ? $input['student_medical_problem'] : '';
        $student_details->student_present_address = isset($input['student_present_address']) ? $input['student_present_address'] : '';
        $student_details->student_present_address_bangla = isset($input['student_present_address_bangla']) ? $input['student_present_address_bangla'] : '';
        $student_details->student_division_present = isset($input['student_division_present']) ? $input['student_division_present'] : '';
        $student_details->student_district_present = isset($input['student_district_present']) ? $input['student_district_present'] : '';
        $student_details->student_upazila_present = isset($input['student_upazila_present']) ? $input['student_upazila_present'] : '';
        $student_details->student_postcode_present = isset($input['student_postcode_present']) ? $input['student_postcode_present'] : '';
        $student_details->permanentaspresent = $permanentaspresent;
        if ($permanentaspresent == 0) {
            $student_details->student_permanent_address = isset($input['student_permanent_address']) ? $input['student_permanent_address'] : '';
            $student_details->student_permanent_address_bangla = isset($input['student_permanent_address_bangla']) ? $input['student_permanent_address_bangla'] : '';
            $student_details->student_division_permanent = isset($input['student_division_permanent']) ? $input['student_division_permanent'] : '';
            $student_details->student_district_permanent = isset($input['student_district_permanent']) ? $input['student_district_permanent'] : '';
            $student_details->student_upazila_permanent = isset($input['student_upazila_permanent']) ? $input['student_upazila_permanent'] : '';
            $student_details->student_postcode_permanent = isset($input['student_postcode_permanent']) ? $input['student_postcode_permanent'] : '';
        }
        $student_details->student_telephone = isset($input['student_telephone']) ? $input['student_telephone'] : '';
        if ($request->student_photo) {
            $fileName = $student_id . '_' . $student_name;
            $student_photo = $common->uploadImage('student_photo', 'images/student_info/' . $student_id . '/student_photo', $fileName, $create_thumb = 1);
            $student_details->student_photo = $student_photo;
        }
        if ($request->student_signature) {
            $studentSignatureName = 'SIG_' . $student_id . '_' . $student_name;
            $student_signature = $common->uploadImage('student_signature', 'images/student_info/' . $student_id . '/student_signature', $studentSignatureName, $create_thumb = 1);
            $student_details->student_signature = $student_signature;
        }
        $student_details->student_nationality = isset($input['student_nationality']) ? $input['student_nationality'] : '';
        $student_details->student_birthcertificateno = isset($input['student_birthcertificateno']) ? $input['student_birthcertificateno'] : '';
        if ($request->student_birthcertificatephoto) {
            $studentBirthcertificateName = $student_id . '_' . $student_name;
            $student_birthcertificatephoto = $common->uploadImage('student_birthcertificatephoto', 'images/student_info/' . $student_id . '/student_birthcertificate', $studentBirthcertificateName);
            $student_details->student_birthcertificatephoto = $student_birthcertificatephoto;
        }
        $student_details->father_name = isset($input['father_name']) ? $input['father_name'] : '';
        $student_details->father_name_bangla = isset($input['father_name_bangla']) ? $input['father_name_bangla'] : '';
        $student_details->father_email = isset($input['father_email']) ? $input['father_email'] : '';
        $student_details->father_occupation = isset($input['father_occupation']) ? $input['father_occupation'] : '';
        $student_details->father_office_address = isset($input['father_office_address']) ? $input['father_office_address'] : '';
        $student_details->father_nid = isset($input['father_nid']) ? $input['father_nid'] : '';
        $student_details->father_mobile = isset($input['father_mobile']) ? $input['father_mobile'] : '';
        $student_details->father_income_annual = isset($input['father_income_annual']) ? $input['father_income_annual'] : '';
        $student_details->father_phone_office = isset($input['father_phone_office']) ? $input['father_phone_office'] : '';

        if ($request->father_photo) {
            $fatherPhotoName = $student_id . '_' . $input['father_name'];
            $father_photo = $common->uploadImage('father_photo', 'images/student_info/' . $student_id . '/father_photo', $fatherPhotoName, $create_thumb = 1);
            $student_details->father_photo = $father_photo;
        }
        if ($request->father_signature) {
            $fatherSignatureName = 'SIG_' . $student_id . '_' . $input['father_name'];
            $father_signature = $common->uploadImage('father_signature', 'images/student_info/' . $student_id . '/father_signature', $fatherSignatureName, $create_thumb = 1);
            $student_details->father_signature = $father_signature;
        }
        $student_details->mother_name = isset($input['mother_name']) ? $input['mother_name'] : '';
        $student_details->mother_name_bangla = isset($input['mother_name_bangla']) ? $input['mother_name_bangla'] : '';
        $student_details->mother_email = isset($input['mother_email']) ? $input['mother_email'] : '';
        $student_details->mother_occupation = isset($input['mother_occupation']) ? $input['mother_occupation'] : '';
        $student_details->mother_office_address = isset($input['mother_office_address']) ? $input['mother_office_address'] : '';
        $student_details->mother_nid = isset($input['mother_nid']) ? $input['mother_nid'] : '';
        $student_details->mother_mobile = isset($input['mother_mobile']) ? $input['mother_mobile'] : '';
        $student_details->mother_income_annual = isset($input['mother_income_annual']) ? $input['mother_income_annual'] : '';
        $student_details->mother_phone_office = isset($input['mother_phone_office']) ? $input['mother_phone_office'] : '';
        if ($request->mother_photo) {
            $motherPhotoName = $student_id . '_' . $input['mother_name'];
            $mother_photo = $common->uploadImage('mother_photo', 'images/student_info/' . $student_id . '/mother_photo', $motherPhotoName, $create_thumb = 1);
            $student_details->mother_photo = $mother_photo;
        }
        if ($request->mother_signature) {
            $motherSignatureName = 'SIG_' . $student_id . '_' . $input['mother_name'];
            $mother_signature = $common->uploadImage('mother_signature', 'images/student_info/' . $student_id . '/mother_signature', $motherSignatureName, $create_thumb = 1);
            $student_details->mother_signature = $mother_signature;
        }
        $student_details->emergency_contact_name = isset($input['emergency_contact_name']) ? $input['emergency_contact_name'] : '';
        $student_details->emergency_contact_name_bangla = isset($input['emergency_contact_name_bangla']) ? $input['emergency_contact_name_bangla'] : '';
        $student_details->emergency_contact_number = isset($input['emergency_contact_number']) ? $input['emergency_contact_number'] : '';
        $student_details->previous_institute_name = isset($input['previous_institute_name']) ? $input['previous_institute_name'] : '';
        $student_details->previous_institute_class = isset($input['previous_institute_class']) ? $input['previous_institute_class'] : '';
        $student_details->previous_institute_board = isset($input['previous_institute_board']) ? $input['previous_institute_board'] : '';
        $student_details->previous_institute_year = isset($input['previous_institute_year']) ? $input['previous_institute_year'] : '';
        $student_details->previous_institute_grade = isset($input['previous_institute_grade']) ? $input['previous_institute_grade'] : '';
        $student_details->previous_institute_cgpa = isset($input['previous_institute_cgpa']) ? $input['previous_institute_cgpa'] : '';
        $student_details->student_siblings_id = isset($input['student_siblings_id']) ? json_encode($input['student_siblings_id']) : '';
        $student_details->who_is_gurdian = isset($input['who_is_gurdian']) ? $input['who_is_gurdian'] : '';
        $student_details->guardian_row_id = isset($guardian_row_id) ? $guardian_row_id : '';
        $visitor_info = array();
        $visitor_name = isset($input['visitor_name']) ? $input['visitor_name'] : '';
        $visitor_name_bangla = isset($input['visitor_name_bangla']) ? $input['visitor_name_bangla'] : '';
        $visitor_nid = isset($input['visitor_nid']) ? $input['visitor_nid'] : '';
        $visitor_email = isset($input['visitor_email']) ? $input['visitor_email'] : '';
        $visitor_mobile = isset($input['visitor_mobile']) ? $input['visitor_mobile'] : '';
        $visitor_relationship = isset($input['visitor_relationship']) ? $input['visitor_relationship'] : '';
        if (!empty($visitor_name) && ($visitor_name != '')) {
            $visitorcount = count($visitor_name);
            for ($item = 0; $item < $visitorcount; $item++) {
                //echo '<pre>'.print_r ($request->visitor_photo[$item], true).'</pre>';
                if ($visitor_name[$item] != '') {
                    $visitor_info[$item]['name'] = $visitor_name[$item];
                    $visitor_info[$item]['name_bangla'] = $visitor_name_bangla[$item];
                    $visitor_info[$item]['nid'] = $visitor_nid[$item];
                    $visitor_info[$item]['email'] = $visitor_email[$item];
                    $visitor_info[$item]['mobile'] = $visitor_mobile[$item];
                    $visitor_info[$item]['relationship'] = $visitor_relationship[$item];
                    if ($request->visitor_photo[$item]) {
                        $visitorPhotoName = $student_id . '_' . $visitor_name[$item];
                        $visitor_photo = $common->uploadImage('visitor_photo', 'images/student_info/' . $student_id . '/visitor_photo', $visitorPhotoName, $create_thumb = 1, $item);
                        $visitor_info[$item]['photo'] = $visitor_photo;
                    }
                    if ($request->visitor_signature[$item]) {
                        $visitorSignatureName = $student_id . '_' . $visitor_name[$item];
                        $visitor_signature = $common->uploadImage('visitor_signature', 'images/student_info/' . $student_id . '/visitor_signature', $visitorSignatureName, $create_thumb = 1, $item);
                        $visitor_info[$item]['signature'] = $visitor_signature;
                    }
                }
            }
        }
        //echo '<pre>'.print_r ($visitor_info, true).'</pre>'; exit;
        $student_details->visitor_info = json_encode($visitor_info);
        $student_details->created_at = \Carbon\Carbon::now();
        $student_details->save();


        if (($guardiantype == 3) && ($request->guardian_photo)) {
            $guardianPhotoName = $student_id . '_' . $input['guardian_name'];
            $guardian_photo = $common->uploadImage('guardian_photo', 'images/student_info/' . $student_id . '/guardian_photo', $guardianPhotoName, $create_thumb = 1);
            $guardian->guardian_photo = $guardian_photo;
            $guardian->save();
        }
        if (($guardiantype == 3) && ($request->guardian_signature)) {
            $guardianSignatureName = 'SIG_' . $student_id . '_' . $input['guardian_name'];
            $guardian_signature = $common->uploadImage('guardian_signature', 'images/student_info/' . $student_id . '/guardian_signature', $guardianSignatureName, $create_thumb = 1);
            $guardian->guardian_signature = $guardian_signature;
            $guardian->save();
        }

        Session::flash('success-message', 'Student has been added successfully');
        return redirect('/schoolAdmin/manageStudent');
    }

    public function getStudentId($school_row_id, $student_row_id) {
        return date("Y") . str_pad($school_row_id, 4, "0", STR_PAD_LEFT) . $student_row_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetails($studentid) {
        $student_details = $this->getStudentDetails($studentid);
        //echo '<pre>'.print_r ($student_details, true).'</pre>'; exit;

        $breadcrumb = $this->breadcrumb;
        return view($this->viewFolderPath . 'showDetails', compact('breadcrumb', 'student_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($studentid) {
        $student_details = $this->getStudentDetails($studentid);
        //echo '<pre>'.print_r ($student_details, true).'</pre>'; exit;
        if (isset($student_details['student_siblings_id']) && ($student_details['student_siblings_id'] != '')) {
            $siblings_id = json_decode($student_details['student_siblings_id']);
            $siblings_id = implode(',', $siblings_id);

            $query = DB::table('students AS std')
                    ->leftjoin('students_details AS sd', 'sd.student_row_id', '=', 'std.student_row_id')
                    ->select('std.student_id as studentid', 'std.*', 'sd.*')
                    ->whereIn('std.student_row_id', explode(',', $siblings_id));

            $sibling_details = $query->get();
            $html = '';
            foreach ($sibling_details as $key => $value) {
                if ($value->student_photo != '') {
                    $studentimageurl = asset('public/images/student_info/' . $value->studentid . '/student_photo/thumbs/' . $value->student_photo);
                } else {
                    $studentimageurl = asset('public/images/common/default_student_photo.png');
                }
                //$list['results'][] = array("id"=>$value->student_row_id,"text"=>'<img src="'.$studentimageurl.'" width="35px" height="35px" />'.'  '.$value->student_name.' (Class: '.$value->current_class.' Roll: '.$value->current_rollnumber.')'); 
                $html .= '<option selected="selected" value="' . $value->student_row_id . '"><img src="' . $studentimageurl . '" width="35px" height="35px" />' . '  ' . $value->student_name . ' (Class: ' . $value->current_class . ' Roll: ' . $value->current_rollnumber . ')</option>';
            }
        }
        //echo $html; exit;
        $siblings_data = isset($html) ? $html : '';
        $school_row_id = session('school_row_id');
        $alldistricts = DB::table('districts')->select('id', 'full_name')->orderBy('full_name', 'asc')->get();
        $allclasses = getSchoolClasses($school_row_id);
        $blood_group = config('site_config.blood_group');
        $religion = config('site_config.religion');
        $divisionlist = config('site_config.divisionlist');
        $relationship = config('site_config.relationship');
        $breadcrumb = $this->breadcrumb;
        return view($this->viewFolderPath . 'edit', compact('breadcrumb', 'student_details', 'alldistricts', 'allclasses', 'blood_group', 'religion', 'divisionlist', 'relationship', 'siblings_data', 'std'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //$student = new Student;
        $input = $request->all();
        //unset($input['_token']);

        $student_row_id = $input['student_row_id'];
        $student_id = $input['student_id'];
        $student_academic_details_row_id = $input['student_academic_details_row_id'];
        $student_details_row_id = $input['student_details_row_id'];
        $guardian_row_id = isset($input['guardian_row_id']) ? $input['guardian_row_id'] : '';
        $guardian_login_row_id = isset($input['guardian_login_row_id']) ? $input['guardian_login_row_id'] : '';
        $student = \App\Models\Student::find($student_row_id);

        if (isset($guardian_row_id) && ($guardian_row_id != '')) {
            $guardian = \App\Models\Guardian::find($guardian_row_id);
        } else {
            $guardian = new Guardian;
        }

        if (isset($guardian_login_row_id) && ($guardian_login_row_id != '')) {
            $guardian_login = \App\Models\StudentsGuardianLogin::find($guardian_login_row_id);
        } else {
            $guardian_login = new StudentsGuardianLogin;
        }

        $students_academic_details = \App\Models\StudentsAcademicDetail::find($student_academic_details_row_id);
        $student_details = \App\Models\StudentsDetail::find($student_details_row_id);
        $common = new Common;
        //echo '<pre>'.print_r ($input, true).'</pre>'; exit;
        if (isset($input['guardian_login_email']) && ($input['guardian_login_email'] != '')) {
            $gl_email_past = $input['guardian_login_email_past'];
            $gl_email = $input['guardian_login_email'];
            if ($gl_email != $gl_email_past) { // Check for same guardian login email
                $guardiandata = DB::table('students_guardian_login')->select('guardian_login_row_id', 'guardian_login_email')->where('guardian_login_email', $gl_email)->first();
                if ($guardiandata != '') {
                    // Delete previous record from guardian_login table
                    //DB::table('students_guardian_login')->where('guardian_login_row_id', $guardian_login_row_id)->delete();
                    $guardian_login_row_id = $guardiandata->guardian_login_row_id;
                } else {
                    $guardian_login->guardian_login_email = isset($input['guardian_login_email']) ? $input['guardian_login_email'] : '';
                    $guardian_login->guardian_login_password = isset($input['guardian_login_password']) ? bcrypt($input['guardian_login_password']) : '';
                    $guardian_login->guardian_login_password_text = isset($input['guardian_login_password']) ? $input['guardian_login_password'] : '';
                    $guardian_login->created_at = \Carbon\Carbon::now();
                    $guardian_login->save();
                    $guardian_login_row_id = $guardian_login->guardian_login_row_id;
                }
            } else {
                $guardian_login->guardian_login_email = isset($input['guardian_login_email']) ? $input['guardian_login_email'] : '';
                $guardian_login->guardian_login_password = isset($input['guardian_login_password']) ? bcrypt($input['guardian_login_password']) : '';
                $guardian_login->guardian_login_password_text = isset($input['guardian_login_password']) ? $input['guardian_login_password'] : '';
                $guardian_login->updated_at = \Carbon\Carbon::now();
                $guardian_login->save();
                $guardian_login_row_id = $guardian_login->guardian_login_row_id;
            }
        }

        //echo '<pre>'.print_r ($input, true).'</pre>'; exit;
        $student->student_name = isset($input['student_name']) ? $input['student_name'] : '';
        $student->student_name_bangla = isset($input['student_name_bangla']) ? $input['student_name_bangla'] : '';
        $student->student_email = isset($input['student_email']) ? $input['student_email'] : '';
        $student->student_password = isset($input['student_password']) ? bcrypt($input['student_password']) : '';
        $student->student_password_text = isset($input['student_password']) ? $input['student_password'] : '';
        $student->school_row_id = session('school_row_id');
        $student->current_session = session('academic_session_row_id');
        $student->current_class = isset($input['academic_class']) ? $input['academic_class'] : '';
        $student->current_shift = isset($input['academic_shift']) ? $input['academic_shift'] : '';
        $student->current_department = isset($input['academic_department']) ? $input['academic_department'] : '';
        $student->current_section = isset($input['academic_section']) ? $input['academic_section'] : '';
        $student->current_rollnumber = isset($input['academic_rollnumber']) ? $input['academic_rollnumber'] : '';
        $student->student_gender = isset($input['student_gender']) ? $input['student_gender'] : '';
        $student->guardian_row_id = isset($input['guardian_row_id']) ? $input['guardian_row_id'] : '';
        $student->guardian_login_row_id = isset($guardian_login_row_id) ? $guardian_login_row_id : '';
        $student->student_phone = isset($input['student_phone']) ? $input['student_phone'] : '';
        $student->updated_by = Auth()->guard('schoolAdmins')->user()->admin_row_id;
        $student->updated_at = \Carbon\Carbon::now();
        $student->save();

        $students_academic_details->student_row_id = $student_row_id;
        $students_academic_details->date_of_admission = isset($input['date_of_admission']) ? $input['date_of_admission'] : '';
        $students_academic_details->academic_session = session('academic_session_row_id');
        $students_academic_details->academic_class = isset($input['academic_class']) ? $input['academic_class'] : '';
        $students_academic_details->academic_shift = isset($input['academic_shift']) ? $input['academic_shift'] : '';
        $students_academic_details->academic_department = isset($input['academic_department']) ? $input['academic_department'] : '';
        $students_academic_details->academic_rollnumber = isset($input['academic_rollnumber']) ? $input['academic_rollnumber'] : '';
        $students_academic_details->updated_at = \Carbon\Carbon::now();
        $students_academic_details->save();


        $student_name = $input['student_name'];
        $permanentaspresent = isset($input['permanentaspresent']) ? $input['permanentaspresent'] : 0;
        $student_details->student_row_id = $student_row_id;
        $student_details->student_blood_group = isset($input['student_blood_group']) ? $input['student_blood_group'] : '';
        $student_details->student_dob = isset($input['student_dob']) ? $input['student_dob'] : '';
        $student_details->student_birth_place = isset($input['student_birth_place']) ? $input['student_birth_place'] : '';
        $student_details->student_religion = isset($input['student_religion']) ? $input['student_religion'] : '';
        $student_details->is_physically_disabled = isset($input['is_physically_disabled']) ? $input['is_physically_disabled'] : '';
        $student_details->student_medical_problem = isset($input['student_medical_problem']) ? $input['student_medical_problem'] : '';
        $student_details->student_present_address = isset($input['student_present_address']) ? $input['student_present_address'] : '';
        $student_details->student_present_address_bangla = isset($input['student_present_address_bangla']) ? $input['student_present_address_bangla'] : '';
        $student_details->student_division_present = isset($input['student_division_present']) ? $input['student_division_present'] : '';
        $student_details->student_district_present = isset($input['student_district_present']) ? $input['student_district_present'] : '';
        $student_details->student_upazila_present = isset($input['student_upazila_present']) ? $input['student_upazila_present'] : '';
        $student_details->student_postcode_present = isset($input['student_postcode_present']) ? $input['student_postcode_present'] : '';
        $student_details->permanentaspresent = $permanentaspresent;
        if ($permanentaspresent == 0) {
            $student_details->student_permanent_address = isset($input['student_permanent_address']) ? $input['student_permanent_address'] : '';
            $student_details->student_permanent_address_bangla = isset($input['student_permanent_address_bangla']) ? $input['student_permanent_address_bangla'] : '';
            $student_details->student_division_permanent = isset($input['student_division_permanent']) ? $input['student_division_permanent'] : '';
            $student_details->student_district_permanent = isset($input['student_district_permanent']) ? $input['student_district_permanent'] : '';
            $student_details->student_upazila_permanent = isset($input['student_upazila_permanent']) ? $input['student_upazila_permanent'] : '';
            $student_details->student_postcode_permanent = isset($input['student_postcode_permanent']) ? $input['student_postcode_permanent'] : '';
        } else {
            $student_details->student_permanent_address = '';
            $student_details->student_permanent_address_bangla = '';
            $student_details->student_division_permanent = 0;
            $student_details->student_district_permanent = 0;
            $student_details->student_upazila_permanent = 0;
            $student_details->student_postcode_permanent = '';
        }
        $student_details->student_telephone = isset($input['student_telephone']) ? $input['student_telephone'] : '';
        if ($request->student_photo) {
            $fileName = $student_id . '_' . $student_name;
            $student_photo = $common->uploadImage('student_photo', 'images/student_info/' . $student_id . '/student_photo', $fileName, $create_thumb = 1);
            $student_details->student_photo = $student_photo;
        }
        if ($request->student_signature) {
            $studentSignatureName = 'SIG_' . $student_id . '_' . $student_name;
            $student_signature = $common->uploadImage('student_signature', 'images/student_info/' . $student_id . '/student_signature', $studentSignatureName, $create_thumb = 1);
            $student_details->student_signature = $student_signature;
        }

        $student_details->student_nationality = isset($input['student_nationality']) ? $input['student_nationality'] : '';
        $student_details->student_birthcertificateno = isset($input['student_birthcertificateno']) ? $input['student_birthcertificateno'] : '';

        if ($request->student_birthcertificatephoto) {
            $fileName = $student_id . '_' . $student_name;
            $student_birthcertificatephoto = $common->uploadImage('student_birthcertificatephoto', 'images/student_info/' . $student_id . '/student_birthcertificate', $fileName);
            $student_details->student_birthcertificatephoto = $student_birthcertificatephoto;
        }
        $student_details->father_name = isset($input['father_name']) ? $input['father_name'] : '';
        $student_details->father_name_bangla = isset($input['father_name_bangla']) ? $input['father_name_bangla'] : '';
        $student_details->father_email = isset($input['father_email']) ? $input['father_email'] : '';
        $student_details->father_occupation = isset($input['father_occupation']) ? $input['father_occupation'] : '';
        $student_details->father_office_address = isset($input['father_office_address']) ? $input['father_office_address'] : '';
        $student_details->father_nid = isset($input['father_nid']) ? $input['father_nid'] : '';
        $student_details->father_mobile = isset($input['father_mobile']) ? $input['father_mobile'] : '';
        $student_details->father_income_annual = isset($input['father_income_annual']) ? $input['father_income_annual'] : '';
        $student_details->father_phone_office = isset($input['father_phone_office']) ? $input['father_phone_office'] : '';
        if ($request->father_photo) {
            $fatherPhotoName = $student_id . '_' . $input['father_name'];
            $father_photo = $common->uploadImage('father_photo', 'images/student_info/' . $student_id . '/father_photo', $fatherPhotoName, $create_thumb = 1);
            $student_details->father_photo = $father_photo;
        }
        if ($request->father_signature) {
            $fatherSignatureName = 'SIG_' . $student_id . '_' . $input['father_name'];
            $father_signature = $common->uploadImage('father_signature', 'images/student_info/' . $student_id . '/father_signature', $fatherSignatureName, $create_thumb = 1);
            $student_details->father_signature = $father_signature;
        }
        $student_details->mother_name = isset($input['mother_name']) ? $input['mother_name'] : '';
        $student_details->mother_name_bangla = isset($input['mother_name_bangla']) ? $input['mother_name_bangla'] : '';
        $student_details->mother_email = isset($input['mother_email']) ? $input['mother_email'] : '';
        $student_details->mother_occupation = isset($input['mother_occupation']) ? $input['mother_occupation'] : '';
        $student_details->mother_office_address = isset($input['mother_office_address']) ? $input['mother_office_address'] : '';
        $student_details->mother_nid = isset($input['mother_nid']) ? $input['mother_nid'] : '';
        $student_details->mother_mobile = isset($input['mother_mobile']) ? $input['mother_mobile'] : '';
        $student_details->mother_income_annual = isset($input['mother_income_annual']) ? $input['mother_income_annual'] : '';
        $student_details->mother_phone_office = isset($input['mother_phone_office']) ? $input['mother_phone_office'] : '';
        if ($request->mother_photo) {
            $motherPhotoName = $student_id . '_' . $input['mother_name'];
            $mother_photo = $common->uploadImage('mother_photo', 'images/student_info/' . $student_id . '/mother_photo', $motherPhotoName, $create_thumb = 1);
            $student_details->mother_photo = $mother_photo;
        }
        if ($request->mother_signature) {
            $motherSignatureName = 'SIG_' . $student_id . '_' . $input['mother_name'];
            $mother_signature = $common->uploadImage('mother_signature', 'images/student_info/' . $student_id . '/mother_signature', $motherSignatureName, $create_thumb = 1);
            $student_details->mother_signature = $mother_signature;
        }
        $student_details->emergency_contact_name = isset($input['emergency_contact_name']) ? $input['emergency_contact_name'] : '';
        $student_details->emergency_contact_name_bangla = isset($input['emergency_contact_name_bangla']) ? $input['emergency_contact_name_bangla'] : '';
        $student_details->emergency_contact_number = isset($input['emergency_contact_number']) ? $input['emergency_contact_number'] : '';
        $student_details->previous_institute_name = isset($input['previous_institute_name']) ? $input['previous_institute_name'] : '';
        $student_details->previous_institute_class = isset($input['previous_institute_class']) ? $input['previous_institute_class'] : '';
        $student_details->previous_institute_board = isset($input['previous_institute_board']) ? $input['previous_institute_board'] : '';
        $student_details->previous_institute_year = isset($input['previous_institute_year']) ? $input['previous_institute_year'] : '';
        $student_details->previous_institute_grade = isset($input['previous_institute_grade']) ? $input['previous_institute_grade'] : '';
        $student_details->previous_institute_cgpa = isset($input['previous_institute_cgpa']) ? $input['previous_institute_cgpa'] : '';
        $student_details->student_siblings_id = isset($input['student_siblings_id']) ? json_encode($input['student_siblings_id']) : '';
        $student_details->who_is_gurdian = isset($input['who_is_gurdian']) ? $input['who_is_gurdian'] : '';
        $student_details->guardian_row_id = isset($guardian_row_id) ? $guardian_row_id : '';
        $visitor_info = array();
        $visitor_name = isset($input['visitor_name']) ? $input['visitor_name'] : '';
        $visitor_name_bangla = isset($input['visitor_name_bangla']) ? $input['visitor_name_bangla'] : '';
        $visitor_nid = isset($input['visitor_nid']) ? $input['visitor_nid'] : '';
        $visitor_email = isset($input['visitor_email']) ? $input['visitor_email'] : '';
        $visitor_mobile = isset($input['visitor_mobile']) ? $input['visitor_mobile'] : '';
        $visitor_relationship = isset($input['visitor_relationship']) ? $input['visitor_relationship'] : '';
        if (!empty($visitor_name) && ($visitor_name != '')) {
            $visitorcount = count($visitor_name);
            for ($item = 0; $item < $visitorcount; $item++) {
                if ($visitor_name[$item] != '') {
                    $visitor_info[$item]['name'] = $visitor_name[$item];
                    $visitor_info[$item]['name_bangla'] = $visitor_name_bangla[$item];
                    $visitor_info[$item]['nid'] = $visitor_nid[$item];
                    $visitor_info[$item]['email'] = $visitor_email[$item];
                    $visitor_info[$item]['mobile'] = $visitor_mobile[$item];
                    $visitor_info[$item]['relationship'] = $visitor_relationship[$item];
                    if ($request->visitor_photo[$item]) {
                        //echo 'visitor no:  '.$item;
                        $visitorPhotoName = $student_id . '_' . $visitor_name[$item];
                        $visitor_photo = $common->uploadImage('visitor_photo', 'images/student_info/' . $student_id . '/visitor_photo', $visitorPhotoName, $create_thumb = 1, $item);
                        $visitor_info[$item]['photo'] = $visitor_photo;
                    } elseif (isset($input['visitor_photo_hidden'][$item]) && ($input['visitor_photo_hidden'][$item] != '')) {
                        //echo 'visitor no:  '.$item;
                        $visitor_info[$item]['photo'] = $input['visitor_photo_hidden'][$item];
                    } else {
                        $visitor_info[$item]['photo'] = '';
                    }

                    if ($request->visitor_signature[$item]) {
                        $visitorSignatureName = $student_id . '_' . $visitor_name[$item];
                        $visitor_signature = $common->uploadImage('visitor_signature', 'images/student_info/' . $student_id . '/visitor_signature', $visitorSignatureName, $create_thumb = 1, $item);
                        $visitor_info[$item]['signature'] = $visitor_signature;
                    } elseif (isset($input['visitor_signature_hidden'][$item]) && ($input['visitor_signature_hidden'][$item] != '')) {
                        $visitor_info[$item]['signature'] = $input['visitor_signature_hidden'][$item];
                    } else {
                        $visitor_info[$item]['signature'] = '';
                    }
                }
            }
        }
        //echo '<pre>'.print_r ($visitor_info, true).'</pre>'; exit;
        $student_details->visitor_info = json_encode($visitor_info);

        $student_details->updated_at = \Carbon\Carbon::now();
        $student_details->save();

        $guardiantype = $input['who_is_gurdian'];
        if ($guardiantype == 3) {
            $guardian->guardian_name = isset($input['guardian_name']) ? $input['guardian_name'] : '';
            $guardian->guardian_name_bangla = isset($input['guardian_name_bangla']) ? $input['guardian_name_bangla'] : '';
            $guardian->guardian_email = isset($input['guardian_email']) ? $input['guardian_email'] : '';
            $guardian->guardian_mobile = isset($input['guardian_mobile']) ? $input['guardian_mobile'] : '';
            $guardian->guardian_occupation = isset($input['guardian_occupation']) ? $input['guardian_occupation'] : '';
            $guardian->guardian_office_address = isset($input['guardian_office_address']) ? $input['guardian_office_address'] : '';
            $guardian->guardian_phone_office = isset($input['guardian_phone_office']) ? $input['guardian_phone_office'] : '';
            $guardian->guardian_relationship = isset($input['guardian_relationship']) ? $input['guardian_relationship'] : '';
            $guardian->guardian_address = isset($input['guardian_address']) ? $input['guardian_address'] : '';
            $guardian->guardian_division_present = isset($input['guardian_division_present']) ? $input['guardian_division_present'] : '';
            $guardian->guardian_district_present = isset($input['guardian_district_present']) ? $input['guardian_district_present'] : '';
            $guardian->guardian_upazila_present = isset($input['guardian_upazila_present']) ? $input['guardian_upazila_present'] : '';
            $guardian->guardian_postcode_present = isset($input['guardian_postcode_present']) ? $input['guardian_postcode_present'] : '';
            if ($request->guardian_photo) {
                $guardianPhotoName = $student_id . '_' . $input['guardian_name'];
                $guardian_photo = $common->uploadImage('guardian_photo', 'images/student_info/' . $student_id . '/guardian_photo', $guardianPhotoName, $create_thumb = 1);
                $guardian->guardian_photo = $guardian_photo;
            }
            if ($request->guardian_signature) {
                $guardianSignatureName = 'SIG_' . $student_id . '_' . $input['guardian_name'];
                $guardian_signature = $common->uploadImage('guardian_signature', 'images/student_info/' . $student_id . '/guardian_signature', $guardianSignatureName, $create_thumb = 1);
                $guardian->guardian_signature = $guardian_signature;
            }
            if (isset($guardian_row_id) && ($guardian_row_id != '')) {
                $guardian->updated_at = \Carbon\Carbon::now();
                $guardian->save();
            } else {
                $guardian->created_at = \Carbon\Carbon::now();
                $guardian->save();
                $guardian_row_id = $guardian->guardian_row_id;
                $student_details->guardian_row_id = $guardian_row_id;
                $student_details->save();
            }
        }

        Session::flash('success-message', 'Student data has been updated successfully');
        return redirect('/schoolAdmin/manageStudent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentid, $activestatus) {
        if ($activestatus == 'inactivate') {
            DB::table('students')->where('student_row_id', $studentid)->update(['active_status' => 0]);
            Session::flash('success-message', 'Student Inactivated Successfully.');
        } else {
            DB::table('students')->where('student_row_id', $studentid)->update(['active_status' => 1]);
            Session::flash('success-message', 'Student Activated Successfully.');
        }
        return redirect('schoolAdmin/manageStudent');
    }

    public function generatepdf($studentid, $format = NULL) {

        //return view('backend/school_admin/manage_staff/staff_pdf');

        $student_details = $this->getStudentDetails($studentid);

        $school_info = DB::table('schools')->where('school_row_id', session('school_row_id'))->first();
        $school_address = getSchoolAddress($school_info);

        $school_logo = ($school_info->school_logo != '') ? $school_info->school_logo : 'default_logo.jpg';
        //echo '<pre>'.print_r ($school_info, true).'</pre>'; exit;
        $school_logo_url = public_path() . '/images/school_images/' . $school_logo;

        $student_details['studentid'] = $student_details['studentid'];


        if ($student_details['student_photo'] != '') {
            $studentimageurl = public_path() . '/images/student_info/' . $student_details['studentid'] . '/student_photo/' . $student_details['student_photo'];
        } else {
            $studentimageurl = public_path() . '/images/common/default_student_photo.png';
        }

        $school_address = getSchoolAddress($school_info);

        $schooleiinid = ($school_info->school_eiin_id != '') ? 'EIIN:- ' . $school_info->school_eiin_id . ', ' : '';
        $schooladdress = isset($school_info->school_address) ? $school_info->school_address : '';
        $schooldivision = config('site_config.divisionlist');
        $schooldivision = $schooldivision[$school_info->division_id];
        $schooldistrict = DB::table('districts')->where('id', $school_info->district_id)->value('full_name');
        $schoolupazila = DB::table('upazila')->where('id', $school_info->upazila_id)->value('full_name');
        $schoolpostcode = ($school_info->post_code != 0) ? $school_info->post_code : ' - ';

        $admissiondate = ($student_details['date_of_admission'] != '0000-00-00') ? $student_details['date_of_admission'] : ' - ';
        $stdgender = ($student_details['student_gender'] == '1') ? 'Boy' : 'Girl';
        $dateofbirth = ($student_details['student_dob'] != '0000-00-00') ? $student_details['student_dob'] : ' - ';
        $bloodgroup = config('site_config.blood_group');
        $bloodgroup = $bloodgroup[$student_details['student_blood_group']];
        $religion = config('site_config.religion');
        $religion = $religion[$student_details['student_religion']];
        if ($student_details['student_division_present'] != 0) {
            $presentdivision = config('site_config.divisionlist');
            $presentdivision = $presentdivision[$student_details['student_division_present']];
        } else {
            $presentdivision = '';
        }

        $presentdistrict = DB::table('districts')->where('id', $student_details['student_district_present'])->value('full_name');
        $presentupazila = DB::table('upazila')->where('id', $student_details['student_upazila_present'])->value('full_name');
        $presentpostcode = ($student_details['student_postcode_present'] != 0) ? $student_details['student_postcode_present'] : ' - ';

        if ($student_details['student_division_permanent'] != 0) {
            $permanentdivision = config('site_config.divisionlist');
            $permanentdivision = $permanentdivision[$student_details['student_division_permanent']];
        } else {
            $permanentdivision = '';
        }

        $permanentdistrict = DB::table('districts')->where('id', $student_details['student_district_permanent'])->value('full_name');
        $permanentupazila = DB::table('upazila')->where('id', $student_details['student_upazila_permanent'])->value('full_name');
        $permanentpostcode = ($student_details['student_postcode_permanent'] != 0) ? $student_details['student_postcode_permanent'] : ' - ';


        //if($student_details['student_gender']) 
        //echo '<pre>'.print_r ($student_details, true).'</pre>'; exit;
        $html = '';
        $html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
        $html .= '<title>' . $student_details['studentid'] . '_' . $student_details['student_name'] . '</title>';
        $html .= '<div class="studentcontent">';
        $html .= '<div style="width:100%; border-bottom: 2px solid #000;">
					<table border="0" cellpadding="5" cellspacing="1" style="width:100%;">';
        $html .= '<tbody>
								<tr>
								<td width="20%"><img src="' . $school_logo_url . '" ' . logoSizeStyle() . ' /></td>
								<td width="80%">
									<div style="text-align:center;">
										<h2 style="margin:0px;">' . strtoupper(session('school_name')) . '</h3>
										<p style="margin:0px;">' . $school_address . '</p>
									</div>
									<div style="text-align:center; ">
										<h4>STUDENT ADMISSION DETAILS</h3>
									</div>
								</td>
							</tr>';
        $html .= '</tbody>
					</table>
				</div>';
        $html .= '<div>';
        $html .= '	<div style="float:left; width:69%;">
						<table border="0" cellpadding="5" cellspacing="1" style="width:100%;background-color:#fff;border-collapse:collapse;">';
        $html .= '<tbody>
								<tr>
									<td>STUDENT ID: ' . $student_details['studentid'] . '</td>
									<td>NAME: ' . $student_details['student_name'] . '</td>
								</tr>
								<tr>
									<td>SHIFT: ' . $student_details['shift_title'] . '</td>
									<td>CLASS: ' . $student_details['class_name'] . '</td>
								</tr>
								<tr>
									<td>SECTION: ' . $student_details['section_name'] . '</td>
									<td>DEPARTMENT: ' . getDepartmentTitle($student_details['current_department']) . '</td>
								</tr>
								<tr>
									<td>ROLL NO: ' . $student_details['current_rollnumber'] . '</td>
									<td>ADMISSION DATE: ' . $admissiondate . '</td>
								</tr>
								<tr>
									<td>SESSION: ' . $student_details['academic_session_title'] . '</td>
									<td>GENDER: ' . $stdgender . '</td>
								</tr>
								<tr>
									<td colspan="2">STUDENT EMAIL: ' . $student_details['student_email'] . '</td>
								</tr>
							</tbody>
						</table>
					</div>';
        $html .= '	<div style="float:right; width:30%; border-left:2px solid #000; padding:5px;">
						<table border="0" style="width:100%;background-color:#fff;border-collapse:collapse; margin-left:20px;">';
        $html .= '<tbody>
								<tr>
									<td><img src="' . $studentimageurl . '" width="150" height="175" /></td>
								</tr>
							</tbody>
						</table>
					</div><div style="clear:both;"></div>';
        $html .= '<div style="border-bottom: 2px solid #000;"></div>';
        $html .= '<div>&nbsp;</div>';
        $html .= '<div style="margin-top:5px; padding:5px; background-color: #eee;">STUDENT BIODATA</div>';
        $html .= '<div><table border="0" cellpadding="5" cellspacing="1" style="width:100%;background-color:#fff;border-collapse:collapse;">';
        $html .= '	<tbody>
						<tr>
							<td width="50%">DATE OF BIRTH: ' . $dateofbirth . '</td>
							<td width="50%">PLACE OF BIRTH: ' . $student_details['student_birth_place'] . '</td>
						</tr>
						<tr>
							<td width="50%">BLOOD GROUP: ' . $bloodgroup . '</td>
							<td width="50%">BIRTH CERTIFICATE NO: ' . $student_details['student_birthcertificateno'] . '</td>
						</tr>
						<tr>
							<td width="50%">RELIGION: ' . $religion . '</td>
							<td width="50%">NATIONALITY: ' . $student_details['student_nationality'] . '</td>
						</tr>
						<tr>
							<td>MOBILE NO: ' . $student_details['student_phone'] . '</td>
							<td>HOME CELL: ' . $student_details['student_telephone'] . '</td>
						</tr>
						<tr>
							<td colspan="2">PRESENT ADDRESS: ' . $student_details['student_present_address'] . '</td>
						</tr>
						<tr>
							<td width="50%">DIVISION: ' . $presentdivision . '</td>
							<td width="50%">DISTRICT: ' . $presentdistrict . '</td>
						</tr>
						<tr>
							<td width="50%">UPAZILA: ' . $presentupazila . '</td>
							<td width="50%">POST CODE: ' . $presentpostcode . '</td>
						</tr>
						<tr>
							<td colspan="2">PERMANENT ADDRESS: ' . $student_details['student_permanent_address'] . '</td>
						</tr>
						<tr>
							<td width="50%">DIVISION: ' . $permanentdivision . '</td>
							<td width="50%">DISTRICT: ' . $permanentdistrict . '</td>
						</tr>
						<tr>
							<td width="50%">UPAZILA: ' . $permanentupazila . '</td>
							<td width="50%">POST CODE: ' . $permanentpostcode . '</td>
						</tr>
					</tbody>
				</table></div>';
        $html .= '<div style="margin-top:20px; padding:5px; background-color: #eee;">STUDENT PARENTS\' INFORMATION</div>';
        $html .= '<div><table border="0" cellpadding="5" cellspacing="1" style="width:100%;background-color:#fff;border-collapse:collapse;">';
        $html .= '	<tbody>
						<tr>
							<td width="50%">FATHER NAME: ' . $student_details['father_name'] . '</td>
							<td width="50%">FATHER NID: ' . $student_details['father_nid'] . '</td>
						</tr>
						<tr>
							<td width="50%">FATHER MOBILE: ' . $student_details['father_mobile'] . '</td>
							<td width="50%">FATHER EMAIL: ' . $student_details['father_email'] . '</td>
						</tr>
						<tr>
							<td width="50%">MOTHER NAME: ' . $student_details['mother_name'] . '</td>
							<td width="50%">MOTHER NID: ' . $student_details['mother_nid'] . '</td>
						</tr>
						<tr>
							<td width="50%">MOTHER MOBILE: ' . $student_details['mother_mobile'] . '</td>
							<td width="50%">MOTHER EMAIL: ' . $student_details['mother_email'] . '</td>
						</tr>
					</tbody>
				</table></div>';
        $html .= '<div style="margin-top:20px; padding:5px; background-color: #eee;">EMERGENCY CONTACT PERSON</div>';
        $html .= '<div><table border="0" cellpadding="5" cellspacing="1" style="width:100%;background-color:#fff;border-collapse:collapse;">';
        $html .= '	<tbody>
						<tr>
							<td width="50%">PERSON NAME: ' . $student_details['emergency_contact_name'] . '</td>
							<td width="50%">MOBILE: ' . $student_details['emergency_contact_number'] . '</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table></div>';

        $html .= '<div class="footer-pdf" style="border-top: 2px solid #000; text-align:right; margin-top:0px; font-style: italic; opacity:0.5">Powered By: bdeducations.org</div>';
        $html .= '</div></div>';
        $html .= '';
        //echo $html; exit;		
        if ($format == 'viewpdf') {
            $pdf = PDF::loadHTML($html, 'UTF-8')->save(public_path() . '/student_pdf/' . $student_details['studentid'] . '_' . $student_details['student_name'] . '.pdf');

            return $pdf->stream($student_details['studentid'] . '_' . $student_details['student_name'] . '.pdf');
        } else {
            $pdf = PDF::loadHTML($html, 'UTF-8')->save(public_path() . '/student_pdf/' . $student_details['studentid'] . '_' . $student_details['student_name'] . '.pdf');
            return $pdf->download($student_details['studentid'] . '_' . $student_details['student_name'] . '.pdf');
        }
    }

    public function getStudentDetails($studentid) {
        $guardianvalue = DB::table('students_details')->where('student_row_id', $studentid)->value('who_is_gurdian');
        $query = DB::table('students AS std')
                ->leftjoin('master_classes AS mc', 'mc.class_row_id', '=', 'std.current_class')
                ->leftjoin('school_class_shifts AS scs', 'scs.class_shift_row_id', '=', 'std.current_shift')
                ->leftjoin('school_shifts AS sft', 'sft.shift_row_id', '=', 'scs.shift_row_id')
                ->leftjoin('school_sections AS ss', 'ss.section_row_id', '=', 'std.current_section')
                ->leftjoin('academic_session AS as', 'as.academic_session_row_id', '=', 'std.current_session')
                ->leftjoin('students_academic_details AS sad', 'sad.student_row_id', '=', 'std.student_row_id')
                ->leftjoin('students_details AS sd', 'sd.student_row_id', '=', 'std.student_row_id');
        if ($guardianvalue == 3) {
            $query->leftjoin('guardians', 'guardians.guardian_row_id', '=', 'sd.guardian_row_id');
            $query->select('std.student_id as studentid', 'std.*', 'mc.*', 'scs.*', 'sft.*', 'ss.*', 'as.*', 'sd.*', 'sad.*', 'guardians.*');
        } else {
            $query->select('std.student_id as studentid', 'std.*', 'mc.*', 'scs.*', 'sft.*', 'ss.*', 'as.*', 'sd.*', 'sad.*');
        }
        $query->where('std.student_row_id', '=', $studentid)->orderBy('std.student_row_id', 'desc');
        $student_details = $query->get();
        $student_details = (array) $student_details[0];

        if ($student_details['guardian_login_row_id'] != '') {
            $guardian_login_details = DB::table('students_guardian_login')->where('guardian_login_row_id', $student_details['guardian_login_row_id'])->first();
            $student_details['guardian_login_email'] = $guardian_login_details->guardian_login_email;
            $student_details['guardian_login_password_text'] = $guardian_login_details->guardian_login_password_text;
        }


        if ($student_details['student_division_present'] != 0) {
            $presentdivision = config('site_config.divisionlist');
            $student_details['presentdivision'] = $presentdivision[$student_details['student_division_present']];
        } else {
            $student_details['presentdivision'] = '';
        }

        $student_details['presentdistrict'] = DB::table('districts')->where('id', $student_details['student_district_present'])->value('full_name');
        $student_details['presentupazila'] = DB::table('upazila')->where('id', $student_details['student_upazila_present'])->value('full_name');
        $student_details['presentpostcode'] = ($student_details['student_postcode_present'] != 0) ? $student_details['student_postcode_present'] : ' - ';

        if ($student_details['student_division_permanent'] != 0) {
            $permanentdivision = config('site_config.divisionlist');
            $student_details['permanentdivision'] = $permanentdivision[$student_details['student_division_permanent']];
        } else {
            $student_details['permanentdivision'] = '';
        }

        $student_details['permanentdistrict'] = $permanentdistrict = DB::table('districts')->where('id', $student_details['student_district_permanent'])->value('full_name');
        $student_details['permanentupazila'] = $permanentupazila = DB::table('upazila')->where('id', $student_details['student_upazila_permanent'])->value('full_name');
        $student_details['permanentpostcode'] = $permanentpostcode = ($student_details['student_postcode_permanent'] != 0) ? $student_details['student_postcode_permanent'] : ' - ';

        $student_details['siblingids'] = (!empty($student_details['student_siblings_id'])) ? implode(',', json_decode($student_details['student_siblings_id'])) : '';

        if ($guardianvalue == 3) {
            if ($student_details['guardian_division_present'] != 0) {
                $guardiandivision = config('site_config.divisionlist');
                $student_details['guardiandivision'] = $guardiandivision[$student_details['guardian_division_present']];
            } else {
                $student_details['guardiandivision'] = '';
            }

            $student_details['guardiandistrict'] = $guardiandistrict = DB::table('districts')->where('id', $student_details['guardian_district_present'])->value('full_name');
            $student_details['guardianupazila'] = $guardianupazila = DB::table('upazila')->where('id', $student_details['guardian_upazila_present'])->value('full_name');
        }

        return $student_details;
    }

    public function getStudentIdInfo(Request $request) {

        $stdinput = $request->q;
        $query = DB::table('students AS std')
                ->leftjoin('students_details AS sd', 'sd.student_row_id', '=', 'std.student_row_id')
                ->select('std.student_id as studentid', 'std.*', 'sd.*');
        if (is_numeric($stdinput)) {
            $query->where('std.student_id', '=', $stdinput);
        } else {
            $query->where('std.student_name', 'like', '%' . $stdinput . '%');
        }

        $student_details = $query->get();
        //echo '<pre>'.print_r ($student_details, true).'</pre>'; //exit;


        if (isset($student_details)) {
            foreach ($student_details as $key => $value) {
                if ($value->student_photo != '') {
                    $studentimageurl = asset('public/images/student_info/' . $value->studentid . '/student_photo/thumbs/' . $value->student_photo);
                } else {
                    $studentimageurl = asset('public/images/common/default_student_photo.png');
                }
                $list['results'][] = array("id" => $value->student_row_id, "text" => '<img src="' . $studentimageurl . '" width="35px" height="35px" />' . '  ' . $value->student_name . ' (Class: ' . $value->current_class . ' Roll: ' . $value->current_rollnumber . ')');
            }
            echo json_encode($list);
        }
    }

    public function getGuardianByEmail($emailaddress) {
        if (isset($emailaddress)) {
            $guardiandetails = array();
            $guardiandata = DB::table('students_guardian_login')->select('guardian_login_row_id', 'guardian_login_email', 'guardian_login_password_text')->where('guardian_login_email', $emailaddress)->first();
            if ($guardiandata != '') {
                //$guardiandetails = json_encode($guardiandata);
                $studentinfo = DB::table('students')->select('*')->where('guardian_login_row_id', $guardiandata->guardian_login_row_id)->first();
                $studentdata = 'Name: ' . $studentinfo->student_name . ' || Class: ' . $studentinfo->current_class;
                $guardiandetails['guardianpass'] = $guardiandata->guardian_login_password_text;
                $guardiandetails['response'] = 'Email is already associated with students (' . $studentdata . ') guardian account. Do you really want use this same email for guardian login?';
            } else {
                $guardiandetails['guardianpass'] = '';
                $guardiandetails['response'] = 'true';
            }
            echo json_encode($guardiandetails);
        }
    }

    public function getSiblingDetails($studentid) {
        if (isset($studentid)) {
            $query = DB::table('students AS std')
                    ->leftjoin('students_details AS sd', 'sd.student_row_id', '=', 'std.student_row_id')
                    ->select('std.student_id as studentid', 'std.*', 'sd.*')
                    ->whereIn('std.student_row_id', explode(',', $studentid));
            $sibling_info = $query->get();
            $siblinghtml = '';
            $siblinghtml .= '<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th> # </th>
										<th> Student Name </th>
										<th> Student ID </th>
										<th> Image </th>
										<th> Class </th>
										<th> Roll </th>
										<th> Mobile </th>
									</tr>
								</thead><tbody>';
            $count = 1;
            foreach ($sibling_info as $stdinfo) {
                if ($stdinfo->student_photo != '') {
                    $studentimageurl = asset('public/images/student_info/' . $stdinfo->studentid . '/student_photo/thumbs/' . $stdinfo->student_photo);
                } else {
                    $studentimageurl = asset('public/images/common/default_student_photo.png');
                }
                $siblinghtml .= '<tr>
									<td>' . $count . '</td>
									<td>' . $stdinfo->student_name . '</td>
									<td>' . $stdinfo->student_id . '</td>
									<td><img src="' . $studentimageurl . '" width="35px" height="35px" /></td>
									<td>' . $stdinfo->current_class . '</td>
									<td>' . $stdinfo->current_rollnumber . '</td>
									<td>' . $stdinfo->student_phone . '</td>
								</tr>';
                $count++;
            }
            $siblinghtml .= '</tbody></table></div>';

            echo $siblinghtml;
        }
    }

    public function removePhoto($photo, $student_row_id, $student_id) {
        $studentInfo = DB::table('students_details')->where('student_row_id', $student_row_id)->first();
        $student_signature = $studentInfo->student_signature;

        if ($photo == 'student_photo') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['student_photo' => '']);
            $photo_name = $studentInfo->student_photo;
            $image_folder_path = 'student_photo';
        } else if ($photo == 'student_birth_certificate') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['student_birthcertificatephoto' => '']);
            $photo_name = $studentInfo->student_birthcertificatephoto;
            $image_folder_path = 'student_birthcertificate';
        } else if ($photo == 'student_signature_photo') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['student_signature' => '']);
            $photo_name = $studentInfo->student_signature;
            $image_folder_path = 'student_signature';
        } else if ($photo == 'father_photo') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['father_photo' => '']);
            $photo_name = $studentInfo->father_photo;
            $image_folder_path = 'father_photo';
        } else if ($photo == 'father_signature') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['father_signature' => '']);
            $photo_name = $studentInfo->father_signature;
            $image_folder_path = 'father_signature';
        } else if ($photo == 'mother_photo') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['mother_photo' => '']);
            $photo_name = $studentInfo->mother_photo;
            $image_folder_path = 'mother_photo';
        } else if ($photo == 'mother_signature') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['mother_signature' => '']);
            $photo_name = $studentInfo->mother_signature;
            $image_folder_path = 'mother_signature';
        } else if ($photo == 'visitor_photo') {
            DB::table('students_details')->where('student_row_id', $student_row_id)->update(['mother_signature' => '']);
            $photo_name = $studentInfo->mother_signature;
            $image_folder_path = 'mother_signature';
        }

        $image_path = public_path() . "/images/student_info/" . $student_id . "/" . $image_folder_path . "/" . $photo_name;
        $image_thumb_path = public_path() . "/images/student_info/" . $student_id . "/" . $image_folder_path . "/thumbs/" . $photo_name;

        //unlink($image_path);
        if (File::exists($image_path)) {
            File::delete($image_path);
            File::delete($image_thumb_path);
        }
    }

    public function studentsList(Request $request) {
        $school_row_id = session('school_row_id');
        $academic_department_array = config('site_config.academic_department');
        $class_name = \App\Models\Master_class::where('class_row_id', $request->academic_class)->first()->class_name;
        $shift_title = \App\Models\SchoolShift::where('shift_row_id', $request->academic_shift)->first()->shift_title;
        $section_name = \App\Models\SchoolSection::where('section_row_id', $request->academic_section)->first()->section_name;
        $department_name = $academic_department_array[$request->academic_department];

        $breadcrumb = $this->breadcrumb;
        $subject_row_id = $request->subject ? $request->subject : 0;
        $subject_title = '';
        $subject_title_info = \App\Models\Subject::where('subject_row_id', $subject_row_id)->first();
        if ($subject_title_info)
            $subject_title = $subject_title_info->subject_title;

        $allclasses = getSchoolClasses($school_row_id);
        $show_student_list_section = true;
        $students_list = \App\Models\Student::where([['current_session', session('academic_session_row_id')], ['current_class', $request->academic_class], ['current_shift', $request->academic_shift], ['current_section', $request->academic_section], ['current_department', $request->academic_department]])->get();
        //$students_list = \App\Models\Student::get();	

        $breadcrumb = $this->breadcrumb;
        return view($this->viewFolderPath . 'students_list', compact('breadcrumb', 'allclasses', 'class_name', 'shift_title', 'section_name', 'department_name', 'students_list', 'show_student_list_section', 'subject_title', 'subject_row_id'));
    }

    public function exportToExcel($class, $shift, $section, $department) {

        $query = DB::table('students AS std')
                ->leftjoin('master_classes AS mc', 'mc.class_row_id', '=', 'std.current_class')
                ->leftjoin('school_sections AS ss', 'ss.section_row_id', '=', 'std.current_section')
                ->leftjoin('students_details AS sd', 'sd.student_row_id', '=', 'std.student_row_id')
                ->select('std.student_id as studentid', 'std.*', 'mc.*', 'ss.*', 'sd.*')
                ->where('std.school_row_id', session('school_row_id'))
                ->where('std.current_session', '=', session('academic_session_row_id'))
                ->where('std.current_class', '=', $class)
                ->where('std.current_shift', '=', $shift)
                ->where('std.current_section', '=', $section)
                ->where('std.current_department', '=', $department)
                ->orderBy('std.student_row_id', 'ASC');

        $results = $query->get();
        $blood_group = config('site_config.blood_group');

        $data = array();
        for ($i = 0; $i < count($results); $i++) {
            $a['Name'] = $results[$i]->student_name;
            $a['ID'] = $results[$i]->student_id;

            $a['Class'] = $results[$i]->current_class;
            $a['Blood_group'] = ($results[$i]->student_blood_group == 0) ? '' : $blood_group [$results[$i]->student_blood_group];
            $a['Roll'] = $results[$i]->current_rollnumber;
            $a['Contact'] = $results[$i]->contact;
            // $a['father_mobile'] = $results[$i]->father_mobile;
            // $a['mother_mobile'] = $results[$i]->mother_mobile;
            $a['Photo_name'] = $results[$i]->student_photo;
            $current_department = $results[$i]->current_department;

            $data[] = (array) $a;
        }
        $data['students_list'] = $data;
        $this->exportStudentToCsv($data['students_list'], $current_department);
    }

    public function exportStudentToCsv($data, $current_department) {

        if ($current_department != 1) {
            $department = ($current_department == 2) ? 'Science' : ($current_department == 3 ? 'Arts' : 'Commerce');
            $excel_file_name = 'class-' . $data[0]['Class'] . '-' . $department;
        } else {
            $excel_file_name = 'class-' . $data[0]['Class'];
        }

        Excel::create($excel_file_name, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download('csv');

        exit;
    }

}
