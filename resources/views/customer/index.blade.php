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
            <h2 class="main-content-title tx-24 mg-b-5">Customer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer</li>
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
                       <span class="float-right">
                                <a class="btn btn-primary" href="{{ route('customers.create') }}">Create Customer</a>
                            </span>
                        <br>
                        <form action="{{route('report')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Agent</label>
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
                                        <a href="" style="margin-top: 28px;" class="btn btn-danger">Reset</a>
                                    </div>
                                </div>
                              
                            </div>
                            
                        </form>
                    </div>
                    <div class="table-responsive">
                    <table id="exportexample1" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Agent Name</th>
                                <th>Customer Name</th>
                                <th>Account No.</th>
                                <th>CIF No.</th>
                                <th>Monthly EMI</th>
                                <th>Duration</th>
                                <th>Action</th>
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
                "url": "{{ route('customer-list') }}",
                "type": "get",
                "data": function (d) {
                d.agentid = $('#agentid').val()
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'agent', name: 'agent'},
                {data: 'name', name: 'name'},
                {data: 'account_no', name: 'account_no'},
                {data: 'cif_no', name: 'cif_no'},
                {data: 'amount', name: 'amount'},
                {data: 'duration', name: 'duration'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "fnDrawCallback": function () {
            }
        });
        
        $('#agentid').change(function(){
            table.draw();
        });

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
});
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
