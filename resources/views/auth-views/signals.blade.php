
@extends('layout.logged')

@section('css')
<link rel="stylesheet" href="{{ asset('project/css/dashboard.css') }}">
@endsection

@section('body-content')
<h1>Stock Signals</h1>

<ul>
    @foreach ($stockSignals as $stockSignal)
        <li>
            <strong>Symbol:</strong> {{ $stockSignal['symbol'] }}<br>
            <strong>Company:</strong> {{ $stockSignal['company'] }}<br>
            <strong>Prognosis:</strong> {{ $stockSignal['signal'] }}
        </li>
    @endforeach
</ul>
@endsection