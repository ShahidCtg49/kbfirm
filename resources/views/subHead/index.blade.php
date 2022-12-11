@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Sub-Head List</h3>
                <table class="table table-striped">
                    <a class="btn btn-primary float-end" href="{{route('subHead.create')}}">Add New</a>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Master Head</th>
                        <th>Sub Head</th>
                        <th>Sub Code</th>
                        <th>Opening Balance</th>
                        <th>Action</th>
                    </tr>
                    
                    </thead>
                    <tbody>
                        @forelse($subHead as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->master_head_id}}</td>
                            <td>{{$cat->head_name}}</td>
                            <td>{{$cat->head_code}}</td>
                            <td>{{$cat->opening_balance}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('subHead.edit',$cat->id)}}">Edit</a>
                                <a type="button" class="btn btn-sm btn-danger" href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">Delete</a>
                                
                                <form id="form{{$cat->id}}" action="{{route('subHead.destroy',$cat->id)}}" method="post">
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
                <div class="d-flex justify-content-center">
                    {!! $subHead->links() !!}
                </div>
        </div>
    </div>
</div>
@endsection