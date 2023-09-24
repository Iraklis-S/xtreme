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
    <h1>OPEN TRADES</h1>
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
                    <th>Current Profit </th>
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
                    <td class="d-flex justify-content-end">
                        <span data-trade-id='{{ $trade->trade->id }}'></span>
                        <button onclick="fetchProfit({{ $trade->trade->id }})">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.06189 13C4.02104 12.6724 4 12.3387 4 12C4 7.58172 7.58172 4 12 4C14.5006 4 16.7332 5.14727 18.2002 6.94416M19.9381 11C19.979 11.3276 20 11.6613 20 12C20 16.4183 16.4183 20 12 20C9.61061 20 7.46589 18.9525 6 17.2916M9 17H6V17.2916M18.2002 4V6.94416M18.2002 6.94416V6.99993L15.2002 7M6 20V17.2916" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        
                    </td>
                    <td>
                        <form action="{{ route('trade.close', $trade->trade->id) }}" method="POST">
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

    <script src="{{asset('project/js/current-profit.js') }}"></script>
@endsection