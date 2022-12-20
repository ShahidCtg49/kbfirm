@extends('layout.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Profit Statement</h4>
      <form class="forms-sample" method="post" action="{{ route ('profitStatement.store')}}">
      @csrf()
        <div class="col-sm-6">
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" class="form-control" id="status">
                <option value="">Select</option>
                  <option value="0">Pending</option>
                <option value="1">Paid</option>
              </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection