@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_body')

    <div class="container py-1 h-100">
        <div class="card">
            <div class="card-header">
                <strong>Login</strong>
            </div>

            <div class="card-body">
                <form method="post" action="{{route('auth.login')}}">
            
                    @csrf
                    @method('POST')
        
                    <label for="">
                        Email
                    </label>
                    <input type="text" name="email" class="form-control" />
        
                    <label for="">
                        Senha
                    </label>
                    <input type="password" name="password" class="form-control" />
        
                    <br>
                    <button class="btn btn-primary btn-block">
                        Login
                    </button>
                    <hr>
                    <a href="{{ route('register.form') }}">Register</a>
                </form>
            </div>

            <div class="card-footer"></div>
    </div>

@stop