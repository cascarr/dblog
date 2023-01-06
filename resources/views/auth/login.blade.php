@extends('layouts.app')

@section('content')

<div class="body-bg templatemo-bg-image-1">
    <div class="container">
        <div class="col-md-12">
            <form method="POST" action="{{ route('login.custom') }}" class="form-horizontal templatemo-login-form-2"
                 role="form">
                 @csrf

                 <div class="row">
                    <div class="col-md-12">
                        <h1 class="h1-login">Login</h1>
                    </div><!-- col-md-12 -->
                 </div><!-- row -->

                 <div class="row">

                    <div class="templatemo-one-signin col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="email" class="control-label">
                                    Email
                                </label>
                                <div class="templatemo-input-icon-container">
                                    <i class="fa fa-user"></i>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                    <input type="email" class="form-control"
                                           id="email" name="email" placeholder="" required>
                                </div><!-- templatemo-input-icon-container -->
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="password" class="control-label">
                                    Password
                                </label>
                                <div class="templatemo-input-icon-container">
                                    <i class="fa fa-lock"></i>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                    <input type="password" class="form-control"
                                           id="password" name="password" placeholder="" required>
                                </div><!-- templatemo-input-icon-container -->
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label for="">
                                        <input type="checkbox" name="remember">
                                        Remember me
                                    </label>
                                </div><!-- checkbox -->
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Sign in"
                                       class="btn btn-warning">
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <p>
                                    Not a member?
                                    <a href="{{ route('register-user') }}" class="text-center">
                                        Sign up
                                    </a>
                                </p>
                            </div>
                        </div><!-- form-group -->
                    </div><!-- templatemo-one-signin -->

                    <div class="templatemo-other-signin col-md-6">
                        <label for="" class="margin-bottom-15">
                            One-click sign in using other services.
                            <a href="#"></a>
                        </label>
                        <a href="#" class="btn btn-block btn-social
                           btn-facebook margin-bottom-15"><i class="fa fa-facebook"></i>
                           Sign in with Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-social
                           btn-twitter margin-bottom-15"><i class="fa fa-twitter"></i>
                           Sign in with Twitter
                        </a>
                        <a href="#" class="btn btn-block btn-social
                           btn-google-plus"><i class="fa fa-google-plus"></i>
                           Sign in with Google
                        </a>
                    </div><!-- templatemo-other-signin col-md-6 -->

                 </div><!-- row -->

            </form>
        </div><!-- col-md-12 -->
    </div><!-- container -->
</div><!-- templatemo-bg-image-1 -->


@endsection
