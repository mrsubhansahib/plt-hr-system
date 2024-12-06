@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Temp Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    <form class="forms-sample" action="{{ route('store.employee') }}" method="POST"
                    onsubmit="return checkPasswordComplexity()">
                        @csrf
                        <!-- Personal Details -->
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="first_name" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Middle Name</label>
                                <input class="form-control" type="text" name="middle_name" />
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
                                <label class="form-label">Address 2</label>
                                <input class="form-control" type="text" name="address2" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 3</label>
                                <input class="form-control" type="text" name="address3" />
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
                                <label class="form-label">Mobile Tel</label>
                                <input class="form-control" type="text" name="mobile_tel" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Home Tel</label>
                                <input class="form-control" type="text" name="home_tel" />
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
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="dob" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Age <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" required name="age" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control" required name="gender">
                                    <option value="" selected disabled>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Ethnicity <span class="text-danger">*</span></label>
                                <select class="form-control" required name="ethnicity">
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

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Disability</label>
                                <select class="form-control" name="disability">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Employment Details -->
                        <h3 class="my-4 text-center pt-3">Employment Details</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contracted From Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="contracted_from_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Commencement Date <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="commencement_date" required />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employment Termination Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="termination_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Termination</label>
                                <input class="form-control" type="text" name="reason_termination" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Handbook Sent</label>
                                <select class="form-control" name="handbook_sent">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Medical Form Returned</label>
                                <select class="form-control" name="medical_form_returned">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">New Entrant Form Returned</label>
                                <select class="form-control" name="new_entrant_form_returned">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Confidentiality Statement</label>
                                <select class="form-control" name="confidentiality_statement_returned">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Work Document Received</label>
                                <select class="form-control" name="work_document_received">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Qualifications Checked</label>
                                <select class="form-control" name="qualifications_checked">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Requested</label>
                                <select class="form-control" name="references_requested">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Returned</label>
                                <select class="form-control" name="references_returned">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Payroll Informed</label>
                                <select class="form-control" name="payroll_informed">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Probation Complete</label>
                                <select class="form-control" name="probation_complete">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                    <option value="not_required">Not Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Required</label>
                                <select class="form-control" name="equipment_required">
                                    <option value="" selected disabled>Select</option>
                                    <option value="laptop">Laptop</option>
                                    <option value="desktop">Desktop</option>
                                    <option value="phone">Phone</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Ordered</label>
                                <select class="form-control" name="equipment_ordered">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Telphone Ext">Telphone Ext</option>
                                    <option value="Computer / Laptop">Computer / Laptop</option>
                                    <option value="Email Address / Login">Email Address / Login</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="other">other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">P45 / Tax Form Received</label>
                                <select class="form-control" name="p45">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Pack Sent</label>
                                <select class="form-control" name="employee_pack_sent">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Termination Form to Payroll</label>
                                <select class="form-control" name="termination_form_to_payroll">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Casual Holiday Pay</label>
                                <input class="form-control" type="number" name="casual_holiday_pay" />
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
                                <label class="form-label">Contact 1 Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_name" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_ph_no" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Home Number</label>
                                <input class="form-control" type="text" name="emergency_1_home_ph" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Relationship <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_relation" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Name</label>
                                <input class="form-control" type="text" name="emergency_2_name" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Mobile</label>
                                <input class="form-control" type="text" name="emergency_2_ph_no" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Home Number</label>
                                <input class="form-control" type="text" name="emergency_2_home_ph" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Relationship</label>
                                <input class="form-control" type="text" name="emergency_2_relation" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
@endsection