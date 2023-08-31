<!DOCTYPE html>
<html>
  <head>
    <title>Simple login form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container" style="display: flex;flex-direction:column ">
      <div>
        
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 bg-black">
    <a href="#" class="flex items-center ">
        <img src="#" class="h-8 mr-3" alt="" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">IGLI</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      @auth
      <A href="/dashboard" style="color:white">DASHBOARD</A>
      <form action="/logout" method="post" class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        @csrf
        <input type="submit" name="log_out" value="LOG OUT"class="block py-2 pl-3 pr-4 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500">
       
      </form>
     
      @else
      <form action="/login" method="post" class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        @csrf
   
        <input name='login_usname'  type="text" class="block py-2 pl-3 pr-4 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" >
        <input name="login_pass" type="password" class="block py-2 pl-3 pr-4 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" >
       
          <input type="submit" name="sign_in" id="sign_in" value="LOG IN  " class="block py-2 pl-3 pr-4   text-black bg-blue-700 rounded md:text-blue-700 md:p-5 dark:text-white md:dark:text-blue-500">
       
      </form>
      @endauth
      
    </div>
  </div>
</nav>

@if(session('message'))
    <p class="text-center alert alert-danger">{{ session('message') }}</p>
@endif
      
    </div>
    <form action="/sent" method="post">
        @csrf
      <h1>Sign Up Form</h1>
     
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="username"><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="username" value="{{old('username')}}" required>
        @error('username')
        <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <label for="email"><strong>Email</strong></label>
        <input type="text" placeholder="Enter Email" name="email" value="{{old('email')}}" required>
        @error('email')
        <p class="alert alert-danger">{{$message}}</p>
      @enderror
        <label for="pass1"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="pass" id="pass1" required>
        @error('pass')
        <p class="alert alert-danger">{{$message}}</p>
      @enderror
        <label for="pass2"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="pass_confirmation"  id="pass2"required>
        @error('pass_confirmation')
        <p class="alert alert-danger">{{$message}}</p>
      @enderror
      </div>
      <button type="submit">Sign Up</button>
      <div class="container" style="background-color: #eee">
  
        
      </div>
</div>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </form>














    <style>
        html, body {
        display: flex;
        justify-content: center;
        font-family: Roboto, Arial, sans-serif;
        font-size: 15px;
        }
        form {
        border: 5px solid #f1f1f1;
        }
        input[type=text], input[type=password] {
        width: 100%;
        padding: 16px 8px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }
        button {
        background-color: #8ebf42;
        color: white;
        padding: 14px 0;
        margin: 10px 0;
        border: none;
        cursor: grabbing;
        width: 100%;
        }
        h1 {
        text-align:center;
        fone-size:18;
        }
        button:hover {
        opacity: 0.8;
        }
        .formcontainer {
        text-align: left;
        margin: 24px 50px 12px;
        }
        .container {
        padding: 16px 0;
        text-align:left;
        }
        span.psw {
        float: right;
        padding-top: 0;
        padding-right: 15px;
        }
        /* Change styles for span on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
        display: block;
        float: none;
        }
      </style>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>