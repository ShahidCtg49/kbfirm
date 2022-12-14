@extends('layout.app')
@section('title','Sub Head')
@section('content')
<div class="page-header">
    <h1>
	Master Head
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Sub Head List
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-6">
	@if(Session::has('response'))
        <div class="alert alert-{{Session::get('response')['class']}}">
        {{Session::get('response')['message']}}
        </div>
    @endif
        <!-- PAGE CONTENT BEGINS -->
        <div class="widget-box">
			<div class="widget-header widget-header-small">
				<h5 class="widget-title lighter">Sub Head Add Form</h5>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="{{route('subhead.store')}}" method="post" class="form-search" enctype="multipart/form-data">
					@csrf
						<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="form-group @if($errors->has('vcategory')) has-error @endif">
									<label>Naster Head</label>
									<span class="block input-icon input-icon-right">
										<select class="width-100" name="masterhead_id">
											<option value="">Select Category</option>
											@if($masterhead)
												@foreach($masterhead as $vc)
											<option value="{{$vc->id}}" @if($vc->id==old('head_name')) selected @endif>{{$vc->head_name}}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('masterhead_id')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('masterhead_id')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('masterhead_id') }}
										</div>
									@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group @if($errors->has('head_name')) has-error @endif">
									<label>Sub Head Name</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="head_name" value="{{old('head_name')}}">
										@if($errors->has('head_name')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('head_name')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('head_name') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group @if($errors->has('subhead_code')) has-error @endif">
									<label>Code</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="subhead_code" value="{{old('subhead_code')}}">
										@if($errors->has('subhead_code')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('subhead_code')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('subhead_code') }}
										</div>
								@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group @if($errors->has('opening_balance')) has-error @endif">
									<label>Opening Balance</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="opening_balance" value="{{old('opening_balance')}}">
										@if($errors->has('opening_balance')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('opening_balance')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('opening_balance') }}
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
    <div class="col-xs-6">
			@if(Session::has('response'))
				<div class="alert alert-{{Session::get('response')['class']}}">
				{{Session::get('response')['message']}}
				</div>
			@endif

  	
        <!-- PAGE CONTENT BEGINS -->
        <table class="table">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Master Head Name</th>
                    <th>Sub Head Name</th>
                    <th>Sub Head Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($subhead)
                    @foreach($subhead as $i=>$u)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$u->master_head->head_name}}</td>
                            <td>{{$u->head_name}}</td>
                            <td>{{$u->subhead_code}}</td>
                          
                            
                            <td>
                                <a href="{{route('masterhead.edit',$u->id)}}" ><i class="fa fa-edit"></i></a>

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
    </div>

</div>

@endsection

@push('script')

<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="{{asset('public/assets/js/excanvas.min.js')}}"></script>
		<![endif]-->
		<script src="{{asset('public/assets/js/jquery-ui.custom.min.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery.easypiechart.min.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery.sparkline.index.min.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery.flot.min.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery.flot.pie.min.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery.flot.resize.min.js')}}"></script>

		<!-- ace scripts -->
		<script src="{{asset('public/assets/js/ace-elements.min.js')}}"></script>
		<script src="{{asset('public/assets/js/ace.min.js')}}"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>

@endpush