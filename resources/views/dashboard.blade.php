@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $account->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Account: {{ $account->account->uuid }}
        </div>
        <div class="card-body">
            Balance: {{ $account->account->balance->value ?? '0' }}
        </div>
        <div class="card-footer"></div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
