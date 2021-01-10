@extends('layouts.appmaster')
@section('title', 'Register')

@section('content')
    <div class="register-form">
        <form action="register" method="POST">
            <h2 class="text-center">Register</h2>
            <input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
            <div class="form-group">
                <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email Address" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            <p class="login-link" align="center">Already have an account? Login <a href="/login">here</a></p>
        </form>
    </div>
@endsection
