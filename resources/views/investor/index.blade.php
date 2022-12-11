@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Investor Information</h3>
                <table class="table table-striped">
                    <a class="btn btn-primary float-end" href="{{route('investor.create')}}">Add New</a>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Investor Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>National Id</th>
                        <th>Address</th>
                        <th>Number of Shares</th>
                        <th>Nominee Name</th>
                        <th>Relationship</th>
                        <th>Joining Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($investor_information as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->investor_id}}</td>
                            <td><img width="50px" src="{{asset('uploads/investor/'.$cat->image)}}" alt=""></td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->father_name}}</td>
                            <td>{{$cat->contact_no}}</td>
                            <td>{{$cat->email}}</td>
                            <td>{{$cat->national_id}}</td>
                            <td>{{$cat->address}}</td>
                            <td>{{$cat->number_shares}}</td>
                            <td>{{$cat->nominee_name}}</td>
                            <td>{{$cat->relationship}}</td>
                            <td>{{$cat->joining_date}}</td>
                            <td>{{$cat->status}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('investor.edit',$cat->id)}}">Edit</a>
                                <a type="button" class="btn btn-sm btn-danger" href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">Delete</a>
                                
                                <form id="form{{$cat->id}}" action="{{route('investor.destroy',$cat->id)}}" method="post">
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