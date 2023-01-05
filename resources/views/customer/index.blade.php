@section('title')
<title>Brand</title>
@endsection
@extends('layouts.app')
@section('content')
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
                      
                    </div>
                    <div class="table-responsive">
                    <table id="exportexample1" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>DOB</th>
                                <th>Pancard</th>
                                <th>Adharcard</th>
                                <th>Amount</th>
                                <th>Nominee</th>
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
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'gender', name: 'gender'},
                {data: 'address', name: 'address'},
                {data: 'dob', name: 'dob'},
                {data: 'pancard', name: 'pancard'},
                {data: 'aadharcard', name: 'aadharcard'},
                {data: 'amount', name: 'amount'},
                {data: 'nominee', name: 'nominee'},
            ],
            "fnDrawCallback": function () {
            }
        });

    });


</script>
@endsection
