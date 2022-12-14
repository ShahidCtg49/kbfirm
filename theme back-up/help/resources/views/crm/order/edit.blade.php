@extends('layout.app')
@section('title','Users Edit')
@push('style')
<style>
select {
    padding: 3px 4px;
    height: 34px;
}
</style>
@endpush
@section('content')


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
				<h5 class="widget-title lighter">User Edit Form</h5>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="{{route('order.update',$order->id)}}" method="post" class="form-search">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-12 col-sm-2">
							<div class="form-group @if($errors->has('customer_id')) has-error @endif">
								<label>Customer Name</label>
								<span class="block input-icon input-icon-right">
									<select class="width-100" name="customer_id">
										<option value="">Select Customer</option>
										@if($customer)
											@foreach($customer as $cust)
												<option value="{{$cust->id}}" {{ $order->customer_id==$cust->id?'selected':''}}>{{$cust->name}}</option>
											@endforeach
										@endif
									</select>
									@if($errors->has('customer_id')) 
										<i class="ace-icon fa fa-times-circle"></i>
									@endif
								</span>
								@if($errors->has('customer_id')) 
									<div class="help-block col-sm-reset">
								{{ $errors->first('customer_id') }}
									</div>
							@endif
							</div>
						</div>
						
						<div class="col-12 col-sm-2">
							<div class="form-group @if($errors->has('proposul_no')) has-error @endif">
								<label>Proposul No</label>
								<span class="block input-icon input-icon-right">
									<input type="text" class="width-100" name="proposul_no" value="{{$order->proposul_no}}">
									@if($errors->has('proposul_no')) 
										<i class="ace-icon fa fa-times-circle"></i>
									@endif
								</span>
								@if($errors->has('proposul_no')) 
									<div class="help-block col-sm-reset">
								{{ $errors->first('proposul_no') }}
									</div>
							@endif
							</div>
						</div>
						<div class="col-12 col-sm-2">
							<div class="form-group @if($errors->has('proposul_dt')) has-error @endif">
								<label>Proposul Date</label>
								<span class="block input-icon input-icon-right">
									<input type="date" class="width-100" name="proposul_dt" value="{{$order->proposul_dt}}">
									@if($errors->has('proposul_dt')) 
										<i class="ace-icon fa fa-times-circle"></i>
									@endif
								</span>
								@if($errors->has('proposul_dt')) 
									<div class="help-block col-sm-reset">
								{{ $errors->first('proposul_dt') }}
									</div>
							@endif
							</div>
						</div>	
						<div class="col-12 col-sm-2">
							<div class="form-group @if($errors->has('wo_no')) has-error @endif">
								<label>Work Order No</label>
								<span class="block input-icon input-icon-right">
									<input type="text" class="width-100" name="wo_no" value="{{$order->wo_no}}">
									@if($errors->has('wo_no')) 
										<i class="ace-icon fa fa-times-circle"></i>
									@endif
								</span>
								@if($errors->has('wo_no')) 
									<div class="help-block col-sm-reset">
								{{ $errors->first('wo_no') }}
									</div>
							@endif
							</div>
						</div>	
						<div class="col-12 col-sm-2">
							<div class="form-group @if($errors->has('wo_dt')) has-error @endif">
								<label>Work Order Date</label>
								<span class="block input-icon input-icon-right">
									<input type="date" class="width-100" name="wo_dt" value="{{$order->wo_dt}}">
									@if($errors->has('wo_dt')) 
										<i class="ace-icon fa fa-times-circle"></i>
									@endif
								</span>
								@if($errors->has('wo_dt')) 
									<div class="help-block col-sm-reset">
								{{ $errors->first('wo_dt') }}
									</div>
							@endif
							</div>
						</div>
						<div class="col-12 col-sm-2">
							<div class="form-group @if($errors->has('del_date')) has-error @endif">
								<label>Delivery Date</label>
								<span class="block input-icon input-icon-right">
									<input type="date" class="width-100" name="del_date" value="{{$order->del_date}}">
									@if($errors->has('del_date')) 
										<i class="ace-icon fa fa-times-circle"></i>
									@endif
								</span>
								@if($errors->has('del_date')) 
									<div class="help-block col-sm-reset">
								{{ $errors->first('del_date') }}
									</div>
							@endif
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col-12 col-sm-12">
								<div class="form-group @if($errors->has('short_des')) has-error @endif">
									<label>Short Description</label>
									<span class="block input-icon input-icon-right">
										<textarea  class="width-100" name="short_des" value="">{{$order->short_des}}</textarea>
										@if($errors->has('short_des')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('short_des')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('short_des') }}
										</div>
								@endif
								</div>
							</div>
						</div>
						<div class="row">
							
							<div class="col-12 col-sm-12">
								<div class="form-group @if($errors->has('details_des')) has-error @endif">
									<label>Details Description</label>
									<span class="block input-icon input-icon-right">
									<textarea  class="width-100" name="details_des" value="">{{$order->details_des}}</textarea>
										@if($errors->has('details_des')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('details_des')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('details_des') }}
										</div>
								@endif
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('represent_by')) has-error @endif">
									<label>Represent By</label>
									<span class="block input-icon input-icon-right">
										<select class="width-100" name="represent_by">
											<option value="">Select Employee</option>
											@if($employee)
												@foreach($employee as $emp)
													<option value="{{$emp->id}}" {{ old('represent_by')==$emp->id?'selected':''}}>{{$emp->emp_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('represent_by')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('represent_by')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('represent_by') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('reference')) has-error @endif">
									<label>Reference</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="reference" value="{{$order->reference}}">
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
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('order_value')) has-error @endif">
									<label>Order Value</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="order_value" value="{{$order->order_value}}">
										@if($errors->has('order_value')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('order_value')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('order_value') }}
										</div>
								@endif
								</div>
							</div>	
							<div class="col-12 col-sm-3">
							<div class="form-group @if($errors->has('status')) has-error @endif">
									<label>Status</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="status" value="{{$order->status}}">
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
							<div class="col-12 col-sm-12">
								<div class="form-group @if($errors->has('order_note')) has-error @endif">
									<label>Order Note</label>
									<span class="block input-icon input-icon-right">
									<textarea  class="width-100" name="order_note" >{{$order->order_note}}</textarea>
										@if($errors->has('order_note')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('order_note')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('order_note') }}
										</div>
								@endif
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-12 text-right">
								<button class="btn btn-primary" type="submit"> Update </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>

@endsection