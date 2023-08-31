<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BlogPAGE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view1">View1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view2">View2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view3">View3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view4">View4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view5">View5</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="/create-post">CreatePost</a>
                </li>
                <li class="nav-item">
                <a href="/profile/{{ auth()->user()->id }}" class="nav-link">Go to Profile</a>
                 </li>
            </ul>
            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link nav-link">Logout</button>
            </form>
            @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>








      <div class="content">
        @yield('content')
    </div>


   




<footer>
    <div style="display: flex;border:2px solid black;justify-content:space-around">
     
        <div style="border:2px solid black">
        <ul>
            <li>LINK</li>
            <li>LINK</li>
            <li>LINK</li>
            <li>LINK</li>
            <li>LINK</li>
        </ul>
        </div>
        <div style="border:2px solid black">
            <ul>
                <li>LINK</li>
                <li>LINK</li>
                <li>LINK</li>
                <li>LINK</li>
                <li>LINK</li>
            </ul>
            </div>
            <div style="border:2px solid black">
                <ul>
                    <li>LINK</li>
                    <li>LINK</li>
                    <li>LINK</li>
                    <li>LINK</li>
                    <li>LINK</li>
                </ul>
                </div>
    </div>
</footer>








</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>

<style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    /* Main content container */
    .content {
      flex: 1; /* Take up remaining vertical space */
    }
    
    /* Footer styles */
    footer {
      background-color: #f5f5f5;
      padding: 20px;
      text-align: center;
      position: sticky;
      bottom: 0;
      width: 100%;
    }</style>