
<div class="col-lg-12 stretch-card">
  <div class="card">
    <div class="card-body p-0">
      <h4 class="card-title">Profit Portfolio</h4>
      </p>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th> Investor Name </th>
            <th> Position </th>
            <th> Share </th>
            <th> Director Profit </th>
            <th> Profit </th>
            <th> Total </th>
            <th> Date </th>
          </tr>
        </thead>
        <tbody>
          @php
            $dirprofit= 0;
            $invstorprofit=0;
            
            $dirprofit_total=round((($income * ($director_profit/100))),2) ;
            $dirprofit= round(($dirprofit_total/ $num_director),2) ;
           
            $invstorprofit= round(((($income - $dirprofit_total) * ((100-($director_profit+2))/100))/ $num_shares),2) ;
          @endphp

          @foreach($investor as $inv)
          @php
            $dirProf=0;
            $invstorprofi=$invstorprofit*$inv->number_shares;
            if(!$inv->type)
              $dirProf=$dirprofit;
            
          @endphp
            <tr class="table-info">
              <td>{{++$loop->index}}</td>
              <td>{{$inv->name}} - {{$inv->contact_no}}</td>
              <td> {{$inv->type?"Investor":"Director"}} </td>
              <td> {{$inv->number_shares}} </td>
              <td> {{$dirProf}} </td>
              <td> {{$invstorprofi}} </td>
              <td> {{$invstorprofi + $dirProf}} </td>
              <td>
                 {{date('d-m-Y',strtotime($date_of_dec))}}
                <input type="hidden" name="investor_id[]" value="{{$inv->id}}">
                <input type="hidden" name="share[]" value="{{$inv->number_shares}}">
                <input type="hidden" name="director_profit[]" value="{{$dirProf}}">
                <input type="hidden" name="profit[]" value="{{$invstorprofi}}">
                <input type="hidden" name="date_of_declare[]" value="{{$date_of_dec}}">
                
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>