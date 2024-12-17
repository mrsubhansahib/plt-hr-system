@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    {{-- <h3 class="card-title">Personal Details</h3> --}}
                    <h3 class="my-4 text-center">Personal Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.admin', $user->id) }}" method="POST">
                        @csrf
                        <!-- Personal Details -->
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="first_name" value="{{ $user->first_name }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Surname <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="surname" value="{{ $user->surname }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="preferred_name" value="{{ $user->preferred_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 1 <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="address1" value="{{ $user->address1 }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Town <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="town" value="{{ $user->town }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Postcode <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="post_code" value="{{ $user->post_code }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" required name="email" value="{{ $user->email }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">DOB <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="dob" value="{{ $user->dob }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Age <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" required name="age" value="{{ $user->age }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="gender" value="{{ $user->gender }}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="male" {{($user->gender=='male')?"selected":""}}>Male</option>
                                    <option value="female" {{($user->gender=='female')?"selected":""}}>Female</option>
                                    <option value="other" {{($user->gender=='other')?"selected":""}}>Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Ethnicity<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="ethnicity">
                                    <option value="" selected disabled>Select</option>
                                    <option value="White Britisha" {{($user->ethnicity=='White Britisha')?"selected":""}}>White Britisha</option>
                                    <option value="White Irish" {{($user->ethnicity=='White Irish')?"selected":""}}>White Irish</option>
                                    <option value="White Other" {{($user->ethnicity=='White Other')?"selected":""}}>White Other</option>
                                    <option value="Mixed White and Black Caribbean" {{($user->ethnicity=='Mixed White and Black Caribbean')?"selected":""}}>Mixed White and Black Caribbean</option>
                                    <option value="Mixed White and Black African" {{($user->ethnicity=='Mixed White and Black African')?"selected":""}}>Mixed White and Black African</option>
                                    <option value="Mixed White and Asian" {{($user->ethnicity=='Mixed White and Asian')?"selected":""}}>Mixed White and Asian</option>
                                    <option value="Mixed Other Background" {{($user->ethnicity=='Mixed Other Background')?"selected":""}}>Mixed Other Background</option>
                                    <option value="Asian or Asian British Indian" {{($user->ethnicity=='Asian or Asian British Indian')?"selected":""}}>Asian or Asian British Indian</option>
                                    <option value="Asian or Asian British Pakistani" {{($user->ethnicity=='Asian or Asian British Pakistani')?"selected":""}}>Asian or Asian British Pakistani</option>
                                    <option value="Asian or Asian British Bangladeshi" {{($user->ethnicity=='Asian or Asian British Bangladeshi')?"selected":""}}>Asian or Asian British Bangladeshi</option>
                                    <option value="Asian or Asian British Kashmiri" {{($user->ethnicity=='Asian or Asian British Kashmir')?"selected":""}}>Asian or Asian British Kashmiri</option>
                                    <option value="Asian or Asian British Other" {{($user->ethnicity=='Asian or Asian British Other')?"selected":""}}>Asian or Asian British Other</option>
                                    <option value="Black or Black British Caribbean" {{($user->ethnicity=='Black or Black British Caribbean')?"selected":""}}>Black or Black British Caribbean</option>
                                    <option value="Black or Black British African" {{($user->ethnicity=='Black or Black British African')?"selected":""}}>Black or Black British African</option>
                                    <option value="Black or Black British Other" {{($user->ethnicity=='Black or Black British Other')?"selected":""}}>Black or Black British Other</option>
                                    <option value="Chinese" {{($user->ethnicity=='Chinese')?"selected":""}}>Chinese</option>
                                    <option value="Other Ethnic Group" {{($user->ethnicity=='Other Ethnic Group')?"selected":""}}>Other Ethnic Group</option>
                                </select>
                            </div>

                        </div>

                        <!-- Employment Details -->
                        <h3 class="my-4 text-center pt-3">Employment Details</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Commencement Date <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="commencement_date" required  value="{{ $user->commencement_date }}"/>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">NI Number <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="ni_number" value="{{ $user->ni_number }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Default Cost Centre <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="default_cost_center" value="{{ $user->default_cost_center }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Salaried / Monthly in Arrears <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="salaried"
                                    value="{{ $user->salaried }}" />
                            </div>
                        </div>

                        <!-- Emergency Contacts -->
                        <h3 class="my-4 text-center pt-3">Emergency Contacts</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_name" value="{{ $user->emergency_1_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" placeholder="phone number" required name="emergency_1_ph_no" value="{{ $user->emergency_1_ph_no }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Relationship <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_relation" value="{{ $user->emergency_1_relation }}" />
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
