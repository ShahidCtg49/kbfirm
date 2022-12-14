@extends('layout.app')
@section('title','Supplier Add')
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
	Supplier
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Supplier Add
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
	@if(Session::has('response'))
        <div class="alert alert-{{Session::get('response')['class']}}">
        {{Session::get('response')['message']}}
        </div>
    @endif
        <!-- PAGE CONTENT BEGINS -->
        <div class="widget-box">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title lighter">Supplier Add Form</h5>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="{{route('supplier.store')}}" method="post" class="form-search">
					@csrf
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('name')) has-error @endif">
									<label>Supplier Name</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="name" value="{{old('name')}}">
										@if($errors->has('name')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('name')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('name') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('company')) has-error @endif">
									<label>Company</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="company" value="{{old('company')}}">
										@if($errors->has('company')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('company')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('company') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('contact')) has-error @endif">
									<label>Contact No</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="contact" value="{{old('contact')}}">
										@if($errors->has('contact')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('contact')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('contact') }}
										</div>
								@endif
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('email')) has-error @endif">
									<label>E-Mail</label>
									<span class="block input-icon input-icon-right">
										<input type="email" class="width-100" name="email" value="{{old('email')}}">
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
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('address')) has-error @endif">
									<label>Address</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="address" value="{{old('address')}}">
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
							<div class="col-xs-12 col-sm-4">
							<div class="form-group @if($errors->has('status')) has-error @endif">
									<label>Status</label>
									<span class="block input-icon input-icon-right">
									@php $status=array('Inactive','active','Pending','Freez','Block'); @endphp
										<select class="width-100" name="status">
											<option value="">Select Status</option>
											@if($status)
												@foreach($status as $i=>$s)
											<option value="{{$i}}" @if($i==old('status')) selected @endif>{{$s}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('status')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('status')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('status') }}
										</div>
								@endif
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('category')) has-error @endif">
									<label>Category</label>
									<span class="block input-icon input-icon-right">
									@php $status=array('Customer','Supplier'); @endphp
										<select class="width-100" name="category">
											<option value="">Select Status</option>
											@if($status)
												@foreach($status as $i=>$s)
											<option value="{{$i}}" @if($i==old('category')) selected @endif>{{$s}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('category')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('category')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('category') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('reference')) has-error @endif">
									<label>Reference</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="reference" value="{{old('reference')}}">
										@if($errors->has('reference')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('reference')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('reference') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('note')) has-error @endif">
									<label>Client Note</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="note" value="{{old('note')}}">
										@if($errors->has('note')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('note')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('note') }}
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
			</div>
		</div>
    </div>
</div>

@endsection