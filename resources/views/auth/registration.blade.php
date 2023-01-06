@extends('layouts.app')

@section('content')

<div class="body-bg templatemo-bg-image-2">
    <div class="container">
        <div class="col-md-12">
            <form method="POST" action="{{ route('register.custom') }}" class="form-horizontal
                  templatemo-contact-form-1" role="form">
                  @csrf

                  <div class="form-group">
                    <div class="col-md-12">
                        <h1 class="margin-bottom-15">
                            Sign Up
                        </h1>
                    </div><!-- col-md-12 -->
                  </div><!-- form-group -->

                  <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label">
                            Name
                        </label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-user"></i>
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                            <input type="text" class="form-control"
                                   id="name" name="name" placeholder="" required autofocus>
                        </div><!-- templatemo-input-icon-container -->
                    </div><!-- col-md-12 -->
                  </div><!-- form-group -->

                  <div class="form-group">
                    <div class="col-md-12">
                        <label for="email" class="control-label">
                            Email *
                        </label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-envelope-o"></i>
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                            <input type="email" class="form-control"
                                   id="email" name="email" placeholder="" required autofocus>
                        </div><!-- templatemo-input-icon-container -->
                    </div><!-- col-md-12 -->
                  </div><!-- form-group -->

                  <div class="form-group">
                    <div class="col-md-12">
                        <label for="password" class="control-label">
                            Password
                        </label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-globe"></i>
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
                            <label for="" class="control-label">
                                <input type="checkbox" name="remember">
                                 Remember me
                            </label>
                        </div><!-- checkbox -->
                    </div><!-- col-md-12 -->
                  </div><!-- form-group -->

                  <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" class="btn
                               btn-success pull-right mb-4" value="Sign up">
                    </div><!-- col-md-12 -->
                  </div><!-- form-group -->

                  <div class="form-group">
                    <div class="col-md-12">
                        <p>
                            Member?
                            <a href="{{ route('login') }}" class="text-center">
                                Sign in
                            </a>
                        </p>
                    </div><!-- col-md-12 -->
                  </div><!-- form-group -->

            </form>
        </div><!-- col-md-12 -->
    </div><!-- container -->
</div><!-- body-bg templatemo-bg-image-2 -->

@endsection
