@extends('layout.app')

@section('content')
<div class="col-lg-8">
            <h4 class="card-title mb-0">Create Profile</h4>
          <form class="forms-sample" method="post" action="{{ route ('investor.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row">
            <div class="col-sm-6 col-md-6">
                <label for="image">Image</label> <br>
                <input type="file" name="image" id="image" class="image">
              </div>
              
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input class="form-control" type="text" class="form-control" name="name" id="name">
                  @if($errors->has('name'))
                  <small class="d-block text-danger">
                      {{$errors->first('name')}}
                  </small>
                  @endif
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                  <label class="form-label">Father Name</label>
                  <input class="form-control" name="father_name" id="father_name" type="text">
                  @if($errors->has('father_name'))
                  <small class="d-block text-danger">
                      {{$errors->first('father_name')}}
                  </small>
              @endif
                </div>

              <div class="col-sm-6 col-md-6">
                <label for="contact_no">Contact No</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no">
                @if($errors->has('contact_no'))
                    <small class="d-block text-danger">
                        {{$errors->first('contact_no')}}
                    </small>
                @endif
            </div>
            
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                <label class="form-label">Email-Address</label>
                <input class="form-control" name="email" id="email">
                @if($errors->has('email'))
                  <small class="d-block text-danger">
                      {{$errors->first('email')}}
                  </small>
              @endif
              </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Investor ID</label>
                  <input class="form-control" type="number" name="investor_id" id="investor_id">
                  @if($errors->has('investor_id'))
                  <small class="d-block text-danger">
                      {{$errors->first('investor_id')}}
                  </small>
              @endif
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Number of Shares</label>
                  <input class="form-control" name="number_shares" id="number_shares" type="number">
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <label for="type">Type</label>
                <select name="type" class="form-control" id="type">
                  <option value="">Select</option>
                    <option value="1">Investor</option>
                  <option value="0">Director</option>
                </select>
              </div>

            <div class="col-sm-6 col-md-6">
              <label for="number">National ID</label>
              <input type="text" class="form-control" name="national_id" id="national_id">
              @if($errors->has('national_id'))
                  <small class="d-block text-danger">
                      {{$errors->first('national_id')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="nominee_name">Nominee Name</label>
              <input type="text" class="form-control" name="nominee_name" id="nominee_name">
              @if($errors->has('nominee_name'))
                  <small class="d-block text-danger">
                      {{$errors->first('nominee_name')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="relationship">Relationship</label>
              <input type="text" class="form-control" name="relationship" id="relationship">
              @if($errors->has('relationship'))
                  <small class="d-block text-danger">
                      {{$errors->first('relationship')}}
                  </small>
              @endif
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="joining_date">Joining Date</label>
              <input type="date" class="form-control" name="joining_date" id="joining_date">
              @if($errors->has('joining_date'))
                  <small class="d-block text-danger">
                      {{$errors->first('joining_date')}}
                  </small>
              @endif
            </div>

              <div class="col-md-12">
                <div class="form-group mb-0">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" name="address" id="address" rows="5"></textarea>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
</div>
@endsection