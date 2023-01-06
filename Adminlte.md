# Admin LTE config

```
composer require jeroennoten/laravel-adminlte:^3
php artisan adminlte:install
```

### ./resources/views/welcome.blade.php
```php
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
```