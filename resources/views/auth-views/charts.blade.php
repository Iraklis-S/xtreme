@extends('layout.logged')

@section('css')
    <link rel="stylesheet" href="{{ asset('project/css/charts.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection
@section('body-content')
    <div class="container-for-markets">
        <h1>MARKETS</h1>
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
<div class="d-flex " id="big-wrap">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">



                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('BITSTAMP:BTCUSD')">
                            <div class="currency">
                                BTC/USD
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('BITSTAMP:ETHUSD')">
                            <div class="currency">
                                ETH/USD
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('NASDAQ:TSLA')">
                            <div class="currency">
                                TESLA
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('NASDAQ:AMZN')">
                            <div class="currency">
                                AMAZON
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('NASDAQ:GOOGL')">
                            <div class="currency">

                                GOOGLE
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('FX:EURUSD')">
                            <div class="currency">
                                EUR/USD
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('FX:GBPUSD')">
                            <div class="currency">
                                GBP/USD
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="market">
                        <a href="#" onclick="changeTrSymbol('FX_IDC:CHFUSD')">
                            <div class="currency">
                                CHF/USD
                            </div>
                            <div class="price-date">
                                <div>
                                    DATE: {{ now()->format('d-m-y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div  id="update-chart">
            <input type="text" id="currencyInput" placeholder="Example: EURUSD" class="mb-1 rounded">
            <button onclick="updateOnClick()" class="btn btn-dark">Update CHART</button>
        </div>
</div>




        <div class="two-inside">
            <div class="tradingview-widget-container">
                <div id="tradingview_f644a"></div>
            </div>



            <div class="trade-options">
                <form action="{{ route('trade.store') }}" method="POST">
                    @csrf
                    <div class="width-class">
                        <label for="symbol">Symbol:</label><br>
                        <select name="symbol" id="symbol" required>

                            {{-- <option value="ALL/USD">ALL/USD</option>
                            <option value="AED/USD">AED/USD</option>
                            <option value="BTC/USD">BTC/USD</option>
                            <option value="EUR/USD">EUR/USD</option>
                            <option value="ETH/USD">ETH/USD</option>
                            <option value="CHF/USD">CHF/USD</option>
                            <option value="GBP/USD">GBP/USD</option>
                            <option value="LTC/USD">LTC/USD</option>
                            <option value="YEN/USD">YEN/USD</option>
                            <option value="CNH/USD">YUAN/USD</option> --}}

                            @foreach ($markets as $market)
                                <option value="{{ $market->symbol }}/USD">{{ $market->symbol }}/USD</option>
                            @endforeach
                            @foreach ($markets as $market)
                                <option value="{{ $market->symbol }}/EUR">{{ $market->symbol }}/EUR</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="width-class">
                        <label for="quantity">Quantity:</label><br>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="1"
                            required>
                        <label for="current-price">Price:</label><br>
                        <input type="text" name="price" id="current-price" value="">
                    </div>
                    <div class="width-class">
                        <button type="submit" name="action" value="buy">Buy</button>
                        <button type="submit" name="action" value="sell">Sell</button>
                    </div>
                    <div class="width-class">
                        <label for="take_profit">TP</label><br>
                        <input type="text" name="take_profit" id="take_profit" value="0"><br>
                        <label for="stop_loss">SL</label><br>
                        <input type="text" name="stop_loss" id="stop_loss" value="0">
                    </div>
                    <div class="leverage width-class">
                        <span>Leverage</span> <span> 100x</span>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <div class="bottom">
        <a href="/trades" class="o-trade">OPEN TRADES </a>
        <a href="/trade-history">TRADE HISTORY</a>
    </div>

    <script src="{{ asset('project/js/swiper.js') }}"></script>
    <script src="{{ asset('project/js/charts.js') }}"></script>
    {{-- <script src="{{ asset('project/js/price.js') }}"></script> --}}
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <script>
        function updateOnClick() {
            const currencyInput = document.getElementById('currencyInput');


            // Get the user's input from the input field
            const userSymbol = currencyInput.value;

            changeTrSymbol(userSymbol);
        }
    </script>
@endsection
