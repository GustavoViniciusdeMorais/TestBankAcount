@extends('adminlte::page')
@section('title', 'Balance')
@section('content_header')
    <h1>Realizar Deposito</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form method="POST" action="{{route('balances.store')}}">
                @csrf
                @method('POST')

                <input type="hidden" value="{{$account->account->id}}" name="account_id">

                <label for="">Valor</label>
                <input type="text" value="" name="value">

                <button>Depositar</button>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> </script>
@stop