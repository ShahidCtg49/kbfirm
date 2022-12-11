@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Project List</h4>
                    <p class="card-description">Project List</p>
                    <form class="forms-sample" method="post" action="{{ route ('project.update',$project->id) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Name</label> <br>
                        <input type="text" value="{{$project->name}}" name="name" id="name" class="name">
                      </div>

                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="textarea" value="{{$project->description}}" class="description" name="description" id="description">
                      </div>

                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" value="{{$project->amount}}" class="amount" name="amount" id="amount">
                      </div>

                      <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" value="{{$project->duration}}" class="duration" name="duration" id="duration">
                      </div>

                      <div class="form-group">
                        <label for="starting_date">Starting Date</label>
                        <input type="date" value="{{$project->starting_date}}" class="starting_date" name="starting_date" id="starting_date">
                      </div>

                      <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" value="{{$project->end_date}}" class="end_date" name="end_date" id="end_date">
                      </div>

                      <div class="form-group">
                        <label for="profit_projections">Profit Projections</label>
                        <input type="number" value="{{$project->profit_projections}}" class="profit_projections" name="profit_projections" id="profit_projections">
                      </div>

                      <div class="form-group">
                        <label for="return_date">Return Date</label>
                        <input type="date" value="{{$project->return_date}}" class="return_date" name="return_date" id="return_date">
                      </div>

                      <div class="form-group">
                        <label for="return_profit">Return Profit</label>
                        <input type="number" value="{{$project->return_profit}}" class="return_profit" name="return_profit" id="return_profit">
                      </div>

                      <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" value="{{$project->remarks}}" class="remarks" name="remarks" id="remarks">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection