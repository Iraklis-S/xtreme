@extends('layout.header-footer')


@section('css')
<link rel="stylesheet" href="{{asset('project/css/accounts.css')}}">
<script src="{{asset('project/js/flip.js')}}"> </script>
@endsection


@section('body-content')

<h1>ACCOUNTS</h1>

<div class="big-contain-cards">


<div class="scene scene--card">
    <div class="card">
      <div class="card__face card__face--front">
        <span class="span1"></span>
        <div>STARTING FROM <div class="price">1500$</div> <button class="btn">Learn More</button></div>    
      </div>
      <div class="card__face card__face--back">
        <div class="acc-name-sl">SILVER</div>
        <div class="perks">
            <div>Dedicated Account Representative<br><span> 2 days/week</span> </div>
            <div>Demo account</div>
            <div>Support Monday to Friday <br><span> 7:00 AM GMT to 01:00 AM GMT.</span></div>
            <div>Daily Analyst Ratings</div>
            <div>Daily market reviews & financial research</div>
        </div>
      </div>
    </div>
  </div>
  <div class="scene scene--card">
    <div class="card">
      <div class="card__face card__face--front">
        <span class="span2"></span>
        <div>STARTING FROM <div class="price">5000$</div> <button class="btn">Learn More</button></div>    
      </div>
      <div class="card__face card__face--back">
        <div class="acc-name-go">GOLD</div>
        <div class="perks">
           
            <div>Dedicated Account Representative<br><span> 3 days/week</span> </div>
            <div>Demo account</div>
            <div>Support Monday to Friday <br><span> 7:00 AM GMT to 01:00 AM GMT.</span></div>
            <div>Daily Analyst Ratings</div>
            <div>Daily market reviews & financial research</div>
            <div>Special Trading conditions</div>
        </div>
      </div>
    </div>
  </div>
  <div class="scene scene--card">
    <div class="card">
      <div class="card__face card__face--front">
        <span class="span3"></span>
        <div>STARTING FROM <div class="price">15000$</div><button class="btn">Learn More</button> </div>    
      </div>
      <div class="card__face card__face--back">
        <div class="acc-name-pl">BLACK</div>
        <div class="perks">
            <div>Dedicated Account Representative<br><span> 5 days/week</span> </div>
            <div>Demo account</div>
            <div>Support Monday to Friday <br><span> 7:00 AM GMT to 01:00 AM GMT.</span></div>
            <div>Daily Analyst Ratings</div>
            <div>Daily market reviews & financial research</div>
            <div>Special Trading conditions</div>
            <div>One-to-One meetings with Account Representative  </div>
        </div>
      </div>
    </div>
  </div>
  

</div>
<div class="signup-btn"><a href="/register" class="btn">SIGN UP NOW</a></div>
@endsection