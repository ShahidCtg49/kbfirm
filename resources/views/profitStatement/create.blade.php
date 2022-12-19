@extends('layout.app')

@section('content')
<div class="col-lg-8">
            <h4 class="card-title mb-0">Create</h4>
          <form class="forms-sample" method="post" action="{{ route ('profitStatement.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="row">
              
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Investor ID</label>
                  <input class="form-control" type="number" name="investor_id" id="investor_id">
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Number of Shares</label>
                  <input class="form-control" name="number_shares" id="number_shares" type="number">
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Director Profit</label>
                  <input class="form-control" name="director_profit" id="director_profit" type="number">
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Profit</label>
                  <input class="form-control" name="profit" id="profit" type="number">
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Declar Date</label>
                  <input class="form-control" name="dec_date" id="dec_date" type="date">
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Status</label>
                  <input class="form-control" name="status" id="status" type="text">
                </div>
              </div>

            </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
</div>
@endsection