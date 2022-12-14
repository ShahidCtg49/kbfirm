@extends('layout.app')
@section('title','Pending Payment')
@section('content')
<div class="page-header">
    <h1>
	Pending Payment
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Pending Payment List
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
        <table class="table">
            <thead>
                <tr>
                    <th>#SL</th>
					<th>Proposal No</th>
                    <th>Customer</th>
                    <th>Represent By</th>
                    <th>Note</th>
                    <th>Amount</th>
                    <th>Adjust Amount</th>
                    <th>Account Head</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($pay)
                    @foreach($pay as $i=>$u)
                        <tr>
                            <td>{{++$i}}</td>
							<td>{{$u->order->proposul_no}}</td>
							<td>{{$u->order->customer?$u->order->customer->name.'-'.$u->order->customer->contact:""}}</td>
							<td>{{$u->order->employee?$u->order->employee->emp_name.'-'.$u->order->employee->emp_mobile:""}}</td>
                            <td>{{$u->note}}</td>
                            <td>{{$u->amount}}</td>
                            <td>{{$u->adjust_amount}}</td>
							<td>{{$u->account_code}}</td>
                            <td>
                                <a href="{{route(currentUser().'.payment_journal',$u->id)}}" onclick="return confirm('Are you sure?')" ><i class="fa fa-file"></i></a>
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



@endpush