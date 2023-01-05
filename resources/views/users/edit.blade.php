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
            <div class="card-header">Create user
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($post, ['route' => ['users.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <strong>Name<span style="color:red;">*</span></strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required'=>'required')) !!}
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <strong>Email<span style="color:red;">*</span></strong>
                            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','required'=>'required')) !!}
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
                            <strong>Designation<span style="color:red;">*</span></strong>
                            {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control','required'=>'required')) !!}
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
                            <strong>Role<span style="color:red;">*</span></strong>
                            {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control js-example-basic-single','required'=>'required')) !!}
                  
                        </div>
                    </div>   
                    <div class="col-md-3">
                        <div class="form-group">
                            <strong>Bussiness:</strong>
                            {!! Form::select('business', $business,null, array('class' => 'form-control')) !!}
                        </div>
                    </div>    
                    {{-- <div class="col-md-3">
                        <div class="form-group">
                            <strong>Status:</strong>
                            {!! Form::select('status', array(1=>'Active',0 => 'Disable'),null, array('class' => 'form-control')) !!}
                        </div>
                    </div>     --}}
                </div>    
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

</script>
@endsection