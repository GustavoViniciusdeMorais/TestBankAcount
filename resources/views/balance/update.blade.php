@extends('adminlte::page')
@section('title', 'Balance')
@section('content_header')
    <h1>Realizar Saque</h1>
@stop
@section('content')
    @if (isset($account->account->balance))
        <div class="card">
            <div class="card-header">
                Valor na conta: {{ $account->account->balance->value ?? 0 }}
            </div>
            <div class="card-body">
                <form
                    method="POST"
                    action="{{route('balances.update', ['balance' => $account->account->balance->id])}}"
                    >

                    @csrf
                    @method('PUT')

                    <input type="hidden" value="{{$account->account->id}}" name="account_id">

                    <label for="">Valor do saque</label>
                    <input type="text" value="" name="value">

                    <button>Sacar</button>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    @else
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                Nenhum valor encontrado
            </div>
            <div class="card-footer"></div>
        </div>
    @endif

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> </script>
@stop