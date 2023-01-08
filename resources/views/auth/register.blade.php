@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_body')

    <div class="container py-1 h-100">
        <div class="card">
            <div class="card-header">
                <strong>Register</strong>
            </div>

            <div class="card-body">
                <form method="post" action="{{route('register')}}">
            
                    @csrf
                    @method('POST')
        
                    <label for="">
                        Name
                    </label>
                    <input type="text" name="name" class="form-control" />

                    <label for="">
                        Email
                    </label>
                    <input type="email" name="email" class="form-control" />
        
                    <label for="">
                        CPF
                    </label>
                    <input type="text" name="cpf" class="form-control" />

                    <label for="">
                        Password
                    </label>
                    <input type="password" name="password" class="form-control" />

                    <label for="">
                        Confirm Password
                    </label>
                    <input type="password" name="c_password" class="form-control" />
        
                    <br>
                    <button class="btn btn-primary btn-block">
                        Register
                    </button>
                </form>
            </div>

            <div class="card-footer"></div>
    </div>

@stop