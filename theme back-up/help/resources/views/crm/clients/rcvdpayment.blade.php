@extends('layout.app')
@section('title','Received Payment')
@push('style')
    <style>
        .hidden{
            display:none;
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
					<form action="{{route('rcvdpayment.save')}}" method="post" class="form-search">
					@csrf
					<input type="hidden" name="order_id" value="{{$order->id}}">
						<div class="row">
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>Client: {{$order->customer->name}}</label>
								</div>
							</div>
							
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>Bill No: MTL {{sprintf('%04d', $order->id);}}</label>
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>Bill Amount: {{$order->grand_total}}</label>
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>Paid Amount: {{$pay}}</label>
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>Due Amount: {{($order->grand_total-$pay) }}</label>
								</div>
							</div>
						</div>
							
							
						<div class="row">
							<div class="col-12">
								<table class="table table-striped table-bordered repeater" id="account">
									<thead>
										<tr>
											<th>Pay Type</th>
											<th>Note</th>
											<th>Amount</th>
											<th>Adjustment Amount</th>
											<th>Has Cheque No</th>
										</tr>
									</thead>

									<tbody data-repeater-list="payments">
										<tr data-repeater-item>
											<td>
												<span class="block input-icon input-icon-right">
													<select class="width-100" name="p_terms">
														{!!$headoption!!}
													</select>
												</span>
											</td>
											<td><input type="text" class="width-100" name="note" value=""></td>
											<td><input type="text" class="width-100 amount" name="amount" value="" onkeyup="get_total()"></td>
											<td><input type="text" class="width-100 adjust_amount" name="adjust_amount" value="" onkeyup="get_total()"></td>
											<td style="width:20%;min-width:140px">
											    <input type="checkbox" class="has_cheque" name="has_cheque" value="1" onchange="active_cheque(this)">
											    <div class="hidden">
											        <label> Cheque No</label>
											        <input type="text" name="cheque_no" class="width-100">
											        <label> Bank Name</label>
											        <input type="text" name="bank_name" class="width-100">
											        <label> Cheque Date</label>
											        <input type="date" name="cheque_date" class="width-100">
											    </div>
											</td>
											<td><button class='btn btn-danger btn-sm' data-repeater-delete type="button"><i class="fa fa-trash"></i></button></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th colspan="3"><button class='btn btn-primary btn-sm' data-repeater-create type="button"> <i class="fa fa-plus"></i></button></th>
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
							    <span class="text-danger msg-off"></span>
								<button class="btn btn-primary submitbtn" type="submit"> Submit </button>
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
<script src="{{asset('public/assets/js/jquery.repeater.min.js')}}"></script>
<script>
    function active_cheque(e){
        if($(e).is(':checked')){
            $(e).next('.hidden').show();
        }else{
            $(e).next('.hidden').hide();
        }
    }
	$(document).ready(function () {
        $('.repeater').repeater();
    });

	function get_total(){
		/*adjustment */
		let adjustment=0;
		$( ".adjust_amount" ).each(function( index ) {
			adjustment+=parseFloat($( this ).val());
		});
		adjustment=adjustment?adjustment:0;
		/*amount */
		let amount=0;
		$( ".amount" ).each(function( index ) {
			amount+=parseFloat($( this ).val());
		});
		amount=amount?amount:0;
		let due={{($order->grand_total-$pay) }};
		if( amount > due){
		    $('.msg-off').text("you cannot pay more than "+amount);
		    $('.submitbtn').attr('disabled',true)
		}else{
		    $('.msg-off').text("");
		    $('.submitbtn').attr('disabled',false)
		}
		$('.grand_total').val(amount - adjustment);
	}
</script>
@endpush
