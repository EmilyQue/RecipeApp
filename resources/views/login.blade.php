@extends('layouts.appmaster')
@section('title', 'Login')

@section('content')
    <div class="login-form">
        <form action="/examples/actions/confirmation.php" method="post">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            <p class="register-link" align="center">Don't have an account? Register <a href="/register">here</a></p>
        </form>
    </div>
@endsection
