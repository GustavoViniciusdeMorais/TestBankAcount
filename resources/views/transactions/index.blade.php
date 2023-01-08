@extends('adminlte::page')
@section('title', 'Transactions')
@section('content_header')
    <h1>Transactions</h1>
@stop
@section('content')
    
    <div class="card">
        <div class="card-header"></div>
        <div class="card-boody">

            <form method="POST" action="{{ route('transactions.index') }}">
                @csrf
                @method('POST')

                <input type="date" name="start_date">
                <input type="date" name="end_date">
                
                <button>
                    Filtrar
                </button>
            </form>
            
        </div>
        <div class="card-footer"></div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Relatório de Transações</h4>
        </div>
        <div class="card-boody">
            <table class="table">
                <thead>
                    <th>Valor Antigo</th>
                    <th>Valor Novo</th>
                    <th>Data</th>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>
                                {{ $transaction->old_value }}
                            </td>
                            <td>
                                {{ $transaction->new_value }}
                            </td>
                            <td>
                                {{ $transaction->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> </script>
@stop