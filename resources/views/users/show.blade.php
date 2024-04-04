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
                
                <div class="col-lg-8">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$user->name}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Username</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$user->username}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Contact</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$user->contact}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{$user->gender}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Joining Date:</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">    @if($user->joining_date)
                            {{ date('d-m-Y',strtotime($user->joining_date)) }}
                            @endif</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$user->address}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-2">
                            <p class="mb-0">Pancart</p>
                        </div>
                        <div class="col-sm-2">
                            @if($user->pancard != '')
                            <a target="_blank" href="{{url('/').'/'.$user->pancard}}">
                            <img src="{{url('/').'/'.$user->pancard}}" alt="" style="width:100px; height:100px">
                            </a>
                            @else
                            <p class="text-muted mb-0">No Available</p>
                            
                            @endif
                        </div>
                        <div class="col-sm-2">
                            <p class="mb-0">Addharcard Front</p>
                        </div>
                        <div class="col-sm-2">
                            @if($user->aadharcard != '')
                            <a target="_blank" href="{{url('/').'/'.$user->aadharcard}}">
                            <img src="{{url('/').'/'.$user->aadharcard}}" alt=""  style="width:100px; height:100px">
                            </a>
                            @else
                            <p class="text-muted mb-0">No Available</p>
                            
                            @endif
                        </div>
                        <div class="col-sm-2">
                            <p class="mb-0">Addhar Card Back</p>
                        </div>
                        <div class="col-sm-2">
                            @if($user->aadharback != '')
                            <a target="_blank" href="{{url('/').'/'.$user->aadharback}}">
                            <img src="{{url('/').'/'.$user->aadharback}}" alt=""  style="width:100px; height:100px">
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
                            @if($user->other != '')
                            <a target="_blank" href="{{url('/').'/'.$user->other}}">
                            <img src="{{url('/').'/'.$user->other}}" alt=""  style="width:100px; height:100px">
                            </a>
                            @else
                            <p class="text-muted mb-0">No Available</p>
                            
                            @endif
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
   
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

@endsection
