@section('title')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<title>Customer</title>
@endsection
@extends('layouts.app')
@section('content')
<style type="text/css">
    html * {
  box-sizing: border-box;
}

p {
  margin: 0;
}
.upload__box {
    padding: 40px;
}
.upload__btn-box {
    margin-bottom: 10px;
}
.upload__img-wrap {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}
.upload__img-box {
    width: 200px;
    padding: 0 10px;
    margin-bottom: 12px;
}
.img-bg {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  padding-bottom: 100%;
}

.upload__img-close {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: center;
    line-height: 24px;
    z-index: 1;
    cursor: pointer;
}
</style>
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Monthly PO Report</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Monthly PO Report</li>
            </ol>
        </div>
        
    </div>
    <!-- End Page Header -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                   
                        <h6 class="card-title mb-1">Customer</h6>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                      <!--  <span class="float-right">
                                <a class="btn btn-primary" href="{{ route('customers.create') }}">Create Customer</a>
                            </span> -->
                        <br>
                       
                            <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="userid">Agent</label>
                                       <select class="form-control js-example-basic-single"  name="agentid" id="agentid">
                                            <option value="">Select Agent</option>
                                            @if($agent)
                                            @foreach($agent as $cust)
                                            <option value="{{$cust->id}}">{{$cust->name}} ({{$cust->contact}})</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div> 
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="month">Month</label>
                                        <input type="text" class="form-control form-year" value="{{date('m-Y')}}" name="month" id="month">
                                    </div> 
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                         <button onClick="window.location.reload();" style="margin-top: 28px;" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                              
                                
                                
                            </div>
                    </div>
                    <div class="table-responsive">
                    <table id="exportexample1" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>Agent Name</th>
                                <th>Monthly Monthly Amount</th>
                                <th>Monthly Po Amount</th>
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

    </div>
    

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Post Office Payment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="Paymentpo">
        @csrf
          <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" name="amount" required>
          </div>
          <div class="form-group">
            <label for="amount">Payment Date:</label>
            <input type="text" class="form-control form-date" name="payment_date" required>
          </div>
          <div class="form-group">
            <label for="amount">Payment For Month:</label>
            <input type="text" class="form-control form-year" name="payment_month" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
          <input type="hidden" name="customer_id" id="customer_id">
          <button style="float:right;" type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Main Payment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="Paymentmain">
        @csrf
          <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" name="amount" required>
          </div>
          <div class="form-group">
            <label for="amount">Payment Date:</label>
            <input type="text" class="form-control form-date" name="payment_date" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
          <input type="hidden" name="customer_id" id="customer_id2">
          <button style="float:right;" type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </div>
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
    var table = '';
    $(document).ready(function () {

        table = $('#exportexample1').DataTable({
            dom: 'lBfrtip',
            buttons: [
               { 
                  extend: 'excel',
                  text: 'Customer Excel Export'
               }
            ],
            lengthMenu: [[25, 100, -1], [25, 100, "All"]],
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('po-list') }}",
                "type": "get",
                "data": function (d) {
                d.month = $('#month').val(),
                d.agentid = $('#agentid').val()
                }
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'totalmainamt', name: 'totalmainamt'},
                {data: 'totalpoamt', name: 'totalpoamt'}
            ],
            "fnDrawCallback": function () {
            }
        });

         $('#agentid').change(function(){
            table.draw();
        });

        $('#month').change(function(){
            table.draw();
        }); 
       
        $(document).on('click','.addposamount',function(){
            var id = $(this).attr('id');
            $('#customer_id').val(id);
            $('#myModal').modal('show');
        });

        $(document).on('click','.addmainamount',function(){
            var id = $(this).attr('id');
            $('#customer_id2').val(id);
            $('#myModal2').modal('show');
        });

        $(document).on('submit','#Paymentpo',function(e){
             e.preventDefault();
             $.ajax({
                url:"{{route('popayments.store')}}",
                type:'post',
                data:$(this).serialize(),
                success:function(res){
                    if(res == 'success'){
                     $('#Paymentpo').trigger('reset');
                     $('#myModal').modal('hide');
                     table.draw();
                    }
                }
             })
        })

       $(document).on('submit','#Paymentmain',function(e){
             e.preventDefault();
             $.ajax({
                url:"{{route('popayments.mainstore')}}",
                type:'post',
                data:$(this).serialize(),
                success:function(res){
                    if(res == 'success'){
                     $('#Paymentmain').trigger('reset');
                     $('#myModal2').modal('hide');
                     table.draw();
                    }
                }
             })
        })



    });


</script>
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
