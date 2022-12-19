@extends('layout.app')

@section('content')
<div class="col-lg-8">
      <h4 class="card-title mb-0">Update Profile</h4>
  <form class="forms-sample" method="post" action="{{ route ('investor.update', $investor->id) }}" enctype="multipart/form-data">
    @csrf 
    @method('patch')
      <input type="hidden" name="uptoken" value="{{$investor->id}}">
    <div class="card-body">
      <div class="row">
          <div class="col-sm-6 col-md-6">
              <label for="image">Picture</label> <br>
              <input type="file" name="image" id="image" class="image">
          </div>

          <div class="col-sm-6 col-md-6">
              <label for="number">Investor ID</label>
              <input type="number" value="{{$investor->investor_id}}" class="form-control" name="investor_id" id="investor_id" placeholder="ID">
            @if($errors->has('investor_id'))
                <small class="d-block text-danger">
                    {{$errors->first('investor_id')}}
                </small>
            @endif
          </div>

          <div class="col-sm-6 col-md-6">
            <label for="name">Name</label>
            <input type="text" value="{{$investor->name}}" class="form-control" name="name" id="name" placeholder="Name">
            @if($errors->has('name'))
                <small class="d-block text-danger">
                    {{$errors->first('name')}}
                </small>
            @endif
          </div>

          <div class="col-sm-6 col-md-6">
            <label for="father_name">Father Name</label>
            <input type="text" class="form-control" value="{{$investor->father_name}}" name="father_name" id="father_name" placeholder="Father Name">
            
            @if($errors->has('father_name'))
                <small class="d-block text-danger">
                    {{$errors->first('father_name')}}
                </small>
            @endif
          </div>

            <div class="col-sm-6 col-md-6">
              <label for="contact_no">Contact No</label>
              <input type="number" class="form-control" value="{{$investor->contact_no}}" name="contact_no" id="contact_no" placeholder="Contact No">
              @if($errors->has('contact_no'))
                  <small class="d-block text-danger">
                      {{$errors->first('contact_no')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="email">Email address</label>
              <input type="email" class="form-control" value="{{$investor->email}}" name="email" id="email" placeholder="Email address">
              @if($errors->has('email'))
                  <small class="d-block text-danger">
                      {{$errors->first('email')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="number">National ID</label>
              <input type="number" class="form-control" value="{{$investor->national_id}}" name="national_id" id="national_id" placeholder="National ID">
              @if($errors->has('national_id'))
                  <small class="d-block text-danger">
                      {{$errors->first('national_id')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="number">Number of Shares</label>
              <input type="number" class="form-control" value="{{$investor->number_shares}}" name="number_shares" id="number_shares" placeholder="Number of Shares">
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="nominee_name">Nominee Name</label>
              <input type="text" class="form-control" value="{{$investor->nominee_name}}" name="nominee_name" id="nominee_name" placeholder="Nominee Name">
              @if($errors->has('nominee_name'))
                  <small class="d-block text-danger">
                      {{$errors->first('nominee_name')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="relationship">Relationship</label>
              <input type="text" class="form-control" value="{{$investor->relationship}}"  name="relationship" id="relationship" placeholder="Relationship">
              @if($errors->has('relationship'))
                  <small class="d-block text-danger">
                      {{$errors->first('relationship')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="joining_date">Joining Date</label>
              <input type="date" class="form-control" value="{{$investor->joining_date}}"  name="joining_date" id="joining_date" placeholder="Joining Date">
              @if($errors->has('joining_date'))
                  <small class="d-block text-danger">
                      {{$errors->first('joining_date')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
                <label for="type">Type</label>
                <select name="type" class="form-control" id="type">
                  <option value="">Select</option>
                    <option value="1">Investor</option>
                  <option value="0">Director</option>
                </select>
            </div>

            <div class="col-md-12">
                <label for="text">Address</label>
                <textarea class="form-control" value="{{$investor->address}}" name="address" id="address" rows="4"></textarea>
            </div>
        </div>
      </div>
    </div>
      <button type="submit" class="btn btn-primary mr-2">Update</button>
  </form> 
</div>
@endsection