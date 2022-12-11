@extends('layout.app')
@section('title','Employee Add')
@push('style')
<style>
select {
    padding: 3px 4px;
    height: 34px;
}
</style>
@endpush
@section('content')
<div class="page-header">
    <h1>
	Employee
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Employee Add
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-12">
	@if(Session::has('response'))
        <div class="alert alert-{{Session::get('response')['class']}}">
			{{Session::get('response')['message']}}
        </div>
    @endif
        <!-- PAGE CONTENT BEGINS -->
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="widget-title lighter">New Employee</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="fuelux-wizard-container">
						<div>
							<ul class="steps">
								<li data-step="1" class="active">
									<span class="step">1</span>
									<span class="title">Basic Info</span>
								</li>

								<li data-step="2">
									<span class="step">2</span>
									<span class="title">Official Info </span>
								</li>

								<li data-step="3">
									<span class="step">3</span>
									<span class="title">Payment Info</span>
								</li>

								<li data-step="4">
									<span class="step">4</span>
									<span class="title">Other Info</span>
								</li>
							</ul>
						</div>

						<hr />

						<div class="step-content pos-rel">
							<div class="step-pane active" data-step="1">
								<form action="{{route('employeebasic.store')}}" method="post" class="form-search">
									@csrf
									<div class="row">
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_name')) has-error @endif">
												<label>Employee Name</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_name" value="{{old('emp_name')}}">
													@if($errors->has('emp_name')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_name')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_name') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_short_name')) has-error @endif">
												<label>Nick Name</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_short_name" value="{{old('emp_short_name')}}">
													@if($errors->has('emp_short_name')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_short_name')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_short_name') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_father')) has-error @endif">
												<label>Father Name</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_father" value="{{old('emp_father')}}">
													@if($errors->has('emp_father')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_father')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_father') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_mother')) has-error @endif">
												<label>Mother Name</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_mother" value="{{old('emp_mother')}}">
													@if($errors->has('emp_mother')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_mother')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_mother') }}
													</div>
											@endif
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-12 col-sm-6">
											<div class="form-group @if($errors->has('emp_present_address')) has-error @endif">
												<label>Present Address</label>
												<span class="block input-icon input-icon-right">
												<textarea id="address1" class="form-control" name="emp_present_address" value="{{old('emp_present_address')}}" rows="6"> </textarea>
													@if($errors->has('emp_present_address')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_present_address')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_present_address') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-6">
											<div class="form-group @if($errors->has('emp_parmanent_address')) has-error @endif">
												<label>Parmanent Address</label>
												<span class="block input-icon input-icon-right">
													<textarea id="address" class="form-control" name="emp_parmanent_address" value="{{old('emp_parmanent_address')}}" rows="6"> </textarea>
													@if($errors->has('emp_parmanent_address')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_parmanent_address')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_parmanent_address') }}
													</div>
											@endif
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_nid')) has-error @endif">
												<label>National ID</label>
												<span class="block input-icon input-icon-right">
												<input type="text" class="width-100" name="emp_nid" value="{{old('emp_nid')}}">
													@if($errors->has('emp_nid')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_nid')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_nid') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_email')) has-error @endif">
												<label>Email ID</label>
												<span class="block input-icon input-icon-right">
												<input type="text" class="width-100" name="emp_email" value="{{old('emp_email')}}">
													@if($errors->has('emp_email')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_email')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_email') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_mobile')) has-error @endif">
												<label>Mobile No</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_mobile" value="{{old('emp_mobile')}}">
													@if($errors->has('emp_mobile')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_mobile')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_mobile') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_alt_mobile')) has-error @endif">
												<label>Alt. Mobile No.</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_alt_mobile" value="{{old('emp_alt_mobile')}}">
													@if($errors->has('emp_alt_mobile')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_alt_mobile')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_alt_mobile') }}
													</div>
											@endif
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_gender')) has-error @endif">
												<label>Gender</label>
												<span class="block input-icon input-icon-right">
													<select class="width-100" name="emp_gender">
														<option value="0">Select Gender</option>
														<option value="1" {{'1'==old('emp_gender')?'selected':''}}>Male</option>
														<option value="2" {{'2'==old('emp_gender')?'selected':''}}>Female</option>
														<option value="3" {{'3'==old('emp_gender')?'selected':''}}>Others</option>
													</select>
													@if($errors->has('emp_gender')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_gender')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_gender') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_blood')) has-error @endif">
												<label>Blood Group</label>
												<span class="block input-icon input-icon-right">
													<select class="width-100" name="emp_blood">
														<option value="">Select Blood</option>
														<option value="1" {{'1'==old('emp_blood')?'selected':''}}>A+</option>
														<option value="2" {{'2'==old('emp_blood')?'selected':''}}>A-</option>
														<option value="3" {{'3'==old('emp_blood')?'selected':''}}>B+</option>
														<option value="4" {{'4'==old('emp_blood')?'selected':''}}>B-</option>
														<option value="5" {{'5'==old('emp_blood')?'selected':''}}>O+</option>
														<option value="6" {{'6'==old('emp_blood')?'selected':''}}>O-</option>
														<option value="7" {{'7'==old('emp_blood')?'selected':''}}>AB-</option>
														<option value="8" {{'8'==old('emp_blood')?'selected':''}}>AB+</option>
													</select>
													@if($errors->has('emp_blood')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_blood')) 
													<div class="help-block col-sm-reset">
														{{ $errors->first('emp_blood') }}
													</div>
												@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_maritals_tatus')) has-error @endif">
												<label>Marital Status</label>
												<span class="block input-icon input-icon-right">
													<select class="width-100" name="emp_maritals_tatus">
														<option value="">Select Marital Status</option>
														<option value="1" {{'1'==old('emp_maritals_tatus')?'selected':''}}>Marrid</option>
														<option value="2" {{'2'==old('emp_maritals_tatus')?'selected':''}}>Unmarrid</option>
													</select>
													@if($errors->has('emp_maritals_tatus')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_maritals_tatus')) 
													<div class="help-block col-sm-reset">
														{{ $errors->first('emp_maritals_tatus') }}
													</div>
												@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_religion')) has-error @endif">
												<label>Religion</label>
												<span class="block input-icon input-icon-right">
													<select class="width-100" name="emp_religion">
														<option value="">Select Religion</option>
														<option value="1" {{'1'==old('emp_religion')?'selected':''}}>Islam</option>
														<option value="2" {{'2'==old('emp_religion')?'selected':''}}>Hinduism</option>
														<option value="3" {{'3'==old('emp_religion')?'selected':''}}>Christianity</option>
														<option value="4" {{'4'==old('emp_religion')?'selected':''}}>Buddhism</option>
													
													</select>
													@if($errors->has('emp_religion')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_religion')) 
													<div class="help-block col-sm-reset">
														{{ $errors->first('emp_religion') }}
													</div>
												@endif
											</div>
										</div>	
									</div>
									
									<div class="row">
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_spouse')) has-error @endif">
												<label>Spouse Name</label>
												<span class="block input-icon input-icon-right">
												<input type="text" class="width-100" name="emp_spouse" value="{{old('emp_spouse')}}">
													@if($errors->has('emp_spouse')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_spouse')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_spouse') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_nationality')) has-error @endif">
												<label>Nationality</label>
												<span class="block input-icon input-icon-right">
												<input type="text" class="width-100" name="emp_nationality" value="{{old('emp_nationality')}}">
													@if($errors->has('emp_nationality')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_nationality')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_nationality') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_dob')) has-error @endif">
												<label>Date of Birth</label>
												<span class="block input-icon input-icon-right">
													<input type="date" class="width-100" name="emp_dob" value="{{old('emp_dob')}}">
													@if($errors->has('emp_dob')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_dob')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_dob') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_passport_no')) has-error @endif">
												<label>Passport No</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_passport_no" value="{{old('emp_passport_no')}}">
													@if($errors->has('emp_passport_no')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_passport_no')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_passport_no') }}
													</div>
											@endif
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_passport_issue_date')) has-error @endif">
												<label>Passport Issue Date</label>
												<span class="block input-icon input-icon-right">
												<input type="date" class="width-100" name="emp_passport_issue_date" value="{{old('emp_passport_issue_date')}}">
													@if($errors->has('emp_passport_issue_date')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_passport_issue_date')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_passport_issue_date') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_passport_exp_date')) has-error @endif">
												<label>emp_passport_exp_date</label>
												<span class="block input-icon input-icon-right">
												<input type="date" class="width-100" name="emp_passport_exp_date" value="{{old('emp_passport_exp_date')}}">
													@if($errors->has('emp_passport_exp_date')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_passport_exp_date')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_passport_exp_date') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_nomini_name')) has-error @endif">
												<label>Nomini Name</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_nomini_name" value="{{old('emp_nomini_name')}}">
													@if($errors->has('emp_nomini_name')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_nomini_name')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_nomini_name') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_nomini_relation')) has-error @endif">
												<label>Nomini Relation</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_nomini_relation" value="{{old('emp_nomini_relation')}}">
													@if($errors->has('emp_nomini_relation')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_nomini_relation')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_nomini_relation') }}
													</div>
											@endif
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_nomini_contact_no')) has-error @endif">
												<label>Nomini Contact_no</label>
												<span class="block input-icon input-icon-right">
												<input type="text" class="width-100" name="emp_nomini_contact_no" value="{{old('emp_nomini_contact_no')}}">
													@if($errors->has('emp_nomini_contact_no')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_nomini_contact_no')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_nomini_contact_no') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_status')) has-error @endif">
												<label>emp_status</label>
												<span class="block input-icon input-icon-right">
													<select class="width-100" name="emp_status">
														<option value=''>Select Status</option>
														<option value='1' {{'1'==old('emp_status')?'selected':''}}>Active</option>
														<option value='2' {{'2'==old('emp_status')?'selected':''}}>Inactive</option>
														<option value='3' {{'3'==old('emp_status')?'selected':''}}>Temporarry</option>
													</select>
													@if($errors->has('emp_status')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_status')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_status') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_image')) has-error @endif">
												<label>Image</label>
												<span class="block input-icon input-icon-right">
													<input type="file" class="width-100" name="emp_image" value="{{old('emp_image')}}">
													@if($errors->has('emp_image')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_image')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_image') }}
													</div>
											@endif
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('emp_password')) has-error @endif">
												<label>Password</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="emp_password" value="{{old('emp_password')}}">
													@if($errors->has('emp_password')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('emp_password')) 
													<div class="help-block col-sm-reset">
												{{ $errors->first('emp_password') }}
													</div>
											@endif
											</div>
										</div>	
										<div class="col-12 col-sm-3">
											<div class="form-group @if($errors->has('total_salary')) has-error @endif">
												<label>Total Salary</label>
												<span class="block input-icon input-icon-right">
													<input type="text" class="width-100" name="total_salary" value="{{old('total_salary')}}">
													@if($errors->has('total_salary')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
												@if($errors->has('total_salary')) 
													<div class="help-block col-sm-reset">
														{{ $errors->first('total_salary') }}
													</div>
												@endif
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-sm-12 text-right">
											<button class="btn btn-primary" type="submit"> Submit </button>
										</div>
									</div>
								</form>
							</div>

							<div class="step-pane" data-step="2">
								
								Second page
							</div>

							<div class="step-pane" data-step="3">
								
								Third page
							</div>

							<div class="step-pane" data-step="4">
								Fourth page
							</div>
						</div>
					</div>

					<hr />
					<div class="wizard-actions">
						<button class="btn btn-prev">
							<i class="ace-icon fa fa-arrow-left"></i>
							Prev
						</button>

						<button class="btn btn-success btn-next" data-last="Finish">
							Next
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div>
    </div>
</div>

@endsection

@push('script')
<script src="{{asset('public/assets/js/wizard.min.js')}}"></script>
<script>
	var $validation = false;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Thank you! Your information was successfully saved!", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}).on('stepclick.fu.wizard', function(e){
					e.preventDefault();//this will prevent clicking and selecting steps
				});
</script>
@endpush