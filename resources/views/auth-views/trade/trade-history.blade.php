@extends('layout.logged')
@section('css')
<link rel="stylesheet" href="{{asset('project/css/charts.css')}}">
@endsection
@section('body-content')
<div class="open-trades">
    <div class="absolute-navigator">
        <a href="/charts"> &lt; MARKETS</a><br>
        <a href="/trades"> OPEN TRADES</a>
    </div>
<div class="head">
    <h1>Trade History</h1>
</div>
<div class="trades-table">
    <table>
        <thead>
            <tr>
                <th>Trade ID</th>
                <th>Symbol</th>
                <th>Opening Price</th>
                <th>Closing Price</th>
                <th>Action</th>
                <th>Profit</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($closedTrades as $closedTrade)
                <tr>
                    <td>{{ $closedTrade->trade_id }}</td>
                    <td>{{ $closedTrade->trade->symbol }}</td>
                    <td>{{ $closedTrade->trade->price }}</td>
                    <td>{{ $closedTrade->close_price }}</td>
                    <td>{{ $closedTrade->trade->action }}</td>
                    <td>{{ $closedTrade->trade->profit }}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection