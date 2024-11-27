@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Profile Information</h6>
                    <form class="forms-sample">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="firstName">First Name:</label>
                                <input class="form-control mb-4 mb-md-0" name="firstName" type="text" id="firstName"
                                    value="{{ auth()->user()->first_name }}" disabled />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="middle_Name">Middle Name:</label>
                                <input class="form-control" type="text" name="middle_Name" id="middle_Name"
                                    value="{{ auth()->user()->middle_name }}" disabled />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="lastName">Surname:</label>
                                <input class="form-control" type="text" name="lastName" id="lastName"
                                    value="{{ auth()->user()->surname }}" disabled />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email:</label>
                                <input class="form-control mb-4 mb-md-0" type="email" name="email" id="email"
                                    value="{{ auth()->user()->email }}" disabled />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="address">Address:</label>
                                <input class="form-control" type="text" id="address" name="address"
                                    value="{{ auth()->user()->address1 }}" disabled />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone:</label>
                                <input class="form-control mb-4 mb-md-0" data-inputmask-alias="(+99) 9999-9999" /
                                    value="{{ auth()->user()->mobile_tel }}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection