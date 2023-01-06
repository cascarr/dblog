@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{ $error }}
              </li>
            @endforeach
        </ul>
      </div><!-- alert alert-danger -->
    @endif

    @if (session()->get('message'))
      <div class="alert alert-success" role="alert">
        <strong>
            Success:
        </strong>
        {{ session()->get('message') }}
      </div><!-- alert alert-success -->
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    {{ Auth::user()->name }}'s Profile
                </div><!-- card-header -->

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                      </div><!-- alert alert-success -->
                    @endif

                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                      </div><!-- alert alert-success -->
                    @endif

                    <form method="POST" action="{{ route('update.profile', Auth::user()->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">
                                <strong>Name</strong>
                            </label>
                            <input type="text" class="form-control"
                                   id="name" name="name" value="{{ Auth::user()->name }}">
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label for="email">
                                <strong>Email</strong>
                            </label>
                            <input type="email" class="form-control"
                                   id="email" name="email" value="{{ Auth::user()->email }}">
                        </div><!-- form-group -->

                        <button type="submit" class="btn btn-primary">
                            Update Profile
                        </button>

                    </form>
                </div><!-- card-body -->

            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row justify-content-center -->
</div><!-- container -->

@endsection
