@extends('layout.app')
@section('title','Order')
@section('content')
<div class="page-header">
    <h1>
		Order
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Order Show
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

    
	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="widget-title lighter">New Item Wizard</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
					<div>
						<ul class="steps">
							<li data-step="1" class="active">
								<span class="step">1</span>
								<span class="title">Validation states</span>
							</li>

							<li data-step="2">
								<span class="step">2</span>
								<span class="title">Alerts</span>
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
							<h3 class="lighter block green">Enter the following information</h3>

							<?php print_r($order) ?>
						</div>

						<div class="step-pane" data-step="2">
							<div>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<strong>
										<i class="ace-icon fa fa-check"></i>
										Well done!
									</strong>

									You successfully read this important alert message.
									<br />
								</div>

								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<strong>
										<i class="ace-icon fa fa-times"></i>
										Oh snap!
									</strong>

									Change a few things up and try submitting again.
									<br />
								</div>

								<div class="alert alert-warning">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<strong>Warning!</strong>

									Best check yo self, you're not looking too good.
									<br />
								</div>

								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<strong>Heads up!</strong>

									This alert needs your attention, but it's not super important.
									<br />
								</div>
							</div>
						</div>

						<div class="step-pane" data-step="3">
							<div class="center">
								<h3 class="blue lighter">This is step 3</h3>
							</div>
						</div>

						<div class="step-pane" data-step="4">
							<div class="center">
								<h3 class="green">Congrats!</h3>
								Your product is ready to ship! Click finish to continue!
							</div>
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