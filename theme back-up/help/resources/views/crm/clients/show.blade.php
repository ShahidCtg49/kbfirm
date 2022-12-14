@extends('layout.app')
@section('title','Order')
@push('style')
    <style>
        h2{font-size: 22px;}
        .nav-tabs li{white-space: nowrap;}
    </style>
    <link rel="stylesheet" href="{{asset('public/assets/css/custom.css')}}" />
@endpush
@section('content')


<div class="row">
    <div class="col-12">
		<div class="hide">
			<div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18 ">
						<li class="active">
							<a data-toggle="tab" href="#client">
								<i class="green ace-icon fa fa-user bigger-120"></i>
								Client Info
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#order" id="order_click">
								<i class="orange ace-icon fa fa-rss bigger-120"></i>
								Client Order
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#payment" id="payment_click">
								<i class="blue ace-icon fa fa-users bigger-120"></i>
								Payment History
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#pictures">
								<i class="pink ace-icon fa fa-picture-o bigger-120"></i>
								Others
							</a>
						</li>
					</ul>

					<div class="tab-content no-border padding-24">
						<div id="client" class="tab-pane in active">
							<div class="row">
								<div class="col-xs-12 col-sm-9">
									<h4 class="blue">
										<span class="middle">Company Name</span>
										<span class="label label-purple arrowed-in-right">{{ $client->company }}</span>
									</h4>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Client Name </div>
											<div class="profile-info-value">
												<span>{{ $client->name }}</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Location </div>

											<div class="profile-info-value">
												<i class="fa fa-map-marker light-orange bigger-110"></i>
												{{ $client->address }}
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Mobile </div>
											<div class="profile-info-value">{{ $client->contact }}</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Email </div>
											<div class="profile-info-value">{{ $client->email }}</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Last Online </div>

											<div class="profile-info-value">
												<span>3 hours ago</span>
											</div>
										</div>
									</div>

									<div class="hr hr-8 dotted"></div>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Website </div>

											<div class="profile-info-value">
												<a href="#" target="_blank">www.alexdoe.com</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
											</div>

											<div class="profile-info-value">
												<a href="#">Find me on Facebook</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
											</div>

											<div class="profile-info-value">
												<a href="#">Follow me on Twitter</a>
											</div>
										</div>
									</div>
								</div><!-- /.col -->
								<div class="col-xs-12 col-sm-3 center">
							
									<div class="space space-4"></div>
									<a href="#" class="btn btn-sm btn-block btn-primary">
										<i class="ace-icon fa fa-envelope-o bigger-110"></i>
										<span class="bigger-110">Send a Message</span>
									</a>
									<a href="#" class="btn btn-sm btn-block btn-success">
										<i class="ace-icon fa fa-plus-circle bigger-120"></i>
										<span class="bigger-110">Add as Comment</span>
									</a>
								</div><!-- /.col -->
							</div><!-- /.row -->
							<div class="space-20"></div>
						</div><!-- /#home -->

						<div id="order" class="tab-pane">
							<div class="row">
								<div class="col-12">
									@if(Session::has('response'))
										<div class="alert alert-{{Session::get('response')['class']}}">
										    {{Session::get('response')['message']}}
										</div>
									@endif

									<a class="btn btn-primary pull-right btn-sm" href="{{route('order.create')}}?cid={{$client->id}}">Add New</a>
									<!-- PAGE CONTENT BEGINS -->
									<table class="table">
										<thead>
											<tr>
												<th>#SL</th>
												<th>Bill No</th>
												<th>Due Date</th>
												<th>Represent By</th>
												<th>Amount</th>
												<th>Due</th>
												<th>Payment Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@if($order)
												@foreach($order as $i=>$u)
													<tr>
														<td>{{++$i}}</td>
														<td>MTL-BILL-{{str_pad($u->id, 5, '0', STR_PAD_LEFT)}}</td>
														<td>{{$u->due_date}}</td>
														<td>{{$u->employee->emp_name}}</td>
														<td>{{$u->grand_total}}</td>
														<td>{{($u->grand_total - ($u->order_payment->sum('amount') + $u->order_payment->sum('adjust_amount')))}}</td>
														<td>{{$u->status}}</td>
														<td>
															<a href="{{route('order.edit',$u->id)}}" title="Edit"><i class="fa fa-edit"></i></a>
															<a href="{{route('order.show',$u->id)}}" title="Show"><i class="fa fa-eye"></i></a>
															<a href="{{route('rcvdpayment',$u->id)}}" title="Make Payment" ><i class="fa fa-money"></i></a>
															<a href="#" onclick="get_invoice({{$u->id}})" title="Invoice" ><i class="fa fa-list"></i></a>
														</td>
													</tr>
												@endforeach
											@endif
										</tbody>
									</table>
									
								</div>
							</div>

							
						</div><!-- /#feed -->

						<div id="payment" class="tab-pane">
						
						    <table class="table">
								<thead>
									<tr>
										<th>#SL</th>
										<th>Bill No</th>
										<th>Pay Date</th>
										<th>Amount</th>
										<th>Adjust Amount</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if($payment)
										@foreach($payment as $i=>$pay)
											<tr>
												<td>{{++$i}}</td>
												<td>MTL-Payment-{{$pay->id}}</td>
												<td>{{$pay->pdate}}</td>
												<td>{{$pay->amount}}</td>
												<td>{{$pay->adjust_amount}}</td>
												<td>
												    @if($pay->status==0)
													    <a href="{{route('order.edit',$pay->id)}}" title="Edit"><i class="fa fa-edit"></i></a>
													@endif
													<a href="#" onclick="get_invoice_pay({{$pay->id}},{{$pay->order_id}})" title="Invoice" ><i class="fa fa-list"></i></a>
												</td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div><!-- /#friends -->

						<div id="pictures" class="tab-pane">
							Tab 4
						</div><!-- /#pictures -->
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<!-- order invoice -->
<div class="modal" id="orderinvoice" tabindex="-1" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">
      <div id="doc_bill">
          <span class="throw_inv_content mb-2"></span>
            <div class="throw_inv_payment col-md-12">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="col-md-12 my-2 mt-4 bottom_sign">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <hr class="mb-0 c_hr">
                            <p class="voucher_aut text-center">Receiver Signature </p> 
                        </div>
                        
                        <div class="col-md-4 col-sm-4">
                        </div>
                        
                        <div class="col-md-4 col-sm-4">
                            <hr class="mb-0 c_hr">
                            
                            <p class="voucher_aut text-center">Prepared by </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 my-2 mt-4">
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        
                        <div class="col-sm-7">
                            <button class="btn btn-primary no-print" onclick="printDiv('doc_bill')">Print</button> &nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-danger no-print" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection

@push('script')
<!-- page specific plugin scripts -->
<script src="{{asset('public/assets/js/wizard.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery-additional-methods.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootbox.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('public/assets/js/select2.min.js')}}"></script>

<script type="text/javascript">
    function printDiv(divName) {
        var divContents = document.getElementById(divName).innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" ><link rel="stylesheet" href="{{asset('public/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />');
            a.document.write('<link rel="stylesheet" href="{{asset('public/assets/css/custom.css')}}" /><link rel="stylesheet" href="{{asset('public/assets/css/ace.min.css')}}" />');
            a.document.write('<style>.bottom_sign{position:fixed; bottom:50px} h2{font-size: 22px;} body{font-family:Poppins;background-color:#fff;}@media print {.no-print{display:none;}}</style>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.onload = function() { a.print(); }
            
    /*var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;*/
    }
    /* order invoice */
    function get_invoice(e){
        $.ajax({
            url: "{{route(currentUser().'.order_invoice')}}",
            type: 'GET',
            data: {id: e},
            dataType: 'JSON',
            success: function (data) {
                $('.throw_inv_content').html(data);
                $('#orderinvoice').modal('show');
            },error:function(es){
                console.log(es)
            }
        });
    }
    /* payment invoice */
    function get_invoice_pay(e,inv){
        $.ajax({
            url: "{{route(currentUser().'.payment_invoice')}}",
            type: 'GET',
            data: {id: e,order_id:inv},
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
                $('.throw_inv_content').html(data);
                $('#orderinvoice').modal('show');
            },error:function(es){
                console.log(es)
            }
        });
    }
    
    if(window.location.hash){
        $(window.location.hash).click();
    }

	jQuery(function($) {
		$('[data-rel=tooltip]').tooltip();
		$('.select2').css('width','200px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});
		$('#fuelux-wizard-container').ace_wizard();
		
		$('#modal-wizard-container').ace_wizard();
		$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
	
	})
</script>

@endpush