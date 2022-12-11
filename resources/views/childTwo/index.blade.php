@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Child-Two List</h3>
                <table class="table table-striped">
                    <a class="btn btn-primary float-end" href="{{route('childTwo.create')}}">Add New</a>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Master Head</th>
                        <th>Sub Head</th>
                        <th>Child One</th>
                        <th>Child Two</th>
                        <th>Opening Balance</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($childTwo as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->master_head}}</td>
                            <td>{{$cat->sub_head}}</td>
                            <td>{{$cat->child_one}}</td>
                            <td>{{$cat->child_two}}</td>
                            <td>{{$cat->opening_balance}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('childTwo.edit',$cat->id)}}">Edit</a>
                                <a type="button" class="btn btn-sm btn-danger" href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">Delete</a>
                                
                                <form id="form{{$cat->id}}" action="{{route('childTwo.destroy',$cat->id)}}" method="post">
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
                    {!! $childTwo->links() !!}
                </div>
        </div>
    </div>
</div>
@endsection