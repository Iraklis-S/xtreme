<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>x-Treme Traders</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('project/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('project/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('project/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('project/css/modal-form.css') }}">
    @yield('css')

    <script src="{{ asset('project/js/jquery.min.js') }}"></script>
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg  fixed-top " data-bs-theme="dark">
            <div class="container-fluid ">
                <a class="navbar-brand " href="/"><span class="sp-1">x-TREME </span><span class="sp-2">
                        TRADERS</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active " aria-current="page" href="/">HOMEPAGE</a>
                        <a class="nav-link" href="/about">ABOUT US</a>
                        <a class="nav-link " href="/accounts">ACCOUNTS</a>
                        <a class="nav-link" href="/contact-page">CONTACT US</a>
                        <button class="login-button" id='hidden-btn'>SIGN IN</button>

                    </div>

                </div>
                <button id="login-button" class="login-button">SIGN IN</button>
            </div>
        </nav>
    </section>


    <section>



        <div id="login-field" class="field">
            <div class="field-content">
                <span class="close">&times;</span>
                <h2>LOG IN</h2>
                <div class="modal-contain">


                    <div class="pic-contain">
                        <video src="{{ asset('project/images/modal-vid.mp4') }}" alt="" autoplay loop
                            muted></video>
                    </div>


                    <div class="form-contain">

                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            @if (session('failed'))
                                <div class="alert alert-danger">
                                    {{ session('failed') }}
                                </div>
                            @endif
                            <div>
                                <label for="user-name">Email</label><br>
                                <input type="text" id="user-name" name="email">
                            </div>
                            <div>
                                <label for="password-login">Password</label><br>
                                <input type="password" id="password-login" name="password">
                            </div>
                            <div>

                                <input type="submit" id="submit-login" name="submit">
                            </div>
                          </form>
                            <div class="signup-link">No account yet? <a href="/register">SIGN UP</a></div>
                

                    </div>

                </div>

            </div>
        </div>

    </section>


    @yield('body-content')


    <br>



    <footer>
        <p>INVEST <span>IN</span> YOUR <span>FUTURE</span> NOW ! </p>
        <div class="footer-container">


            <div class="part-1">

                <div class="inside1">

                    <ul>
                        <li><a>Services</a></li>
                        <li><a>Email Newsletter</a></li>
                        <li><a>Trading Campaigns</a></li>
                        <li><a>Branding</a></li>
                    </ul>
                </div>


                <div class="inside2">
                    <ul>
                        <li><a href="/about">About</a></li>
                        <li><a>Our Story</li>
                        <li><a>Benefits</a></li>
                        <li><a>Team</a></li>
                    </ul>
                </div>


                <div class="inside3">
                    <ul>
                        <li><a href="">Legal</a></li>
                        <li><a>Privacy Policy</a></li>
                        <li><a>Terms of Use</li>
                        <li><a>Risk Disclosure</a></li>
                    </ul>
                </div>
            </div>


            <div class="part-2">
                <div class="login-box ">


                    <form>
                        <div class="card">
                            <span class="card__title">Subscribe</span>
                            <p class="card__content">Subscribe to our Newsletter for weekly Trading signals.
                            </p>
                            <div class="card__form">
                                <input placeholder="Your Email" type="text">
                                <button class="sign-up"> Sign up</button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>


        </div>





    </footer>

    <div class="risk">Risk Disclosure Statement:
        CFDs (Contracts for Difference) are complex financial products and can be risky.
        It is important to fully understand the risks involved before deciding to trade.
        CFDs are leveraged products which amplifies potential losses.
        The underlying markets can be highly volatile, subject to sudden changes in supply and demand,
        as well as economic and political events. Stop loss orders may not necessarily limit losses.
        Past performance does not guarantee future results. Trading involves costs such as spreads,
        commissions, and financing charges. The majority of retail clients lose money trading CFDs.
        Trade only what you can afford to lose. If in doubt, seek independent advice.
    </div>

    <div style="text-align: center;color:white;font-size:10px">
        This Page is only made to showcase my personal skills & there might contain missinformation.<br>
        with <i class="fa-regular fa-heart" style="color: red"></i> IRAKLIS S.
    </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    @yield('js')
    <script src="{{ asset('project/js/modal.js') }}"></script>
</body>

</html>
