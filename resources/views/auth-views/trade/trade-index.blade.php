@extends('layout.logged')
@section('css')
<link rel="stylesheet" href="{{asset('project/css/charts.css')}}">
@endsection
@section('body-content')
<div class="open-trades">
    <div class="absolute-navigator">
        <a href="/charts"> &lt; MARKETS</a><br>
        <a href="/trade-history"> TRADE HISTORY</a>
    </div>
    <div class="head">
    <h1>Open Trades</h1>
    @if ($openTrades->isEmpty())
        <p>No open trades available.</p>
    @else
</div>
<div class="trades-table">
        <table>
            <thead>
                <tr>
                    <th>Trade ID</th>
                    <th>Symbol</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Close</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($openTrades as $trade)
                    <tr>
                        <td>{{ $trade->trade->id }}</td>
                        <td>{{ $trade->trade->symbol }}</td>
                        <td>{{ $trade->trade->price }}</td>
                        <td>{{ $trade->trade->quantity }}</td>
                        <td>{{ $trade->trade->action }}</td>
                        <td>
                            <form action="{{ route('trade.close', $trade->trade->id) }}" method="POST" >
                                @csrf
                                <button type="submit" id="close-btn">Close</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    @endif
@endsection