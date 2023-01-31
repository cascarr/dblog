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
                    <div class="container-icon image">

                        <a href="#" class="" data-toggle="modal" data-target="#bannerUploadModal">
                            <span class="bi bi-pencil"></span>
                        </a>

                        @if( Auth::user()->profile_banner_name )
                          <img src="{{ asset('/storage/uploads/'. Auth::user()->profile_banner_name) }}" alt="user banner" >
                        @else
                          <img src="{{ asset('dashboard/img/bg5.jpg') }}" alt="..." >
                        @endif

                    </div><!--- image --->

                    <div class="card-body">
                        <div class="author">

                            {{-- <a href="{{ route( 'profile' ) }}"> --}}
                            @if (Auth::user()->profile_photo_name)
                                <a href="#" class="" data-toggle="modal" data-target="#profilepicUploadModal">
                                    <img src="{{ asset('/storage/uploads/'. Auth::user()->profile_photo_name) }}" alt="{{ $author->name }}" class="avatar border-gray">
                                </a>
                            @else
                                <a href="#" class="" data-toggle="modal" data-target="#profilepicUploadModal">
                                    <img src="{{ asset( 'dashboard/img/default-avatar.png' ) }}" alt="{{ $author->name }}" class="avatar border-gray">
                                </a>
                            @endif
                            <h5 class="title" style="color: orangered">
                                {{ $author->name }}
                            </h5>
                            {{-- </a> --}}
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

    <!-- map out the modal fade UPLOAD BANNER IMAGE -->
    <div class="modal fade" id="bannerUploadModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel">
                        Change banner photo
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- modal-header -->

                <!-- /user/banner -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('mybanner.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="button_outer">
                            <div class="btn_upload">
                                <input type="file" class="" id="bannerImg" name="bannerImg">
                                Change Photo
                            </div>
                            {{-- <div class="processing_bar"></div>
                            <div class="success_box"></div> --}}
                        </div><!-- button_outer -->

                        {{-- <div class="error_msg"></div>
                        <div class="uploaded_file_view" id="uploaded_view">
                            <span class="file_remove">X</span>
                        </div> --}}
                        <!-- uploaded_file_view -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div><!-- modal-footer -->

                    </form>
                </div><!-- modal-body -->

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal fade -->

    <div class="modal " id="profilepicUploadModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content profile-card">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Profile picture
                    </h4>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- modal-header -->

                <div class="modal-body">

                    @if (Auth::user()->profile_photo_name)
                        <img src="{{ asset('/storage/uploads/'. Auth::user()->profile_photo_name) }}" alt="" style="width: 100%">
                    @else
                        <img src="{{ asset( 'dashboard/img/default-avatar.png' ) }}" alt="{{ $author->name }}" class="avatar border-gray">
                    @endif

                    <form action="{{ route('myprofilepic.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="button_outer">
                            <div class="btn_upload">
                                <input type="file" id="profileImg" name="profileImg">
                                Change Photo
                            </div>
                        </div><!-- button_outer -->

                        <p>
                            <button class="card-button">Apply</button>
                        </p>
                    </form>

                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal fade -->


@endsection
