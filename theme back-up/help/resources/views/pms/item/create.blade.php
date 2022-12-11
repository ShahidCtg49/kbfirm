@extends('layout.app')
@section('title','Item Add')
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
	Item
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Item Add
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
				<h5 class="widget-title lighter">Item Add Form</h5>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="{{route('pmsitem.store')}}" method="post" class="form-search">
					@csrf
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('item_name')) has-error @endif">
									<label>Item Name</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="item_name" value="{{old('item_name')}}">
										@if($errors->has('item_name')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('item_name')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('name') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('pms_categori_id')) has-error @endif">
									<label>Category</label>
									<span class="block input-icon input-icon-right">
									<select class="width-100" name="pms_categori_id" onchange="$('.sub').hide();$('.sub'+$(this).val()).show()">
											<option value="">Select Category</option>
											@if($cat)
												@foreach($cat as $c)
											<option value="{{$c->id}}" @if($c->id==old('category_name')) selected @endif>{{$c->category_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('pms_categori_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('pms_categori_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('pms_categori_id') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('pms_subcategori_id')) has-error @endif">
									<label>Sub Category</label>
									<span class="block input-icon input-icon-right">
									<select class="width-100" name="pms_subcategori_id" onchange="$('.child').hide();$('.child'+$(this).val()).show()">
											<option value="">Select Sub Category</option>
											@if($subcat)
												@foreach($subcat as $sc)
											<option value="{{$sc->id}}" class="sub sub{{$sc->category_id}}" @if($sc->id==old('subcategory_name')) selected @endif>{{$sc->subcategory_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('pms_subcategori_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('pms_subcategori_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('contact') }}
										</div>
								@endif
								</div>
							</div>	
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('pms_chieldcategori_id')) has-error @endif">
									<label>Child Category </label>
									<span class="block input-icon input-icon-right">
									<select class="width-100" name="pms_chieldcategori_id">
											<option value="">Select Chield Category</option>
											@if($chieldcat)
												@foreach($chieldcat as $cc)
											<option value="{{$cc->id}}" class="child child{{$cc->subcategory_id}}" @if($cc->id==old('chieldcategory_name')) selected @endif>{{$cc->chieldcategory_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('pms_chieldcategori_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('pms_chieldcategori_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('pms_chieldcategori_id') }}
										</div>
								@endif
								</div>
							</div>
						</div>
					
						<div class="row">
						<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('pms_brand_id')) has-error @endif">
									<label>Brand</label>
									<span class="block input-icon input-icon-right">
									<select class="width-100" name="pms_brand_id">
											<option value="">Select Brand</option>
											@if($brand)
												@foreach($brand as $br)
											<option value="{{$br->id}}" @if($br->id==old('brand_name')) selected @endif>{{$br->brand_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('pms_brand_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('pms_brand_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('pms_brand_id') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('unit_id')) has-error @endif">
									<label>Unit</label>
									<span class="block input-icon input-icon-right">
									  <select class="width-100" name="pms_unit_id">
											<option value="">Select Unit</option>
											@if($unit)
												@foreach($unit as $vc)
											<option value="{{$vc->id}}" @if($vc->id==old('unit_name')) selected @endif>{{$vc->unit_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('unit_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('unit_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('unit_id') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('sku')) has-error @endif">
									<label>SKU</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="sku" value="{{old('sku')}}">
										@if($errors->has('sku')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('sku')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('sku') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('hsn')) has-error @endif">
									<label>HSN</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="hsn" value="{{old('hsn')}}">
										@if($errors->has('hsn')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('hsn')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('hsn') }}
										</div>
								@endif
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('alert_qty')) has-error @endif">
									<label>Minimum Qty</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="alert_qty" value="{{old('alert_qty')}}">
										@if($errors->has('alert_qty')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('alert_qty')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('alert_qty') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('lot_number')) has-error @endif">
									<label>Lot Number</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="lot_number" value="{{old('lot_number')}}">
										@if($errors->has('lot_number')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('lot_number')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('lot_number') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('expire_date')) has-error @endif">
									<label>Expire Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="expire_date" value="{{old('expire_date')}}">
										@if($errors->has('expire_date')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('expire_date')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('expire_date') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('custom_barcode')) has-error @endif">
									<label>Barcode</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="custom_barcode" value="{{old('custom_barcode')}}">
										@if($errors->has('custom_barcode')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('custom_barcode')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('custom_barcode') }}
										</div>
								@endif
								</div>
							</div>		
						</div>
						<div class="row">
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('pms_manufac_id')) has-error @endif">
									<label>Manufacture</label>
									<span class="block input-icon input-icon-right">
									<select class="width-100" name="pms_manufac_id">
											<option value="">Select Manufacturr</option>
											@if($manufac)
												@foreach($manufac as $m)
											<option value="{{$m->id}}" @if($m->id==old('manufac_name')) selected @endif>{{$m->manufac_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('pms_manufac_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('pms_manufac_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('pms_manufac_id') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('description')) has-error @endif">
									<label>Description</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="description" value="{{old('description')}}">
										@if($errors->has('description')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('description')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('description') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('item_image')) has-error @endif">
									<label>Product Image</label>
									<span class="block input-icon input-icon-right">
										<input type="file" class="width-100" name="item_image" value="{{old('item_image')}}">
										@if($errors->has('item_image')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('item_image')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('item_image') }}
										</div>
								@endif
								</div>
							</div>	
						</div>
						<hr/>
						<div class="row">
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('price')) has-error @endif">
									<label>Price</label>
									<span class="block input-icon input-icon-right">
										<input type="text" onkeyup="price_ck()" class="width-100 price" name="price" value="{{old('price')}}">
										@if($errors->has('price')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('price')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('price') }}
										</div>
								@endif
								</div>
							</div>
							
							
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('tax_id')) has-error @endif">
									<label>Tax</label>
									<span class="block input-icon input-icon-right">
										<select onchange="price_ck()" class="width-100 tax_id" name="tax_id">
											<option value="">Select Tax</option>
											@if($tax)
												@foreach($tax as $t)
											<option value="{{$t->tax_percentage}}" @if($t->tax_percentage==old('tax_id')) selected @endif>{{$t->tax_percentage}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('tax_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('tax_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('tax_id') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('purchase_price')) has-error @endif">
									<label>Purchase Price</label>
									<span class="block input-icon input-icon-right">
										<input type="text" onkeyup="price_ck()" class="width-100 purchase_price" name="purchase_price" value="{{old('purchase_price')}}">
										@if($errors->has('purchase_price')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('purchase_price')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('purchase_price') }}
										</div>
								@endif
								</div>
							</div>	
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('tax_type')) has-error @endif">
									<label>Tax Type</label>
									<span class="block input-icon input-icon-right">
										<select onchange="price_ck()" class="width-100 tax_type" name="tax_type">
											<option value="ex">Exclusive</option>
											<option value="in">Inclusive</option>
										</select>
										@if($errors->has('tax_type')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('tax_type')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('tax_type') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('profit_margin')) has-error @endif">
									<label>Profit Margin(%)</label>
									<span class="block input-icon input-icon-right">
										<input type="text" onkeyup="price_ck()" class="width-100 profit_margin" name="profit_margin" value="{{old('profit_margin')}}">
										@if($errors->has('profit_margin')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('profit_margin')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('profit_margin') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('sales_price')) has-error @endif">
									<label>Sales Price</label>
									<span class="block input-icon input-icon-right">
										<input type="text" onkeyup="profit_ck()" class="width-100 sales_price" name="sales_price" value="{{old('sales_price')}}">
										@if($errors->has('sales_price')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('sales_price')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('sales_price') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group @if($errors->has('final_price')) has-error @endif">
									<label>Final Price</label>
									<span class="block input-icon input-icon-right">
										<input type="text" onkeyup="price_ck()" class="width-100 final_price" name="final_price" value="{{old('final_price')}}">
										@if($errors->has('final_price')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('final_price')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('final_price') }}
										</div>
								@endif
								</div>
							</div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('stock')) has-error @endif">
									<label>Current Opening Stock</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="stock" value="{{old('stock')}}">
										@if($errors->has('stock')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('stock')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('stock') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('pms_warehouse_id')) has-error @endif">
									<label>Warehouse</label>
									<span class="block input-icon input-icon-right">
									<select class="width-100" name="pms_warehouse_id">
											<option value="">Select Warehouse</option>
											@if($warehouse)
												@foreach($warehouse as $w)
											<option value="{{$w->id}}" @if($w->id==old('warehouse_name')) selected @endif>{{$w->warehouse_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('pms_warehouse_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('pms_warehouse_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('pms_warehouse_id') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('Adjust Note')) has-error @endif">
									<label>Adjustment Note</label>
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
								<button class="btn btn-primary" type="submit">Submit</button>
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
	/* category change */
	$('.child').hide();
	$('.sub').hide();
	/* /category change */
	function price_ck(){
		var price=parseFloat($('.price').val());
		var tax_id=parseFloat($('.tax_id').val());
		var purchase_price=parseFloat($('.purchase_price').val());
		var tax_type=$('.tax_type').val();
		var profit_margin=parseFloat($('.profit_margin').val());
		var sales_price=parseFloat($('.sales_price').val());
		var final_price=parseFloat($('.final_price').val());

		if(tax_id){
			if(tax_type=="ex"){
				price= (price + (price * (tax_id/100)));
			}
		}

		/* add price to purchase price */
		$('.purchase_price').val(price.toFixed(2));
		var sellprice=0;
		if(profit_margin > 0){
			sellprice= (price + (price * (profit_margin/100)));
		}

		$('.sales_price').val(sellprice.toFixed(2));

		if(tax_id){
			if(tax_type=="ex"){
				sellprice= (sellprice + (sellprice * (tax_id/100)));
			}
		}
		$('.final_price').val(sellprice.toFixed(2));
	}

	function profit_ck(){
		var purchase_price=parseFloat($('.purchase_price').val());
		var tax_type=$('.tax_type').val();
		var tax_id=parseFloat($('.tax_id').val());
		var profit_margin=parseFloat($('.profit_margin').val());
		var sales_price=parseFloat($('.sales_price').val());

		var profitmargin=0;
		
		if(sales_price){
			profitmargin= (((sales_price - purchase_price) * 100 ) / sales_price);
		}

		$('.profit_margin').val(profitmargin.toFixed(2));

		if(tax_id){
			if(tax_type=="ex"){
				sales_price= (sales_price + (sales_price * (tax_id/100)));
			}
		}
		
		$('.final_price').val(sales_price.toFixed(2));
	}

</script>
@endpush