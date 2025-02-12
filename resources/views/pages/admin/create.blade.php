@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
@include('layout.alert')
<div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    {{-- <h3 class="card-title">Personal Details</h3> --}}
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">User List</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.admins') }}"
                                class="btn btn-primary"><strong>List</strong><i data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.admin') }}" method="POST"  
                    onsubmit="return checkPasswordComplexity()">
                        @csrf
                        <!-- Personal Details -->
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="first_name" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Surname <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="surname" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="preferred_name" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 1 <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="address1" />
                            </div>
                            
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Town <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="town" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Postcode <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="post_code" />
                            </div>
                           
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" required name="email" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <input
                                    class="form-control"
                                    type="password"
                                    id="password"
                                    name="password"
                                    oninput="validatePassword()"
                                    required
                                />
                                <div id="password-hint" class="mt-2"></div>
                            </div>


                            <div class="col-md-3 mt-3">
                                <label class="form-label">DOB <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" id="dob" placeholder="Select Date" required name="dob" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Age <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="age" required name="age" readonly />
                            </div>


                            <input type="hidden" value="admin" name="role">
                            <input type="hidden" value="active" name="status">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="gender">
                                    <option value="" selected disabled>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Ethnicity <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="ethnicity">
                                    <option value="" selected disabled>Select</option>
                                    <option value="White Britisha">White Britisha</option>
                                    <option value="White Irish">White Irish</option>
                                    <option value="White Other">White Other</option>
                                    <option value="Mixed White and Black Caribbean">Mixed White and Black Caribbean</option>
                                    <option value="Mixed White and Black African">Mixed White and Black African</option>
                                    <option value="Mixed White and Asian">Mixed White and Asian</option>
                                    <option value="Mixed Other Background">Mixed Other Background</option>
                                    <option value="Asian or Asian British Indian">Asian or Asian British Indian</option>
                                    <option value="Asian or Asian British Pakistani">Asian or Asian British Pakistani</option>
                                    <option value="Asian or Asian British Bangladeshi">Asian or Asian British Bangladeshi</option>
                                    <option value="Asian or Asian British Kashmiri">Asian or Asian British Kashmiri</option>
                                    <option value="Asian or Asian British Other">Asian or Asian British Other</option>
                                    <option value="Black or Black British Caribbean">Black or Black British Caribbean</option>
                                    <option value="Black or Black British African">Black or Black British African</option>
                                    <option value="Black or Black British Other">Black or Black British Other</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Other Ethnic Group">Other Ethnic Group</option>
                                </select>
                            </div>

                        </div>

                        <!-- Employment Details -->
                        <h3 class="my-4 text-center pt-3">Employment Details</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Commencement Date <span class="text-danger">*</span></label>
                                <input class="form-control datepicker"  type="text" placeholder="Select Date" name="commencement_date" required/>
                            </div>
                            
                            




                            <div class="col-md-3 mt-3">
                                <label class="form-label">NI Number <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="ni_number" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Default Cost Centre <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="default_cost_center" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Salaried / Monthly in Arrears <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="salaried" />
                            </div>
                        </div>

                        <!-- Emergency Contacts -->
                        <h3 class="my-4 text-center pt-3">Emergency Contacts</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_name" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" placeholder="phone number" required name="emergency_1_ph_no" />
                            </div>
                           
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Relationship <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_relation" />
                            </div>
                          
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
