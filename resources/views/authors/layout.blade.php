<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - Profile</title>

    <!--- Fonts and icons --->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!--- CSS Files --->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('dashboard/css/now-ui-dashboard.css?v=1.5.0') }}">
    <link rel="stylesheet" href="{{ url('dashboard/css/demo.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>

        .container-icon {
            position:relative;
        }

        .container-icon img {
            display: block;
        }

        .container-icon .bi-pencil {
            position: absolute;
            top: 0;
            right: 0;
            margin-right: 10px;
            margin-top: 5px
        }

        .button_outer {
            background: #83ccd3;
            border-radius: 30px;
            display: inline-block;
            overflow: hidden;
            position: relative;
            transition: .2s;
            text-align: center;
            width: 100%;
        }

        .btn_upload {
            color: #fff;
            display: inline-block;
            overflow: hidden;
            padding: 17px 30px 12px;
            position: relative;
            text-align: center;
            white-space: nowrap;
            z-index: 3;
        }

        .btn_upload input {
            cursor: pointer;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%
        }

        .processing_bar {
            background: #83ccd3;
            border-radius: 30px;
            height: 100%;
            left: 0;
            position: absolute;
            transition: 3s;
            top: 0;
            width: 0;
        }

        .success_box {
            display: none;
            height: 50px;
            position: relative;
            width: 50px;
        }

        .success_box:before {
            content: '';
            border-bottom: 6px solid #fff;
            border-right: 6px solid #fff;
            display: block;
            height: 18px;
            left: 17px;
            position: absolute;
            transform: rotate(45deg);
            top: 10px;
            width: 9px;
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
        }

        .error_msg {
            color: #f00;
            text-align: center;
        }

        .uploaded_file_view {
            border: 2px solid #ddd;
            margin: 40px auto;
            max-width: 300px;
            opacity: 0;
            padding: 15px;
            position: relative;
            text-align: center;
            transition: .2s;
        }

        .file_remove {
            background: #aaa;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            display: block;
            font-size: 12px;
            height: 30px;
            line-height: 30px;
            right: -15px;
            top: -15px;
            width: 30px;
        }

        .file_remove:hover {
            background: #222;
            transition: .2s;
        }

        .uploaded_file_view img {
            max-width: 100%;
        }

        .uploaded_file_view.show {
            opacity: 1;
        }

        .file_uploading {
            background: #ccc;
            height: 10px;
            margin-top: 20px;
            width: 100%;
        }

        .file_uploading .btn_upload {
            display: none;
        }

        .file_uploading .processing_bar {
            width: 100%;
        }

        .file_uploaded .success_box {
            display: inline-block;
        }

        .file_uploaded {
            background: #83ccd3;
            height: 50px;
            margin-top: 0;
            width: 50px;
        }

        /**
          code for user card panel
         */
         .profile-card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: auto;
            max-width: 300px;
            text-align: center;
         }

         .card-button {
            background-color: orangered; /** #000 */
            border: none;
            color: white;
            cursor: pointer;
            display: inline-block;
            font-size: 18px;
            outline: 0;
            padding: 8px;
            text-align: center;
            width: 100%;
         }

         .card-button:hover {
            opacity: 0.7;
         }

    </style>

</head>

<body class="user-profile">
    <div class="wrapper">
        <div class="sidebar" data-color="orange">

            <div class="logo">
                <a href="{{ route( 'home' ) }}" class="simple-text logo-mini">
                    DB
                </a>
                <a href="{{ route( 'home' ) }}" class="simple-text logo-normal">
                    {{ config('app.name') }}
                </a>
            </div>
            <!--- logo --->

            <div id="sidebar-wrapper" class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ route( 'profile' ) }}">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" type="button" data-toggle="modal"
                           onclick="editprofile( `{{ $author->id }}`, `{{ $author->name }}`, `{{ $author->email }}`, `{{ $author->profile_photo_name }}` )">
                            <i class="now-ui-icons text_caps-small"></i>
                            <p>
                                Edit Profile
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#changePasswdModal">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route( 'auth_author.posts', $author->id ) }}">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>
                                User's Posts
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
            <!--- sidebar-wrapper --->

        </div>
        <!--- sidebar --->

        <div id="main-panel" class="main-panel">
            <!--- Navbar --->
            <nav class="navbar navbar-expand-lg
                 navbar-transparent bg-primary navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggle">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <!--- navbar-toggle --->
                        <a href="{{ route( 'profile' ) }}" class="navbar-brand">
                            Profile Settings
                        </a>
                    </div>
                    <!--- navbar-wrapper --->

                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>

                    <div id="navigation" class="collapse navbar-collapse justify-content-end">
                        <form action="">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                    <!--- input-group-text --->
                                </div>
                                <!--- input-group-append --->
                            </div>
                            <!--- input-group no-border --->
                        </form>
                        <ul class="navbar-nav">
                            {{-- <li class="nav-item">
                                <a href="#pablo" class="nav-link">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">
                                            Stats
                                        </span>
                                    </p>
                                </a>
                            </li> --}}
                            <li class="nav-item dropdown">
                                <a href="#dropdown" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">
                                            Home
                                        </span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{ route( 'home' ) }}" class="dropdown-item">
                                        Home
                                    </a>
                                    {{-- <a href="#" class="dropdown-item">
                                        Another action
                                    </a> --}}
                                </div>
                                <!--- dropdown-menu dropdown-menu-right --->
                            </li>
                            <li class="nav-item">
                                <a href="#dropdown" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">
                                            Account
                                        </span>
                                    </p>
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
                        </ul>
                    </div><!--- navbar-collapse justify-content-end --->

                </div><!--- container-fluid --->
            </nav>
            <!--- End Navbar --->

            <div class="panel-header panel-header-sm"></div>


            @yield( 'content' )


            <footer class="footer">
                <div class="container-fluid">

                    <div class="copyright" id="copyright">
                        &copy;
                        <script>
                            document.getElementById('copyright').appendChild(
                                document.createTextNode(new Date().getFullYear())
                            )
                        </script>,
                        Designer:
                        <a href="#" target="_blank">
                            Invision
                        </a>.
                        Programmer:
                        <a href="#" target="_blank">
                            Cascarr Ihesie
                        </a>
                    </div><!--- copyright --->

                </div><!--- container-fluid --->
            </footer>

        </div><!--- main-panel --->

    </div><!--- wrapper --->


    <!--- Modals --->
    <div id="editProfileModal" class="modal fade"
         tabindex="-1" role="dialog" aria-labelledby="editProfileModal" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered col-md-8" role="document">
            <div class="modal-content card">
                <div class="modal-header card-header">
                    <h5 class="modal-title" id="editProfileModal">
                        Edit Profile
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!--- modal-header --->

                <div class="modal-body card-body">
                    <form method="POST" action="{{ route( 'ajprofile.update' ) }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="name">
                                        Name
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ $author->name }}" id="edit_nameInput" name="name">
                                </div><!--- form-group --->
                            </div><!--- col-md-5 pr-1 --->

                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="email">
                                        Email address
                                    </label>
                                    <input type="email" class="form-control"
                                           value="{{ $author->email }}" id="edit_emailInput" name="email">
                                </div><!--- form-group --->
                            </div><!--- col-md-4 pl-1 --->

                        </div><!--- row --->

                        <div class="modal-footer">
                            <input type="hidden" class="form-control" id="edit_idInput" name="id">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div><!--- modal-body --->

            </div><!--- modal-content --->
         </div><!--- modal-dialog --->
    </div><!--- #editProfileModal modal fade --->

    <div id="changePasswdModal" class="modal fade"
         tabindex="-1" role="dialog" aria-labelledby="changePasswdModal" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered col-md-8" role="document">
            <div class="modal-content card">
                <div class="modal-header card-header">
                    <h5 class="modal-title" id="changePasswdModal">
                        Change Password
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!--- modal-header --->

                <div class="modal-body card-body">
                    <form method="POST" action="{{ route( 'update.passwd' ) }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="old_passwd">
                                        Old Password
                                    </label>
                                    <input type="password" class="form-control" id="old_passwdInput" name="old_password">
                                </div><!--- form-group --->
                            </div><!--- col-md-5 pr-1 --->

                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="new_passwd">
                                        New Password
                                    </label>
                                    <input type="password" class="form-control" id="new_passwdInput" name="new_password">
                                </div><!--- form-group --->
                            </div><!--- col-md-4 px-1 --->

                        </div><!--- row --->

                        <div class="row">

                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="confirm_passwd">
                                        Confirm Password
                                    </label>
                                    <input type="password" class="form-control" id="confirm_passwd" name="confirm_newPassword">
                                </div><!--- form-group --->
                            </div><!--- col-md-4 pl-1 --->

                        </div><!--- row --->

                        <div class="modal-footer">
                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div><!--- modal-footer --->

                    </form>
                </div><!--- modal-body --->

            </div><!--- modal-content --->
         </div><!--- modal-dialog --->
    </div><!--- modal fade --->


    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}

    <!--- Core JS Files --->
    <script src="{{ asset('dashboard/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <!--- Control Center for Now UI Dashboard: --->
    <script src="{{ asset('dashboard/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/js/demo.js') }}"></script>

    <script>

        function editprofile(id, name, email) {

            var userName = $( '#edit_nameInput' ).val(name);
            var userEmail = $( '#edit_emailInput' ).val(email);
            var userId = $( '#edit_idInput' ).val(id);

            $( '#editProfileModal' ).modal('show');
        }

        function editpost(id, title, body) {

            var postTitle = $( '#editTitle' ).val(title);
            var postBody = $( '#editBody' ).val(body);
            var postId = $( '#editId' ).val(id);

            $( '#editPostModal' ).modal( 'show' );
        }

        function delpost(id) {

            var delpostId = $( '#delpostId' ).val(id);

            $( '#delPostModal' ).modal( 'show' );
        }

    </script>

<script>

    var btnUpload = $("#bannerImg"),
        btnOuter = $(".button-outer");,


    btnUpload.on("change", function(e) {

        var ext = btnUpload.val().split('.').pop().toLowerCase();

        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $(".error_msg").text("Not an Image...");
        } else {
            $(".error_msg").text("");
            btnOuter.addClass("file_uploading");
            setTimeOut(function() {
                btnOuter.addClass("file_uploaded");
            }, 3000);

            var uploadedFile = URL.createObjectURL(e.target.files[0]);

            setTimeout(function() {
                $("#uploaded_view").append('
                <img src="'+ uploadedFile +'" />').addClass("show");
            }, 3500);
        }

    });
    $(".file_remove").on("click", function(e) {

        $("#uploaded_view").removeClass("show");
        $("#uploaded_view").find("img").remove();

        btnOuter.removeClass("file_uploading");
        btnOuter.removeClass("file_uploaded");

    });

</script>

</body>

</html>
