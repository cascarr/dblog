{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Reset Password') }}
                </div>

                <form method="POST" action="{{ route('update.passwd') }}">
                    @csrf
                    <div class="card-body">

                        @if (session('status'))
                          <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                          </div><!--- alert alert-success ---->
                        @elseif (session('error'))
                           <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                           </div><!--- alert alert-danger ---->
                        @endif

                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">
                                Old Password
                            </label>
                            <input type="password" id="oldPasswordInput" name="old_password" class="form-control
                                @error('old_password')
                                    is-invalid
                                @enderror" placeholder="Old Password">
                            @error('old_password')
                              <span class="text-danger">
                                {{ $message }}
                              </span>
                            @enderror
                        </div><!--- mb-3 ---->

                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">
                                New Password
                            </label>
                            <input type="password" id="newPasswordInput" name="new_password" class="form-control
                                @error('new_password')
                                    is-invalid
                                @enderror" placeholder="New Password">
                            @error('new_password')
                              <span class="text-danger">
                                {{ $message }}
                              </span>
                            @enderror
                        </div><!--- mb-3 ---->

                        <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">
                                Confirm New Password
                            </label>
                            <input type="password" id="confirmNewPasswordInput" name="confirm_newPassword" class="form-control"
                                   placeholder="Confirm New Password">
                        </div><!--- mb-3 ---->

                    </div><!--- card-body ---->

                    <div class="card-footer">
                        <button class="btn btn-success">
                            Submit
                        </button>
                    </div><!--- card-footer ---->
                </form>

            </div><!--- card ---->
        </div><!--- col-md-8 ---->
    </div><!--- row justify-content-center ---->
  </div><!--- container ---->
{{-- @endsection --}}
