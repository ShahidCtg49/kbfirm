@extends('layout.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Sub Head List</h4>
      <p class="card-description">Update Sub Head List</p>
      <form class="forms-sample" method="post" action="{{ route ('subHead.update', $subHead->id) }}" enctype="multipart/form-data">
      @csrf 
      @method('patch')
                    <input type="hidden" name="uptoken" value="{{$subHead->id}}">
                      <div class="form-group">
                        <label for="master_head_id">Master Head</label> <br>
                        <input type="text" value="{{$subHead->master_head_id}}" name="master_head_id" id="master_head_id" class="master_head_id">
                      </div>

                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$subHead->name}}" class="name" name="name" id="name">
                      </div>

                      <div class="form-group">
                        <label for="opening_balance">Opening Balance</label>
                        <input type="text" value="{{$subHead->opening_balance}}" class="opening_balance" name="opening_balance" id="opening_balance">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                    </div>
                </div>
              </div>
@endsection
     

