@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Investor Payment</h4>
                    <p class="card-description">Create Investor Payment</p>
                    <form class="forms-sample" method="post" action="{{ route ('investorPayment.store') }}" enctype="multipart/form-data">
                    @csrf 
                      <div class="form-group">
                        <label for="investor_id">Investor ID</label> <br>
                        <input type="number" name="investor_id" id="investor_id" class="investor_id">
                      </div>

                      <div class="form-group">
                        <label for="name">Investor Name</label> <br>
                        <input type="text" name="name" id="name" class="name">
                      </div>

                      <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="date" name="date" id="date">
                      </div>

                      <div class="form-group">
                        <label for="book_no">Book No</label>
                        <input type="number" class="book_no" name="book_no" id="book_no">
                      </div>

                      <div class="form-group">
                        <label for="receipt_no">Receipt No</label>
                        <input type="number" class="receipt_no" name="receipt_no" id="receipt_no">
                      </div>

                      <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" class="picture" name="picture" id="picture">
                      </div>

                      <div class="form-group">
                        <label for="particulars">Particulars</label>
                        <input type="text" class="particulars" name="particulars" id="particulars">
                      </div>

                      <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" class="payment_method" name="payment_method" id="payment_method">
                      </div>

                      <div class="form-group">
                        <label for="collection_for_month">Collection for Month</label>
                        <input type="text" class="opening_balance" name="collection_for_month" id="collection_for_month">
                      </div>

                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="amount" name="amount" id="amount">
                      </div>

                      <div class="form-group">
                        <label for="per_share_amount">Per Share Amount</label>
                        <input type="number" class="per_share_amount" name="per_share_amount" id="per_share_amount">
                      </div>

                      <div class="form-group">
                        <label for="total_deposits">Total Deposits</label>
                        <input type="number" class="total_deposits" name="total_deposits" id="total_deposits">
                      </div>

                      <div class="form-group">
                        <label for="dues">Dues</label>
                        <input type="number" class="dues" name="dues" id="dues">
                      </div>

                      <div class="form-group">
                        <label for="advance">Advance</label>
                        <input type="number" class="advance" name="advance" id="advance">
                      </div>

                      <div class="form-group">
                        <label for="account_status">Account Status</label>
                        <input type="number" class="account_status" name="account_status" id="account_status">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection