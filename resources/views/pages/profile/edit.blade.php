@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Profile Information</h6>
                    <form class="forms-sample" method="POST" action="{{ route('update.profile') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="firstName">First Name:</label>
                                <input class="form-control mb-4 mb-md-0" name="first_name" type="text" id="firstName"
                                    value="{{ auth()->user()->first_name }}" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="middleName">Middle Name:</label>
                                <input class="form-control" type="text" name="middle_name" id="middleName"
                                    value="{{ auth()->user()->middle_name }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="surname">Surname:</label>
                                <input class="form-control" type="text" name="surname" id="surname"
                                    value="{{ auth()->user()->surname }}" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email:</label>
                                <input class="form-control mb-4 mb-md-0" type="email" name="email" id="email"
                                    value="{{ auth()->user()->email }}" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="address">Address:</label>
                                <input class="form-control" type="text" id="address" name="address1"
                                    value="{{ auth()->user()->address1 }}" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone:</label>
                                <input class="form-control mb-4 mb-md-0" type="number" name="mobile_tel"
                                    value="{{ auth()->user()->mobile_tel }}" min="0">
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection