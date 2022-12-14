@extends('layout.app')
@section('title','Journal Voucher Edit')
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
			<div class="widget-body">
				<div class="widget-main">
				<form action="{{route(currentUser().'.journal.update',$journal->id)}}" method="post" class="form-search">
					@csrf @method('PUT')
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="form-group ">
									<label>Journal No</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="voucher_no" value="{{$journal->voucher_no}}" readonly>
									</span>
								</div>
							</div>	
							<div class="col-12 col-sm-3">
								<div class="form-group @if($errors->has('v_date')) has-error @endif">
									<label>Date</label>
									<span class="block input-icon input-icon-right">
										<input type="date" class="width-100" name="v_date" value="{{$journal->v_date}}">
										@if($errors->has('v_date')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('v_date')) 
										<div class="help-block col-sm-reset">
									{{ $errors->first('v_date') }}
										</div>
								@endif
								</div>
							</div>	
							<div class="col-12 col-sm-6">
								<div class="form-group @if($errors->has('particular')) has-error @endif">
									<label>Particulars</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="particular" value="{{old('particular',$journal->particular)}}">
										@if($errors->has('particular')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('particular')) 
										<div class="help-block col-sm-reset">
									        {{ $errors->first('particular') }}
										</div>
								    @endif
								</div>
							</div>	
						</div>
						
						<div class="row">
							<div class="col-12">
							    <table class="table table-bordered" id='account'>
									<thead>
										<tr>
											<th>SN#</th>
											<th>A/C Head</th>
											<th>Debit (Tk)</th>
											<th>Credit (Tk)</th>
											<th>Remarks</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th style="text-align:right;" colspan="2">Total Amount Tk.</th>
											<th>{{$journal->debit_sum}}</th>
											<th>{{$journal->credit_sum}}</th>
											<th></th>
										</tr>
									</tfoot>
									<tbody style="background:#eee;">
									    @if($journal->voucherbkdn)
									        @foreach($journal->voucherbkdn as $i=>$bkdn)
        										<tr>
        											<td style='text-align:center;'>{{++$i}}</td>
        											<td style='text-align:left;'>{{$bkdn->account_code}}</td>
        											<td style='text-align:left;'>{{$bkdn->debit}}</td>
        											<td style='text-align:left;'>{{$bkdn->credit}}</td>
        											<td style='text-align:left;'>{{$bkdn->remarks}}</td>
        										</tr>
    										@endforeach
										@endif
									</tbody>
								</table>
							</div>	
						</div>
						<div class="row">
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('name')) has-error @endif">
									<label>Cheque No</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="cheque_no" value="{{$journal->cheque_no}}">
										@if($errors->has('cheque_no')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('cheque_no')) 
										<div class="help-block col-sm-reset">
											{{ $errors->first('cheque_no') }}
										</div>
									@endif
								</div>
							</div>
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('bank_name')) has-error @endif">
									<label>Bank Name</label>
									<span class="block input-icon input-icon-right">
										<input type="text" class="width-100" name="bank_name" value="{{$journal->bank_name}}">
										@if($errors->has('bank_name')) 
											<i class="ace-icon fa fa-times-circle"></i>
										@endif
									</span>
									@if($errors->has('bank_name')) 
										<div class="help-block col-sm-reset">
											{{ $errors->first('bank_name') }}
										</div>
									@endif
								</div>
							</div>
							<div class="col-12 col-sm-4">
								<div class="form-group @if($errors->has('cheque_date')) has-error @endif">
									<label>Cheque Date</label>
									<span class="block input-icon input-icon-right">
									<input type="text" class="width-100" name="cheque_date" value="{{$journal->cheque_date}}">
											<i class="ace-icon fa fa-times-circle"></i>
									</span>
									@if($errors->has('cheque_date')) 
										<div class="help-block col-sm-reset">
											{{ $errors->first('cheque_date') }}
										</div>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-right">
								<input name="Upload File" type="file" name="slip[]" multiple>
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
 

</script>

@endpush