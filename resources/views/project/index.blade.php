@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Project List</h3>
                <table class="table table-striped">
                    <a class="btn btn-primary float-end" href="{{route('project.create')}}">New Project</a>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Duration</th>
                        <th>Starting Date</th>
                        <th>End Date</th>
                        <th>Profit Projections</th>
                        <th>Return Date</th>
                        <th>Return Profit</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($project as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->description}}</td>
                            <td>{{$cat->amount}}</td>
                            <td>{{$cat->duration}}</td>
                            <td>{{$cat->starting_date}}</td>
                            <td>{{$cat->end_date}}</td>
                            <td>{{$cat->profit_projections}}</td>
                            <td>{{$cat->return_date}}</td>
                            <td>{{$cat->return_profit}}</td>
                            <td>{{$cat->remarks}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('project.edit',$cat->id)}}">Edit</a>
                                <a type="button" class="btn btn-sm btn-danger" href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">Delete</a>
                                
                                <form id="form{{$cat->id}}" action="{{route('project.destroy',$cat->id)}}" method="post">
                                @csrf
                                @method('delete')
                                </form> 
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