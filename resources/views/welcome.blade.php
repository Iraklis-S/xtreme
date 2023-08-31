@extends('layout.header-footer')



@section('css')
    <link rel="stylesheet" href="{{ asset('project/css/modal-form.css') }}">
    <link rel="stylesheet" href="{{ asset('project/css/style.css') }}">
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
@endsection



@section('body-content')



        <div id="popup">
            <div id="clock"></div>
            <div id="popup-content">
                <h1>CLOCK IS TICKING</h1>
                <video id="animated-gif" muted autoplay loop>
                    <source src="{{ asset('project/images/clock.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video> 


                <h2 class="animate">WIN YOUR FINANCIAL FREEDOM</h2>
                <button id="start-btn">START NOW</button>
            </div>
        </div>



        <section id="section3">
            <video src="{{ asset('project/images/Moving Dots.mp4') }}" alt="" autoplay muted loop></video>
            <h1 class="absol1" data-text="WE ARE THE INDUSTRY LEADERS"> WE ARE THE INDUSTRY LEADERS </h1>



            </div>
            <div class="option-contain">
                <div class="option-1">
                    <button value="HELLO" onclick="window.location.href='/register'">
                        OPEN DEMO ACCOUNT
                    </button>
                </div>
                <div class="option-2">
                    <button onclick="window.location.href='/register'">
                        OPEN LIVE ACCOUNT
                    </button>
                </div>
            </div>


            <div class="second-absol">
                <div class="absol2">

                    <div> <span class="class1"> 1000+ </span> <span class="class2">Trading Instruments </span></div>
                    <div> <span class="class1">24/7 </span><span class="class2">Trading Crypto CFDs</span> </div>


                    <div> <span class="class1">1000:1 </span><span class="class2">Leverage </span></div>
                    <div> <span class="class1">Bonus </span><span class="class2">up to $5,000</span> </div>
                </div>
            </div>
        </section>

        <br>
        <br>
        <section id="section4">
            <div class="all-contain">
                <div class="big-container">
                    <div class="currency-container">

                        <div class="c1"> <a href="#" onclick="changeSymbol('FX_IDC:USDEUR')">
                                <i class="fa-solid fa-dollar-sign"></i> </a></div>




                        <div class="c1"> <a href="#" onclick="changeSymbol('FX_IDC:EURUSD')">
                                <i class="fa-solid fa-euro-sign"></i>
                            </a></div>


                        <div class="c1"> <a href="#" onclick="changeSymbol('FX_IDC:RUBUSD')">
                                <i class="fa-solid fa-ruble-sign"></i> </a> </div>



                        <div class="c1"><a href="#" onclick="changeSymbol('FX_IDC:GBPEUR')">
                                <i class="fa-solid fa-sterling-sign"></i></a></div>




                        <div class="c1"><a href="#" onclick="changeSymbol('FX_IDC:CHFEUR')">
                                <i class="fa-solid fa-franc-sign"></i></a></div>




                        <div class="c1"><a href="#" onclick="changeSymbol('FX_IDC:JPYUSD')">
                                <i class="fa-solid fa-yen-sign"></i></a></div>



                    </div>

                    <div class="contain-1">
                        <div>
                            <div class="tradingview-widget-container">
                                <div id="tradingview_2cd9b"></div>
                                <div class="tradingview-widget-copyright">
                                    <a href="https://www.tradingview.com/symbols/EURUSD/?exchange=BITSTAMP" rel="noopener"
                                        target="_blank"><span class="blue-text">Chart</span></a>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="inside-container">

                    <div class="question">
                        WHY US?
                    </div>
                    <div class="box">

                        <div class="normal">
                            <span><i class="fa-regular fa-square-check"></i></span>
                            <div class="inside-normal">Low Fees
                                <div class="abnormal">0.1% Spread</div>
                            </div>
                        </div>

                        <div class="normal">
                            <span><i class="fa-regular fa-square-check"></i></span>
                            <div class="inside-normal">WELCOME BONUS
                                <div class="abnormal">UP TO 5K$</div>
                            </div>
                        </div>

                        <div class="normal">
                            <span><i class="fa-regular fa-square-check"></i></span>
                            <div class="inside-normal">SECURE
                                <div class="abnormal">HIGH-END ENCRYPTION</div>
                            </div>
                        </div>


                        <div class="normal">
                            <span><i class="fa-regular fa-square-check"></i></span>
                            <div class="inside-normal">TRUSTWORTHY
                                <div class="abnormal">FCA LICENSED</div>
                            </div>
                        </div>

                        <div class="normal">
                            <span><i class="fa-regular fa-square-check"></i></span>
                            <div class="inside-normal">DIVERSIFIED
                                <div class="abnormal">1000+ TRADING INSTRUMENTS</div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </section>



        <section>

            <div class="container-neon">
                <div>
                    <div class="neons ">
                        <div class="m-news"><em>MARKET NEWS</em>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>

            <div class="swiper mySwiper first-swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide news1">
                        <a
                            href="https://www.investing.com/news/stock-market-news/us-stocks-are-mixed-as-amazons-cloud-outlook-weighs-on-tech-3067715">
                            <img src="{{ asset('/public/project/images/LYNXNPEB8R0JA_L.jpg') }}" alt=""></a>
                        <div class="slide-text">U.S. stocks are rising as inflation data meets expectations</div>
                    </div>



                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

<section>
       <div class="daily-exchange">
        <hr >
        <p class="heading">DAILY EXCHANGE RATE</p>
        <p class="heading-2">AGAINST USD<br> {{ now()->format('d-m-Y') }}</p>
        
        <div class="exchange-container">
          <div class="exchange-inside1">
            <div id="eur" class="exchange-card">
                <h2>EUR</h2>
                <p class="rate"></p>
            </div>
            <div id="usd" class="exchange-card">
                <h2>USD</h2>
                <p class="rate"></p>
            </div>
          </div>
            <div class="exchange-inside2">
            <div id="gbp" class="exchange-card">
                <h2>GBP</h2>
                <p class="rate"></p>
            </div>
            <div id="chf" class="exchange-card">
                <h2>CHF</h2>
                <p class="rate"></p>
            </div>
          </div>
          
          <div class="exchange-inside3">
            <div id="rub" class="exchange-card">
                <h2>RUB</h2>
                <p class="rate"></p>
            </div>
            <div id="aud" class="exchange-card">
                <h2>AUD</h2>
                <p class="rate"></p>
            </div>
          </div>
            <div class="exchange-inside4">
            <div id="cad" class="exchange-card">
                <h2>CAD</h2>
                <p class="rate"></p>
            </div>
            <div id="jpy" class="exchange-card">
              <h2>JPY</h2>
              <p class="rate"></p>
          </div>
          </div>
        </div>
        <hr>
      </div>
      </section>


    <section>
<div class="video-back-container">

        <video  muted autoplay loop class="video-back" src="{{ asset('project/images/moving.mp4') }}"> </video>



        <div class="web-contain ">
            <div class="phone-1">RESPONSIVE WEB PAGE IN MOBILE & DESKTOP</div>
            
            {{-- <div class="phone-2"><img id="phone"src="{{ asset('project/images/phone.png') }}" alt="web page design"></div> --}}
           
            <div class="phone-3">
              <div>SOON ON THE  </div>
              <img id="appstore" src="{{asset('project/images/appstore.png')}}" >
               <div>AND</div>
              <img id="gplay" src="{{asset('project/images/gplay.png')}}"><br>
              <img id="phone"src="{{ asset('project/images/phone.png') }}" alt="web page design">
            </div>
        </div>


 </div> 
 
</section>

<div class="payment-methods">

    <div class="methods"><img src="{{asset('project/images/skrill.png')}}" alt="IMG"></div>
    <div class="methods"><img src="{{asset('project/images/neteller.png')}}" alt="IMG"></div>
    <div class="methods"><img src="{{asset('project/images/visa_electron.png')}}" alt="IMG"></div>
    <div class="methods"><img src="{{asset('project/images/mastercard.png')}}" alt="IMG"></div>
    <div class="methods"><img src="{{asset('project/images/maestro.png')}}" alt="IMG"></div>
    
</div>
    @endsection



    @section('js')
    <script src="{{ asset('project/js/home.js') }}"></script>
      <script src="{{ asset('project/js/fetch.js') }}"></script>
    
    @endsection