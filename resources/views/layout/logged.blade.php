<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>x-Treme Traders</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('project/images/favicon.png' )}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{asset('project/css/inside.css')}}">
    @yield('css')

    <script src="{{asset('project/js/jquery.min.js')}}"></script>
</head>

<body>
    <div class="huge-container">


        <div class="large-part1">
          <div  class='brand-name'> <a class="navbar-brand " href="/" ><span class="sp-1">x-TREME </span><span class="sp-2" > TRADERS</span></a></div>
          
     <div class="div1">
     <div><a href="/dashboard">DASHBOARD <br> &<br> INFORMATION</a> </div>
              <div><a href="/profile">PROFILE <br> &<br>DOCUMENTS</a></div>
               <div><a href="/charts">TRADING MARKETS<br> &<br> CHARTS</a> </div>
            
            <div><a href="/deposit-wd">DEPOSITS<br> &<br>WIDHRAWALS</a></div>
           
            
            <div><a href="/support">SUPPORT</a></div>
            <div><a href="/forum">FORUM</a></div>
        
        
        </div>  
        </div><!-- Large Part1 ends here -->
        
    <div class="large-part2">
        <section>
        <nav class="navbar navbar-expand-lg  bg-dark" data-bs-theme="dark">
          <div class="container-fluid "> 
           
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                  <li class="nav-item ">
                    <a class="nav-link  " href="/dashboard">ACCOUNT ID: {{ auth()->user()->id }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/dashboard">BALANCE: {{ auth()->user()->userAccount->balance .' '. auth()->user()->userAccount->currency}}</a>
                  </li>
                </ul>
              </div>
    
            @if (auth()->user()->avatars)
              <div  class="photo-nav">
              <a href="/profile" class="photo-navb">
                  <img src="{{ asset( auth()->user()->avatars) }}" alt="Profile Picture">
                </a>
              </div>
              @else
              <div class="photo-nav">
                  <!-- Display a placeholder image if no profile picture is set -->
                  <img src="{{ asset('/fallback-avatar.jpg') }}" alt="Profile Picture">
                </div>
              @endif
  
           
            <div>
            <form class="d-flex" role="search" method="post" action="/logout" id="logout">
              @csrf
                <button class="btn btn-outline-success" type="submit" name="log_out">Log Out</button>
              </form>
            </div>
          </div>
        </nav>
     
      </section>
      
      @yield('body-content')
       
   
      
<div>
  <button id="supportButton">Contact Support</button>
  
  <div id="popupContainer" class="popup-container">
      <h3>Contact Customer Support</h3>
      @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  <form id="supportForm" action="{{ route('support') }}" method="post">
        @csrf
          <input type="text" name="name" placeholder="Your Name" required ">
          <input type="email" name="email" placeholder="Your Email" required>
          <textarea name="message" placeholder="Your Message" required></textarea>
          <button type="submit">Submit</button>
      </form>
  </div>

</div>
    </div>
</div ><!-- Huge Container ends here -->
       

      <script src="{{asset('project/js/support-btn.js')}}"></script>
</body>
</html>