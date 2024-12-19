@extends('layout.master')
@section('content')
@include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Password</h6>
                    <form class="forms-sample" method="POST" action="{{ route('update.password') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="currentPassword">Current Password:</label>
                                <input class="form-control mb-4 mb-md-0" name="currentPassword" required  type="password"
                                    id="currentPassword" placeholder="Enter your current password" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="newPassword">New Password:</label>
                                <input class="form-control" type="password" id="newPassword" required minlength="8"  name="new_password"
                                    placeholder="Enter your new password" />
                                    @error('new_password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="newPasswordConfirmation">Confirm New Password:</label>
                                <input class="form-control" type="password" id="newPasswordConfirmation" required minlength="8"
                                    name="new_password_confirmation" placeholder="Confirm your new password" />
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection