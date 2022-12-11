@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Child One List</h4>
                    <p class="card-description">Update Child One List</p>
                    <form class="forms-sample" method="post" action="{{ route ('childOne.update',$childOne->id) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('patch')
                    <input type="hidden" name="uptoken" value="{{$childOne->id}}">
                      <div class="form-group">
                        <label for="master_head">Master Head</label> <br>
                        <input type="text" value="{{$childOne->master_head}}" name="master_head" id="master_head" class="master_head">
                      </div>

                      <div class="form-group">
                        <label for="sub_head">Sub Head</label>
                        <input type="text" value="{{$childOne->sub_head}}" class="sub_head" name="sub_head" id="sub_head">
                      </div>

                      <div class="form-group">
                        <label for="child_one">Child One</label>
                        <input type="text" value="{{$childOne->child_one}}" class="child_one" name="child_one" id="child_one">
                      </div>

                      <div class="form-group">
                        <label for="opening_balance">Opening Balance</label>
                        <input type="text" value="{{$childOne->opening_balance}}" class="opening_balance" name="opening_balance" id="opening_balance">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection