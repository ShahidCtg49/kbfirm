@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Project List</h4>
                    <p class="card-description">Project List</p>
                    <form class="forms-sample" method="post" action="{{ route ('project.store') }}" enctype="multipart/form-data">
                    @csrf 
                      <div class="form-group">
                        <label for="name">Name</label> <br>
                        <input type="text" name="name" id="name" class="name">
                      </div>

                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="textarea" class="description" name="description" id="description">
                      </div>

                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="amount" name="amount" id="amount">
                      </div>

                      <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="duration" name="duration" id="duration">
                      </div>

                      <div class="form-group">
                        <label for="starting_date">Starting Date</label>
                        <input type="date" class="starting_date" name="starting_date" id="starting_date">
                      </div>

                      <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="end_date" name="end_date" id="end_date">
                      </div>

                      <div class="form-group">
                        <label for="profit_projections">Profit Projections</label>
                        <input type="number" class="profit_projections" name="profit_projections" id="profit_projections">
                      </div>

                      <div class="form-group">
                        <label for="return_date">Return Date</label>
                        <input type="date" class="return_date" name="return_date" id="return_date">
                      </div>

                      <div class="form-group">
                        <label for="return_profit">Return Profit</label>
                        <input type="number" class="return_profit" name="return_profit" id="return_profit">
                      </div>

                      <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="remarks" name="remarks" id="remarks">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection