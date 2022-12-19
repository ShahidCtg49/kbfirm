@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Profit Statement</h3>
                <table class="table table-striped">
                
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Investor ID</th>
                        <th>No of Shares</th>
                        <th>Director Profit</th>
                        <th>Profit</th>
                        <th>Declare Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($profitStatement as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->investor_id}}</td>
                            <td>{{$cat->number_shares}}</td>
                            <td>{{$cat->director_profit}}</td>
                            <td>{{$cat->profit}}</td>
                            <td>{{$cat->dec_date}}</td>
                            <td>{{$cat->status}}</td>
                            <td>
                                
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="11">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection