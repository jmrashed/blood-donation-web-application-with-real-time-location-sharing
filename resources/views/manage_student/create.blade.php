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
                                    <span class="caption-subject font-red bold uppercase">{{  Lang::get('manage_student.add_new_student -') }}
                                            <span class="step-title">>{{  Lang::get('manage_student.step_1_of_4') }}  </span>
                                        </span>
                                </div>                                
                            </div>
                            <div class="portlet-body form">
                                <form class="form-horizontal" id="submit_form" action="{{ url('/') }}/schoolAdmin/manageStudent/savestudent" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <ul class="nav nav-pills nav-justified steps">
                                                <li>
                                                    <a href="#tab1" data-toggle="tab" class="step">
                                                        <span class="number"> 1 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i> {{  Lang::get('manage_student.account_setup') }} </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                        <span class="number"> 2 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i> {{  Lang::get('manage_student.profile_setup') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab" class="step active">
                                                        <span class="number"> 3 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i>{{  Lang::get('manage_student.manage_credentials') }} </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab" class="step">
                                                        <span class="number"> 4 </span>
                                                        <span class="desc">
                                                                <i class="fa fa-check"></i> {{  Lang::get('manage_student.confirm') }} </span>
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
                                                        <h3 class="form-section"> {{  Lang::get('manage_student.admission_information') }} </h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.student_name') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_name" required>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.student_name_bangla') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_name_bangla" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.class') }}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control classes" name="academic_class" required>
                                                                            <option value="0">Select Class</option>
                                                                            @foreach($allclasses as $class)
                                                                                <option value="{{ $class->class_row_id }} ">{{ $class->class_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.shift_session') }}</label>

                                                                    <div class="col-md-9">
                                                                        <select class="form-control shift" name="academic_shift" required></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.section') }}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control sections" name="academic_section">
                                                                            <!--<option value="1">Rose</option>
                                                                            <option value="2">Tulip</option>
                                                                            <option value="3">Merigold</option>-->
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.group') }}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control department" name="academic_department">
                                                                            <option value="1">General</option>
                                                                            <!--<option value="2" disabled>Science</option>
                                                                            <option value="3" disabled>Commerce</option>
                                                                            <option value="4" disabled>Arts</option>-->
                                                                        </select>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.roll_number') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control rollnumber" name="academic_rollnumber">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.date_of_admission') }}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group input-medium  date date-picker" data-date-format="yyyy-mm-dd">
                                                                            <input id="datepicker" type="text" class="form-control" readonly name="date_of_admission">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                        <!-- /input-group -->
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.gender') }}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="radio-list">
                                                                            <label class="radio-inline">
                                                                                <input id="radio-1" type="radio" name="student_gender" gender="Boy" value="1" />{{Lang::get('manage_student.boy') }} </label>
                                                                            <label class="radio-inline">
                                                                                <input id="radio-2" type="radio" name="student_gender" gender="Girl" value="2" checked/> {{  Lang::get('manage_student.girl') }} </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab2">
                                                    <div class="form-body">
                                                        <h3 class="form-section">{{  Lang::get('manage_student.students_bio_data') }}</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.date_of_birth') }}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                                                            <input id="datepicker" type="text" class="form-control" readonly name="student_dob">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.place_of_birth') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_birth_place">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.blood_group') }}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" name="student_blood_group">
                                                                            @foreach($blood_group as $key=>$val)
                                                                                <option value="{{ $key }}">{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.birth_certificate_no') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_birthcertificateno">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.religion') }}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" name="student_religion">
                                                                            @foreach($religion as $key=>$val)
                                                                                <option value="{{ $key }}">{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.nationality') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_nationality" value="Bangladeshi">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mobile_no') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_phone">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.home_cell') }}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_telephone">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-8">{{  Lang::get('manage_student.handicaps') }}</label>
                                                                    <div class="col-md-4">
                                                                        <div class="radio-list">
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="is_physically_disabled" physically_disabled="Yes" value="1" /> {{  Lang::get('manage_student.Yes')}} </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="is_physically_disabled" physically_disabled="No" value="0" checked/> {{  Lang::get('manage_student.No')}}  </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.medical_problem')}} </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_medical_problem">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">{{  Lang::get('manage_student.students_photo')}}</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> {{  Lang::get('manage_student.select_image')}} </span>
                                                                                    <span class="fileinput-exists"> {{  Lang::get('manage_student.change')}} </span>
                                                                                    <input type="file" id="imgInp" name="student_photo"> </span>
                                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{  Lang::get('manage_student.remove')}} </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">{{  Lang::get('manage_student.note')}}</span> {{  Lang::get('manage_student.image_size')}} 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;"></label>
                                                                    <div class="col-md-8">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                            </div>
                                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                            <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> {{  Lang::get('manage_student.select_image')}}</span>
                                                                                    <span class="fileinput-exists"> {{  Lang::get('manage_student.change')}} </span>
                                                                                    <input type="file" id="bcInp" name="student_birthcertificatephoto"> </span>
                                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{  Lang::get('manage_student.remove')}} </a>
                                                                        </div>
                                                                        <div class="clearfix margin-top-10">
                                                                            <span class="label label-danger">{{  Lang::get('manage_student.note')}}</span> {{  Lang::get('manage_student.image_size')}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">{{  Lang::get('manage_student.students_signature')}}</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> {{  Lang::get('manage_student.select_image')}} </span>
                                                                                    <span class="fileinput-exists"> {{  Lang::get('manage_student.change')}} </span>
                                                                                    <input type="file" id="studentsignature" name="student_signature"> </span>
                                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{  Lang::get('manage_student.remove')}} </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">{{  Lang::get('manage_student.note')}}</span> {{  Lang::get('manage_student.sign_image_size')}} 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>             
                                                        </div>

                                                        <h3 class="form-section">{{  Lang::get('manage_student.student_present_address_information')}}</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.present_address')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_present_address">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.present_address_bangla')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_present_address_bangla">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">{{  Lang::get('manage_student.division')}}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control division_present" name="student_division_present">
                                                                            @foreach($divisionlist as $key=>$val)
                                                                                <option value="{{ $key }}">{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">{{  Lang::get('manage_student.district')}}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control district_present" name="student_district_present">
                                                                        
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.upazila')}}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control upazila_present" name="student_upazila_present">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.post_code')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_postcode_present">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="form-section">{{  Lang::get('manage_student.student_permanent_address_information')}}<span style="text-align:right; font-size:12px; float:right; margin-right:20px; margin-top: 8px;"><label><input class="permanentaspresent" name="permanentaspresent" type="checkbox" value="1" /> {{  Lang::get('manage_student.same_as_present_address')}}</label></span></h3>
                                                        <div class="permanentaddress_content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.permanent_address')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_permanent_address">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.permanent_address_bangla')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_permanent_address_bangla">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">{{  Lang::get('manage_student.division')}}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control division_permanent" name="student_division_permanent">
                                                                            
                                                                            @foreach($divisionlist as $key=>$val)
                                                                                <option value="{{ $key }}">{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="single" class="control-label col-md-3">{{  Lang::get('manage_student.district')}}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control district_permanent" name="student_district_permanent"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.upazila')}}</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control upazila_permanent" name="student_upazila_permanent"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.post_code')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="student_postcode_permanent">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <h3 class="form-section">{{  Lang::get('manage_student.fathers_information')}}
                                                        </h3>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.fathers_name')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_name">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.father_name_bangla')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_name_bangla">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.father_nid')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_nid">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.father_email')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_email">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mobile_no')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_mobile">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.father_occupation')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_occupation">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.father_income_annual')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_income_annual">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.business_or_employer')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_office_address">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.phone_office')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="father_phone_office">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">{{  Lang::get('manage_student.father_photo')}}</label>
                                                                    <div class="col-md-8">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                            </div>
                                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                            <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> {{  Lang::get('manage_student.select_image')}} </span>
                                                                                    <span class="fileinput-exists"> {{  Lang::get('manage_student.change')}} </span>
                                                                                    <input type="file" id="fatherphoto" name="father_photo"> </span>
                                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{  Lang::get('manage_student.remove')}}</a>
                                                                        </div>
                                                                        <div class="clearfix margin-top-10">
                                                                            <span class="label label-danger">{{  Lang::get('manage_student.note')}}</span> {{  Lang::get('manage_student.image_size')}} 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">{{  Lang::get('manage_student.father_signature')}}</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> {{  Lang::get('manage_student.select_image')}} </span>
                                                                                    <span class="fileinput-exists"> {{  Lang::get('manage_student.change')}} </span>
                                                                                    <input type="file" id="fathersignature" name="father_signature"> </span>
                                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{  Lang::get('manage_student.remove')}} </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">{{  Lang::get('manage_student.note')}}</span> {{  Lang::get('manage_student.sign_image_size')}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>             
                                                        </div>


                                                        <h3 class="form-section">{{  Lang::get('manage_student.mother_information')}}</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mother_name')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_name">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mother_name_bangla')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_name_bangla">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mother_NID')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_nid">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mother_email')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_email">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mobile_no')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_mobile">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mother_occupation')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_occupation">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.mother_income_annual')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_income_annual">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.business_or_employer')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_office_address">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{  Lang::get('manage_student.phone_office')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="mother_phone_office">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>                          
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">{{  Lang::get('manage_student.mother_photo')}}</label>
                                                                    <div class="col-md-8">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                            </div>
                                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                            <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> {{  Lang::get('manage_student.select_image')}}</span>
                                                                                    <span class="fileinput-exists"> {{  Lang::get('manage_student.change')}} </span>
                                                                                    <input type="file" id="motherphoto" name="mother_photo"> </span>
                                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{  Lang::get('manage_student.remove')}} </a>
                                                                        </div>
                                                                        <div class="clearfix margin-top-10">
                                                                            <span class="label label-danger">{{  Lang::get('manage_student.note')}}</span> {{  Lang::get('manage_student.image_size')}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4" style="text-align: center;">{{  Lang::get('manage_student.mother_signature')}}</label>
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new">{{  Lang::get('manage_student.select_image')}}</span>
                                                                                    <span class="fileinput-exists">{{  Lang::get('manage_student.change')}}</span>
                                                                                    <input type="file" id="mothersignature" name="mother_signature"> </span>
                                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{  Lang::get('manage_student.remove')}} </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">{{  Lang::get('manage_student.note')}}</span> 

                                                                                {{ Lang::get('manage_student.image_size')}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>             
                                                        </div>

                                                        <h3 class="form-section">{{ Lang::get('manage_student.guardian_information')}}</h3>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="col-md-10">
                                                                        <label><input type="checkbox" value="1" textvalue="Set Father As Guardian" checked="checked" class="checkguardian" name="who_is_gurdian"> {{ Lang::get('manage_student.father_as_guardian')}} </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="col-md-10">
                                                                        <label><input type="checkbox" value="2" textvalue="Set Mother As Guardian" class="checkguardian" name="who_is_gurdian"> {{ Lang::get('manage_student.mother_as_guardian')}} </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="col-md-10">
                                                                        <label><input type="checkbox" value="3" textvalue="Others" class="checkguardian" name="who_is_gurdian"> {{ Lang::get('manage_student.others')}} </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="guardiandiv" style="display:none;">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.guardian_name')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_name">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.guardian_name_bangla')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_name_bangla">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.guardian_nid')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_nid">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.guardian_email')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_email">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.mobile_no')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_mobile">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.guardian_occupation')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_occupation">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.guardian_income_annual')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_income_annual">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.business_or_employer')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_office_address">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.phone_office')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_phone_office">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.relationship_with_students')}}</label>
                                                                        <div class="col-md-9">
                                                                            <select id="single" class="form-control select2" name="guardian_relationship">
                                                                                <option value="0">{{ Lang::get('manage_student.select_relationship')}}</option>
                                                                                @foreach($relationship as $key=>$val)
                                                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.guardian_present_address')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_address">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label col-md-3">{{ Lang::get('manage_student.division')}}</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control guardian_division_present" name="guardian_division_present">
                                                                               
                                                                                @foreach($divisionlist as $key=>$val)
                                                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label col-md-3">{{ Lang::get('manage_student.district')}}</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control guardian_district_present" name="guardian_district_present"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.upazila')}}</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control guardian_upazila_present" name="guardian_upazila_present"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.post_code')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guardian_postcode_present">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: center;">{{ Lang::get('manage_student.guardian_photo')}}</label>
                                                                        <div class="col-md-8">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                <span class="btn default btn-file">
                                                                                        <span class="fileinput-new"> {{ Lang::get('manage_student.select_image')}} </span>
                                                                                        <span class="fileinput-exists"> {{ Lang::get('manage_student.change')}} </span>
                                                                                        <input type="file" id="guardianphoto" name="guardian_photo"> </span>
                                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ Lang::get('manage_student.remove')}} </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">{{Lang::get('manage_student.note')}}</span> {{Lang::get('manage_student.image_size')}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: center;">{{ Lang::get('manage_student.guardian_signature')}}</label>
                                                                        <div class="col-md-8">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> {{ Lang::get('manage_student.select_image')}}</span>
                                                                                    <span class="fileinput-exists"> {{ Lang::get('manage_student.change')}} </span>
                                                                                    <input type="file" id="guardiansignature" name="guardian_signature"> </span>
                                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ Lang::get('manage_student.remove')}} </a>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">{{ Lang::get('manage_student.note')}}!</span> {{ Lang::get('manage_student.sign_image_size')}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <h3 class="form-section">{{ Lang::get('manage_student.emergency_contact_information')}}</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{ Lang::get('manage_student.person_name')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="emergency_contact_name">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{ Lang::get('manage_student.person_name_bangla')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="emergency_contact_name_bangla">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">{{ Lang::get('manage_student.mobile_no')}}</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="emergency_contact_number">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="form-section">{{ Lang::get('manage_student.previous_institutions_information')}}</h3>
                                                        <div class="institute_content">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.institute_name')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_name">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.education_or_class')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_class">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.board')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_board">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.year')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_year">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.grade')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_grade">
                                                                            <span class="help-block">{{ Lang::get('manage_student.enter_the_grade_example')}}  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.CGPA')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="previous_institute_cgpa">
                                                                            <span class="help-block"> {{ Lang::get('manage_student.enter_the_grade_point_average_example')}} </span>
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
                                                        <h3 class="form-section">{{ Lang::get('manage_student.sibling_information')}}</h3>
                                                        <div class="siblings_content">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.student_ID_or_name')}}</label>
                                                                        <div class="col-md-9">
                                                                            <select id="findstudents" class="js-data-example-ajax select2" name="student_siblings_id[]"  multiple="multiple" style="width: 100%; border-color:#c2cad8;"></select>                                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <h3 class="form-section">{{ Lang::get('manage_student.allowed_visitors')}}</h3>
                                                        <div class="visitors_content">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.visitors_name')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="visitor_name[]">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.visitor_name_bangla')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="visitor_name_bangla[]">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.visitor_NID')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="visitor_nid[]">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.visitor_email')}}
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="visitor_email[]">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.mobile_no')}}</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="visitor_mobile[]">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.relationship_with_students')}}</label>
                                                                        <div class="col-md-9">
                                                                            <select id="single" class="form-control select2" name="visitor_relationship[]">
                                                                                <option value="0">{{ Lang::get('manage_student.select_relationship')}}</option>

                                                                                @foreach($relationship as $key=>$val)
                                                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: center;">{{ Lang::get('manage_student.visitor_photo')}}</label>
                                                                        <div class="col-md-8">
                                                                            <div class="col-md-12">
                                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                    <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    </div>
                                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                        <span class="btn default btn-file">
                                                                                        <span class="fileinput-new"> {{ Lang::get('manage_student.select_image')}} </span>
                                                                                        <span class="fileinput-exists"> {{ Lang::get('manage_student.change')}} </span>
                                                                                        <input type="file" id="visitorphoto" name="visitor_photo[]"> </span>
                                                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ Lang::get('manage_student.remove')}} </a>
                                                                                </div>
                                                                                <div class="clearfix margin-top-10">
                                                                                    <span class="label label-danger">{{ Lang::get('manage_student.note')}}</span> {{ Lang::get('manage_student.image_size')}} 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>                                                          
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: center;">{{ Lang::get('manage_student.visitor_signature')}} </label>
                                                                        <div class="col-md-8">
                                                                            <div class="col-md-12">
                                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                    <div class="fileinput-new thumbnail" style="width: 125px; height: 98px;">
                                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                                    </div>
                                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 125px; max-height: 98px;"> </div>
                                                                                        <span class="btn default btn-file">
                                                                                        <span class="fileinput-new"> {{ Lang::get('manage_student.select_image')}} </span>
                                                                                        <span class="fileinput-exists"> {{ Lang::get('manage_student.change')}} </span>
                                                                                        <input type="file" id="visitorsignature" name="visitor_signature[]"> </span>
                                                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ Lang::get('manage_student.remove')}} </a>
                                                                                </div>
                                                                                <div class="clearfix margin-top-10">
                                                                                    <span class="label label-danger">{{ Lang::get('manage_student.note')}}</span> {{ Lang::get('manage_student.sign_image_size')}} 
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
                                                                            <a href="javascript:void(0);" class="btn green addvisitors">{{ Lang::get('manage_student.add_one_more_visitors')}} <i class="fa fa-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </div>


                                                <div class="tab-pane" id="tab3">
                                                    <h3 class="form-section">{{ Lang::get('manage_student.guardian_login_information')}}</h3>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.email')}}</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control guardianloginemail" name="guardian_login_email" />
                                                            
                                                        </div>
                                                        <!--<div class="col-md-4 guardianexist"></div>-->
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
                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.password')}}</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="guardian_login_password" id="submit_guardian_password" value="123456" />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.confirm_password')}}</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="rpassword" id="retype_guardian_password" value="123456" />
                                                            
                                                        </div>
                                                    </div>

                                                    <h3 class="form-section">{{ Lang::get('manage_student.student_login_information')}}</h3>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.email')}}</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="student_email" />
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.password')}}</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="student_password" id="submit_student_password" value="123456" />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">{{ Lang::get('manage_student.confirm_password')}}</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" name="studentpassword" value="123456" />
                                                            
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
                                                                    <img id="student_photo" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Birth Certificate Scan Photo:</label>
                                                                <div class="col-md-7">
                                                                    <img id="student_birthcertificatephoto" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Students Signature:</label>
                                                                <div class="col-md-7">
                                                                    <img id="student_signature" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
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
                                                                    <img id="father_photo" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Father's Signature:</label>
                                                                <div class="col-md-7">
                                                                    <img id="father_signature" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
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
                                                                    <p class="form-control-static" data-display="mother_email"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Occupation: </label>
                                                                <div class="col-md-7">
                                                                    <p class="form-control-static" data-display="mother_email"> </p>
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
                                                                    <img id="mother_photo" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" style="text-align:left">Mother's Signature:</label>
                                                                <div class="col-md-7">
                                                                    <img id="mother_signature" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section">Guardian's Information</h4>
                                                    <div class="guardian_info">
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
                                                        <div class="other_guardian">
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
                                                                        <label class="control-label col-md-5" style="text-align:left">Post Code: </label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" data-display="guardian_postcode_present"> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Guardian's Photo:</label>
                                                                        <div class="col-md-7">
                                                                            <img id="guardian_photo" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="100px" height="98px" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5" style="text-align:left">Guardian's Signature:</label>
                                                                        <div class="col-md-7">
                                                                            <img id="guardian_signature" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="your image" width="200px" height="98px" />
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
                                                    <a href="javascript:;" class="btn default button-previous button_back">
                                                        <i class="fa fa-angle-left"></i> Back </a>
                                                    <a href="javascript:;" class="btn btn-outline green button-next button_continue"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <!--<a href="javascript:;" class="btn green button-submit"> Submit
                                                        <i class="fa fa-check"></i>
                                                    </a>-->
                                                    <button type="submit" class="btn green submitform">{{  Lang::get('general.submit') }}</button>
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
    <!--<script src="{{ asset('/public')}}/metronic/pages/scripts/components-select2.min.js" type="text/javascript"></script>-->
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
                    $(".permanentaddress_content").hide();
                    $("input[name=student_permanent_address]").val('');
                    $("input[name=student_permanent_address_bangla]").val('');
                    $(".student_division_permanent").val('');
                    $(".student_district_permanent").val('');
                    $(".student_upazila_permanent").val('');
                    $(".student_postcode_permanent").val('');
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
            var siblings_content         = $(".siblings_content");
            var institute_content         = $(".institute_content");
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
                    $("input[name=guardian_name]").val('');
                    $("input[name=guardian_name_bangla]").val('');
                    $("input[name=guardian_nid]").val('');
                    $("input[name=guardian_email]").val('');
                    $("input[name=guardian_mobile]").val('');
                    $("input[name=guardian_occupation]").val('');
                    $("input[name=guardian_income_annual]").val('');
                    $("input[name=guardian_office_address]").val('');
                    $("input[name=guardian_phone_office]").val('');
                    $(".guardian_relationship").val('');
                    $("input[name=guardian_address]").val('');
                    $(".guardian_division_present").val('');
                    $(".guardian_district_present").val('');
                    $(".guardian_upazila_present").val('');
                }              
            });

            function readURL(input) {
                var targetdiv = input.name;
                //console.log(input.files[0]);
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

            $("#imgInp, #bcInp, #studentsignature, #fatherphoto, #fathersignature, #motherphoto, #mothersignature, #guardianphoto, #guardiansignature").change(function(){
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
            
            /*$('#multiple').select2.change(function() {
             var getsearchval = $(this).val;    
              ajax: {
                url: "{{ url('schoolAdmin/getStudentIdInfo/') }}"+ '/'+ getsearchval,
                results : function (data) {
                  console.log(data);    
                  return {
                    results: data.items
                  };
                }
              }
            });*/

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
            
            var guardiantypeid = $('.guardian_info').attr('guardiantype');
            if(guardiantypeid == 3) {
                $('.other_guardian').show();
            } else {
                $('.other_guardian').hide();
            }

            //$('.button_continue').click(function() {
            //  continuestep++;
            //  alert(continuestep);    
            //});
            
            //var values = $("input[name='visitor_name[]']").map(function(){return $(this).val();}).get();
            //alert(values);
        });
    </script>
@endsection