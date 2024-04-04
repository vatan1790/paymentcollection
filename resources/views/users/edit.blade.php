@extends('layouts.app')
@section('content')

<div class="container">
    <div class="justify-content-center">
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
        <div class="card">
            <div class="card-header">Update Agent
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Agent</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($post, ['route' => ['users.update', $post->id], 'method'=>'PATCH','enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <strong>Name<span style="color:red;">*</span></strong>
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
                                {!! Form::number('contact', null, array('placeholder' => 'Contact','class' => 'form-control','required'=>'required')) !!}
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
                                <strong>Address<span style="color:red;">*</span></strong>
                                {!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control','required' =>'required')) !!}
                
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Password<span style="color:red;">*</span></strong>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>    
                           <div class="col-md-3">
                            <div class="form-group">
                                <strong>Confirm Password<span style="color:red;">*</span></strong>
                                {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>     
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Pancard</strong>
                                {!! Form::file('pancard', null, array('placeholder' => 'Pancard','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>  

                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Aadharcard Front</strong>
                                {!! Form::file('aadharcard', null, array('placeholder' => 'Aadharcard','class' => 'form-control','required'=>'required')) !!}
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
                                {!! Form::file('other', null, array('placeholder' => 'Other','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Joining Date<span style="color:red;">*</span></strong>
                                {!! Form::text('joining_date', null, array('placeholder' => 'Joining Date','class' => 'form-control form-year','required'=>'required','minlength'=>10,'maxlength'=>10,'onkeypress'=>"return isNumberKey(event);")) !!}
                            </div>
                        </div> 
                                        
                   
                    {{-- <div class="col-md-3">
                        <div class="form-group">
                            <strong>Status:</strong>
                            {!! Form::select('status', array(1=>'Active',0 => 'Disable'),null, array('class' => 'form-control')) !!}
                        </div>
                    </div>     --}}
                </div>    
                
                        <input type="hidden" name="type" value="agent">
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script type="text/javascript">
    $(document).ready(function(){
       $('.form-year').datepicker({
          format: 'dd-mm-yyyy',
        // container: container,
        todayHighlight: true,
        autoclose: true,
        });

    });
</script>
@endsection