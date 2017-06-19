<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Input;
use Image;
use DB;
use File;

class Common {

    public $output = array();
    public $head_child_list = array();
    public $head_parent_list = array();
    public $head_amount = array();
    public $parent_head_child_list = array();
    public $head_total_expense_by_month = array();
    public $month_array = array(
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    );

    public function get_blood_group() {
        $blood_group = array("A+", "B+", "O+", "AB+", "A-", "O-", "B-", "AB-");
        $str='';
        for($i=0; $i<8;$i++){
            $str.='<option value="'.$blood_group[$i].'">'.$blood_group[$i].'</option>';    
        }
        return $str;
    }

    public function uploadImage($fileInputField, $uploadFolder, $fileName = '', $create_thumb = false, $photoIndex = false) {
        $uploadedFileName = '';

        if (Input::file($fileInputField)) {

            $fileName = preg_replace('/\s*/', '', $fileName);
            $fileName = strtoupper($fileName);
            $fileInfo = Input::file($fileInputField);
            if (is_array($fileInfo))
                $fileInfo = $fileInfo[$photoIndex];


            $uploadedFileName = $fileName . '.' . $fileInfo->getClientOriginalExtension();

            //Upload Thumbnail Image
            if ($create_thumb) {
                $upload_thumb_path = public_path($uploadFolder . '/thumbs');
                if (!File::exists($upload_thumb_path)) {
                    File::makeDirectory($upload_thumb_path, $mode = 0777, true, true);
                }
                Image::make($fileInfo->getRealPath())->resize(150, 150)->save($upload_thumb_path . '/' . $uploadedFileName);
            }

            //Upload Original Image
            $upload_path = public_path($uploadFolder);
            if (!File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $fileInfo->move($upload_path, $uploadedFileName);
        }

        return $uploadedFileName;
    }

    public function getDistricts($divisionid, $presentdist = NULL) {
        $alldistricts = DB::table('districts')->select('id', 'full_name')->where('division_id', $divisionid)->orderBy('full_name', 'asc')->get();
        $html = "";
        $html .= "<option value='0'>Select District</option>";
        foreach ($alldistricts as $districts) {
            if (isset($presentdist) && ($districts->id == $presentdist)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }

            $html .= "<option value=" . $districts->id . " " . $selected . ">" . $districts->full_name . "</option>";
        }
        echo $html;
    }

    public function getUpazilas($districtid, $presentupazila = NULL) {
        $allupazilas = DB::table('upazila')->select('id', 'full_name')->where('district_id', $districtid)->orderBy('full_name', 'asc')->get();
        $html = "";
        $html .= "<option value='0'>Select Upazila</option>";
        foreach ($allupazilas as $upazilas) {
            if (isset($presentupazila) && ($upazilas->id == $presentupazila)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $upazilas->id . " " . $selected . ">" . $upazilas->full_name . "</option>";
        }
        echo $html;
    }

    public function getShift($classid, $current_shift = NULL) {
        $query = DB::table('school_class_shifts AS scs')
                ->leftjoin('school_shifts AS ss', 'scs.shift_row_id', '=', 'ss.shift_row_id')
                ->select('scs.*', 'ss.*')
                ->where([['scs.class_row_id', $classid], ['scs.school_row_id', session('school_row_id')], ['scs.academic_session', session('academic_session_row_id')], ['scs.is_active', 1]])
                ->orderBy('ss.shift_title', 'asc');

        $allshifts = $query->get();
        $html = "";
        foreach ($allshifts as $shift) {
            if (isset($current_shift) && ($shift->shift_row_id == $current_shift)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $shift->shift_row_id . " " . $selected . ">" . $shift->shift_title . "</option>";
        }
        echo $html;
    }

    public function getSections($classid, $current_section = NULL) {


        $allsections = DB::table('school_sections')->select('section_row_id', 'section_name')->where([['class_row_id', $classid], ['academic_session', session('academic_session_row_id')], ['is_active', 1]])->where('school_row_id', session('school_row_id'))->orderBy('section_name', 'asc')->get();
        $html = "";
        foreach ($allsections as $sections) {
            if (isset($current_section) && ($sections->section_row_id == $current_section)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $sections->section_row_id . " " . $selected . ">" . $sections->section_name . "</option>";
        }
        echo $html;
    }

    public function getSubjectByClass($classid, $subject_row_id = NULL, $sectionid = NULL) {

        $allsections = DB::table('school_sections')->select('section_row_id')->where([['class_row_id', $classid], ['academic_session', session('academic_session_row_id')], ['is_active', 1]])->where('school_row_id', session('school_row_id'))->orderBy('section_name', 'asc')->get();

        //print_r($allsections[0]->section_row_id);

        $section_id = isset($sectionid) ? $sectionid : $allsections[0]->section_row_id;

        $getSubjectTeacherBySection = DB::table('subject_teacher')->select('subject_row_id')->where([['class_row_id', $classid], ['academic_session_row_id', session('academic_session_row_id')], ['school_row_id', session('school_row_id')], ['section_row_id', $section_id]])->get();


        $myarray = array();
        foreach ($getSubjectTeacherBySection as $data) {
            $myarray[] = $data->subject_row_id;
        }
        //echo '<pre>'.print_r ($myarray, true).'</pre>'; exit;

        $query = DB::table('classwise_subjects AS cs')
                ->leftjoin('subjects AS sub', 'cs.subject_row_id', '=', 'sub.subject_row_id')
                ->select('cs.*', 'sub.*')
                ->where([['cs.class_row_id', $classid], ['cs.school_row_id', session('school_row_id')]])
                ->orderBy('sub.subject_title', 'asc');

        $allsubjectbyclass = $query->get();
        $html = "";
        $html .= "<option value=''>Select Subject</option>";
        foreach ($allsubjectbyclass as $subject) {
            if (!in_array($subject->subject_row_id, $myarray)) {
                if (isset($subject_row_id) && ($subject->subject_row_id == $subject_row_id)) {
                    $selected = 'selected="selected"';
                } else {
                    $selected = '';
                }
                $html .= "<option value=" . $subject->subject_row_id . " classwise_subject_row_id=" . $subject->classwise_subject_row_id . " " . $selected . ">" . $subject->subject_title . "</option>";
            }
        }
        echo $html;
    }

    public function getTeacherByDepartment($departmentId, $admin_row_id = NULL) {

        $whereCond = array();
        if ($departmentId) {
            $whereCond = [
                ['sd.school_department_row_id', $departmentId],
                ['sd.school_row_id', session('school_row_id')]
            ];
        } else {
            $whereCond = [
                ['sd.school_row_id', session('school_row_id')]
            ];
        }

        $query = DB::table('admins')
                ->leftjoin('school_departments AS sd', 'admins.school_department_row_id', '=', 'sd.school_department_row_id')
                ->leftjoin('staff_designations AS sdg', 'admins.designation_row_id', '=', 'sdg.designation_row_id')
                ->select('admins.*', 'sd.*', 'sdg.*')
                ->where($whereCond)
                ->orderBy('admins.admin_name', 'asc');

        $allteacherbydept = $query->get();
        $html = "";
        $html .= "<option value=''>Select Teacher</option>";
        foreach ($allteacherbydept as $teacher) {
            if (isset($admin_row_id) && ($teacher->admin_row_id == $admin_row_id)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $teacher->admin_row_id . "  " . $selected . ">" . $teacher->admin_name . ' (' . $teacher->designation_title . ') ' . "</option>";
        }
        echo $html;
    }

    public function getCategoryBySubject($classwiseSubjectRowId) {
        $subject_parts = DB::table('classwise_subjects')->where('classwise_subject_row_id', $classwiseSubjectRowId)->first()->subject_parts;
        $subpart = json_decode($subject_parts);
        $html = "";
        if (is_array($subpart)) {
            if (in_array(1, $subpart)) {
                $html .= '<label><input type="checkbox" value="1" class="checksubject" name="subjectpart[]">Subjective</label>';
            }
            if (in_array(2, $subpart)) {
                $html .= '<label><input type="checkbox" value="2" class="checksubject" name="subjectpart[]">Objective</label>';
            }
            if (in_array(3, $subpart)) {
                $html .= '<label><input type="checkbox" value="3" class="checksubject" name="subjectpart[]">Practical</label>';
            }
        } else {
            $html .= '<div>No Subject Category Found.</div>';
        }
        echo $html;
    }

    public function getSchoolRowId($schoolEncryptedId) {
        return DB::table('schools')->where('school_encrypted_row_id', $schoolEncryptedId)->first()->school_row_id;
    }

    public function getDesignations($admin_type, $current_designation = 0) {

        $designations = DB::table('staff_designations')->where('school_row_id', session('school_row_id'))->where('staff_designation_category_row_id', $admin_type)->get();
        $html = "";
        foreach ($designations as $designation) {
            if (isset($current_designation) && ($designation->designation_row_id == $current_designation)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $designation->designation_row_id . " " . $selected . ">" . $designation->designation_title . "</option>";
        }
        echo $html;
    }

    public function getTeacherBySubject($academicsession, $classrowid, $subjectid, $adminrowid) {
        $query = DB::table('subject_teacher AS st')
                ->leftjoin('admins', 'st.admin_row_id', '=', 'admins.admin_row_id')
                ->select('st.*', 'admins.*')
                ->where([['st.academic_session_row_id', $academicsession], ['st.school_row_id', session('school_row_id')], ['st.class_row_id', $classrowid], ['st.subject_row_id', $subjectid]])
                ->orderBy('admins.admin_name', 'asc');

        $allteacherBySubject = $query->get();
        $html = "";
        $html .= "<option value=''>Select Teacher</option>";
        foreach ($allteacherBySubject as $teacher) {
            if (isset($adminrowid) && ($teacher->admin_row_id == $adminrowid)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $teacher->admin_row_id . "  " . $selected . ">" . $teacher->admin_name . "</option>";
        }
        echo $html;
    }

    public function getElementaryTermByClass($classid, $currentelemterm = NULL) {
        $query = DB::table('classwise_elementaryterm AS ce')
                ->leftjoin('exam_elementary_term AS eet', 'ce.exam_elementary_term_row_id', '=', 'eet.exam_elementary_term_row_id')
                ->select('ce.*', 'eet.*')
                ->where([['ce.class_row_id', $classid], ['ce.school_row_id', session('school_row_id')], ['ce.active_status', 1]])
                ->orderBy('eet.elementary_term_title', 'asc');

        $allElementaryTermByClass = $query->get();
        $html = "";
        $html .= "<option value=''>Select A Category</option>";
        foreach ($allElementaryTermByClass as $elementaryterm) {
            if (isset($currentelemterm) && ($elementaryterm->exam_elementary_term_row_id == $currentelemterm)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $elementaryterm->exam_elementary_term_row_id . " " . $selected . ">" . $elementaryterm->elementary_term_title . "</option>";
        }
        echo $html;
    }

    public function checkForElemMarksExist($elem_exam_row_id) {
        $query = DB::table('elementary_exam_marks AS eem')
                ->select('eem.*')
                ->where('eem.elem_exam_row_id', $elem_exam_row_id);

        $checkForElemMarksExist = $query->get();
        if (!empty($checkForElemMarksExist)) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getMasterTermByClass($classid, $currentmasterterm = NULL) {
        $query = DB::table('classwise_masterterm AS cm')
                ->leftjoin('exam_master_term AS emt', 'cm.exam_master_term_row_id', '=', 'emt.exam_master_term_row_id')
                ->select('cm.*', 'emt.*')
                ->where([['cm.class_row_id', $classid], ['cm.school_row_id', session('school_row_id')], ['cm.active_status', 1]])
                ->orderBy('emt.exam_category_title', 'asc');

        $allMasterTermByClass = $query->get();
        $html = "";
        $html .= "<option value='0'>Select A Category</option>";
        foreach ($allMasterTermByClass as $masterterm) {
            if (isset($currentmasterterm) && ($masterterm->exam_master_term_row_id == $currentmasterterm)) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
            $html .= "<option value=" . $masterterm->exam_master_term_row_id . " " . $selected . ">" . $masterterm->exam_category_title . "</option>";
        }
        echo $html;
    }

    public function checkForMasterMarksExist($master_exam_row_id) {
        $query = DB::table('master_exam_marks AS mem')
                ->select('mem.*')
                ->where('mem.master_exam_row_id', $master_exam_row_id);

        $checkForMasterMarksExist = $query->get();
        if (!empty($checkForMasterMarksExist)) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getSubjectByTerm($mastertermid, $academic_session, $classrowid, $shift, $section) {
        $query = DB::table('master_exam_infos AS mei')
                ->leftjoin('subjects', 'mei.subject_row_id', '=', 'subjects.subject_row_id')
                ->select('mei.*', 'subjects.*')
                ->where([['mei.academic_session_row_id', $academic_session], ['mei.school_row_id', session('school_row_id')], ['mei.class_row_id', $classrowid], ['mei.exam_master_term_row_id', $mastertermid], ['mei.shift_row_id', $shift], ['mei.section_row_id', $section]])
                ->orderBy('subjects.subject_title', 'asc');

        $allSubjectByTerm = $query->get();

        $masterexamids = array();
        foreach ($allSubjectByTerm as $masterexam) {
            $masterexamids[] = $masterexam->master_exam_row_id;
        }


        // Get those subject list which data is already been processed; those subjects will not be appeared in this calculation
        $getProcessedDatabySubject = DB::table('term_processed_data_flags AS tpdf')->select('tpdf.*')
                ->where([['tpdf.academic_session_row_id', session('academic_session_row_id')], ['tpdf.school_row_id', session('school_row_id')], ['tpdf.class_row_id', $classrowid], ['tpdf.shift_row_id', $shift], ['tpdf.section_row_id', $section]])
                ->whereIn('tpdf.master_exam_row_id', $masterexamids)
                ->get();

        $samesubjectids = array();
        foreach ($getProcessedDatabySubject as $pinfo) {
            $samesubjectids[] = $pinfo->subject_row_id;
        }

        $html = "";
        $html .= '<pre>' . print_r($getProcessedDatabySubject, true) . '</pre></br>';
        $html .= "<option value=''>Select Subject</option>";
        foreach ($allSubjectByTerm as $subjects) {
            /* if(isset($adminrowid) && ($teacher->admin_row_id == $adminrowid)) {
              $selected = 'selected="selected"';
              } else {
              $selected = '';
              } */
            if (!in_array($subjects->subject_row_id, $samesubjectids)) {
                $html .= "<option value=" . $subjects->subject_row_id . ">" . $subjects->subject_title . "</option>";
            }
        }
        echo $html;
    }

    public function getStudentsByClass($classid, $shiftid, $sectionid, $group) {
        $query = DB::table('students AS std')
                ->select('std.*')
                ->where([['std.school_row_id', session('school_row_id')], ['std.current_session', session('academic_session_row_id')], ['std.current_class', $classid], ['std.current_shift', $shiftid], ['std.current_section', $sectionid], ['std.current_department', $group]])
                ->orderBy('std.current_rollnumber', 'asc');

        $allStudentsByClass = $query->get();

        $html = "";
        $html .= "<option value='0'>Select Student</option>";
        foreach ($allStudentsByClass as $students) {
            $html .= "<option value=" . $students->student_row_id . ">" . $students->student_name . "</option>";
        }
        echo $html;
    }

    public function getStudentsWithIdByClass($classid, $shiftid, $sectionid, $group) {
        $query = DB::table('students AS std')
                ->select('std.*')
                ->where([['std.school_row_id', session('school_row_id')], ['std.current_session', session('academic_session_row_id')], ['std.current_class', $classid], ['std.current_shift', $shiftid], ['std.current_section', $sectionid], ['std.current_department', $group]])
                ->orderBy('std.current_rollnumber', 'asc');

        $allStudentsByClass = $query->get();

        $html = "";
        $html .= "<option value='0'>Select Student</option>";
        foreach ($allStudentsByClass as $students) {
            $html .= "<option value=" . $students->student_id . ">" . $students->student_name . "</option>";
        }
        echo $html;
    }

    /**
     * RETRIEVE ALL CATEGORY WITH CHILD.
     */
    public function allHeads($showAllocation = false, $showExpense = false, $budget_year = 0) {
        $result = \App\Models\AccountHead::orderBy('sort_order', 'asc')->get();
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');

        $this->output = array();
        foreach ($result as $head) {
            if ($head->parent_id == 0) {
                $head->total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                if ($head->has_child) {
                    $this->output[] = $head;
                    $this->setChildren($result, $head->head_row_id, $showAllocation, $showExpense, $budget_year);
                    $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                    if ($showAllocation) {
                        $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                        $head->parent_head_total_allocation = $parent_head_total_allocation;
                    }
                    if ($showExpense) {
                        $head->parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, 0, 0);
                    }
                } else {
                    if ($showAllocation) {
                        $head->total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                    }
                    if ($showExpense) {
                        $head->total_expense = $this->totalExpense($head->head_row_id, $budget_year);
                    }
                    $this->output[] = $head;
                }
            }
        }

        $output = $this->output;
        $this->output = array();
        return $output;
    }

    function setChildren($haystack, $parentHeadId, $showAllocation, $showExpense, $budget_year) {
        if (count($haystack)) {
            foreach ($haystack as $head) {
                if ($head->parent_id && $head->parent_id == $parentHeadId) {

                    if ($head->has_child) {

                        $this->output[] = $head;
                        $this->setChildren($haystack, $head->head_row_id, $showAllocation, $showExpense, $budget_year);
                    } else {
                        if ($showAllocation) {
                            $head->total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                        }
                        if ($showExpense) {
                            $head->total_expense = $this->totalExpense($head->head_row_id, $budget_year);
                        }
                        $this->output[] = $head;
                    }
                }
            }
        }
    }

    public function expenseFilterHeads($showAllocation = false, $showExpense = true, $showBalance = false, $head_row_id = 0, $budget_year = 0, $start_date = 0, $end_date = 0) {

        $head = $this->get_head_row_info($head_row_id);

        $result = \App\Models\AccountHead::orderBy('sort_order', 'asc')->get();
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        $this->output = array();
        if (isset($head->has_child) && $head->has_child) {
            $this->output[] = $head;
            $this->setExpenseFilterChildren($result, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $showBalance, $start_date, $end_date);
            $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
            $parent_head_total_allocation = 0;
            $parent_head_total_expense = 0;
            $parent_head_current_balance = 0;
            if ($showAllocation) {
                $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                $head->parent_head_total_allocation = $parent_head_total_allocation;
            }
            if ($showExpense) {
                $parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                $head->parent_head_total_expense = $parent_head_total_expense;
            }
            if ($showBalance) {
                $parent_head_current_balance = $parent_head_total_allocation - $parent_head_total_expense;
                $head->parent_head_current_balance = $parent_head_current_balance;
            }
        } else {

            $head_total_allocation = 0;
            $head_total_expense = 0;
            $head_current_balance = 0;
            if ($showAllocation) {
                $head_total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                $head->total_allocation = $head_total_allocation;
            }
            if ($showExpense) {
                $head_total_expense = $this->totalFilterExpense($head->head_row_id, $budget_year, $start_date, $end_date);
                $head->total_expense = $head_total_expense;
            }
            if ($showBalance) {
                $head_current_balance = $head_total_allocation - $head_total_expense;
                $head->current_balance = $head_current_balance;
            }
            $this->output[] = $head;
        }

        $output = $this->output;
        $this->output = array();
        return $output;
    }

    public function expenseFilterAllHeads($showAllocation = false, $showExpense = true, $showBalance = false, $budget_year = 0, $start_date = 0, $end_date = 0) {
        $result = \App\Models\AccountHead::orderBy('sort_order', 'asc')->get();
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        $this->output = array();
        foreach ($result as $head) {
            if ($head->parent_id == 0) {
                if ($head->has_child) {
                    $this->output[] = $head;
                    $this->setExpenseFilterAllHeadsChildren($result, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $showBalance, $start_date, $end_date);
                    $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                    $parent_head_total_allocation = 0;
                    $parent_head_total_expense = 0;
                    $parent_head_current_balance = 0;
                    if ($showAllocation) {
                        $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                        $head->parent_head_total_allocation = $parent_head_total_allocation;
                    }
                    if ($showExpense) {
                        $parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                        $head->parent_head_total_expense = $parent_head_total_expense;
                    }
                    if ($showBalance) {
                        $parent_head_current_balance = $parent_head_total_allocation - $parent_head_total_expense;
                        $head->parent_head_current_balance = $parent_head_current_balance;
                    }
                } else {
                    $head_total_allocation = 0;
                    $head_total_expense = 0;
                    $head_current_balance = 0;
                    if ($showAllocation) {
                        $head_total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                        $head->total_allocation = $head_total_allocation;
                    }
                    if ($showExpense) {
                        $head_total_expense = $this->totalFilterExpense($head->head_row_id, $budget_year, $start_date, $end_date);
                        $head->total_expense = $head_total_expense;
                    }
                    if ($showBalance) {
                        $head_current_balance = $head_total_allocation - $head_total_expense;
                        $head->current_balance = $head_current_balance;
                    }
                    $this->output[] = $head;
                }
            }
        }

        $output = $this->output;
        $this->output = array();
        return $output;
    }

    public function setExpenseFilterAllHeadsChildren($haystack, $parentHeadId, $budget_year, $showAllocation, $showExpense, $showBalance, $start_date = 0, $end_date = 0) {
        if (count($haystack)) {
            foreach ($haystack as $head) {
                if ($head->parent_id && $head->parent_id == $parentHeadId) {
                    if ($head->has_child) {
                        $this->output[] = $head;
                        $this->setExpenseFilterAllHeadsChildren($haystack, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $start_date, $end_date);
                        $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                        $parent_head_total_allocation = 0;
                        $parent_head_total_expense = 0;
                        $parent_head_current_balance = 0;
                        if ($showAllocation) {
                            $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                            $head->parent_head_total_allocation = $parent_head_total_allocation;
                        }
                        if ($showExpense) {
                            $parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                            $head->parent_head_total_expense = $parent_head_total_expense;
                        }
                        if ($showBalance) {
                            $parent_head_current_balance = $parent_head_total_allocation - $parent_head_total_expense;
                            $head->parent_head_current_balance = $parent_head_current_balance;
                        }
                    } else {
                        $head_total_allocation = 0;
                        $head_total_expense = 0;
                        $head_current_balance = 0;
                        if ($showAllocation) {
                            $head_total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                            $head->total_allocation = $head_total_allocation;
                        }
                        if ($showExpense) {
                            $head_total_expense = $this->totalFilterExpense($head->head_row_id, $budget_year, $start_date, $end_date);
                            $head->total_expense = $head_total_expense;
                        }
                        if ($showBalance) {
                            $head_current_balance = $head_total_allocation - $head_total_expense;
                            $head->current_balance = $head_current_balance;
                        }
                        $this->output[] = $head;
                    }
                }
            }
        }
    }

    public function setExpenseFilterChildren($haystack, $parentHeadId, $budget_year, $showAllocation, $showExpense, $showBalance, $start_date = 0, $end_date = 0) {
        if (count($haystack)) {
            foreach ($haystack as $head) {
                if ($head->parent_id && $head->parent_id == $parentHeadId) {
                    if ($head->has_child) {
                        $this->output[] = $head;
                        $this->setExpenseFilterChildren($haystack, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $showBalance, $start_date, $end_date);
                        $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                        $parent_head_total_allocation = 0;
                        $parent_head_total_expense = 0;
                        $parent_head_current_balance = 0;
                        if ($showAllocation) {
                            $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                            $head->parent_head_total_allocation = $parent_head_total_allocation;
                        }
                        if ($showExpense) {
                            $parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                            $head->parent_head_total_expense = $parent_head_total_expense;
                        }
                        if ($showBalance) {
                            $parent_head_current_balance = $parent_head_total_allocation - $parent_head_total_expense;
                            $head->parent_head_current_balance = $parent_head_current_balance;
                        }
                    } else {
                        $head_total_allocation = 0;
                        $head_total_expense = 0;
                        $head_current_balance = 0;
                        if ($showAllocation) {
                            $head_total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                            $head->total_allocation = $head_total_allocation;
                        }
                        if ($showExpense) {
                            $head_total_expense = $this->totalFilterExpense($head->head_row_id, $budget_year, $start_date, $end_date);
                            $head->total_expense = $head_total_expense;
                        }
                        if ($showBalance) {
                            $head_current_balance = $head_total_allocation - $head_total_expense;
                            $head->current_balance = $head_current_balance;
                        }
                        $this->output[] = $head;
                    }
                }
            }
        }
    }

    public function allocationFilterHeads($showAllocation = true, $showExpense = false, $head_row_id = 0, $budget_year = 0, $start_date = 0, $end_date = 0) {
        $head = \App\Models\AccountHead::find($head_row_id);
        $result = \App\Models\AccountHead::orderBy('sort_order', 'asc')->get();
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        $this->output = array();
        if ($head_row_id > 0) {
            /**
             * Select specific head
             */
            if ($head->has_child) {
                $this->output[] = $head;
                $this->setAllocationFilterChildren($result, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $start_date, $end_date);
                $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                if ($showAllocation) {
                    $head->parent_head_total_allocation = $this->totalParentHeadFilterAllocations($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                }
                if ($showExpense) {
                    $head->parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                }
            } else {
                if ($showAllocation) {
                    $head->total_allocation = $this->totalFilterAllocationByDate($head->head_row_id, $budget_year, $start_date, $end_date);
                }
                if ($showExpense) {
                    $head->total_expense = $this->totalFilterExpense($head->head_row_id, $budget_year, $start_date, $end_date);
                }
                $this->output[] = $head;
            }
        } else {
            /**
             * Select all head
             */
            foreach ($result as $head) {
                if ($head->parent_id == 0) {
                    if ($head->has_child) {
                        $this->output[] = $head;
                        $this->setAllocationFilterChildren($result, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $start_date, $end_date);
                        $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                        if ($showAllocation) {
                            $head->parent_head_total_allocation = $this->totalParentHeadFilterAllocations($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                        }
                        if ($showExpense) {
                            $head->parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                        }
                    } else {
                        if ($showAllocation) {
                            $head->total_allocation = $this->totalFilterAllocationByDate($head->head_row_id, $budget_year, $start_date, $end_date);
                        }
                        if ($showExpense) {
                            $head->total_expense = $this->totalFilterExpense($head->head_row_id, $budget_year, $start_date, $end_date);
                        }

                        $this->output[] = $head;
                    }
                }
            }
        }
        $output = $this->output;
        $this->output = array();
        return $output;
    }

    public function setAllocationFilterChildren($haystack, $parentHeadId, $budget_year, $showAllocation, $showExpense, $start_date = 0, $end_date = 0) {
        if (count($haystack)) {
            foreach ($haystack as $head) {
                if ($head->parent_id && $head->parent_id == $parentHeadId) {
                    if ($head->has_child) {
                        $this->output[] = $head;
                        $this->setAllocationFilterChildren($haystack, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $start_date, $end_date);
                        $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                        if ($showAllocation) {
                            $head->parent_head_total_allocation = $this->totalParentHeadFilterAllocations($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                        }
                        if ($showExpense) {
                            $head->parent_head_total_expense = $this->totalParentHeadExpense($this->parent_head_child_list, $budget_year, $start_date, $end_date);
                        }
                    } else {
                        if ($showAllocation) {
                            $head->total_allocation = $this->totalFilterAllocationByDate($head->head_row_id, $budget_year, $start_date, $end_date);
                        }
                        if ($showExpense) {
                            $head->total_expense = $this->totalFilterExpense($head->head_row_id, $budget_year, $start_date, $end_date);
                        }

                        $this->output[] = $head;
                    }
                }
            }
        }
    }

    public function balanceReportByMonthRange($showAllocation = true, $showExpense = true, $showBalance = true, $head_row_id = 0, $budget_year = 0, $from_month = 0, $to_month = 0) {

        $all_head_list = \App\Models\AccountHead::orderBy('sort_order', 'asc')->get();
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        $this->output = array();
        $this->head_total_expense_by_month = array();
        if (!empty($from_month) && !empty($to_month)) {
            $data['from_month'] = $from_month;
            $data['to_month'] = $to_month;
        } elseif (!empty($from_month) && empty($to_month)) {
            $to_month = Carbon::now()->format('m');
            $data['from_month'] = $from_month;
            $data['to_month'] = $to_month;
        } elseif (empty($from_month) && !empty($to_month)) {
            $from_month = $to_month;
            $data['from_month'] = $from_month;
            $data['to_month'] = $to_month;
        } else {
            $from_month = Carbon::now()->format('m');
            $to_month = Carbon::now()->format('m');
        }
        if ($head_row_id > 0) {
            /*
             * Specific head selected
             */
            $head = $this->get_head_row_info($head_row_id);
            if ($head->has_child) {
                $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                $start_month = $from_month;
                $parent_total_expense = 0;
                for ($start_month; $start_month <= $to_month; $start_month++) {
                    $parent_month_expense = 0;
                    $parent_month_expense = $this->totalParentHeadExpenseByMonth($this->parent_head_child_list, $budget_year, $start_month);
                    $this->head_total_expense_by_month[$start_month] = $parent_month_expense;
                    $parent_total_expense += $parent_month_expense;
                }
                $parent_head_current_balance = $parent_head_total_allocation - $parent_total_expense;
                $this->output[$head->head_row_id] = array(
                    'head_row_id' => $head->head_row_id,
                    'head_name' => $head->head_name,
                    'sort_order' => $head->sort_order,
                    'parent_id' => $head->parent_id,
                    'has_child' => $head->has_child,
                    'level' => $head->level,
                    'parent_head_total_allocation' => $parent_head_total_allocation,
                    'parent_head_current_balance' => $parent_head_current_balance,
                    'parent_head_total_expense' => $parent_total_expense
                );
                array_push($this->output[$head->head_row_id], $this->head_total_expense_by_month);
                unset($start_month);
                unset($parent_total_expense);
                unset($parent_month_expense);
                $this->setBalanceReportByMonthRangeChildren($all_head_list, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $showBalance, $from_month, $to_month);
            } else {
                $head_total_allocation = 0;
                if ($showAllocation) {
                    $head_total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                }
                $start_month = $from_month;
                $total_expense = 0;
                for ($start_month; $start_month <= $to_month; $start_month++) {
                    $month_expense = 0;
                    $month_expense = $this->totalFilterExpenseByMonth($head->head_row_id, $budget_year, $start_month);
                    $this->head_total_expense_by_month[$start_month] = $month_expense;
                    $total_expense += $month_expense;
                }
                $head_current_balance = 0;
                if ($showBalance) {
                    $head_current_balance = $head_total_allocation - $total_expense;
                }
                $this->output[$head->head_row_id] = array(
                    'head_row_id' => $head->head_row_id,
                    'head_name' => $head->head_name,
                    'sort_order' => $head->sort_order,
                    'parent_id' => $head->parent_id,
                    'has_child' => $head->has_child,
                    'level' => $head->level,
                    'head_total_allocation' => $head_total_allocation,
                    'head_current_balance' => $head_current_balance,
                    'head_total_expense' => $total_expense
                );
                //dd($this->ouput[$head->head_row_id]);
                array_push($this->output[$head->head_row_id], $this->head_total_expense_by_month);
                unset($start_month);
                unset($month_expense);
            }
        } else {
            /*
             * All head selected
             */
            foreach ($all_head_list as $head) {
                if ($head->parent_id == 0) {
                    if ($head->has_child) {
                        $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                        $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                        $start_month = $from_month;
                        $parent_total_expense = 0;
                        for ($start_month; $start_month <= $to_month; $start_month++) {
                            $parent_month_expense = 0;
                            $parent_month_expense = $this->totalParentHeadExpenseByMonth($this->parent_head_child_list, $budget_year, $start_month);
                            $this->head_total_expense_by_month[$start_month] = $parent_month_expense;
                            $parent_total_expense += $parent_month_expense;
                        }
                        $parent_head_current_balance = $parent_head_total_allocation - $parent_total_expense;
                        $this->output[$head->head_row_id] = array(
                            'head_row_id' => $head->head_row_id,
                            'head_name' => $head->head_name,
                            'sort_order' => $head->sort_order,
                            'parent_id' => $head->parent_id,
                            'has_child' => $head->has_child,
                            'level' => $head->level,
                            'parent_head_total_allocation' => $parent_head_total_allocation,
                            'parent_head_current_balance' => $parent_head_current_balance,
                            'parent_head_total_expense' => $parent_total_expense
                        );
                        array_push($this->output[$head->head_row_id], $this->head_total_expense_by_month);
                        unset($start_month);
                        unset($parent_total_expense);
                        unset($parent_month_expense);
                        $this->setBalanceReportByMonthRangeChildren($all_head_list, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $showBalance, $from_month, $to_month);
                    } else {
                        $head_total_allocation = 0;
                        if ($showAllocation) {
                            $head_total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                        }
                        $start_month = $from_month;
                        $total_expense = 0;
                        for ($start_month; $start_month <= $to_month; $start_month++) {
                            $month_expense = 0;
                            $month_expense = $this->totalFilterExpenseByMonth($head->head_row_id, $budget_year, $start_month);
                            $this->head_total_expense_by_month[$start_month] = $month_expense;
                            $total_expense += $month_expense;
                        }
                        $head_current_balance = 0;
                        if ($showBalance) {
                            $head_current_balance = $head_total_allocation - $total_expense;
                        }
                        $this->output[$head->head_row_id] = array(
                            'head_row_id' => $head->head_row_id,
                            'head_name' => $head->head_name,
                            'sort_order' => $head->sort_order,
                            'parent_id' => $head->parent_id,
                            'has_child' => $head->has_child,
                            'level' => $head->level,
                            'head_total_allocation' => $head_total_allocation,
                            'head_current_balance' => $head_current_balance,
                            'head_total_expense' => $total_expense
                        );
                        array_push($this->output[$head->head_row_id], $this->head_total_expense_by_month);
                        unset($start_month);
                        unset($month_expense);
                    }
                }
            }
        }
        $output = $this->output;
        $this->output = array();
        $this->head_total_expense_by_month = array();
        return $output;
    }

    public function setBalanceReportByMonthRangeChildren($haystack, $parentHeadId, $budget_year, $showAllocation, $showExpense, $showBalance, $from_month = 0, $to_month = 0) {
        if (count($haystack)) {
            foreach ($haystack as $head) {
                if ($head->parent_id && $head->parent_id == $parentHeadId) {
                    if ($head->has_child) {
                        $this->parent_head_child_list = $this->findHeadChildrenList($head->head_row_id);
                        $parent_head_total_allocation = $this->totalParentHeadAllocations($this->parent_head_child_list, $budget_year);
                        $start_month = $from_month;
                        $parent_total_expense = 0;
                        for ($start_month; $start_month <= $to_month; $start_month++) {
                            $parent_month_expense = 0;
                            $parent_month_expense = $this->totalParentHeadExpenseByMonth($this->parent_head_child_list, $budget_year, $start_month);
                            $this->head_total_expense_by_month[$start_month] = $parent_month_expense;
                            $parent_total_expense += $parent_month_expense;
                        }
                        $parent_head_current_balance = $parent_head_total_allocation - $parent_total_expense;
                        $this->output[$head->head_row_id] = array(
                            'head_row_id' => $head->head_row_id,
                            'head_name' => $head->head_name,
                            'sort_order' => $head->sort_order,
                            'parent_id' => $head->parent_id,
                            'has_child' => $head->has_child,
                            'level' => $head->level,
                            'parent_head_total_allocation' => $parent_head_total_allocation,
                            'parent_head_current_balance' => $parent_head_current_balance,
                            'parent_head_total_expense' => $parent_total_expense
                        );
                        array_push($this->output[$head->head_row_id], $this->head_total_expense_by_month);
                        unset($start_month);
                        unset($parent_total_expense);
                        unset($parent_month_expense);
                        $this->setBalanceReportByMonthRangeChildren($haystack, $head->head_row_id, $budget_year, $showAllocation, $showExpense, $showBalance, $from_month, $to_month);
                    } else {
                        $head_total_allocation = 0;
                        if ($showAllocation) {
                            $head_total_allocation = $this->totalAllcations($head->head_row_id, $budget_year);
                        }
                        $start_month = $from_month;
                        $total_expense = 0;
                        for ($start_month; $start_month <= $to_month; $start_month++) {
                            $month_expense = 0;
                            $month_expense = $this->totalFilterExpenseByMonth($head->head_row_id, $budget_year, $start_month);
                            $this->head_total_expense_by_month[$start_month] = $month_expense;
                            $total_expense += $month_expense;
                        }
                        $head_current_balance = 0;
                        if ($showBalance) {
                            $head_current_balance = $head_total_allocation - $total_expense;
                        }
                        $this->output[$head->head_row_id] = array(
                            'head_row_id' => $head->head_row_id,
                            'head_name' => $head->head_name,
                            'sort_order' => $head->sort_order,
                            'parent_id' => $head->parent_id,
                            'has_child' => $head->has_child,
                            'level' => $head->level,
                            'head_total_allocation' => $head_total_allocation,
                            'head_current_balance' => $head_current_balance,
                            'head_total_expense' => $total_expense
                        );
                        array_push($this->output[$head->head_row_id], $this->head_total_expense_by_month);
                        unset($start_month);
                        unset($month_expense);
                    }
                }
            }
        }
    }

    /**
     * Get the head current balance amount for which has_child ~ 0
     * @param type $source_area_row_id
     * @param type $source_head_row_id
     * @param type $budget_year
     */
    public function getHeadCurrentBalance($head_row_id = 0, $budget_year = 0) {
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        /* Find head total adjustment */
        $head_total_allocation = 0;
        $head_current_balance = 0;
        /**
         * Get Head total allocation
         */
        $head_total_allocation = $this->totalAllcations($head_row_id, $budget_year);
        /* Find total expense */
        $head_total_expense = $this->totalExpense($head_row_id, $budget_year);
        $head_current_balance = $head_total_allocation - $head_total_expense;
        return $head_current_balance;
    }

    public function totalFilterExpenseByMonth($head_row_id = 0, $budget_year = 0, $month = 0) {
        return \App\Models\AccountExpense::where([['head_row_id', '=', $head_row_id], ['budget_year', '=', $budget_year]])->whereMonth('expense_at', '=', $month)->sum('amount');
    }

    public function totalParentHeadExpenseByMonth($parent_head_child_list, $budget_year, $month = 0) {
        return \App\Models\AccountExpense::where([['budget_year', '=', $budget_year]])->whereIn('head_row_id', $parent_head_child_list)->whereMonth('expense_at', '=', $month)->sum('amount');
    }

    public function totalParentHeadAllocations($parent_head_child_list, $budget_year) {
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        return \App\Models\AccountAllocation::where([['budget_year', '=', $budget_year]])->whereIn('head_row_id', $parent_head_child_list)->sum('amount');
    }

    public function totalParentHeadFilterAllocations($parent_head_child_list, $budget_year, $start_date = 0, $end_date = 0) {
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        if (!empty($start_date) && !empty($end_date)) {
            return \App\Models\AccountAllocation::where([['budget_year', '=', $budget_year]])->whereIn('head_row_id', $parent_head_child_list)->whereBetween('allocation_at', [$start_date, $end_date])->sum('amount');
        } else {
            return \App\Models\AccountAllocation::where([['budget_year', '=', $budget_year]])->whereIn('head_row_id', $parent_head_child_list)->sum('amount');
        }
    }

    public function totalAllcations($head_row_id, $budget_year) {
        return \App\Models\AccountAllocation::where([['head_row_id', $head_row_id], ['budget_year', '=', $budget_year]])->sum('amount');
    }

    public function totalExpense($head_row_id, $budget_year) {
        return \App\Models\AccountExpense::where([['head_row_id', $head_row_id], ['budget_year', '=', $budget_year]])->sum('amount');
    }

    public function totalFilterAllocationByDate($head_row_id = 0, $budget_year = 0, $start_date = 0, $end_date = 0) {
        $budget_year = !empty($budget_year) ? $budget_year : date('Y');
        if (!empty($start_date) && !empty($end_date)) {
            return \App\Models\AccountAllocation::where([['head_row_id', '=', $head_row_id], ['budget_year', '=', $budget_year]])->whereBetween('allocation_at', [$start_date, $end_date])->sum('amount');
        } else {
            return \App\Models\AccountAllocation::where([['head_row_id', '=', $head_row_id], ['budget_year', '=', $budget_year]])->sum('amount');
        }
    }

    public function totalFilterExpense($head_row_id, $budget_year, $start_date = 0, $end_date = 0) {
        if (!empty($start_date) && !empty($end_date)) {
            //$start_date = $start_date." 00:00:00";
            //$end_date = $end_date." 23:59:59";
            return \App\Models\AccountExpense::where([['head_row_id', $head_row_id], ['budget_year', '=', $budget_year]])->whereBetween('expense_at', [$start_date, $end_date])->sum('amount');
        } else {
            return \App\Models\AccountExpense::where([['head_row_id', $head_row_id], ['budget_year', '=', $budget_year]])->sum('amount');
        }
    }

    public function totalParentHeadExpense($parent_head_child_list, $budget_year, $start_date = 0, $end_date = 0) {
        if (!empty($start_date) && !empty($end_date)) {
            //$start_date = $start_date." 00:00:00";
            //$end_date = $end_date." 23:59:59";
            return \App\Models\AccountExpense::where([['budget_year', '=', $budget_year]])->whereIn('head_row_id', $parent_head_child_list)->whereBetween('expense_at', [$start_date, $end_date])->sum('amount');
        } else {
            return \App\Models\AccountExpense::where([['budget_year', '=', $budget_year]])->whereIn('head_row_id', $parent_head_child_list)->sum('amount');
        }
    }

    public function destroy($id) {
        $file = Upload::find($id);
        $filename = Input::get('database field name for file');
        $path = public_path() . '/path/to/file/';

        if (!File::delete($path . $filename)) {
            Session::flash('flash_message', 'ERROR deleted the File!');
            return Redirect::to('page name');
        } else {
            $file->delete();
            Session::flash('flash_message', 'Successfully deleted the File!');
            return Redirect::to('page name');
        }
    }

    public function findHeadChildrenList($parent_head_row_id) {
        $childrenList = \App\Models\AccountHead::where('parent_id', $parent_head_row_id)->get();
        if (count($childrenList)) {
            foreach ($childrenList as $children) {
                if ($children->has_child) {
                    $this->findHeadGrandChildrenList($children->head_row_id);
                } else {
                    $this->head_child_list[] = $children->head_row_id;
                }
            }
        }
        $head_child_list = $this->head_child_list;
        $this->head_child_list = array();
        return $head_child_list;
    }

    public function findHeadGrandChildrenList($parent_head_row_id) {
        $grandChildrenList = \App\Models\AccountHead::where('parent_id', $parent_head_row_id)->get();
        if (count($grandChildrenList)) {
            foreach ($grandChildrenList as $grandChildren) {
                if ($grandChildren->has_child) {
                    $this->findHeadGreatGrandChildrenList($grandChildren->head_row_id);
                } else {
                    $this->head_child_list[] = $grandChildren->head_row_id;
                }
            }
            return $this->head_child_list;
        }
    }

    public function findHeadGreatGrandChildrenList($parent_head_row_id) {
        $greatgrandChildrenList = \App\Models\AccountHead::where('parent_id', $parent_head_row_id)->get();
        if (count($greatgrandChildrenList)) {
            foreach ($greatgrandChildrenList as $greatGrandChildren) {
                $this->head_child_list[] = $greatGrandChildren->head_row_id;
            }
            return $this->head_child_list;
        }
    }

    /**
     * Get a head row info
     * @param type $head_row_id
     * @return type
     */
    public function get_head_row_info($head_row_id) {
        $head_row = \App\Models\AccountHead::where('head_row_id', $head_row_id)->first();
        return $head_row;
    }

    /**
     * Find parent info of a head
     * @param type $head_row_id
     */
    public function findHeadParent($head_row_id) {
        $head_row = $this->get_head_row_info($head_row_id);
        if (isset($head_row->parent_id) && ($head_row->parent_id > 0)) {
            $headParent = $this->get_head_row_info($head_row->parent_id);
            $this->head_parent_list['head_parent'] = $headParent;
            if (!empty($headParent->parent_id)) {
                $this->findHeadGrandParent($headParent->parent_id);
            }
        }
        $head_parent_list = $this->head_parent_list;
        $this->head_parent_list = array();
        return $head_parent_list;
    }

    /**
     * Find grand parent info of a head
     * @param type $head_row_id
     */
    public function findHeadGrandParent($head_row_id) {
        $headGrandParent = $this->get_head_row_info($head_row_id);
        $this->head_parent_list['head_grand_parent'] = $headGrandParent;
        if (!empty($headGrandParent->parent_id)) {
            $this->findHeadGreatGrandParent($headGrandParent->parent_id);
        }
        return $this->head_parent_list;
    }

    /**
     * Find great grand parent info of a head
     * @param type $head_row_id
     */
    public function findHeadGreatGrandParent($head_row_id) {
        $headGreatGrandParent = $this->get_head_row_info($head_row_id);
        $this->head_parent_list['head_great_grand_parent'] = $headGreatGrandParent;
        return $this->head_parent_list;
    }

    /**
     * Get Ancestor Hierarchy of a specific Head
     * i.e Pay and Allowances > Complex Staff Salary / Honorarium
     * @param type $head_row_id
     * @return string
     */
    public function getHeadAncestorHierarchy($head_row_id) {
        $selected_head_hierarchy = '';
        $head_row_detail = $this->get_head_row_info($head_row_id);
        $selected_head_hierarchy = $head_row_detail->head_name;
        $head_parent_list = $this->findHeadParent($head_row_id);
        if (isset($head_parent_list['head_parent'])) {
            $selected_head_hierarchy = $head_parent_list['head_parent']->head_name . " > " . $selected_head_hierarchy;
        }
        if (isset($head_parent_list['head_grand_parent'])) {
            $selected_head_hierarchy = $head_parent_list['head_grand_parent']->head_name . " > " . $selected_head_hierarchy;
        }
        if (isset($head_parent_list['head_great_grand_parent'])) {
            $selected_head_hierarchy = $head_parent_list['head_great_grand_parent']->head_name . " > " . $selected_head_hierarchy;
        }
        return $selected_head_hierarchy;
    }

}
