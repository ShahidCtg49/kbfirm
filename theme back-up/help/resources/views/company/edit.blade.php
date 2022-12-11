@extends('layout.app')
@section('title','Company Edit')
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
	Company
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Company Edit
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
			<div class="widget-header widget-header-small">
				<h5 class="widget-title lighter">Company Edit Form</h5>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="{{route('company.update',$company->id)}}" method="post" class="form-search" enctype="multipart/form-data">
					@csrf @method('PUT')
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('company_name')) has-error @endif">
									<label>Company Name</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="company_name" value="{{old('company_name',$company->company_name)}}">
										@if($errors->has('company_name')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('company_name')) 
										<div class="help-block col-sm-reset">
									        {{ $errors->first('company_name') }}
										</div>
								    @endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('title')) has-error @endif">
									<label>Company Title</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="title" value="{{old('title',$company->title)}}">
										@if($errors->has('title')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('title')) 
										<div class="help-block col-sm-reset">
									        {{ $errors->first('title') }}
										</div>
							    	@endif
								</div>
							</div>
							
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('contact_no')) has-error @endif">
									<label>Contact No</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="contact_no" value="{{old('contact_no',$company->contact_no)}}">
										@if($errors->has('contact_no')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('contact_no')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('contact_no') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('alt_contact_no')) has-error @endif">
									<label>Alt Contact No</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="alt_contact_no" value="{{old('alt_contact_no',$company->alt_contact_no)}}">
										@if($errors->has('alt_contact_no')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('alt_contact_no')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('alt_contact_no') }}
										</div>
								@endif
								</div>
							</div>
						
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('email')) has-error @endif">
									<label>E-Mail</label>
									<span class="block input-icon input-icon-right">
										<input type="email" class="width-100" name="email" value="{{old('email',$company->email)}}">
										@if($errors->has('email')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('email')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('email') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('address')) has-error @endif">
									<label>Address</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="address" value="{{old('address',$company->address)}}">
										@if($errors->has('address')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('address')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('address') }}
										</div>
								@endif
								</div>
							</div>
						
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('location')) has-error @endif">
									<label>Location</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="location" value="{{old('location',$company->location)}}">
										@if($errors->has('location')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('location')) 
										<div class="help-block col-sm-reset">
									        {{ $errors->first('location') }}
										</div>
								    @endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('reg_no')) has-error @endif">
									<label>Vat Reg. No.</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="reg_no" value="{{old('reg_no',$company->reg_no)}}">
										@if($errors->has('reg_no')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('reg_no')) 
										<div class="help-block col-sm-reset">
									        {{ $errors->first('reg_no') }}
										</div>
							    	@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group">
									<label>Logo</label>
									<span class="block input-icon input-icon-right">
										<input type="file" class="width-100" name="logo" value="">
									</span>
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
			</div>
		</div>
    </div>
</div>

@endsection