@extends('layout.app')
@section('title','Client Add')
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
						<div class="widget-body">
						<div class="col-sm-12 text-right">
							<button class="btn btn-white btn-inverse btn-sm" type="submit"> View as Client</button>
							<button class="btn btn-white btn-inverse btn-sm" type="submit"> Print</button>
							<button class="btn btn-white btn-inverse btn-sm" type="submit"> Download </button>
						</div>
				<div class="widget-main">
				<form action="{{route('clients.store')}}" method="post" class="form-search">
					@csrf
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="form-group @if($errors->has('name')) has-error @endif">
									<label>Customer Name</label>
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
							<div class="col-xs-12 col-sm-2">
								<div class="form-group @if($errors->has('inv_date')) has-error @endif">
									<label>Invoice Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="inv_date" >
										@if($errors->has('inv_date')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('inv_date')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('inv_date') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-2">
								<div class="form-group @if($errors->has('pay_date')) has-error @endif">
									<label>Payment Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="pay_date" >
										@if($errors->has('pay_date')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('pay_date')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('pay_date') }}
										</div>
								@endif
								</div>
							</div>	
							<div class="col-xs-12 col-sm-2">
								<div class="form-group @if($errors->has('due_date')) has-error @endif">
									<label>Due Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="due_date" >
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
							<div class="col-xs-12 col-sm-2">
							<div class="form-group @if($errors->has('status')) has-error @endif">
									<label>Invoice Status</label>
									<span class="block input-icon input-icon-right">
										<select class="width-100" name="status">
											<option value="1">Draft</option>
										
											<option value="2" >Publish</option>
											
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
						<hr/>
						<div class="row">
							<div>
								<table class="table table-striped table-bordered" id="account">
									<thead>
										<tr>
											<th class="center">+</th>
											<th>Product</th>
											<th>Description</th>
											<th>Price</th>
											<th>Discount</th>
											<th>Tax</th>
											<th>Amount</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td class="center">1</td>
											<td><input type="text" class="width-100" name="product[]" value=""></td>
											<td class="hidden-xs"><input type="text" class="width-100" name="description[]" value=""></td>
											<td> <input type="text" class="width-100 price" onkeyup="cal_amount(this)" name="price[]" value=""></td>
											<td>
												<label class="radio-inline">
													<input type="radio" class="discount_type" onchange="cal_amount(this)" name="discount_type[0]" value="1" checked> 
												BDT</label>
												<label class="radio-inline"><input type="radio" onchange="cal_amount(this)" class="discount_type" name="discount_type[0]" value="2">
												%</label>
											<input type="text" class="width-50 discount_amount" onkeyup="cal_amount(this)" name="discount_amount[]" value="">
											<input type="hidden" class="discount_amount_cal" value="">
											</td>
											
											<td><input type="text" class="width-100 tax" onkeyup="cal_amount(this)" name="tax[]" value=""><input type="hidden" class="tax_cal" value=""></td>
											<td><input type="text" class="width-100 amount" name="amount[]" value="" readonly></td>
										</tr>
									</tbody>
									<tfoot>
										
										<tr>

											<th colspan="5">
												<input type='button' class='btn btn-primary' value='Add' onClick='add_row();'>
												<input type='button' class='btn btn-danger' value='Remove' onClick='remove_row();'>
											</th>
											<th style="text-align:right;" >Sub Total</th>
											<th style="text-align:right;"><input type="text" class="width-100 sub_total" name="sub_total" value="" readonly></th>
										</tr>
										<tr>
											<th colspan="5"></th>
											<th style="text-align:right;" >Discount</th>
											<th style="text-align:right;"><input type="text" class="width-100 total_discount" name="total_discount" value="" readonly></th>
										</tr>
										<tr>
											<th colspan="5"></th>
											<th style="text-align:right;" >Tax</th>
											<th style="text-align:right;"><input type="text" class="width-100 total_tax" name="total_tax" value="" readonly></th>
										</tr>
										<tr>
											<th colspan="5"></th>
											<th style="text-align:right;" >Adjustment</th>
											<th style="text-align:right;"><input onkeyup="get_total()" type="text" class="width-100 adjustment" name="adjustment" value="" ></th>
										</tr>
										<tr>
											<th colspan="5"></th>
											<th style="text-align:right;" >Grand Total</th>
											<th style="text-align:right;"><input type="text" class="width-100 grand_total" name="grand_total" value="" readonly></th>
										</tr>
									</tfoot>
								</table>
							</div>	
						</div>
						<div class="row">
							<div class="col-sm-12 text-right">
								<button class="btn btn-primary" type="submit"> Save Changes </button>
							</div>
						</div>
						</form>	
				</div>
			</div>
		</div>
    </div>
</div>

@endsection

@push('script')
<script>
	function add_row(){

		var row='<tr>\
					<td class="center">'+(parseInt($("#account tbody tr").length) + 1)+'</td>\
					<td><input type="text" class="width-100" name="product[]" value=""></td>\
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