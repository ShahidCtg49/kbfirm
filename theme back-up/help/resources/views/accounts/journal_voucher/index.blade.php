@extends('layout.app')
@section('title','Journal Voucher')
@section('content')
<div class="page-header">
    <h1>
        Journal Voucher
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Journal Voucher List
        </small>
        <a class="btn btn-primary pull-right" href="{{route(currentUser().'.journal.create')}}">Add New</a>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-12">
        <!-- PAGE CONTENT BEGINS -->
        <table class="table">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Voucher No</th>
                    <th>Date</th>
                    <th>Particulars</th>
                    <th>Dr Head</th>
                    <th>Dr</th>
                    <th>Cr Head</th>
                    <th>Cr</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($journal)
                    @foreach($journal as $j)
                        <tr>
                            <td>{{$j->id}}</td>
                            <td>{{$j->voucher_no}}</td>
                            <td>{{$j->v_date}}</td>
                            <td>{{$j->particular}}</td>
                            <td>
                                @if($j->voucherbkdn)
                                    @foreach($j->voucherbkdn as $k)
                                        @if($k->debit > 0)
                                            {{$k->account_code}} <br>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{$j->debit_sum}}
                            </td>
                            <td>
                                @if($j->voucherbkdn)
                                    @foreach($j->voucherbkdn as $k)
                                        @if($k->credit > 0)
                                            {{$k->account_code}} <br>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{$j->credit_sum}}
                            </td>
                            <td>
                                <a href="{{route(currentUser().'.journal.edit',$j->id)}}" ><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $journal->links() !!}
    </div>
</div>

@endsection