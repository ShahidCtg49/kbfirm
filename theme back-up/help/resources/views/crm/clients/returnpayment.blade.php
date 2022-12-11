@extends('layout.app')
@section('title','Order')
@section('content')


<div class="row">
    <div class="col-12">
    @if(Session::has('response'))
        <div class="alert alert-{{Session::get('response')['class']}}">
        {{Session::get('response')['message']}}
        </div>
    @endif

		<div class="hide">
			<div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">
						<li class="active">
							<a data-toggle="tab" href="#home">
								<i class="green ace-icon fa fa-user bigger-120"></i>
								Client Info
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#feed">
								<i class="orange ace-icon fa fa-rss bigger-120"></i>
								Client Service
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#friends">
								<i class="blue ace-icon fa fa-users bigger-120"></i>
								Invoices
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
						<div id="home" class="tab-pane in active">
							<div class="row">
								

								<div class="col-xs-12 col-sm-9">
									<h4 class="blue">
										<span class="middle">Company Name</span>

										<span class="label label-purple arrowed-in-right">
										{{ $client->company }}
										</span>
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

											<div class="profile-info-value">
											{{ $client->contact }}
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Email </div>

											<div class="profile-info-value">
											{{ $client->email }}
											</div>
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

						<div id="feed" class="tab-pane">
							<div class="row">
								<div class="col-12">
									@if(Session::has('response'))
										<div class="alert alert-{{Session::get('response')['class']}}">
										{{Session::get('response')['message']}}
										</div>
									@endif

									<a class="btn btn-primary pull-right" href="{{route('clients.create')}}">Add New</a>
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
														<td>MTL-BILL-{{$u->id}}</td>
														<td>{{$u->due_date}}</td>
														<td>{{$u->employee->emp_name}}</td>
														<td>{{$u->grand_total}}</td>
														<td>{{$u->order_payment}}</td>
														<td>{{$u->status}}</td>
														<td>
															<a href="{{route('order.edit',$u->id)}}" ><i class="fa fa-edit"></i></a>
															<a href="{{route('order.show',$u->id)}}" ><i class="fa fa-eye"></i></a>
															<a href="{{route('order.show',$u->id)}}" >Make Payment</a>
														</td>
													</tr>
												@endforeach
											@endif
										</tbody>
									</table>
									
								</div>
							</div>

							
						</div><!-- /#feed -->

						<div id="friends" class="tab-pane">
							Tab 3

							

							
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
	jQuery(function($) {
	
		$('[data-rel=tooltip]').tooltip();
	
		$('.select2').css('width','200px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
	
	
		$('#fuelux-wizard-container').ace_wizard();
		
		$('#modal-wizard-container').ace_wizard();
		$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
		
		
		/**
		$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
			$(this).closest('form').validate().element($(this));
		});
		
		$('#mychosen').chosen().on('change', function(ev) {
			$(this).closest('form').validate().element($(this));
		});
		*/
	})
</script>

@endpush