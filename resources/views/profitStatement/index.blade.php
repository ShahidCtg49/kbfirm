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
                    </tr>
                </thead>
                <tbody>
                    @forelse($profitStatement as $profitStatement)
                    <tr>
                        <td>{{ ++$loop->index}}</td>
                        <td>{{$profitStatement->investor?->name}} - {{$profitStatement->investor?->contact_no}}</td>
                        <td>{{$profitStatement->number_shares}}</td>
                        <td>{{$profitStatement->director_profit}}</td>
                        <td>{{$profitStatement->profit}}</td>
                        <td>{{$profitStatement->dec_date}}</td>
                        <td class="text-center">
                            @if($profitStatement->status == 1)
                            <span class="text-success text-danger">Paid</span>
                            @else
                            <form method="post" action="{{ route('profitStatement.update',
                                        $profitStatement)}}" onsubmit="return confirm('Are your sure? If once paid you cannot reverse this.')">
                                @csrf()
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-warning text-dark">
                                    Pending?
                                </button>
                            </form>
                            @endif
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