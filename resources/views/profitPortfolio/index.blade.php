@extends('layout.app')

@section('content')
<div class="container">
    <div class="m-3 card">
        <div class="card-body">
            <h3>Profit Portfolio</h3>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">Profit Declare Date</label>
                        <input type="date" class="form-control" id="date_of_dec">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">Director Profit</label>
                        <input type="number" class="form-control" name="director_profit" id="director_profit">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">Year</label>
                        <select id="year" class="form-control">
                            <option value="">Select Year</option>
                            @for($i=2021; $i<= date('Y'); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 pt-3 mt-2">
                    <button onclick="get_details()" class="btn btn-primary" type="button" onclick="get_details_report()">Get Report</button>
                </div>
            </div> 
            <div class="row">
                <div class="col-12">
                    <div id="details">

                    </div>
                </div>
            </div>     
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
	function get_details() {
		var director_profit = $('#director_profit').val();
		var date_of_dec = $('#date_of_dec').val();
		var year = $('#year').val();
		if (director_profit) {
			$.ajax({
				url: "{{route('profitPortfolio.details')}}",
				data: {'director_profit': director_profit,'year': year,'date_of_dec':date_of_dec},
				dataType: 'json',
				success: function(data) {
                    console.log(data);
                    $('#details').html(data);
				},
				error: function(e) {
					console.log(e);
				}
			});
		} else {
			alert("Please enter director profit");
			$('#director_profit').focus();
		}
		return false; // keeps the page from not refreshing     
	}
</script>
@endpush