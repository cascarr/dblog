<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <!--- Additional CSS Files --->
    <link rel="stylesheet" href="{{ URL::to('css/fontawesome.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('css/templatemo-stand-blog.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('css/owl.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ URL::to('css/app-stand.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ url('css/app-stand.css') }}"> --}}
    <link href="{{ URL::to('bootstrap-stand/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!--- Login css --->
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/bootstrap-social.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/templatemo_style.css') }}" type="text/css">


    <!--- Own head file --->

    <!-- Bootstrap core CSS -->
    {{-- <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <!-- Google Fonts -->
    {{-- <link href='//fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i|Libre+Baskerville:400,400i,700' media='all' rel='stylesheet' type='text/css'/> --}}
    {{-- <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'/> --}}
</head>

<body >

    <!--- Preloader Start --->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!--- Preloader End --->

    <!--- Header --->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <h2>
                        {{ config('app.name') }}
                        <em>.</em>
                    </h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}">
                                Sign in
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register-user') }}">
                                Sign up
                            </a>
                        </li>
                        @else

                        <li class="nav-item">
                            <a href="#dropdown" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Me
                                <i class="now-ui-icons users_single-02"></i>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ route( 'profile' ) }}" class="dropdown-item">
                                Profile
                                </a>
                                <a href="{{ route( 'signout' ) }}" class="dropdown-item">
                                Sign out
                                </a>
                            </div><!--- dropdown-menu dropdown-menu-right --->
                        </li>
                        @endif
                    </ul>
                </div><!--- navbar-collapse --->

            </div><!--- container --->
        </nav>
    </header>

    @yield('content')



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="social-icons">
                        <li>
                            <a href="#">
                                Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Behance
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Linkedin
                            </a>
                        </li>
                    </ul>
                </div><!--- col-lg-12 --->
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>
                            Copyright 2020 DBlog
                            | Designer:
                            <a rel="nofollow" href="#" target="_parent">
                                TempMo
                            </a>
                            | Programmer:
                            <a rel="nofollow" href="#" target="_parent">
                                Cascarr Ihesie
                            </a>
                        </p>
                    </div>
                </div>
            </div><!--- row --->
        </div><!--- container --->
    </footer>




    <!----- own scripts ------>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script src="{{ asset( 'jquery-stand/jquery.min.js' ) }}" ></script>
    <script src="{{ asset( 'bootstrap-stand/js/bootstrap.bundle.min.js' ) }}" ></script>

    <script src="{{ asset( 'js/custom.js' ) }}" ></script>
    <script src="{{ asset( 'js/owl.js' ) }}" ></script>
    <script src="{{ asset( 'js/slick.js' ) }}" ></script>
    <script src="{{ asset( 'js/isotope.js' ) }}" ></script>
    <script src="{{ asset( 'js/accordions.js' ) }}" ></script>

    <script language = "text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }
    </script>

</body>

</html>
