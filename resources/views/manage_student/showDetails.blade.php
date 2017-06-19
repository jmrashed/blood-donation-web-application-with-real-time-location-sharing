@extends('backend.school_admin.layout_app')

@section('content')

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 ">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Student Details - <?php echo isset($student_details['student_name']) ? $student_details['student_name'] : ''; ?> </div>
				<div class="tools">
					<div class="btn-group">
						<a class="btn btn-sm red dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="{{ url('/') }}/schoolAdmin/manageStudent/generatepdf/{{ $student_details['student_row_id'] }}/viewpdf" target="_blank">
									<i class="fa fa-pencil"></i> View As PDF </a>
							</li>
							<li>
								<a href="{{ url('/') }}/schoolAdmin/manageStudent/generatepdf/{{ $student_details['student_row_id'] }}/downloadpdf">
									<i class="fa fa-trash-o"></i> Download </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form class="form-horizontal" role="form">
				<div class="form-body">
					<h3 class="form-section">Admission Information</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Student Name:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_name']) ? $student_details['student_name'] : ''; ?></p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Student Name (বাংলা):</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_name_bangla']) ? $student_details['student_name_bangla'] : ''; ?></p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Class:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['class_name']) ? $student_details['class_name'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Shift/Session:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['shift_title']) ? $student_details['shift_title'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Section:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['section_name']) ? $student_details['section_name'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Department:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo getDepartmentTitle($student_details['current_department']); ?></p>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<div class="row">                                                        
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Roll Number:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['current_rollnumber']) ? $student_details['current_rollnumber'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Date Of Admission:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo ($student_details['date_of_admission'] != '0000-00-00') ? $student_details['date_of_admission'] : ' - '; ?></p>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<div class="row">                                                        
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Academic Session:</label>
								<div class="col-md-7">
									<p class="form-control-static"> <?php echo isset($student_details['academic_session_title']) ? $student_details['academic_session_title'] : ''; ?> </p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Gender:</label>
								<div class="col-md-7 static-gender">
									<p class="form-control-static"><?php echo ($student_details['student_gender'] == '1') ? 'Boy' : 'Girl'; ?></p>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					
					<h3 class="form-section">Student Bio Data</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Date Of Birth:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo ($student_details['student_dob'] != '0000-00-00') ? $student_details['student_dob'] : ' - '; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Place Of Birth:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_birth_place']) ? $student_details['student_birth_place'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Blood Group:</label>
								<div class="col-md-7">
									<p class="form-control-static">
									<?php
										$bloodgroup = config('site_config.blood_group');
										$bloodgrp = isset($student_details['student_blood_group']) ? $student_details['student_blood_group'] : 0;
										echo $bloodgrp = $bloodgroup[$bloodgrp];
									?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Birth Certificate No:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_birthcertificateno']) ? $student_details['student_birthcertificateno'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Religion:</label>
								<div class="col-md-7">
									<p class="form-control-static">
									<?php
										$religion = config('site_config.religion');
										$stdrel = isset($student_details['student_religion']) ? $student_details['student_religion'] : 0;
										echo $stdrel = $religion[$stdrel];
									?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Nationality:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_nationality']) ? $student_details['student_nationality'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mobile:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_phone']) ? $student_details['student_phone'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Home Cell:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_telephone']) ? $student_details['student_telephone'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Does the child have any physical handicaps?:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo ($student_details['is_physically_disabled'] == 1) ? 'Yes' : 'No'; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Medical Problem:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_medical_problem']) ? $student_details['student_medical_problem'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Stundets Photo:</label>
								<div class="col-md-7">
									<p class="form-control-static">
										<?php if(isset($student_details['student_photo']) && ($student_details['student_photo'] != '')) { ?>
											<img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/student_photo/{{ $student_details['student_photo'] }}" alt="" width="100" height="98" />
										<?php } else { ?>
											<img src="http://www.placehold.it/100x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Birth Certificate Scan Photo:</label>
								<div class="col-md-7">
									<p class="form-control-static">
										<?php if(isset($student_details['student_birthcertificatephoto']) && ($student_details['student_birthcertificatephoto'] != '')) { ?>
											<img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/student_birthcertificate/{{ $student_details['student_birthcertificatephoto'] }}" alt="" width="100" height="98" />
										<?php } else { ?>
											<img src="http://www.placehold.it/100x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Stundets Signature:</label>
								<div class="col-md-7">
									<p class="form-control-static">
										<?php if(isset($student_details['student_signature']) && ($student_details['student_signature'] != '')) { ?>
											<img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/student_signature/{{ $student_details['student_signature'] }}" alt="" width="200" height="98" />
										<?php } else { ?>
											<img src="http://www.placehold.it/200x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<h3 class="form-section">Student Present Address Information</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Present Address:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_present_address']) ? $student_details['student_present_address'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Present Address (বাংলা):</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['student_present_address_bangla']) ? $student_details['student_present_address_bangla'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Division:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['presentdivision']) ? $student_details['presentdivision'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">District:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['presentdistrict']) ? $student_details['presentdistrict'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Upazila:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['presentupazila']) ? $student_details['presentupazila'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Post Code:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['presentpostcode']) ? $student_details['presentpostcode'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<h3 class="form-section">Student Permanent Address Information <?php if($student_details['permanentaspresent'] == 1) { ?><span style="text-align:right; font-size:12px; float:right; margin-right:20px; margin-top: 8px;"><label><input class="permanentaspresent" name="permanentaspresent" type="checkbox" value="1" <?php if($student_details['permanentaspresent'] == 1) { ?>checked="checked" disabled="disabled"<?php } ?> /> Same As Present Address</label></span><?php } ?></h3>
					<div class="permanentaddress_content" <?php if($student_details['permanentaspresent'] == 1) { ?>style="display:none;"<?php } else { ?>style="display:block;"<?php } ?>>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-5" style="text-align:left">Permanent Address:</label>
									<div class="col-md-7">
										<p class="form-control-static"><?php echo isset($student_details['student_permanent_address']) ? $student_details['student_permanent_address'] : ''; ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-5" style="text-align:left">Permanent Address (বাংলা):</label>
									<div class="col-md-7">
										<p class="form-control-static"><?php echo isset($student_details['student_permanent_address_bangla']) ? $student_details['student_permanent_address_bangla'] : ''; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-5" style="text-align:left">Division:</label>
									<div class="col-md-7">
										<p class="form-control-static"><?php echo isset($student_details['permanentdivision']) ? $student_details['permanentdivision'] : ''; ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-5" style="text-align:left">District:</label>
									<div class="col-md-7">
										<p class="form-control-static"><?php echo isset($student_details['permanentdistrict']) ? $student_details['permanentdistrict'] : ''; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-5" style="text-align:left">Upazila:</label>
									<div class="col-md-7">
										<p class="form-control-static"><?php echo isset($student_details['permanentupazila']) ? $student_details['permanentupazila'] : ''; ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-5" style="text-align:left">Post Code:</label>
									<div class="col-md-7">
										<p class="form-control-static"><?php echo isset($student_details['permanentpostcode']) ? $student_details['permanentpostcode'] : ''; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h3 class="form-section">Father's Information</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Name:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_name']) ? $student_details['father_name'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Name (বাংলা):</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_name_bangla']) ? $student_details['father_name_bangla'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's NID:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_nid']) ? $student_details['father_nid'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Email:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_email']) ? $student_details['father_email'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Mobile:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_mobile']) ? $student_details['father_mobile'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Occupation:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_occupation']) ? $student_details['father_occupation'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Annual Income:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_income_annual']) ? $student_details['father_income_annual'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Business/ Employer:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_office_address']) ? $student_details['father_office_address'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Office Tel No:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['father_phone_office']) ? $student_details['father_phone_office'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Photo:</label>
								<div class="col-md-7">
									<p class="form-control-static">
										<?php if(isset($student_details['father_photo']) && ($student_details['father_photo'] != '')) { ?>
											<img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/father_photo/{{ $student_details['father_photo'] }}" alt="" width="100" height="98" />
										<?php } else { ?>
											<img src="http://www.placehold.it/100x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Father's Signature:</label>
								<div class="col-md-7">
									<p class="form-control-static">
										<?php if(isset($student_details['father_signature']) && ($student_details['father_signature'] != '')) { ?>
											<img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/father_signature/{{ $student_details['father_signature'] }}" alt="" width="200" height="98" />
										<?php } else { ?>
											<img src="http://www.placehold.it/200x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
					</div>
					
					<h3 class="form-section">Mother's Information</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Name:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_name']) ? $student_details['mother_name'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Name (বাংলা):</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_name_bangla']) ? $student_details['mother_name_bangla'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's NID:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_nid']) ? $student_details['mother_nid'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Email:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_email']) ? $student_details['mother_email'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Mobile:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_mobile']) ? $student_details['mother_mobile'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Occupation:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_occupation']) ? $student_details['mother_occupation'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Annual Income:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_income_annual']) ? $student_details['mother_income_annual'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Business/ Employer:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_office_address']) ? $student_details['mother_office_address'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Office Tel No:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['mother_phone_office']) ? $student_details['mother_phone_office'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Photo:</label>
								<div class="col-md-7">
									<p class="form-control-static">
										<?php if(isset($student_details['mother_photo']) && ($student_details['mother_photo'] != '')) { ?>
											<img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/mother_photo/{{ $student_details['mother_photo'] }}" alt="" width="100" height="98" />
										<?php } else { ?>
											<img src="http://www.placehold.it/100x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mother's Signature:</label>
								<div class="col-md-7">
									<p class="form-control-static">
										<?php if(isset($student_details['mother_signature']) && ($student_details['mother_signature'] != '')) { ?>
											<img src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/mother_signature/{{ $student_details['mother_signature'] }}" alt="" width="200" height="98" />
										<?php } else { ?>
											<img src="http://www.placehold.it/200x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
					</div>
					
					<h3 class="form-section">Guardian's Information</h3>
					<div class="guardian_info" guardiantype="<?php echo $student_details['who_is_gurdian']; ?>">
						<div class="parental_guardian">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Guardian Type: </label>
										<div class="col-md-7 parental_guardian_title">
											<p class="form-control-static">
												@if($student_details['who_is_gurdian'] == 1)
													{{ 'Father' }}
												@elseif($student_details['who_is_gurdian'] == 2)
													{{ 'Mother' }}
												@else {{ 'Other' }}
												@endif
											</p>
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
											<p class="form-control-static"><?php echo isset($student_details['guardian_name']) ? $student_details['guardian_name'] : ''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">G. Name (বাংলা): </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_name_bangla']) ? $student_details['guardian_name_bangla'] : ''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">G. NID: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_nid']) ? $student_details['guardian_nid'] : ''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">G. Email: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_email']) ? $student_details['guardian_email'] : ''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">G. Mobile: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_mobile']) ? $student_details['guardian_mobile'] : ''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">G. Occupation: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_occupation']) ? $student_details['guardian_occupation'] : ''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">G. Annual Income: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_income_annual']) ? $student_details['guardian_income_annual'] : ''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Business/ Employer: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_office_address']) ? $student_details['guardian_office_address'] : ''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Office Tel No: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_phone_office']) ? $student_details['guardian_phone_office'] : ''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Relationship With Students: </label>
										<div class="col-md-7">
											<p class="form-control-static">
											<?php 
												$relationship = config('site_config.relationship');
												$guardianrel = isset($student_details['guardian_relationship']) ? $student_details['guardian_relationship'] : 0;
												echo $guardianrel = $relationship[$guardianrel];
											?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">G. Present Address: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_address']) ? $student_details['guardian_address'] : ''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Division: </label>
										<div class="col-md-7">
											<p class="form-control-static divisionguardian"><?php echo isset($student_details['guardiandivision']) ? $student_details['guardiandivision'] : ''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">District: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardiandistrict']) ? $student_details['guardiandistrict'] : ''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Upazila: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardianupazila']) ? $student_details['guardianupazila'] : ''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Post Code: </label>
										<div class="col-md-7">
											<p class="form-control-static"><?php echo isset($student_details['guardian_postcode_present']) ? $student_details['guardian_postcode_present'] : ''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Guardian's Photo:</label>
										<div class="col-md-7">
											<?php if(isset($student_details['guardian_photo']) && ($student_details['guardian_photo'] != '')) { ?>
												<img class="imagefile_8" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/guardian_photo/{{ $student_details['guardian_photo'] }}" alt="" width="100" height="98" />
											<?php } else { ?>
												<img class="imagefile_8" src="http://www.placehold.it/100x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5" style="text-align:left">Guardian's Signature:</label>
										<div class="col-md-7">
											<?php if(isset($student_details['guardian_signature']) && ($student_details['guardian_signature'] != '')) { ?>
												<img class="imagefile_9" src="{{ url('/') }}/public/images/student_info/{{ $student_details['studentid'] }}/guardian_signature/{{ $student_details['guardian_signature'] }}" alt="" width="200" height="98" />
											<?php } else { ?>
												<img class="imagefile_9" src="http://www.placehold.it/200x98/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
											<?php } ?>
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
								<label class="control-label col-md-5" style="text-align:left">Person Name:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['emergency_contact_name']) ? $student_details['emergency_contact_name'] : ''; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Person Name (বাংলা):</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['emergency_contact_name_bangla']) ? $student_details['emergency_contact_name_bangla'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-5" style="text-align:left">Mobile No:</label>
								<div class="col-md-7">
									<p class="form-control-static"><?php echo isset($student_details['emergency_contact_number']) ? $student_details['emergency_contact_number'] : ''; ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<h3 class="form-section">Previous Institutions Information</h3>
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
									<td><?php echo isset($student_details['previous_institute_name'])  ? $student_details['previous_institute_name']  : ''; ?></td>
									<td><?php echo isset($student_details['previous_institute_class']) ? $student_details['previous_institute_class'] : ''; ?></td>
									<td><?php echo isset($student_details['previous_institute_board']) ? $student_details['previous_institute_board'] : ''; ?></td>
									<td><?php echo isset($student_details['previous_institute_year'])  ? $student_details['previous_institute_year']  : ''; ?></td>
									<td><?php echo isset($student_details['previous_institute_grade']) ? $student_details['previous_institute_grade'] : ''; ?></td>
									<td><?php echo isset($student_details['previous_institute_cgpa'])  ? $student_details['previous_institute_cgpa']  : ''; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<h3 class="form-section">Sibling's Information</h3>
					<div class="siblings_information" siblingsid="<?php echo isset($student_details['siblingids'])  ? $student_details['siblingids']  : ''; ?>"></div>
					
					<h3 class="form-section">Visitor's Information</h3>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th> # </th>
									<th> Name </th>
									<th> Image </th>
									<th> Email </th>
									<th> Mobile </th>
									<th> Relationship </th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$visitor_info = json_decode($student_details['visitor_info']);
								$visitorcount = 1;
								foreach($visitor_info as $vdata) {
									if($vdata->photo != '') {
										$visitorimageurl = asset('public/images/student_info/'.$student_details['studentid'].'/visitor_photo/thumbs/'.$vdata->photo);
									} else {
										$visitorimageurl = asset('public/images/common/default_student_photo.png');
									}
									$vrelationship = config('site_config.relationship');
									$vrelationship = $vrelationship[$vdata->relationship];
									
							?>
								<tr>
									<td><?php echo $visitorcount; ?></td>
									<td><?php echo isset($vdata->name)  ? $vdata->name : ''; ?></td>
									<td><img src="<?php echo $visitorimageurl; ?>" width="35px" height="35px" /></td>
									<td><?php echo isset($vdata->email) ? $vdata->email : ''; ?></td>
									<td><?php echo isset($vdata->mobile)? $vdata->mobile : ''; ?></td>
									<td><?php echo isset($vrelationship)  ? $vrelationship : ''; ?></td>
								</tr>
							<?php $visitorcount++; } ?>	
							</tbody>
						</table>
					</div>
					
				</div>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="" class="btn green">
										<i class="fa fa-pencil"></i> Edit</button>
									<button type="button" class="btn default">Cancel</button>
								</div>
							</div>
						</div>
						<div class="col-md-6"> </div>
					</div>
				</div>
			</form>
			<!-- END FORM-->
			</div>
		</div>
	</div>
</div>		

<script type="text/javascript">
	$(document).ready(function() {
		var studentid = $('.siblings_information').attr('siblingsid');
		$.ajax({
			url: "{{ url('schoolAdmin/getSiblingDetails') }}"+ '/'+ studentid,
			type: "GET",
			dataType: "html",
			success: function(data){
				$('.siblings_information').append(data);
			}
		});
		
		var guardiantype = $('.guardian_info').attr('guardiantype');
		if(guardiantype == 3) {
			$('.other_guardian').show();
		} else {
			$('.other_guardian').hide();
		}
	});
</script>

@endsection
