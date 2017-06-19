@extends('backend.school_admin.layout_app')

@section('content')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('/public')}}/metronic/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/public')}}/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
	
    <div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-dark">
						<i class="icon-settings font-dark"></i>
						<span class="caption-subject bold uppercase"> Student List</span>
					</div>
				</div>
				<div class="portlet-body">
                    <form role="form" method="post" action="{{ url('/') }}/schoolAdmin/manageStudent" >
                        {!! csrf_field() !!}
                        <input type="hidden" name="section_row_id" value="{{ isset($section_info->section_row_id) ? $section_info->section_row_id : 0 }}" >
                        <div class="form-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Class</label>
                                            <div class="col-md-9">
                                                <select class="form-control classes" name="academic_class" current_shift="<?php echo $current_shift ; ?>"  current_section="<?php echo $current_section; ?>" current_department="<?php echo $current_department; ?>" required>
                                                    <option value="0">Select Class</option>
														@foreach($allclasses as $class)
														@if($class->class_row_id == $current_class)
															{{ !$selected = 'selected="selected"' }}
														@else
															{{ !$selected = '' }}
														@endif
	                                                     <option value="{{ $class->class_row_id }}" <?php echo $selected?>>{{ $class->class_name }}
                                                     </option>
                                                      @endforeach
                                                </select>
                                                <span class="help-block"> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Shift/Session</label>
                                            <div class="col-md-9">
                                                <select class="form-control shift" name="academic_shift" required></select>
                                                <span class="help-block">  </span>
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
                                            <span class="help-block"> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Group</label>
                                        <div class="col-md-9">
	                                        <select class="form-control department" name="academic_department">
	                                            <option value="1" <?php if($current_department == 1) { ?>selected="selected"<?php } ?>>General</option>
	                                            <option value="2" <?php if($current_department == 2) { ?>selected="selected"<?php } ?>>Science</option>
	                                            <option value="3" <?php if($current_department == 3) { ?>selected="selected"<?php } ?>>Arts</option>
	                                            <option value="4" <?php if($current_department == 4) { ?>selected="selected"<?php } ?>>Commerce</option>
	                                        </select>
	                                        <span class="help-block"> </span>
	                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" style="margin-top: 20px;">
                        	<div class="col-md-6">
                        		<div class="btn-group">
		                            <button type="submit" class="btn blue hidden_submit_btn" @if(! $current_class) disabled="disabled" @endif style="margin: 0px 450px 5px 0px;">Get Student Lists</button>
		                        </div>
	                        </div>
	                       
                        </div>
                    </form>
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-12">
								@if($show_students_list == 1)
									<span class="pull-right" style="font-size:14px;color:green; padding: 9px 9px 0px 0px">Total Student : {{ $total_student }}</span>
									
									<div class="pull-right" style="font-size:14px;color:green; padding: 9px 5px 0px 0px">
										@if(count($student_list))
										<a href="{{ url('/') }}/schoolAdmin/manageStudent/exportToExcel/{{ $current_class}}/{{ $current_shift }}/{{ $current_section}}/{{ $current_department}}">
										<img src="{{ url('/') }}/public/images/common/excel.ico" style="height:20px;"> Export to Excel </a>
										@endif
									</div>
								@endif
								
							</div>
						</div>
					</div>
					@if($show_students_list == 1)
						<table class="table table-striped table-bordered table-hover table-checkable order-column" id="example">
							<thead>
								<tr>
									<th>
									<input type="checkbox" class="group-checkable" data-set="#example .checkboxes" /> </th>
									<th> Student ID </th>
									<th> Photo </th>
									<th> Name </th>
									<th> Class </th>
									<th> Section </th>
									<th> Roll </th>
									<th> Contact </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
							@foreach($student_list as $row)
								<tr class="odd gradeX">
									<td>
										<input type="checkbox" class="checkboxes" value="1" /> </td>
									<td style="text-align:center"> {{ $row->studentid }} </td>
									<td style="text-align:center"> 
										@if($row->student_photo != '')
										<img alt="" class="img-circle" src="{{ url('/') }}/public/images/student_info/{{ $row->studentid}}/student_photo/thumbs/{{ $row->student_photo }}" width="30" height="30">
										@else
										<img alt="" class="img-circle" src="{{ url('/') }}/public/images/common/user_photo.png" width="30" height="30">
										@endif
									</td>
									<td> {{ $row->student_name }} </td>
									<td style="text-align:center"> {{ $row->class_name }} </td>
									<td style="text-align:center"> {{ $row->section_name }} </td>
									<td style="text-align:center"> {{ $row->current_rollnumber }} </td>
									<td> {{ $row->emergency_contact_number }} </td>
									<td style="padding: 3px;">
										
											<div class="btn-group btn-group-xs btn-group-solid" style="margin: 10px 0px 0px 3px;">
												<a style="margin:0px;" href="{{ url('/') }}/schoolAdmin/manageStudent/showdetails/{{ $row->student_row_id }}" target="_blank" class="btn blue">View</a>
												<a style="margin:0px;" href="{{ url('/') }}/schoolAdmin/manageStudent/generatepdf/{{ $row->student_row_id }}/viewpdf" target="_blank" class="btn green">PDF</a>
												<a style="margin:0px;" href="{{ url('/') }}/schoolAdmin/manageStudent/editstudent/{{ $row->student_row_id }}" class="btn green-meadow">Edit</a>
												@if($row->active_status == 1)
												<a style="margin:0px;" href="#commonmodal" class="btn red std_active_inactive" studentid="{{ $row->student_row_id }}" action="inactivate" data-toggle="modal">Inactivate</a>
												@else
												<a style="margin:0px;" href="#commonmodal" class="btn yellow std_active_inactive" studentid="{{ $row->student_row_id }}" action="activate" data-toggle="modal">Activate</a>
												@endif
												
											</div>
		
									</td>
								</tr>
							@endforeach	
							</tbody>
						</table>
						@endif
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	
	<div class="modal fade" id="commonmodal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<a class="btn dark btn-outline" data-dismiss="modal">Close</a>
					<a class="btn green confirmrequest">Confirm</a>
				</div>
			</div>
		</div>
	</div>  

	@section('page_js')
    <script src="{{ asset('/public')}}/metronic/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{ asset('/public')}}/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
	<script src="{{ asset('/public')}}/metronic/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
	<script src="{{ asset('/public')}}/metronic/global/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="{{ asset('/public')}}/metronic/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
	@endsection
	
	<script type="text/javascript">
	$(document).ready(function() {
		
		$('#example').dataTable({
			  "aoColumnDefs": [
				  { 'bSortable': false, 'aTargets': [ 0,1 ] }
			   ]
		});
		
		
		
		$('.std_active_inactive').click(function(e){
			$('#commonmodal .modal-title').empty();
			$('#commonmodal .modal-body').empty();
			var studentid = $(this).attr('studentid');
			var activestatus = $(this).attr('action');
			if(activestatus == 'inactivate') {
				$('#commonmodal .modal-title').append('Inactivate Student');
				$('#commonmodal .modal-body').append('Do you really want to inactivate this student status?');
				$('#commonmodal .modal-footer .confirmrequest').attr("href", "{{ url('/') }}/schoolAdmin/manageStudent/deletestudent/"+studentid+"/"+activestatus);
			} else {
				$('#commonmodal .modal-title').append('Activate Student');
				$('#commonmodal .modal-body').append('Do you really want to activate this student status?');
				$('#commonmodal .modal-footer .confirmrequest').attr("href", "{{ url('/') }}/schoolAdmin/manageStudent/deletestudent/"+studentid+"/"+activestatus);
			}
		});

		$('.classes').change(function(){
				$('.hidden_submit_btn').attr("disabled", true);
                $('.sections').empty();
                $('.shift').empty();
                $('.department').empty();
                $('.subject').empty();
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
                    	$('.hidden_submit_btn').removeAttr("disabled");
                        $('.shift').append(data);
                    }
                });
                 $.ajax({
                    url: "{{ url('getSubjectByClass') }}/"+ classid,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        $('.subject').append(data);
                    }
                });              


            });

	

	$(window).on("load", function() {

                var classid = $('.classes').val();
				var current_shift = $('.classes').attr('current_shift');
				var current_section = $('.classes').attr('current_section');
				var current_department = $('.classes').attr('current_department');
				
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
        });
	});
	</script>
	
	@endsection