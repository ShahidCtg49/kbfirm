@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create New Investor</h4>
                    <p class="card-description"> Create New Investor </p>
                    <form class="forms-sample" method="post" action="{{ route ('investor.store') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label for="number">Investor ID</label>
                        <input type="number" class="form-control" name="investor_id" id="investor_id" placeholder="ID">
                        @if($errors->has('investor_id'))
                            <small class="d-block text-danger">
                                {{$errors->first('investor_id')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="image">Picture</label> <br>
                        <input type="file" name="image" id="image" class="image">
                      </div>

                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        @if($errors->has('name'))
                            <small class="d-block text-danger">
                                {{$errors->first('name')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="father_name">Father Name</label>
                        <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name">
                        
                        @if($errors->has('father_name'))
                            <small class="d-block text-danger">
                                {{$errors->first('father_name')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="contact_no">Contact No</label>
                        <input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Contact No">
                        @if($errors->has('contact_no'))
                            <small class="d-block text-danger">
                                {{$errors->first('contact_no')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
                        @if($errors->has('email'))
                            <small class="d-block text-danger">
                                {{$errors->first('email')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="number">National ID</label>
                        <input type="number" class="form-control" name="national_id" id="national_id" placeholder="National ID">
                        @if($errors->has('national_id'))
                            <small class="d-block text-danger">
                                {{$errors->first('national_id')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="text">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="4"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="number">Number of Shares</label>
                        <input type="number" class="form-control" name="number_shares" id="number_shares" placeholder="Number of Shares">
                      </div>

                      <div class="form-group">
                        <label for="nominee_name">Nominee Name</label>
                        <input type="text" class="form-control" name="nominee_name" id="nominee_name" placeholder="Nominee Name">
                        @if($errors->has('nominee_name'))
                            <small class="d-block text-danger">
                                {{$errors->first('nominee_name')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="relationship">Relationship</label>
                        <input type="text" class="form-control" name="relationship" id="relationship" placeholder="Relationship">
                        @if($errors->has('relationship'))
                            <small class="d-block text-danger">
                                {{$errors->first('relationship')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="joining_date">Joining Date</label>
                        <input type="date" class="form-control" name="joining_date" id="joining_date" placeholder="Joining Date">
                        @if($errors->has('joining_date'))
                            <small class="d-block text-danger">
                                {{$errors->first('joining_date')}}
                            </small>
                        @endif
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection