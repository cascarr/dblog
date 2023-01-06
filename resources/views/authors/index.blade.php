@extends('authors.layout')

@section('content')

    <!--- ownblade --->
    <div class="content">
        <div class="row">

            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Profile
                        </h5>
                    </div><!--- card-header --->
                </div><!--- card --->
            </div><!--- col-md-8 ---> --}}

            <div class="col-md-12">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('dashboard/img/bg5.jpg') }}" alt="..." >
                    </div><!--- image --->
                    <div class="card-body">
                        <div class="author">
                            <a href="{{ route( 'profile' ) }}">
                                <img src="{{ asset( 'dashboard/img/default-avatar.png' ) }}" alt="{{ $author->name }}" class="avatar border-gray">
                                <h5 class="title">
                                    {{ $author->name }}
                                </h5>
                            </a>
                            <p class="description">
                                {{ $author->email }}
                            </p>
                        </div><!--- author --->
                        <p class="description text-center">
                            About the user
                        </p>
                    </div><!--- card-body --->
                    <hr>
                    <div class="button-container">
                        <button href="#" class="btn btn-neutral
                                btn-icon btn-round btn-lg">
                                <i class="fab fa-facebook-f"></i>
                        </button>
                        <button href="#" class="btn btn-neutral
                                btn-icon btn-round btn-lg">
                                <i class="fab fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-neutral
                                btn-icon btn-round btn-lg">
                                <i class="fab fa-google-plus-g"></i>
                        </button>
                    </div><!--- button-container --->
                </div><!--- card card-user --->
            </div><!--- col-md-4 --->

        </div><!--- row --->
    </div><!--- content ownblade --->

@endsection
