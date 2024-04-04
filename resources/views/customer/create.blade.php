@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Customer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </div>
        
    </div>
    <!-- End Page Header -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
           
            <div class="card-header">Create Customer
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('customers') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'users.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
                   <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Agent Name<span style="color:red;">*</span></strong>
                                 {!! Form::select('agent_id', $agent,null, array('class' => 'form-control')) !!}
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Customer Name<span style="color:red;">*</span></strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Username<span style="color:red;">*</span></strong>
                                {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>   
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Contact<span style="color:red;">*</span></strong>
                                {!! Form::text('contact', null, array('placeholder' => 'Contact','class' => 'form-control','required'=>'required','minlength'=>10,'maxlength'=>10,'onkeypress'=>"return isNumberKey(event);")) !!}
                            </div>
                        </div>   
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Gender<span style="color:red;">*</span></strong>
                                {!! Form::select('gender', array('male'=>'Male','female' => 'Female'),null, array('class' => 'form-control')) !!}
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Address</strong>
                                {!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Password<span style="color:red;">*</span></strong>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Confirm Password<span style="color:red;">*</span></strong>
                                {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>    
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Monthly Installment<span style="color:red;">*</span></strong>
                                {!! Form::text('amount', null, array('placeholder' => 'Amount','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>   
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Duration in Year</strong>
                                {!! Form::text('duration', null, array('placeholder' => 'Duration','class' => 'form-control')) !!}
                            </div>
                        </div>   
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Nominee</strong>
                                {!! Form::text('nominee', null, array('placeholder' => 'Nominee','class' => 'form-control')) !!}
                            </div>
                        </div>   
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Account No.</strong>
                                {!! Form::text('account_no', null, array('placeholder' => 'Account No.','class' => 'form-control')) !!}
                            </div>
                        </div>   
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>CIF No.</strong>
                                {!! Form::text('cif_no', null, array('placeholder' => 'CIF No.','class' => 'form-control')) !!}
                            </div>
                        </div>   
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Short Code</strong>
                                {!! Form::text('short_code', null, array('placeholder' => 'Short Code','class' => 'form-control')) !!}
                            </div>
                        </div>   
                        
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Per Day Amount<span style="color:red;">*</span></strong>
                                {!! Form::text('one_day_amount', null, array('placeholder' => 'One Day Amount','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>   
                      <!--    <div class="col-md-3">
                            <div class="form-group">
                                <strong>Given Amount<span style="color:red;">*</span></strong>
                                {!! Form::text('given_amount', null, array('placeholder' => 'One Day Amount','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>    -->
                         


                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Pancard</strong>
                                {!! Form::file('pancard', null, array('placeholder' => 'Pancard','class' => 'form-control')) !!}
                            </div>
                        </div>  

                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Aadharcard Front</strong>
                                {!! Form::file('aadharcard', null, array('placeholder' => 'Aadharcard','class' => 'form-control')) !!}
                            </div>
                        </div> 
                          <div class="col-md-3">
                            <div class="form-group">
                                <strong>Aadharcard Back</strong>
                                {!! Form::file('aadharback', null, array('placeholder' => 'Aadharcard','class' => 'form-control')) !!}
                            </div>
                        </div> 
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Other</strong>
                                {!! Form::file('other', null, array('placeholder' => 'Other','class' => 'form-control')) !!}
                            </div>
                        </div>                    
                       
                         <div class="col-md-12">
                            <div class="form-group">
                                <strong>Description<span style="color:red;">*</span></strong>
                                {!! Form::textarea('username', null, array('placeholder' => 'Description','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>   

                     <!--    <div class="col-md-3">
                            <div class="form-group">
                                <strong>Status:</strong>
                                {!! Form::select('status', array(1=>'Active',0 => 'Disable'),null, array('class' => 'form-control')) !!}
                            </div>
                        </div>    -->
                    </div>   
                        <input type="hidden" name="type" value="user">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

</div>
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}
</script>
@endsection