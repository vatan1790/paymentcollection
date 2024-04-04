@section('title')
<title>Customer</title>
@endsection
@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">User Details</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Details</li>
            </ol>
        </div>
        
    </div></a>
    <!-- End Page Header -->
    <section style="background-color: #eee;">
        <div class="py-5">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="float-right">
                                        <a class="btn btn-primary" href="{{ route('customers') }}">Back</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                       
                        <div class="col-sm-3">
                            <p class="mb-0">Agent Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->agent->name}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Customer Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->name}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->gender}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nominee</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->nominee}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->contact}}</p>
                        </div>
                        </div>
                        <hr>
                         <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Account No.</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->account_no}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">CIF No.</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->cif_no}}</p>
                        </div>
                        </div>
                        <hr>
                         <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Short Code</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->short_code}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Monthly Installment</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->amount}}</p>
                        </div>
                        </div>
                        <hr>
                         <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Per/Day Ammount</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$customer->one_day_amount}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Date of Open</p>
                        </div>
                        <div class="col-sm-3">
                            @if($customer->created_at == null)

                            <p class="text-muted mb-0">No Available</p>
                            
                            @else
                            <p class="text-muted mb-0">{{date('d-m-Y',strtotime($customer->created_at))}}</p>
                            @endif

                            
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$customer->address}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-2">
                            <p class="mb-0">Pancart</p>
                        </div>
                        <div class="col-sm-2">
                            @if($customer->pancard != '')
                            <a target="_blank" href="{{url('/').'/'.$customer->pancard}}">
                            <img src="{{url('/').'/'.$customer->pancard}}" alt="" style="width:100px; height:100px">
                            </a>
                            @else
                            <p class="text-muted mb-0">No Available</p>
                            
                            @endif
                        </div>
                        <div class="col-sm-2">
                            <p class="mb-0">Addharcard Front</p>
                        </div>
                        <div class="col-sm-2">
                            @if($customer->aadharcard != '')
                            <a target="_blank" href="{{url('/').'/'.$customer->aadharcard}}">
                            <img src="{{url('/').'/'.$customer->aadharcard}}" alt=""  style="width:100px; height:100px">
                            </a>
                            @else
                            <p class="text-muted mb-0">No Available</p>
                            
                            @endif
                        </div>
                        <div class="col-sm-2">
                            <p class="mb-0">Addhar Card Back</p>
                        </div>
                        <div class="col-sm-2">
                            @if($customer->aadharback != '')
                            <a target="_blank" href="{{url('/').'/'.$customer->aadharback}}">
                            <img src="{{url('/').'/'.$customer->aadharback}}" alt=""  style="width:100px; height:100px">
                            </a>
                            @else
                            <p class="text-muted mb-0">No Available</p>
                            
                            @endif
                        </div>
                        
                        </div> 
                         <hr>
                        <div class="row">
                             <div class="col-sm-2">
                            <p class="mb-0">Other Document</p>
                        </div>
                        <div class="col-sm-2">
                            @if($customer->other != '')
                            <a target="_blank" href="{{url('/').'/'.$customer->other}}">
                            <img src="{{url('/').'/'.$customer->other}}" alt=""  style="width:100px; height:100px">
                            </a>
                            @else
                            <p class="text-muted mb-0">No Available</p>
                            
                            @endif
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                    <div class="card-body text-center">

                        <?php
                         $url = url('/customers').'/'.$customer->id;
                         $image = \QrCode::size(200)->generate($url);
                        ?>
                         {{$image}}
                         <br>
                        <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)->generate($url)) !!}" download>QR Code Download</a>

                        <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> -->
                       <!--  <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary">Follow</button>
                        <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                   
                        <h6 class="card-title mb-1">Payments</h6>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <br>
                          <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="month">From date</label>
                                    <input type="text" class="form-control form-date" value="{{date('1-m-Y')}}" name="fmonth" id="fmonth2">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="month">To date</label>
                                    <input type="text" class="form-control form-date" value="{{date('t-m-Y')}}" name="month" id="month2">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                     <a href="" style="margin-top: 28px;" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                          
                            
                            
                        </div>
                      
                    </div>
                    <div class="table-responsive">
                    <table id="exportexample1" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <!-- <th>Payment ID</th> -->
                                <th>Daily Amount</th>
                                <th>Closing Ammount</th>
                                <th>Opening Ammount</th>
                                <th>Po Amount</th>
                                <th>Po Closing Ammount</th>
                                <th>Po Opening Ammount</th>
                                <th>Admin Amount</th>
                                <th>Payment By</th>
                                <th>Description</th>
                                <th>Payment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        
                        </tbody>
                    </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
     <!-- Row-->
 <!--    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                   
                        <h6 class="card-title mb-1">Po Payments</h6>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <br>
                          <div class="row">
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="month">From date</label>
                                    <input type="text" class="form-control form-date" value="{{date('1-m-Y')}}" name="fmonth" id="fmonth">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="month">To date</label>
                                    <input type="text" class="form-control form-date" value="{{date('t-m-Y')}}" name="month" id="month">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                     <a href="" style="margin-top: 28px;" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                          
                            
                            
                        </div>
                      
                    </div>
                    <div class="table-responsive">
                    <table id="exportexample2" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>Payment ID</th>
                                <th>Amount</th>
                                <th>Closing Ammount</th>
                                <th>Opening Ammount</th>
                                <th>Payment By</th>
                                <th>Description</th>
                                <th>Payment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        
                        </tbody>
                    </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Row -->

    </div>
    


@endsection


@section('scripts')
<!-- Data Table js -->
<script src="{{ URL::to('/') }}/assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<script src="{{ URL::to('/') }}/assets/js/table-data.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/jszip.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>

 <script>
    var table2 = '';
    $(document).ready(function () {

        table2 = $('#exportexample1').DataTable({
            dom: 'lBfrtip',
            buttons: [
               { 
                  extend: 'excel',
                  text: 'Payment Excel Export'
               }
            ],
            lengthMenu: [[25, 100, -1], [25, 100, "All"]],
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                "url": "{{ URL::to('payment-list?customer_id=').$customer->id }}",
                "type": "get",
                "data": function (d) {
                  d.month = $('#month2').val(),
                  d.fmonth = $('#fmonth2').val()
                }
            },
            columns: [
                // {data: 'id', name: 'id'},
                {data: 'amount', name: 'amount'},
                {data: 'closing_balance', name: 'closing_balance'},
                {data: 'opening_balance', name: 'opening_balance'},
                {data: 'post_amount', name: 'post_amount'},
                {data: 'post_closing', name: 'post_closing'},
                {data: 'post_opening', name: 'post_opening'},
                {data: 'remaining', name: 'remaining'},
                {data: 'payment_by', name: 'payment_by'},
                {data: 'description', name: 'description'},
                {data: 'created_at', name: 'created_at'},
                ],
            "fnDrawCallback": function () {
            }
        });
        $('#month2').change(function(){
            table2.draw();
        });
        $('#fmonth2').change(function(){
            table2.draw();
        });

    });


</script>
<!-- 
 <script>
    var table = '';
    $(document).ready(function () {

        table = $('#exportexample2').DataTable({
            dom: 'lBfrtip',
            buttons: [
               { 
                  extend: 'excel',
                  text: 'Payment Excel Export'
               }
            ],
            lengthMenu: [[25, 100, -1], [25, 100, "All"]],
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                "url": "{{ URL::to('popayment-list?customer_id=').$customer->id }}",
                "type": "get",
                "data": function (d) {
                  d.month = $('#month').val(),
                  d.fmonth = $('#fmonth').val()
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'amount', name: 'amount'},
                {data: 'closing_balance', name: 'closing_balance'},
                {data: 'opening_balance', name: 'opening_balance'},
                {data: 'payment_by', name: 'payment_by'},
                {data: 'description', name: 'description'},
                {data: 'created_at', name: 'created_at'},
                ],
            "fnDrawCallback": function () {
            }
        });
        $('#month').change(function(){
            table.draw();
        });
         $('#fmonth').change(function(){
            table.draw();
        });


    });


</script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<script>
$(document).ready(function(){
    $('.form-year').datepicker({
        format: 'mm-yyyy',
        viewMode: "months", 
        todayHighlight: true,
        autoclose: true,
        minViewMode: "months"
    });
    $('.form-date').datepicker({
          format: 'dd-mm-yyyy',
        // container: container,
        todayHighlight: true,
        autoclose: true,
        });

});
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
