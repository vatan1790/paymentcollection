<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
</head>
<body>

<div class="container">     
  <table class="table table-striped" id="studtable">
    <thead>
      <tr>
        <th>S.no.</th>
        <th>Name</th>
        <th>Contact No.</th>
        <th>Account No.</th>
        <?php for ($i=1; $i <date("t", strtotime($date)) ; $i++) {  ?>
        <th>{{$i}}</th>
        <?php } ?>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

     
      @if($user)
      @foreach($user as $cust)
      <tr>
        <td></td>
        <td>collection  agent </td>
        <td>{{$cust->name}}</td>
      </tr>
      @if($cust->customer)
      @foreach($cust->customer as $key => $user)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->contact}}</td>
        <td>{{$user->account}}</td>
        <?php 
        $totala=0;  
        for ($i=1; $i <date("t", strtotime($date)) ; $i++) {  
        ?>
          <?php  

          $amt = DB::table('payments')->where('customer_id',$user->id)->where('payment_date',date('Y-m-d',strtotime($i.'-'.$date)))->first();
          if(!empty($amt)){ $amount=$amt->amount; }else{ $amount=0; }
          $totala = $totala+$amount;
          ?>
        <td>{{$amount }}</td>
        <?php } ?>
        <td>{{ $totala  }}</td>
      </tr>
       
      @endforeach
      @endif
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Total</td>
        <?php  
        for ($i=1; $i <date("t", strtotime($date)) ; $i++) {  
        ?>
          <?php  

          $totalaa = DB::table('payments')->where('user_id',$cust->id)->where('payment_date',date('Y-m-d',strtotime($i.'-'.$date)))->sum('amount');
        
          ?>
        <td>{{  $totalaa   }}</td>
        <?php } ?>
        <td></td>
      </tr>


      @endforeach
      @endif
    </tbody>
  </table>
</div>
<script>
 
 $(document).ready(function () {
    $("#studtable").table2excel({
        filename: "Students.xls"
    });
    window.location.href="{{ route('customers') }}";
 });
 
</script>
</body>
</html>
