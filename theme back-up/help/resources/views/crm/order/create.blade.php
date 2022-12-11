@extends('layout.app')
@section('title','Order Add')
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
    <div class="col-12">
	@if(Session::has('response'))
        <div class="alert alert-{{Session::get('response')['class']}}">
        {{Session::get('response')['message']}}
        </div>
    @endif
        <!-- PAGE CONTENT BEGINS -->
        <div class="widget-box">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title lighter">Order Add Form</h5>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="{{route('order.store')}}" method="post" class="form-search">
					@csrf
					@php $cid=0; if(isset($_GET['cid'])) $cid=$_GET['cid']; @endphp 
						<div class="row">
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('customer_id')) has-error @endif">
									<label>Customer Name</label>
									<span class="block input-icon input-icon-right">
										<select class="width-100" name="customer_id">
											<option value="">Select Customer</option>
											@if($customer)
												@foreach($customer as $cust)
													<option value="{{$cust->id}}~{{$cust->name}}~{{$cust->contact}}" {{ old('customer_id',$cid)==$cust->id?'selected':''}}>{{$cust->name}}</option>
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
										<input type="text" class="width-100" name="proposul_no" value="{{old('proposul_no')}}">
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
										<input type="date" class="width-100" name="proposul_dt" value="{{old('proposul_dt')}}">
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
										<input type="text" class="width-100" name="wo_no" value="{{old('wo_no')}}">
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
										<input type="date" class="width-100" name="wo_dt" value="{{old('wo_dt')}}">
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
								<div class="form-group @if($errors->has('due_date')) has-error @endif">
									<label>Due Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="due_date" value="{{old('due_date')}}">
										@if($errors->has('due_date')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('due_date')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('due_date') }}
										</div>
								@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('short_des')) has-error @endif">
									<label>Short Description</label>
									<span class="block input-icon input-icon-right">
										<textarea  class="width-100" name="short_des" value="{{old('short_des')}}"></textarea>
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
						
							<div class="col-12 col-sm-8">
								<div class="form-group @if($errors->has('details_des')) has-error @endif">
									<label>Details Description</label>
									<span class="block input-icon input-icon-right">
									<textarea  class="width-100" name="details_des" value="{{old('details_des')}}"></textarea>
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
							<div class="col-12 col-sm-4">
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
							
							
							<div class="col-12 col-sm-4">
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
							
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('status')) has-error @endif">
									<label>Status</label>
									<span class="block input-icon input-icon-right">
										<select class="width-100" name="status">
											<option value="">Select Status</option>
											@if(status())
												@foreach(status() as $i=>$v)
													<option value="{{$i}}" {{ old('status')==$i?'selected':''}}>{{$v}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('represent_by')) 
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
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('start_date')) has-error @endif">
									<label>Task Start Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="start_date" value="{{old('start_date')}}">
										@if($errors->has('start_date')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('start_date')) 
										<div class="help-block col-sm-reset">
											{{ $errors->first('start_date') }}
										</div>
									@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('delivery_date')) has-error @endif">
									<label>Task Delivery Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="delivery_date" value="{{old('delivery_date')}}">
										@if($errors->has('delivery_date')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('delivery_date')) 
										<div class="help-block col-sm-reset">
											{{ $errors->first('delivery_date') }}
										</div>
									@endif
								</div>
							</div>
							<div class="col-12 col-sm-6">
								<div class="form-group @if($errors->has('order_note')) has-error @endif">
									<label>Order Note</label>
									<span class="block input-icon input-icon-right">
										<textarea  class="width-100" name="order_note" value="{{old('order_note')}}"></textarea>
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
							<div class="col-12">
								<table class="table table-striped table-bordered repeater" id="account">
									<thead>
										<tr>
											<th>Service Type</th>
											<th>Description</th>
											<th>Price</th>
											<th>Discount</th>
											<th>Tax</th>
											<th>Amount</th>
										</tr>
									</thead>

									<tbody data-repeater-list="service">
										<tr data-repeater-item>
											<td>
												<span class="block input-icon input-icon-right">
													<select class="width-100" name="service_name">
														<option value="">Select Service</option>
														@if($service)
															@foreach($service as $serv)
																<option value="{{$serv->id}}" {{ old('represent_by')==$serv->id?'selected':''}}>{{$serv->service_name}}</option>
															@endforeach
														@endif
													</select>
													@if($errors->has('service_name')) 
														<i class="ace-icon fa fa-times-circle"></i>
													@endif
												</span>
											</td>
											<td><input type="text" class="width-100" name="description" value=""></td>
											<td> <input type="text" class="width-100 price" onkeyup="cal_amount(this)" name="price" value=""></td>
											<td>
												<label class="radio-inline">
													<input type="radio" class="discount_type" onchange="cal_amount(this)" name="discount_type" value="1" checked> 
												BDT</label>
												<label class="radio-inline"><input type="radio" onchange="cal_amount(this)" class="discount_type" name="discount_type" value="2">
												%</label>
											<input type="text" class="width-50 discount_amount" onkeyup="cal_amount(this)" name="discount_amount" value="">
											<input type="hidden" class="discount_amount_cal" value="">
											</td>
											
											<td><input type="text" class="width-100 tax" onkeyup="cal_amount(this)" name="tax" value=""><input type="hidden" class="tax_cal" value=""></td>
											<td><input type="text" class="width-100 amount" name="amount" value="" readonly></td>
											<td><button class='btn btn-danger btn-sm' data-repeater-delete type="button"><i class="fa fa-trash"></i></button></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th colspan="4">
												<button class='btn btn-primary btn-sm' data-repeater-create type="button"> <i class="fa fa-plus"></i></button>
											</th>
											<th style="text-align:right;" >Sub Total</th>
											<th style="text-align:right;"><input type="text" class="width-100 sub_total" name="sub_total" value="" readonly></th>
											<th></th>
										</tr>
										<tr>
											<th colspan="4"></th>
											<th style="text-align:right;" >Discount</th>
											<th style="text-align:right;"><input type="text" class="width-100 total_discount" name="total_discount" value="" readonly></th>
											<th></th>
										</tr>
										<tr>
											<th colspan="4"></th>
											<th style="text-align:right;" >Tax</th>
											<th style="text-align:right;"><input type="text" class="width-100 total_tax" name="total_tax" value="" readonly></th>
											<th></th>
										</tr>
										<tr>
											<th colspan="4"></th>
											<th style="text-align:right;" >Grand Total</th>
											<th style="text-align:right;"><input type="text" class="width-100 grand_total" name="grand_total" value="" readonly></th>
											<th></th>
										</tr>
									</tfoot>
								</table>
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
@push('script')
<script src="{{asset('public/assets/js/jquery.repeater.min.js')}}"></script>
<script>
	$(document).ready(function () {
        $('.repeater').repeater();
    });
	function add_row(){

		var row='<tr>\
					<td class="center">'+(parseInt($("#account tbody tr").length) + 1)+'</td>\
					<td><select type="text" class="width-100" name="product[]" value=""></select></td>\
					<td class="hidden-xs"><input type="text" class="width-100" name="description[]" value=""></td>\
					<td> <input type="text" class="width-100 price" onkeyup="cal_amount(this)" name="price[]" value=""></td>\
					<td>\
						<label class="radio-inline">\
							<input type="radio" class="discount_type" onchange="cal_amount(this)" name="discount_type['+parseInt($("#account tbody tr").length)+']" value="1" checked> \
						BDT</label>\
						<label class="radio-inline"><input type="radio" class="discount_type" onchange="cal_amount(this)" name="discount_type['+parseInt($("#account tbody tr").length)+']" value="2">\
						%</label>\
					<input type="text" class="width-50 discount_amount" onkeyup="cal_amount(this)" name="discount_amount[]" value="">\
					<input type="hidden" class="discount_amount_cal" value=""></td>\
					<td><input type="text" class="width-100 tax" onkeyup="cal_amount(this)" name="tax[]" value="">\
					<input type="hidden" class="tax_cal" value="">\
					</td>\
					<td><input type="text" class="width-100 amount" name="amount[]" value="" readonly></td>\
				</tr>';
		$('#account tbody').append(row);
	}

	function remove_row(){
		$('#account tbody tr').last().remove();
	}
	function cal_amount(e){
		var price=parseFloat($(e).parents('tr').find('.price').val());
		if(price>0){
			var discount_amount=parseFloat($(e).parents('tr').find('.discount_amount').val());
			var tax=parseFloat($(e).parents('tr').find('.tax').val());
			var discount_type=parseFloat($(e).parents('tr').find('.discount_type:checked').val());
			if(discount_amount>0){
				if(discount_type==2){
					discount_amount=((discount_amount/100)*price);
				}
			}
			var total=0;
			price=price?price:0;
			discount_amount=discount_amount?discount_amount:0;
			total=(price - discount_amount);
			if(tax>0)
				tax=((tax/100)*total);
			
			tax=tax?tax:0;
			total=total+tax;
			$(e).parents('tr').find('.discount_amount_cal').val(discount_amount);
			$(e).parents('tr').find('.tax_cal').val(tax);
			$(e).parents('tr').find('.amount').val(total);
			get_total();
		}
	}

	function get_total(){
		/* discount */
		var discount_amount=0;
		$( ".discount_amount_cal" ).each(function( index ) {
			discount_amount+=parseFloat($( this ).val());
		});
		discount_amount=discount_amount?discount_amount:0;
		$('.total_discount').val(discount_amount);
		/*tax*/
		var tax=0;
		$( ".tax_cal" ).each(function( index ) {
			tax+=parseFloat($( this ).val());
		});
		tax=tax?tax:0;
		$('.total_tax').val(tax);

		/*price */
		var price=0;
		$( ".price" ).each(function( index ) {
			price+=parseFloat($( this ).val());
		});
		price=price?price:0;
		$('.sub_total').val(price);

		var adj=$('.adjustment').val();
		adj=adj?adj:0;
		/*amount */
		var amount=0;
		$( ".amount" ).each(function( index ) {
			amount+=parseFloat($( this ).val());
		});
		amount=amount?amount:0;
		$('.grand_total').val(amount - adj);
	}
</script>
@endpush
@endsection