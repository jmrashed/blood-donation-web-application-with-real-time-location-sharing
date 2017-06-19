@extends('backend.school_admin.layout_app')

@section('content')

    <!-- BEGIN PAGE TITLE-->


    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered" id="form_wizard_1">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-red"></i>
                                    <span class="caption-subject font-red bold uppercase"> Edit Student Information -
                                            <span class="step-title"> Step 1 of 4 </span>
                                        </span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form class="form-horizontal" id="submit_form" action="{{ url('/') }}/schoolAdmin/manageStudent/update/{{ $student_details['student_row_id'] }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                   
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <ul class="nav nav-pills nav-justified steps">
                                                <li>
                                                    <a href="#tab1" data-toggle="tab" class="step">
                                                        <span class="number"> 1 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i> Account Setup </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                        <span class="number"> 2 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i> Profile Setup </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab" class="step active">
                                                        <span class="number"> 3 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i> Manage Credentials </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab" class="step">
                                                        <span class="number"> 4 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i> Confirm </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                <div class="progress-bar progress-bar-success"> </div>
                                            </div>
                                            <div class="tab-content">

                                                <!--<div class="alert alert-danger display-none">
                                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                                </div>
                                                <div class="alert alert-success display-none">
                                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                                </div>-->


                                                <div class="tab-pane active" id="tab1">

                                                    <div class="form-body">
                                                        <h3 class="form-section">Admission Information</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Student Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_name" value="<?php echo isset($student_details['student_name']) ? $student_details['student_name'] : ''; ?>" required>
                                                                        <span class="help-block"> Enter students name here</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Student Name (বাংলা)</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_name_bangla" value="<?php echo isset($student_details['student_name_bangla']) ? $student_details['student_name_bangla'] : ''; ?>" required>
                                                                        <span class="help-block"> Enter students name here</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Class</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control classes" name="academic_class" current_shift="<?php echo $student_details['current_shift']; ?>"  current_section="<?php echo $student_details['current_section']; ?>" current_department="<?php echo $student_details['current_department']; ?>" required>
                                                                            <option value="0">Select Class</option>
                                                                            @foreach($allclasses as $class)
                                                                            @if($class->class_row_id == $student_details['current_class'])
                                                                                {{ !$selected = 'selected="selected"' }}
                                                                            @else
                                                                                {{ !$selected = '' }}
                                                                            @endif
                                                                             <option value="{{ $class->class_row_id }}" <?php echo $selected?>>{{ $class->class_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="help-block"> Choose a class from the dropdown</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Shift/Session</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control shift" name="academic_shift" required></select>
                                                                        <span class="help-block"> Select school shift </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Section</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control sections" name="academic_section"></select>
                                                                        <span class="help-block"> Choose a section from the dropdown</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Department</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control department" name="academic_department">
                                                                            <option value="1" <?php if($student_details['current_department'] == 1) { ?>selected="selected"<?php } ?>>General</option>
                                                                            <option value="2" <?php if($student_details['current_department'] == 2) { ?>selected="selected"<?php } ?>>Science</option>
                                                                            <option value="3" <?php if($student_details['current_department'] == 3) { ?>selected="selected"<?php } ?>>Arts</option>
                                                                            <option value="4" <?php if($student_details['current_department'] == 4) { ?>selected="selected"<?php } ?>>Commerce</option>
                                                                        </select>
                                                                        <span class="help-block"> Select school department </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Roll Number</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control rollnumber" name="academic_rollnumber" value="<?php echo isset($student_details['current_rollnumber']) ? $student_details['current_rollnumber'] : ''; ?>">
                                                                        <span class="help-block"> Enter students class roll number</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Date Of Admission</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group input-medium  date date-picker" data-date-format="yyyy-mm-dd">
                                                                            <input id="datepicker" type="text" class="form-control" readonly name="date_of_admission" value="<?php echo ($student_details['date_of_admission'] != '0000-00-00') ? $student_details['date_of_admission'] : ''; ?>">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                        <!-- /input-group -->
                                                                        <span class="help-block"> select a date </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">                                                          
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Academic Session</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" name="academic_session">
                                                                            <?php echo academic_session_options($student_details['current_session']); ?>
                                                                        </select>
                                                                        <span class="help-block"> Select school academic year/session </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Gender</label>
                                                                    <div class="col-md-9">
                                                                        <div class="radio-list">
                                                                            <label class="radio-inline">
                                                                                <input id="radio-1" type="radio" name="student_gender" gender="Boy" value="1" <?php if($student_details['student_gender'] == 1) { ?>checked="checked"<?php } ?>  /> Boy </label>
                                                                            <label class="radio-inline">
                                                                                <input id="radio-2" type="radio" name="student_gender" gender="Girl" value="2" <?php if($student_details['student_gender'] == 2) { ?>checked="checked"<?php } ?> /> Girl </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab2">
                                                    <div class="form-body">
                                                        <h3 class="form-section">Students Bio Data</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Date Of Birth</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                                                            <input id="datepicker" type="text" class="form-control" readonly name="student_dob" value="<?php echo ($student_details['student_dob'] != '0000-00-00') ? $student_details['student_dob'] :''; ?>">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                        <span class="help-block"> select a date </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Place Of Birth</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_birth_place" value="<?php echo isset($student_details['student_birth_place']) ? $student_details['student_birth_place'] : ''; ?>">
                                                                        <span class="help-block"> Enter students birth place where he/she born</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Blood Group</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" name="student_blood_group">
                                                                            @foreach($blood_group as $key=>$val)
                                                                                @if($key == $student_details['student_blood_group'])
                                                                                {{ !$selected = 'selected="selected"' }}
                                                                                @else
                                                                                    {{ !$selected = '' }}
                                                                                @endif
                                                                                <option value="{{ $key }}" <?php echo $selected ?>>{{ $val }}</option>
                                                                            @endforeach
                                                                    </select>
                                                                        <span class="help-block"> Select students blood group </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Birth Certificate No</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_birthcertificateno" value="<?php echo isset($student_details['student_birthcertificateno']) ? $student_details['student_birthcertificateno'] : ''; ?>">
                                                                        <span class="help-block">Enter students birth certificate ID no.</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Religion</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" name="student_religion">
                                                                            @foreach($religion as $key=>$val)
                                                                                @if($key == $student_details['student_religion'])
                                                                                {{ !$selected = 'selected="selected"' }}
                                                                                @else
                                                                                    {{ !$selected = '' }}
                                                                                @endif
                                                                                <option value="{{ $key }}" <?php echo $selected ?>>{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="help-block"> Select students religion </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nationality</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_nationality" value="<?php echo isset($student_details['student_nationality']) ? $student_details['student_nationality'] : ''; ?>">
                                                                        <span class="help-block"> Enter students nationality </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Mobile No.</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_phone" value="<?php echo isset($student_details['student_phone']) ? $student_details['student_phone'] : ''; ?>"> 
                                                                        <span class="help-block"> Enter students contact no </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Home Cell#</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_telephone" value="<?php echo isset($student_details['student_telephone']) ? $student_details['student_telephone'] : ''; ?>">
                                                                        <span class="help-block"> Enter students home contact number </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-8">Does the child have any physical handicaps?</label>
                                                                    <div class="col-md-4">
                                                                        <div class="radio-list">
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="is_physically_disabled" physically_disabled="Yes" value="1" <?php if($student_details['is_physically_disabled'] == 1) { ?>checked="checked"<?php } ?> /> Yes </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="is_physically_disabled" physically_disabled="No" value="0" <?php if($student_details['is_physically_disabled'] == 0) { ?>checked="checked"<?php } ?>/> No </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Medical Problem</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_medical_problem" value="<?php echo isset($student_details['student_medical_problem']) ? $student_details['student_medical_problem'] : ''; ?>">
                                                                        <span class="help-block"> Enter any kind of medical records of your student  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">Students Photo</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                    <?php if(isset($student_details['student_photo']) && ($student_details['student_photo'] != '')) { ?>
                                                                                        <img class="imagefile_1" id="student_photo" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/student_photo/{{ $student_details['student_photo'] }}" alt="" width="300" height="300" />
                                                                                    <?php } else { ?>
                                                                                        <img class="imagefile_1" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" id="preview" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="imgInp" name="student_photo"> </span>
                                                                                    <a href="javascript:;" image_to_delete ="student_photo" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                                </div>
                                                                                <div class="clearfix margin-top-10">
                                                                                    <span class="label label-danger">NOTE!</span> Image size 300x300 preferable. 
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">Birth Certificate Scan Photo</label>
                                                                    <div class="col-md-8">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                <?php if(isset($student_details['student_birthcertificatephoto']) && ($student_details['student_birthcertificatephoto'] != '')) { ?>
                                                                                    <img class="imagefile_2" id="student_birth_certificate"src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/student_birthcertificate/{{ $student_details['student_birthcertificatephoto'] }}" alt="" width="200" height="150" />
                                                                                <?php } else { ?>
                                                                                    <img class="imagefile_2" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                            <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="bcInp" name="student_birthcertificatephoto"> </span>
                                                                            <a href="javascript:;" image_to_delete ="student_birth_certificate" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                        <div class="clearfix margin-top-10">
                                                                            <span class="label label-danger">NOTE!</span> Image size 300x300 preferable. 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">Students Signature</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                    <?php if(isset($student_details['student_signature']) && ($student_details['student_signature'] != '')) { ?>
                                                                                        <img class="imagefile_3" id="student_signature_photo" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/student_signature/{{ $student_details['student_signature'] }}" alt="" width="200" height="150" />
                                                                                    <?php } else { ?>
                                                                                        <img class="imagefile_3" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="studentsignature" name="student_signature"> </span>
                                                                                    <a href="javascript:;" image_to_delete ="student_signature_photo" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">NOTE!</span> Image size 300x80 preferable. 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>             
                                                        </div>
                                                        

                                                        <h3 class="form-section">Student Present Address Information</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Present Address</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_present_address" value="<?php echo isset($student_details['student_present_address']) ? $student_details['student_present_address'] : ''; ?>">
                                                                        <span class="help-block"> Enter students present address  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Present Address (বাংলা)</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_present_address_bangla" value="<?php echo isset($student_details['student_present_address_bangla']) ? $student_details['student_present_address_bangla'] : ''; ?>">
                                                                        <span class="help-block"> Enter students present address  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">Division</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control division_present" name="student_division_present" presentdivision="<?php echo isset($student_details['student_division_present']) ? $student_details['student_division_present'] : ''; ?>">
                                                                            <option value="0">Select Division</option>
                                                                            @foreach($divisionlist as $key=>$val)
                                                                                @if($key == $student_details['student_division_present'])
                                                                                {{ !$selected = 'selected="selected"' }}
                                                                                @else
                                                                                    {{ !$selected = '' }}
                                                                                @endif
                                                                                <option value="{{ $key }}" <?php echo $selected ?>>{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">District</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control district_present" name="student_district_present" presentdist="<?php echo isset($student_details['student_district_present']) ? $student_details['student_district_present'] : ''; ?>">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Upazila</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control upazila_present" name="student_upazila_present" presentupazila="<?php echo isset($student_details['student_upazila_present']) ? $student_details['student_upazila_present'] : ''; ?>"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Post Code</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_postcode_present" value="<?php echo isset($student_details['student_postcode_present']) ? $student_details['student_postcode_present'] : ''; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="form-section">Student Permanent Address Information <span style="text-align:right; font-size:12px; float:right; margin-right:20px; margin-top: 8px;"><label><input class="permanentaspresent" name="permanentaspresent" type="checkbox" value="1" <?php if($student_details['permanentaspresent'] == 1) { ?>checked="checked"<?php } ?> /> Same As Present Address</label></span></h3>
                                                        <div class="permanentaddress_content" <?php if($student_details['permanentaspresent'] == 1) { ?>style="display:none;"<?php } else { ?>style="display:block;"<?php } ?>>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Permanent Address</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_permanent_address" value="<?php echo isset($student_details['student_permanent_address']) ? $student_details['student_permanent_address'] : ''; ?>">
                                                                        <span class="help-block"> Enter students permanent address  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Permanent Address (বাংলা)</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_permanent_address_bangla" value="<?php echo isset($student_details['student_permanent_address_bangla']) ? $student_details['student_permanent_address_bangla'] : ''; ?>">
                                                                        <span class="help-block"> Enter students permanent address  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">Division</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control division_permanent" name="student_division_permanent" permanentdivision="<?php echo isset($student_details['student_division_permanent']) ? $student_details['student_division_permanent'] : ''; ?>">
                                                                            <option value="0">Select Division</option>
                                                                            @foreach($divisionlist as $key=>$val)
                                                                                @if($key == $student_details['student_division_permanent'])
                                                                                {{ !$selected = 'selected="selected"' }}
                                                                                @else
                                                                                    {{ !$selected = '' }}
                                                                                @endif
                                                                                <option value="{{ $key }}" <?php echo $selected ?>>{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">District</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control district_permanent" name="student_district_permanent" permanentdist="<?php echo isset($student_details['student_district_permanent']) ? $student_details['student_district_permanent'] : ''; ?>">
                                                                            <option value="0">Select District</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Upazila</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control upazila_permanent" name="student_upazila_permanent" permanentupazila="<?php echo isset($student_details['student_upazila_permanent']) ? $student_details['student_upazila_permanent'] : ''; ?>"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Post Code</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_postcode_permanent" value="<?php echo isset($student_details['student_postcode_permanent']) ? $student_details['student_postcode_permanent'] : ''; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                        <h3 class="form-section">Father's Information</h3>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">F. Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_name" value="<?php echo isset($student_details['father_name']) ? $student_details['father_name'] : ''; ?>">
                                                                        <span class="help-block"> Enter students father's name  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">F. Name (বাংলা)</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_name_bangla" value="<?php echo isset($student_details['father_name_bangla']) ? $student_details['father_name_bangla'] : ''; ?>">
                                                                        <span class="help-block"> Enter students father's name in Bangla  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">F. NID</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_nid" value="<?php echo isset($student_details['father_nid']) ? $student_details['father_nid'] : ''; ?>">
                                                                        <span class="help-block"> Enter students father's National ID card no  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">F. Email</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_email" value="<?php echo isset($student_details['father_email']) ? $student_details['father_email'] : ''; ?>">
                                                                        <span class="help-block"> Enter email address  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">F. Mobile#</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_mobile" value="<?php echo isset($student_details['father_mobile']) ? $student_details['father_mobile'] : ''; ?>">
                                                                        <span class="help-block"> Enter father's mobile number  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">F. Occupation</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_occupation" value="<?php echo isset($student_details['father_occupation']) ? $student_details['father_occupation'] : ''; ?>">
                                                                        <span class="help-block"> Enter father's occupation/job type  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">F. Annual Income</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_income_annual" value="<?php echo isset($student_details['father_income_annual']) ? $student_details['father_income_annual'] : ''; ?>">
                                                                        <span class="help-block"> Enter father's annual salary/approx.  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Business/ Employer</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_office_address" value="<?php echo isset($student_details['father_office_address']) ? $student_details['father_office_address'] : ''; ?>">
                                                                        <span class="help-block"> Enter father's job employer/business name  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Office Tel No.</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_phone_office" value="<?php echo isset($student_details['father_phone_office']) ? $student_details['father_phone_office'] : ''; ?>">
                                                                        <span class="help-block"> Enter father's office telephone no.  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">F. Photo</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                    <?php if(isset($student_details['father_photo']) && ($student_details['father_photo'] != '')) { ?>
                                                                                        <img class="imagefile_4" id="father_photo" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/father_photo/{{ $student_details['father_photo'] }}" alt="" width="200" height="150" />
                                                                                    <?php } else { ?>
                                                                                        <img class="imagefile_4" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="fatherphoto" name="father_photo"> </span>
                                                                                    <a href="javascript:;" image_to_delete ="father_photo" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                            <span class="label label-danger">NOTE!</span> Image size 300x300 preferable. 
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">F. Signature</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                    <?php if(isset($student_details['father_signature']) && ($student_details['father_signature'] != '')) { ?>
                                                                                        <img class="imagefile_5" id="father_signature" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/father_signature/{{ $student_details['father_signature'] }}" alt="" width="200" height="150" />
                                                                                    <?php } else { ?>
                                                                                        <img class="imagefile_5" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="fathersignature" name="father_signature"> </span>
                                                                                     <a href="javascript:;" image_to_delete ="father_signature" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">NOTE!</span> Image size 300x80 preferable. 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="form-section">Mother's Information</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">M. Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_name" value="<?php echo isset($student_details['mother_name']) ? $student_details['mother_name'] : ''; ?>">
                                                                        <span class="help-block"> Enter students mother's name  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">M. Name (বাংলা)</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_name_bangla" value="<?php echo isset($student_details['mother_name_bangla']) ? $student_details['mother_name_bangla'] : ''; ?>">
                                                                        <span class="help-block"> Enter students mother's name in Bangla  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">M. NID</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_nid" value="<?php echo isset($student_details['mother_nid']) ? $student_details['mother_nid'] : ''; ?>">
                                                                        <span class="help-block"> Enter students mother's National ID card no  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">M. Email</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_email" value="<?php echo isset($student_details['mother_email']) ? $student_details['mother_email'] : ''; ?>">
                                                                        <span class="help-block"> Enter email address  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">M. Mobile#</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_mobile" value="<?php echo isset($student_details['mother_mobile']) ? $student_details['mother_mobile'] : ''; ?>">
                                                                        <span class="help-block"> Enter mother's mobile number  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">M. Occupation</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_occupation" value="<?php echo isset($student_details['mother_occupation']) ? $student_details['mother_occupation'] : ''; ?>">
                                                                        <span class="help-block"> Enter mother's occupation/job type  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">M. Annual Income</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_income_annual" value="<?php echo isset($student_details['mother_income_annual']) ? $student_details['mother_income_annual'] : ''; ?>">
                                                                        <span class="help-block"> Enter mother's annual salary/approx.  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Business/ Employer</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_office_address" value="<?php echo isset($student_details['mother_office_address']) ? $student_details['mother_office_address'] : ''; ?>">
                                                                        <span class="help-block"> Enter mother's job employer/business name  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Office Tel No.</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_phone_office" value="<?php echo isset($student_details['mother_phone_office']) ? $student_details['mother_phone_office'] : ''; ?>">
                                                                        <span class="help-block"> Enter mother's office telephone no.  </span>
                                                                    </div>
                                                                </div>
                                                            </div>                                                          
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">M. Photo</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                    <?php if(isset($student_details['mother_photo']) && ($student_details['mother_photo'] != '')) { ?>
                                                                                        <img class="imagefile_6" id="mother_photo" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/mother_photo/{{ $student_details['mother_photo'] }}" alt="" width="200" height="150" />
                                                                                    <?php } else { ?>
                                                                                        <img class="imagefile_6" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="motherphoto" name="mother_photo"> </span>
                                                                                    <a href="javascript:;" image_to_delete ="mother_photo" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">NOTE!</span> Image size 300x300 preferable. 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">M. Signature</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                    <?php if(isset($student_details['mother_signature']) && ($student_details['mother_signature'] != '')) { ?>
                                                                                        <img class="imagefile_7" id="mother_signature" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/mother_signature/{{ $student_details['mother_signature'] }}" alt="" width="200" height="150" />
                                                                                    <?php } else { ?>
                                                                                        <img class="imagefile_7" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="mothersignature" name="mother_signature"> </span>
                                                                                    <a href="javascript:;" image_to_delete ="mother_signature" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">NOTE!</span> Image size 300x80 preferable. 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="form-section">Guardian's Information</h3>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="col-md-10">
                                                                        <label><input type="checkbox" value="1" textvalue="Set Father As Guardian" <?php if($student_details['who_is_gurdian'] == 1) { ?>checked="checked"<?php } ?> class="checkguardian" name="who_is_gurdian"> Set Father As Guardian </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="col-md-10">
                                                                        <label><input type="checkbox" value="2" textvalue="Set Mother As Guardian" <?php if($student_details['who_is_gurdian'] == 2) { ?>checked="checked"<?php } ?> class="checkguardian" name="who_is_gurdian"> Set Mother As Guardian </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="col-md-10">
                                                                        <label><input type="checkbox" value="3" textvalue="Others" <?php if($student_details['who_is_gurdian'] == 3) { ?>checked="checked"<?php } ?> class="checkguardian" name="who_is_gurdian"> Others </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="guardiantype" value="<?php echo $student_details['who_is_gurdian']; ?>" />
                                                        </div>

                                                        <div class="guardiandiv" style="display:none;">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. Name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_name" value="<?php echo isset($student_details['guardian_name']) ? $student_details['guardian_name'] : ''; ?>">
                                                                            <span class="help-block"> Enter students guardian's name  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. Name (বাংলা)</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_name_bangla" value="<?php echo isset($student_details['guardian_name_bangla']) ? $student_details['guardian_name_bangla'] : ''; ?>">
                                                                            <span class="help-block"> Enter students guardian's name in Bangla  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. NID</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_nid" value="<?php echo isset($student_details['guardian_nid']) ? $student_details['guardian_nid'] : ''; ?>">
                                                                            <span class="help-block"> Enter students guardian's National ID card no  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. Email</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_email" value="<?php echo isset($student_details['guardian_email']) ? $student_details['guardian_email'] : ''; ?>">
                                                                            <span class="help-block"> Enter email address  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. Mobile#</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_mobile" value="<?php echo isset($student_details['guardian_mobile']) ? $student_details['guardian_mobile'] : ''; ?>">
                                                                            <span class="help-block"> Enter guardian's mobile number  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. Occupation</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_occupation" value="<?php echo isset($student_details['guardian_occupation']) ? $student_details['guardian_occupation'] : ''; ?>">
                                                                            <span class="help-block"> Enter guardian's occupation/job type  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. Annual Income</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_income_annual" value="<?php echo isset($student_details['guardian_income_annual']) ? $student_details['guardian_income_annual'] : ''; ?>">
                                                                            <span class="help-block"> Enter guardian's annual salary/approx.  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Business/ Employer</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_office_address" value="<?php echo isset($student_details['guardian_office_address']) ? $student_details['guardian_office_address'] : ''; ?>">
                                                                            <span class="help-block"> Enter guardian's job employer/business name  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Office Tel No.</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_phone_office" value="<?php echo isset($student_details['guardian_phone_office']) ? $student_details['guardian_phone_office'] : ''; ?>">
                                                                            <span class="help-block"> Enter guardian's office telephone no.  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Relationship With Students</label>
                                                                        <div class="col-md-9">
                                                                            <select id="single" class="form-control select2" name="guardian_relationship">
                                                                                @foreach($relationship as $key=>$val)
                                                                                    @if(isset($student_details['guardian_relationship']))
                                                                                        @if($key == $student_details['guardian_relationship'])
                                                                                        {{ !$selected = 'selected="selected"' }}
                                                                                        @else
                                                                                            {{ !$selected = '' }}
                                                                                        @endif
                                                                                    @endif  
                                                                                    <option value="{{ $key }}" <?php echo $selected ?>>{{ $val }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="help-block"> Enter guardian relation with students  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">G. Present Address</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_address" value="<?php echo isset($student_details['guardian_address']) ? $student_details['guardian_address'] : ''; ?>">
                                                                            <span class="help-block"> Enter guardian present address </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label col-md-3">Division</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control guardian_division_present" name="guardian_division_present" guardiandivision="<?php echo isset($student_details['guardian_division_present']) ? $student_details['guardian_division_present'] : ''; ?>">
                                                                                <option value="0">Select Division</option>
                                                                                @foreach($divisionlist as $key=>$val)
                                                                                    @if(isset($student_details['guardian_division_present']) && ($key == $student_details['guardian_division_present']))
                                                                                    {{ !$selected = 'selected="selected"' }}
                                                                                    @else
                                                                                        {{ !$selected = '' }}
                                                                                    @endif
                                                                                    <option value="{{ $key }}" <?php echo $selected ?>>{{ $val }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label col-md-3">District</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control guardian_district_present" name="guardian_district_present" guardiandist="<?php echo isset($student_details['guardian_district_present']) ? $student_details['guardian_district_present'] : ''; ?>">
                                                                                <option value="0">Select District</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Upazila</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control guardian_upazila_present" name="guardian_upazila_present" guardianupazila="<?php echo isset($student_details['guardian_upazila_present']) ? $student_details['guardian_upazila_present'] : ''; ?>"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Post Code</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_postcode_present" value="<?php echo isset($student_details['guardian_postcode_present']) ? $student_details['guardian_postcode_present'] : ''; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">G. Photo</label>
                                                                        <div class="col-md-8">
                                                                            <div class="col-md-12">
                                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                        <?php if(isset($student_details['guardian_photo']) && ($student_details['guardian_photo'] != '')) { ?>
                                                                                            <img class="imagefile_8" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/guardian_photo/{{ $student_details['guardian_photo'] }}" alt="" width="200" height="150" />
                                                                                        <?php } else { ?>
                                                                                            <img class="imagefile_8" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                        <span class="btn default btn-file">
                                                                                        <span class="fileinput-new"> Select image </span>
                                                                                        <span class="fileinput-exists"> Change </span>
                                                                                        <input type="file" id="guardianphoto" name="guardian_photo"> </span>
                                                                                        <a href="javascript:;" class="btn default btn-file red" data-dismiss="fileinput"> Remove </a>
                                                                                </div>
                                                                                <div class="clearfix margin-top-10">
                                                                                    <span class="label label-danger">NOTE!</span> Image size 300x80 preferable. 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: center;">G. Signature</label>
                                                                        <div class="col-md-8">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                    <?php if(isset($student_details['guardian_signature']) && ($student_details['guardian_signature'] != '')) { ?>
                                                                                        <img class="imagefile_9" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/guardian_signature/{{ $student_details['guardian_signature'] }}" alt="" width="200" height="150" />
                                                                                    <?php } else { ?>
                                                                                        <img class="imagefile_9" src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" id="guardiansignature" name="guardian_signature"> </span>
                                                                                <a href="javascript:;" class="btn default btn-file red" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">NOTE!</span> Image size 300x80 preferable. 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="form-section">Emergency Contact Information</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Person Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="emergency_contact_name" value="<?php echo isset($student_details['emergency_contact_name']) ? $student_details['emergency_contact_name'] : ''; ?>">
                                                                        <span class="help-block"> Enter emergency contact person name  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Person Name (বাংলা)</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="emergency_contact_name_bangla" value="<?php echo isset($student_details['emergency_contact_name_bangla']) ? $student_details['emergency_contact_name_bangla'] : ''; ?>">
                                                                        <span class="help-block"> Enter emergency contact person name in Bangla  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Mobile No.</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="emergency_contact_number" value="<?php echo isset($student_details['emergency_contact_number']) ? $student_details['emergency_contact_number'] : ''; ?>">
                                                                        <span class="help-block"> Enter emergency contact person mobile no.  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="form-section">Previous Institutions Information</h3>
                                                        <div class="institute_content">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Institute Name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_name" value="<?php echo isset($student_details['previous_institute_name']) ? $student_details['previous_institute_name'] : ''; ?>">
                                                                            <span class="help-block"> Enter the name of last institute  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Education/Class</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_class" value="<?php echo isset($student_details['previous_institute_class']) ? $student_details['previous_institute_class'] : ''; ?>">
                                                                            <span class="help-block"> Enter last institute education/class name  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Board</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_board" value="<?php echo isset($student_details['previous_institute_board']) ? $student_details['previous_institute_board'] : ''; ?>">
                                                                            <span class="help-block"> Enter the name of education board  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Year</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_year" value="<?php echo isset($student_details['previous_institute_year']) ? $student_details['previous_institute_year'] : ''; ?>">
                                                                            <span class="help-block"> Enter the year of last institute  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Grade</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_grade" value="<?php echo isset($student_details['previous_institute_grade']) ? $student_details['previous_institute_grade'] : ''; ?>">
                                                                            <span class="help-block"> Enter the grade eg. A+, A, A- etc. </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">CGPA</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_cgpa" value="<?php echo isset($student_details['previous_institute_cgpa']) ? $student_details['previous_institute_cgpa'] : ''; ?>">
                                                                            <span class="help-block"> Enter the grade point average eg. 5, 4.95, 4.5 etc. </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--<div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"></label>
                                                                        <div class="col-md-9">
                                                                            <a href="javascript:void(0);" class="btn green addinstitute"> Add One More Institute Information <i class="fa fa-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>-->
                                                        </div>
                                                        <h3 class="form-section">Sibling's Information</h3>
                                                        <div class="siblings_content">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Student ID/Name</label>
                                                                        <div class="col-md-9">
                                                                            <select id="findstudents" class="js-data-example-ajax select2" name="student_siblings_id[]"  multiple="multiple" style="width: 100%; border-color:#c2cad8;">
                                                                                <?php echo $siblings_data; ?>
                                                                            </select>                                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <h3 class="form-section">Allowed Visitors </h3>     
                                                                <div class="visitors_content">
                                                                    <?php if(!empty(json_decode($student_details['visitor_info']))) { 
                                                                        $visitor_info = json_decode($student_details['visitor_info']);
                                                                        $visitor_count = count($visitor_info);
                                                                        $visitorno = 0;
                                                                        foreach($visitor_info as $visitordata) {
                                                                    ?>
                                                                    <div class="visitor_id_{{ $visitorno }}">   
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Name</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_name[]" value="<?php echo $visitordata->name; ?>">
                                                                                        <span class="help-block"> Enter visitor's name  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Name (বাংলা)</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_name_bangla[]" value="<?php echo $visitordata->name_bangla; ?>">
                                                                                        <span class="help-block"> Enter visitor's name in Bangla  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. NID</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_nid[]" value="<?php echo $visitordata->nid; ?>">
                                                                                        <span class="help-block"> Enter visitor's National ID card no  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Email</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_email[]" value="<?php echo $visitordata->email; ?>">
                                                                                        <span class="help-block"> Enter visitor's email address  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Mobile#</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_mobile[]" value="<?php echo $visitordata->mobile; ?>">
                                                                                        <span class="help-block"> Enter visitor's mobile number  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Relationship With Students</label>
                                                                                    <div class="col-md-9">
                                                                                        <select id="single" class="form-control select2" name="visitor_relationship[]">
                                                                                            <option value="0">Select Relationship</option>
                                                                                            @foreach($relationship as $key=>$val)
                                                                                                @if(isset($visitordata->relationship) && ($key == $visitordata->relationship))
                                                                                                {{ !$selected = 'selected="selected"' }}
                                                                                                @else
                                                                                                    {{ !$selected = '' }}
                                                                                                @endif
                                                                                                <option value="{{ $key }}" <?php echo $selected ?>>{{ $val }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <span class="help-block"> Enter guardian relation with students </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                          
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-4" style="text-align: center;">V. Photo</label>
                                                                                    <div class="col-md-8">
                                                                                        <div class="col-md-12">
                                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                                    <?php if(isset($visitordata->photo) && ($visitordata->photo != '')) { ?>
                                                                                                        <img id="visitor_photo" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/visitor_photo/{{ $visitordata->photo }}" alt="" width="200" height="150" />
                                                                                                    <?php } else { ?>
                                                                                                        <img src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                                    <?php } ?>
                                                                                                    <input type="hidden" name="visitor_photo_hidden[]" value="<?php echo isset($visitordata->photo) ? $visitordata->photo : ''; ?>" />
                                                                                                </div>
                                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                                    <span class="btn default btn-file">
                                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                                    <input type="file" id="visitorphoto" name="visitor_photo[]"> </span>
                                                                                                    <a href="javascript:;" image_to_delete ="visitor_photo" class="btn default btn-file red image_remove" data-dismiss="fileinput"> Remove </a>
                                                                                            </div>
                                                                                            <div class="clearfix margin-top-10">
                                                                                                <span class="label label-danger">NOTE!</span> Image size 300x300 preferable. 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>                                                          
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-4" style="text-align: center;">V. Signature</label>
                                                                                    <div class="col-md-8">
                                                                                        <div class="col-md-12">
                                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 98px;">
                                                                                                    <?php if(isset($visitordata->signature) && ($visitordata->signature != '')) { ?>
                                                                                                        <img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/visitor_signature/{{ $visitordata->signature }}" alt="" width="200" height="150" />
                                                                                                    <?php } else { ?>
                                                                                                        <img src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                                    <?php } ?>
                                                                                                    <input type="hidden" name="visitor_signature_hidden" value="<?php echo isset($visitordata->signature) ? $visitordata->signature : ''; ?>" />
                                                                                                </div>
                                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                                    <span class="btn default btn-file">
                                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                                    <input type="file" id="visitorsignature" name="visitor_signature[]"> </span>
                                                                                                    <a href="javascript:;" class="btn default btn-file red" data-dismiss="fileinput"> Remove </a>
                                                                                            </div>
                                                                                            <div class="clearfix margin-top-10">
                                                                                                <span class="label label-danger">NOTE!</span> Image size 300x80 preferable. 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                          
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3"></label>
                                                                                    <div class="col-md-9" style="margin-top: 35px;">
                                                                                        <a href="javascript:void(0);" class="btn red remove_visitor" visitorno="{{ $visitorno }}"> Remove <i class="fa fa-plus"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php $visitorno++; }           
                                                                    } ?>
                                                                    
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Name</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_name[]">
                                                                                        <span class="help-block"> Enter visitor's name  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Name (বাংলা)</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_name_bangla[]">
                                                                                        <span class="help-block"> Enter visitor's name in Bangla  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. NID</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_nid[]">
                                                                                        <span class="help-block"> Enter visitor's National ID card no  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Email</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_email[]">
                                                                                        <span class="help-block"> Enter visitor's email address  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">V. Mobile#</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" class="form-control" name="visitor_mobile[]">
                                                                                        <span class="help-block"> Enter visitor's mobile number  </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Relationship With Students</label>
                                                                                    <div class="col-md-9">
                                                                                        <select id="single" class="form-control select2" name="visitor_relationship[]">
                                                                                            <option value="0">Select Relationship</option>
                                                                                            @foreach($relationship as $key=>$val)
                                                                                                <option value="{{ $key }}">{{ $val }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <span class="help-block"> Enter guardian relation with students </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-4" style="text-align: center;">V. Photo</label>
                                                                                    <div class="col-md-8">
                                                                                        <div class="col-md-12">
                                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                                </div>
                                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                                    <span class="btn default btn-file">
                                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                                    <input type="file" id="visitorphoto" name="visitor_photo[]"> </span>
                                                                                                    <a href="javascript:;" class="btn default btn-file red" data-dismiss="fileinput"> Remove </a>
                                                                                            </div>
                                                                                            <div class="clearfix margin-top-10">
                                                                                                <span class="label label-danger">NOTE!</span> Image size 300x300 prFeferable. 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>                                                          
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-4" style="text-align: center;">V. Signature</label>
                                                                                    <div class="col-md-8">
                                                                                        <div class="col-md-12">
                                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                                </div>
                                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                                    <span class="btn default btn-file">
                                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                                    <input type="file" id="visitorsignature" name="visitor_signature[]"> </span>
                                                                                                    <a href="javascript:;" class="btn default btn-file red" data-dismiss="fileinput"> Remove </a>
                                                                                            </div>
                                                                                            <div class="clearfix margin-top-10">
                                                                                                <span class="label label-danger">NOTE!</span> Image size 300x80 preferable. 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                          
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3"></label>
                                                                                    <div class="col-md-9" style="margin-top: 35px;">
                                                                                        <a href="javascript:void(0);" class="btn green addvisitors"> Add One More Visitors Information <i class="fa fa-plus"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>  
                                                                        </div>
                                                                    
                                                                </div>
                                                            

                                                    </div>
                                                </div>


                                                <div class="tab-pane" id="tab3">
                                                    <h3 class="form-section">Guardian Login Information</h3>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control guardianloginemail" name="guardian_login_email" value="<?php echo isset($student_details['guardian_login_email']) ? $student_details['guardian_login_email'] : ''; ?>" />
                                                            <span class="help-block"> Provide email address for guardians</span>
                                                        </div>
                                                        <div class="col-md-8 popover fade right in" id="confirmation" style="top:280px; left:604px; display: none;">
                                                            <button type="button" class="close" data-dismiss="alert" style="margin: 10px 10px;"></button>
                                                            <div class="arrow" style="top: 34%;"></div>
                                                            <h3 class="popover-title">Guardian Exist?</h3>
                                                            <div class="popover-content">
                                                                <div class="guardianexist" style="margin-bottom: 10px;"></div>
                                                                <div class="controlitem" style="display:none;">
                                                                    <a data-apply="confirmation" class="btn btn-sm btn-success confirmemail" href="#" target="_self"><i class="glyphicon glyphicon-ok"></i> Yes</a>
                                                                    <a data-dismiss="confirmation" class="btn btn-sm btn-danger confirmdiscard"><i class="glyphicon glyphicon-remove"></i> No</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Password</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="guardian_login_password" id="submit_guardian_password" value="<?php echo isset($student_details['guardian_login_password_text']) ? $student_details['guardian_login_password_text'] : ''; ?>" />
                                                            <span class="help-block"> Provide a strong password. </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Confirm Password</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="rpassword" value="<?php echo isset($student_details['guardian_login_password_text']) ? $student_details['guardian_login_password_text'] : ''; ?>" />
                                                            <span class="help-block"> Confirm guardians password </span>
                                                        </div>
                                                    </div>

                                                    <h3 class="form-section">Student Login Information</h3>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="student_email" value="<?php echo isset($student_details['student_email']) ? $student_details['student_email'] : ''; ?>" />
                                                            <span class="help-block"> Provide email address for student</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Password</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="student_password" id="submit_student_password" value="<?php echo isset($student_details['student_password_text']) ? $student_details['student_password_text'] : ''; ?>" />
                                                            <span class="help-block"> Provide a strong password. </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Confirm Password</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="studentpassword" value="<?php echo isset($student_details['student_password_text']) ? $student_details['student_password_text'] : ''; ?>" />
                                                            <span class="help-block"> Confirm student password </span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="tab4">
                                                    <h3 class="block">Confirm your account</h3>
                                                    <h4 class="form-section">Admission Information</h4>
                                                    <!--<div class="form-group">
                                                        <label class="control-label col-md-3">Username:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="username"> </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Image:</label>
                                                        <div class="col-md-4">

                                                            <img id="studentimage" src="#" alt="your image" width="125px" height="98px" />
                                                        </div>
                                                    </div>-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Student Name:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_name"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Student Name (বাংলা):</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_name_bangla"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Class:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="academic_class"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Shift/Session:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="academic_shift"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Section:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="academic_section"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Department:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="academic_department"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Roll Number:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="academic_rollnumber"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Date Of Admission:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="date_of_admission"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Academic Session:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="academic_session"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Gender:</label>
                                                                <div class="col-md-7 static-gender">
                                                                    <p class="form-control-static" data-display="student_gender"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Students Bio Data</h4>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Date Of Birth:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_dob"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Place Of Birth:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_birth_place"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Blood Group:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_blood_group"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Birth Certificate No:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_birthcertificateno"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Religion:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_religion"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Nationality:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_nationality"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mobile No:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_phone"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Home Cell:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_telephone"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Does the child have any physical handicaps? </label>
                                                                <div class="col-md-7 static-physically-disabled">
                                                                    <p class="form-control-static" data-display="is_physically_disabled"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Medical Problem: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_medical_problem"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Students Photo:</label>
                                                                <div class="col-md-7">
                                                                    <img id="student_photo" class="showimage_1" src="" alt="Student Image" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Birth Certificate Scan Photo:</label>
                                                                <div class="col-md-7">
                                                                    <img id="student_birthcertificatephoto" class="showimage_2" src="" alt="Birth Certificate Scan Photo" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Students Signature:</label>
                                                                <div class="col-md-7">
                                                                    <img id="student_signature" class="showimage_3" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Student Present Address Information</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Present Address:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_present_address"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Present Address (বাংলা):</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_present_address_bangla"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="single" class="control-label col-md-5" style="text-align:left">Division: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static divisionpresent" data-display=""></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="single" class="control-label col-md-5" style="text-align:left">District: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_district_present"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Upazila: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_upazila_present"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Post Code: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_postcode_present"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Student Permanent Address Information</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Permanent Address:</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_permanent_address"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Permanent Address (বাংলা):</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_permanent_address_bangla"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="single" class="control-label col-md-5" style="text-align:left">Division: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static divisionpermanent" data-display=""></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="single" class="control-label col-md-5" style="text-align:left">District: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_district_permanent"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Upazila: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_upazila_permanent"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Post Code: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_postcode_permanent"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Father's Information</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Name: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_name"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Name (বাংলা): </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_name_bangla"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's NID: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_nid"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Email: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_email"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Mobile: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_mobile"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Occupation: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_occupation"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Annual Income: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_income_annual"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Business/ Employer: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_office_address"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Office Tel No.</label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="father_phone_office"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Photo:</label>
                                                                <div class="col-md-7">
                                                                    <img id="father_photo" class="showimage_4" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Signature:</label>
                                                                <div class="col-md-7">
                                                                    <img id="father_signature" class="showimage_5" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Mother's Information</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Name: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_name"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Name (বাংলা): </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_name_bangla"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's NID: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_nid"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Email: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_email"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Mobile: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_mobile"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Occupation: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_occupation"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Annual Income: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_income_annual"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Business/ Employer: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_office_address"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Office Tel No: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_phone_office"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Photo:</label>
                                                                <div class="col-md-7">
                                                                    <img id="mother_photo" class="showimage_6" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Signature:</label>
                                                                <div class="col-md-7">
                                                                    <img id="mother_signature" class="showimage_7" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Guardian's Information</h4>
                                                    <div class="guardian_info" guardiantype="<?php echo $student_details['who_is_gurdian']; ?>">
                                                        <div class="parental_guardian">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-1" style="text-align:right"><i class="fa fa-check"></i></label>
                                                                        <div class="col-md-7 parental_guardian_title">
                                                                            <p class="form-control-static"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="other_guardian" style="display:none;">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. Name: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_name"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. Name (বাংলা): </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_name_bangla"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. NID: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_nid"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. Email: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_email"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. Mobile: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_mobile"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. Occupation: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_occupation"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. Annual Income: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_income_annual"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Business/ Employer: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_office_address"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Office Tel No: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_phone_office"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Relationship With Students: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_relationship"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">G. Present Address: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_address"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Division: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static divisionguardian" data-display=""></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">District: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_district_present"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Upazila: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_upazila_present"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Guardian's Photo:</label>
                                                                        <div class="col-md-7">
                                                                            <img id="guardian_photo" class="showimage_8" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Guardian's Signature:</label>
                                                                        <div class="col-md-7">
                                                                            <img id="guardian_signature" class="showimage_9" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Emergency Contact Information</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Person Name: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="emergency_contact_name"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Person Name (বাংলা): </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="emergency_contact_name_bangla"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mobile No: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="emergency_contact_number"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Previous Institutions Information</h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th> Institute Name </th>
                                                                    <th> Education/Class </th>
                                                                    <th> Board </th>
                                                                    <th> Year </th>
                                                                    <th> Grade </th>
                                                                    <th> CGPA </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><span> 1 </span></td>
                                                                    <td><span class="form-control-static" data-display="previous_institute_name"></span></td>
                                                                    <td><span class="form-control-static" data-display="previous_institute_class"></span></td>
                                                                    <td><span class="form-control-static" data-display="previous_institute_board"></span></td>
                                                                    <td><span class="form-control-static" data-display="previous_institute_year"></span></td>
                                                                    <td><span class="form-control-static" data-display="previous_institute_grade"></span></td>
                                                                    <td><span class="form-control-static" data-display="previous_institute_cgpa"></span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    <h4 class="form-section">Sibling's Information</h4>
                                                    <div class="siblings_information"></div>
                                                    
                                                    <h4 class="form-section">Guardian Credentials (For Guardian Panel Login)</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Email: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="guardian_login_email"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Password: </label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static guardian_login_password" data-display="guardian_login_password"> </p>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button type="button" class="btn green btn-sm showguardianpass">Show Password</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <h4 class="form-section">Student Credentials (For Student Panel Login)</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Email: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="student_email"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Password: </label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static student_login_password" data-display="student_password"> </p>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button type="button" class="btn green btn-sm showstudentpass">Show Password</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn default button-previous">
                                                        <i class="fa fa-angle-left"></i> Back </a>
                                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <!--<a href="javascript:;" class="btn green button-submit"> Submit
                                                        <i class="fa fa-check"></i>
                                                    </a>-->
                                                    <button type="submit" class="btn green submitform">{{  Lang::get('general.submit') }}</button>
                                                    <input type="hidden" name="student_row_id" value="{{ $student_details['student_row_id'] }}" />
                                                    <input type="hidden" name="student_old_photo" value="{{ $student_details['student_photo'] }}" />
                                                    <input type="hidden" name="student_old_birthcertificatephoto" value="{{ $student_details['student_birthcertificatephoto'] }}" />
                                                    <input type="hidden" name="student_details_row_id" value="{{ $student_details['student_details_row_id'] }}" />
                                                    <input type="hidden" name="student_academic_details_row_id" value="{{ $student_details['student_academic_details_row_id'] }}" />
                                                    <input type="hidden" name="guardian_row_id" value="{{ $student_details['guardian_row_id'] }}" />
                                                    <input type="hidden" name="guardian_login_email_past" value="<?php echo isset($student_details['guardian_login_email']) ? $student_details['guardian_login_email'] : ''; ?>" />
                                                    <input type="hidden" name="guardian_login_row_id" value="<?php echo isset($student_details['guardian_login_row_id']) ? $student_details['guardian_login_row_id'] : ''; ?>" />
                                                    <input type="hidden" id="student_id" name="student_id" value="{{ $student_details['student_id'] }}" />
                                                    <input type="hidden" id="student_row_id" name="student_row_id" value="{{ $student_details['student_row_id'] }}" />

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
     </div>
     
    @section('page_js')

    <link href="{{ asset('/public')}}/metronic/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/public')}}/metronic/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/public')}}/metronic/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/public')}}/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/public')}}/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/pages/scripts/form-wizard.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/pages/scripts/form-validation.js" type="text/javascript"></script>
    @endsection
    
    <script type="text/javascript">
        $(document).ready(function() {

            $(".rollnumber").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                     // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                         // let it happen, don't do anything
                         return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            }); 
            
            $('.permanentaspresent').change(function(){
                if($(".permanentaspresent").is(':checked')) {
                    $("input[name=student_permanent_address]").val('');
                    $("input[name=student_permanent_address_bangla]").val('');
                    $(".student_division_permanent").val('0');
                    $(".student_district_permanent").val('0');
                    $(".student_upazila_permanent").val('0');
                    $("input[name=student_postcode_permanent]").val('');
                    $(".permanentaddress_content").hide();
                } else {
                    $(".permanentaddress_content").show();
                }   
            });

            
            $('.classes').change(function(){
                $('.sections').empty();
                $('.shift').empty();
                $('.department').empty();
                var classid = $(this).val();
                
                if(classid == 9 || classid == 10 || classid == 11 || classid == 12) {
                    $(".department option[value='1']").remove();
                    $(".department").append('<option value="2">Science</option>');
                    $(".department").append('<option value="3">Arts</option>');
                    $(".department").append('<option value="4">Commerce</option>');
                } else {
                    $(".department option[value='2']").remove();
                    $(".department option[value='3']").remove();
                    $(".department option[value='4']").remove();
                    $(".department").append('<option value="1">General</option>');
                }
                $.ajax({
                    url: "{{ url('getSections/') }}"+ '/'+ classid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.sections').append(data);
                    }
                });
                $.ajax({
                    url: "{{ url('getShift/') }}"+ '/'+ classid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.shift').append(data);
                    }
                });
            });
            
            //var defaultcheck = $("input[type=checkbox]").val();
            //$('.parental_guardian_title p').append('Set Father As Guardian');
            //$('.other_guardian').hide();

            var max_fields      = 10;
            var siblings_content   = $(".siblings_content");
            var institute_content  = $(".institute_content");
            var visitors_content = $(".visitors_content");
            var addvisitors = $('.addvisitors');
            var addsiblings = $(".addsiblings");
            var addinstitute = $(".addinstitute");
            

            var x = 1;
            $(addsiblings).click(function(e){
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    //$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                    $(siblings_content).append('<div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">Siblings Student ID</label> <div class="col-md-9"> <input type="text" class="form-control" name="student_siblings_id[]"> <span class="help-block"> Enter student ID number </span></div></div></div>'+
                                        '<div class="col-md-6"> <div class="form-group"><div class="col-md-12 text-center"><a href="javascript:void(0);" class="btn btn-primary red remove_field"> <i class="fa fa-times"></i> Remove </a></div></div></div></div>'
                    );
                }
            });

            $(siblings_content).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault();
                var parentclass = $(this).parent();
                $(this).closest('.row').remove(); x--;
            });
            
            var v = 1;
            $(addvisitors).click(function(e){
                //alert('CALLS');
                e.preventDefault();
                if(v < max_fields){ //max input box allowed
                    v++;
                    $(visitors_content).append('<div class="visitor_appendcontent portlet light bordered"><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">V. Name</label><div class="col-md-9"><input type="text" class="form-control" name="visitor_name[]"><span class="help-block"> Enter visitor\'s name </span></div></div></div><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">V. Name (বাংলা)</label><div class="col-md-9"><input type="text" class="form-control" name="visitor_name_bangla[]"><span class="help-block"> Enter visitor\'s name in Bangla </span></div></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">V. NID</label><div class="col-md-9"><input type="text" class="form-control" name="visitor_nid[]"><span class="help-block"> Enter visitor\'s National ID card no </span></div></div></div><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">V. Email</label><div class="col-md-9"><input type="text" class="form-control" name="visitor_email[]"><span class="help-block"> Enter visitor\'s email address </span></div></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">V. Mobile#</label><div class="col-md-9"><input type="text" class="form-control" name="visitor_mobile[]"><span class="help-block"> Enter visitor\'s mobile number </span></div></div></div><div class="col-md-6"> <div class="form-group"> <label class="control-label col-md-3">Relationship With Students</label> <div class="col-md-9"> <select id="single" class="form-control select2" name="visitor_relationship[]"> <option value="0">Select Relationship</option> @foreach($relationship as $key=>$val)<option value="{{ $key }}">{{ $val }}</option>@endforeach </select> <span class="help-block"> Enter guardian relation with students </span> </div> </div> </div></div><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-4" style="text-align: center;">V. Photo</label><div class="col-md-8"><div class="col-md-12"><div class="fileinput fileinput-new" data-provides="fileinput"><div class="fileinput-new thumbnail" style="width: 125px; height: 98px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></div><div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div><span class="btn default btn-file"><span class="fileinput-new"> Select image </span><span class="fileinput-exists"> Change </span><input type="file" id="visitorphoto" name="visitor_photo[]"> </span><a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a></div><div class="clearfix margin-top-10"><span class="label label-danger">NOTE!</span> Image size 300x300 preferable. </div></div></div></div></div><div class="col-md-6"><div class="form-group"><label class="control-label col-md-4" style="text-align: center;">V. Signature</label><div class="col-md-8"><div class="col-md-12"><div class="fileinput fileinput-new" data-provides="fileinput"><div class="fileinput-new thumbnail" style="width: 125px; height: 98px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></div><div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div><span class="btn default btn-file"><span class="fileinput-new"> Select image </span><span class="fileinput-exists"> Change </span><input type="file" id="visitorsignature" name="visitor_signature[]"> </span><a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a></div><div class="clearfix margin-top-10"><span class="label label-danger">NOTE!</span> Image size 300x80 preferable. </div></div></div></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3"></label><div class="col-md-9" style="margin-top: 35px;"><a href="javascript:void(0);" class="btn green addvisitors"> Add One More Visitors Information <i class="fa fa-plus"></i></a></div></div></div><div class="col-md-6"> <div class="form-group"><div class="col-md-12 text-center" style="margin-top:35px;"><a href="javascript:void(0);" class="btn btn-primary red remove_field"> <i class="fa fa-times"></i> Remove </a></div></div></div></div></div></div>');
                }
            });

            $(visitors_content).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault();
                var parentclass = $(this).parent();
                $(this).closest('.visitor_appendcontent').remove(); v--;
            });

            $(addinstitute).click(function(e){
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    var icontent = '<div class="institute_appendcontent"><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">Institute Name</label> <div class="col-md-9"> <input type="text" class="form-control" name="previous_institute_name[]"> <span class="help-block"> Enter the name of last institute </span> </div> </div> </div> <!--/span--> <div class="col-md-6"> <div class="form-group"> <label class="control-label col-md-3">Education/Class</label> <div class="col-md-9"> <input type="text" class="form-control" name="previous_institute_class[]"> <span class="help-block"> Enter last institute education/class name </span> </div> </div> </div> </div> <div class="row"> <div class="col-md-6"> <div class="form-group"> <label class="control-label col-md-3">Board</label> <div class="col-md-9"> <input type="text" class="form-control" name=""> <span class="help-block"> Enter the name of education board </span> </div> </div> </div> <!--/span--> <div class="col-md-6"> <div class="form-group"> <label class="control-label col-md-3">Year</label> <div class="col-md-9"> <input type="text" class="form-control" name=""> <span class="help-block"> Enter the year of last institute </span> </div> </div> </div> </div> <div class="row"> <div class="col-md-6"> <div class="form-group"> <label class="control-label col-md-3">Grade</label> <div class="col-md-9"> <input type="text" class="form-control" name=""> <span class="help-block"> Enter the grade eg. A+,A,A- etc. </span> </div> </div> </div> <!--/span--> <div class="col-md-6"> <div class="form-group"> <label class="control-label col-md-3">CGPA/Obtained Marks</label> <div class="col-md-9"> <input type="text" class="form-control" name=""> <span class="help-block"> Enter the grade point average eg. 5,4.95 etc. </span></div></div></div><div class="col-md-6"> <div class="form-group"><div class="col-md-12 text-center"><a href="javascript:void(0);" class="btn btn-primary red remove_field"> <i class="fa fa-times"></i> Remove </a></div></div></div></div></div>';
                    $(institute_content).append(icontent);
                }
            });

            $(institute_content).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault();
                var parentclass = $(this).parent();
                $(this).closest('.institute_appendcontent').remove(); x--;
            })

            $(".checkguardian").click(function() {
                $('.parental_guardian_title p').empty();
                $(".checkguardian").attr("checked", false); //uncheck all checkboxes
                $(".checkguardian").parent("span").removeClass("checked");
                //console.log($(this));
                $(this).attr('checked','checked');
                $(this).prop('checked',true).uniform('refresh');
                var checkedval = $(this).val();
                var textvalue = $(this).attr('textvalue');
                $('.parental_guardian_title p').append(textvalue);
                if(checkedval == 3){
                    $(".guardiandiv").show();
                    $(".other_guardian").show();
                } else {
                    $(".guardiandiv").hide();
                    $(".other_guardian").hide();
                }              
            });

            function readURL(input) {
                var targetdiv = input.name;
                console.log(targetdiv);
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#'+targetdiv).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#'+targetdiv).attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image');
                }
            }

            $("#imgInp, #bcInp, #studentsignature, #fatherphoto, #fathersignature, #motherphoto, #mothersignature, #guardianphoto, #guardiansignature").on( "change", function() {
                readURL(this);
            });


           
            $(".division_present").change(function(e){
                $('.divisionpresent').empty();
                $('.district_present').empty();
                var divisionid = $(this).val();
                var divisiontext = $(".division_present option:selected").text();
                $.ajax({
                    url: "{{ url('getDistricts/') }}"+ '/'+ divisionid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.district_present').append(data);
                    }
                });
                $('.divisionpresent').append(divisiontext);
            }); 

            $(".district_present").change(function(e){
                $('.upazila_present').empty();
                var districtid = $(this).val();
                $.ajax({
                    url: "{{ url('getUpazilas/') }}"+ '/'+ districtid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.upazila_present').append(data);
                    }
                });
            });

            $(".division_permanent").change(function(e){
                $('.divisionpermanent').empty();
                $('.district_permanent').empty();
                var divisionid = $(this).val();
                var divisiontext = $(".division_permanent option:selected").text();
                $.ajax({
                    url: "{{ url('getDistricts/') }}"+ '/'+ divisionid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.district_permanent').append(data);
                    }
                });
                $('.divisionpermanent').append(divisiontext);
            });

            $(".district_permanent").change(function(e){
                $('.upazila_permanent').empty();
                var districtid = $(this).val();
                $.ajax({
                    url: "{{ url('getUpazilas/') }}"+ '/'+ districtid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.upazila_permanent').append(data);
                    }
                });
            });

             $(".image_remove").on("click",function(e){ //user click on remove image

                if( ! confirm("Are you sure to delete ?"))
                    return false;
                var student_row_id =  $('#student_row_id') . val();
                var student_id = $('#student_id') . val();
                var image_to_delete = $(this) . attr('image_to_delete'); 
                var image_show = $(this) . attr('image_to_delete');
                $("#" + image_show) . remove();               
                //$("#student_photo").remove();              

                $.ajax({
                    url: "{{ url('schoolAdmin/removePhoto/') }}/"+ image_to_delete + '/' +  student_row_id +'/' + student_id,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.image_show').append(data);
                    }
                });
            });


            $(".guardian_division_present").change(function(e){
                $('.divisionguardian').empty();
                $('.guardian_district_present').empty();
                var divisionid = $(this).val();
                var divisiontext = $(".guardian_division_present option:selected").text();
                $.ajax({
                    url: "{{ url('getDistricts/') }}"+ '/'+ divisionid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.guardian_district_present').append(data);
                    }
                });
                $('.divisionguardian').append(divisiontext);
                
            });

            $(".guardian_district_present").change(function(e){
                $('.guardian_upazila_present').empty();
                var districtid = $(this).val();
                $.ajax({
                    url: "{{ url('getUpazilas/') }}"+ '/'+ districtid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.guardian_upazila_present').append(data);
                    }
                });
            });
            
            var gendercheckedvalue = $('input[name=student_gender]:checked').attr('gender');
            $('.static-gender p').append(gendercheckedvalue);

            $("input:radio[name=student_gender]").click(function() {
                $('.static-gender p').empty();
                var gender = $("input[name='student_gender']:checked").attr('gender');
                $('.static-gender p').append(gender);
            });
            
            var guardiantext = $('input[name=who_is_gurdian]:checked').attr('textvalue');
            $('.parental_guardian_title p').append(guardiantext);
            
            $("input:checkbox[name=who_is_gurdian]").click(function() {
                $('.parental_guardian_title p').empty();
                var guardiantext = $('input[name=who_is_gurdian]:checked').attr('textvalue');
                $('.parental_guardian_title p').append(guardiantext);
            });
            
            var physicallydisabled = $('input[name=is_physically_disabled]:checked').attr('physically_disabled');
            $('.static-physically-disabled p').append(physicallydisabled);
            
            $("input:radio[name=is_physically_disabled]").click(function() {
                $('.static-physically-disabled p').empty();
                var physically_disabled = $("input[name='is_physically_disabled']:checked").attr('physically_disabled');
                $('.static-physically-disabled p').append(physically_disabled);
            });
            
            $("#submit_guardian_password").change(function() {
                $('.guardian_login_password').empty();
                var guardianpassword = $(this).val();
                var starpassword  = guardianpassword.replace(/./g, '*');
                if((guardianpassword.length) > 0) {
                    $('.guardian_login_password').append(starpassword);
                }
            });
            
            $(".showguardianpass").click(function() {
                $('.guardian_login_password').empty();
                var guardianpassword = $("#submit_guardian_password").val();
                $('.guardian_login_password').append(guardianpassword);
            });
            
            $("#submit_student_password").change(function() {
                $('.student_login_password').empty();
                var studentpassword = $(this).val();
                var starpassword  = studentpassword.replace(/./g, '*');
                if((studentpassword.length) > 0) {
                    $('.student_login_password').append(starpassword);
                }
            });
            
            $(".showstudentpass").click(function() {
                $('.student_login_password').empty();
                var studentpassword = $("#submit_student_password").val();
                $('.student_login_password').append(studentpassword);
            });
            
            $(".remove_visitor").click(function() {
                if( ! confirm("Are you sure to delete ?"))
                    return false;
                var visitorno = $(this).attr('visitorno');
                //alert(visitorno);
                $('.visitor_id_'+visitorno).empty();
            });
            
            $(".js-data-example-ajax").select2({
                ajax: {
                    url: "{{ url('schoolAdmin/getStudentIdInfo') }}",
                    dataType: 'json',
                    delay: 500,
                    data: function (params) {
                      return {
                        q: params.term, // search term
                        page: params.page
                      };
                    },
                    
                },
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 4
            });
            
            $('.js-data-example-ajax').change(function() {
                $('.siblings_information').empty();
                var studentid = $('.js-data-example-ajax').val();
                $.ajax({
                    url: "{{ url('schoolAdmin/getSiblingDetails') }}"+ '/'+ studentid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.siblings_information').append(data);
                    }
                });
            }); 
            
            function validateEmail(sEmail) {
                var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                if (filter.test(sEmail)) {
                    return true;
                }
                else {
                    return false;
                }
            }
            
            $(".guardianloginemail").change(function() {
                $('.guardianexist').empty();
                var emailaddress = $(this).val();
                if (validateEmail(emailaddress)) {
                    $.ajax({
                        url: "{{ url('getGuardianByEmail/') }}"+ '/'+ emailaddress,
                        type: "GET",
                        dataType: "html",
                        success: function(data){
                            var obj = jQuery.parseJSON(data);
                            //console.log(obj.guardianpass);                            
                            if(obj.response != 'true') {
                                $('#confirmation').show();
                                $('.controlitem').show();
                                $('.guardianexist').append(obj.response);
                                $("input[name=guardian_login_password]").prop('disabled', true);
                                $("input[name=rpassword]").prop('disabled', true);
                            }
                            
                        }
                    });
                }
                
            });
            
            $('.close, .confirmemail').click(function() {
                $('#confirmation').hide();
            });
            
            $('.confirmdiscard').click(function() {
                $('.guardianloginemail').val('');
                $('#confirmation').hide();
                $("input[name=guardian_login_password]").prop('disabled', false);
                $("input[name=rpassword]").prop('disabled', false);
            });
            
            $(window).on("load", function() {

                var classid = $('.classes').val();
                var current_shift = $('.classes').attr('current_shift');
                var current_section = $('.classes').attr('current_section');
                var current_department = $('.classes').attr('current_department');
                
                var presentdivision = $('.division_present').attr('presentdivision');
                var presentdist = $('.district_present').attr('presentdist');
                var presentupazila = $('.upazila_present').attr('presentupazila');
                
                var permanentdivision = $('.division_permanent').attr('permanentdivision');
                var permanentdist = $('.district_permanent').attr('permanentdist');
                var permanentupazila = $('.upazila_permanent').attr('permanentupazila');
                
                //var studentimagesrc = $('.studentimage').attr('src');
                //$('#student_photo').attr('src', studentimagesrc);
                //var imagecount = 1;
        
                //$(".imagefile_"+imagecount).each(function() {
                for(imagecount = 1; imagecount < 10; imagecount++) {
                    var imagesrc = $(".imagefile_"+imagecount).attr('src');
                    $(".showimage_"+imagecount).attr('src', imagesrc);
                };
                
                var studentid = $('.js-data-example-ajax').val();
                $.ajax({
                    url: "{{ url('schoolAdmin/getSiblingDetails') }}"+ '/'+ studentid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.siblings_information').append(data);
                    }
                });
                
                
                if(classid == 9 || classid == 10 || classid == 11 || classid == 12) {
                    $(".department option[value='1']").remove();
                } else {
                    $(".department option[value='2']").remove();
                    $(".department option[value='3']").remove();
                    $(".department option[value='4']").remove();
                }
                $.ajax({
                    url: "{{ url('getSections/') }}"+ '/'+ classid + '/' +current_section,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.sections').append(data);
                    }
                });
                $.ajax({
                    url: "{{ url('getShift/') }}"+ '/'+ classid + '/' +current_shift,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.shift').append(data);
                    }
                });
                

                var divisiontext = $(".division_present option:selected").text();
                $.ajax({
                    url: "{{ url('getDistricts/') }}"+ '/'+ presentdivision + '/' + presentdist,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        //alert(data);  
                        $('.district_present').append(data);
                    }
                });
                $('.divisionpresent').append(divisiontext);
                
                $.ajax({
                    url: "{{ url('getUpazilas/') }}"+ '/'+ presentdist + '/' + presentupazila,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.upazila_present').append(data);
                    }
                });
                
                $.ajax({
                    url: "{{ url('getDistricts/') }}"+ '/'+ permanentdivision + '/' + permanentdist,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.district_permanent').append(data);
                    }
                });
                $('.divisionpermanent').append(divisiontext);
                
                $.ajax({
                    url: "{{ url('getUpazilas/') }}"+ '/'+ permanentdist + '/' + permanentupazila,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.upazila_permanent').append(data);
                    }
                });
                
                var guardiantype = $("input[name=guardiantype]").val();
                if(guardiantype == 3) {
                    $('.guardiandiv').show();
                    var guardiandivision    = $('.guardian_division_present').attr('guardiandivision');
                    var guardiandist        = $('.guardian_district_present').attr('guardiandist');
                    var guardianupazila     = $('.guardian_upazila_present').attr('guardianupazila');
                    
                    var divisiontext = $(".guardian_division_present option:selected").text();
                    $.ajax({
                        url: "{{ url('getDistricts/') }}"+ '/'+ guardiandivision + '/' + guardiandist,
                        type: "GET",
                        dataType: "html",
                        success: function(data){
                            $('.guardian_district_present').append(data);
                        }
                    });
                    $('.guardian_district_present').append(divisiontext);
                    
                    $.ajax({
                        url: "{{ url('getUpazilas/') }}"+ '/'+ guardiandist + '/' + guardianupazila,
                        type: "GET",
                        dataType: "html",
                        success: function(data){
                            $('.guardian_upazila_present').append(data);
                        }
                    });
                    
                }
    
                var guardiantypeid = $('.guardian_info').attr('guardiantype');
                if(guardiantypeid == 3) {
                    $('.other_guardian').show();
                } else {
                    $('.other_guardian').hide();
                }

            });
            
            
        });
    </script>
@endsection