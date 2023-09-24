@extends('layout.header-footer')

@section('css')
@endsection

@section('body-content')


<section>

 

  <div class="login-container">
    <h2>LOG IN</h2>
            <div class="modal-contain">


                <div class="pic-contain">
                    <video src="{{asset('project/images/modal-vid.mp4')}}" alt="" autoplay loop muted></video>
                </div>

                
            <div class="form-contain">
            <form method="post" action="/login">
              @csrf
              @if(session('failed'))
         <div class="alert alert-danger">
        {{ session('failed') }}
          </div>
             @endif
                <div>
                    <label for="user-name">Username</label><br>
                    <input type="text" id="user-name" name="email">
                </div>
                <div>
                    <label for="password-login">Password</label><br>
                    <input type="password" id="password-login" name="password">
                </div>
                <div>
                    
                    <input type="submit" id="submit-login" name="submit">
                </div>
                <div class="signup-link">No account yet? <a href="/register">SIGN UP</a></div>
            </form>
        
        </div>
        
    </div>
</div>

</section>

<style>

.login-container{
    margin-top:10%;
}
  
h2{
    color: white;
}
.modal-contain{
  width: 100%;
  max-height: 400px;
  height: 400px;
  border: 2px groove;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  text-align: center;
  align-items: center;
  padding:50px 10px 50px 10px;
  margin: 0;
  padding: 0;
}


.form-contain{
  width: 50%;
  height: 100%;
background-color: gray;
}

.pic-contain{
  width: 50%;
  height: 100%;
  border-right: 2px solid black;
  box-sizing: border-box
  
}

.pic-contain  video{
  height: 100%;
  width: 100%;
  border-radius: 10px 0 0 10px;
  object-fit: cover;
}





 .login-container form{
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    text-align: center;
    align-items: center;
    justify-content: center;
    color: #000000;
  }
  
.login-container form > div{
  width: 80%;
}
  
  .close {
    color: #000000;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }
  
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }


 .login-container input[type="text"],
 .login-container input[type="password"],
.login-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: none;
}

.login-container input[type="text"],
.login-container input[type="password"] {
    background-color: #f2f2f2;
    color: #333;
}

.login-container input[type="submit"] {
    background-color: #ff6600;
    color: #fff;
    cursor: pointer;
}

.signup-link {
    margin-top: 10px;
    text-align: center;
}




</style>
@endsection