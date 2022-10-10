@extends('panel.layout.main-login')

@section('content')
<div class="container">
    <div class="login-content">
        <div class="login-logo">
            <a href="index.html">
                <img class="align-content" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
            </a>
        </div>
        <div class="login-form">
            @if(Session::has('loginError'))
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                Username atau password salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            <form action="/loginpanel" method="post">
            @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" autofocus required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection