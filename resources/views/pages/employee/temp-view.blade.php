@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">New Entrant</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="row mb-3">
                            <h3 class="my-4 text-center">Personal Details</h3>
                            <!-- Personal Information -->
                            <div class="col-md-3 mt-3">
                                <label class="form-label">First Name</label>
                                <input class="form-control" type="text" name="first_name" value="{{ $user->first_name }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Middle Name</label>
                                <input class="form-control" type="text" name="middle_name"
                                    value="{{ $user->middle_name }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Surname</label>
                                <input class="form-control" type="text" name="surname" value="{{ $user->surname }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Preferred Name</label>
                                <input class="form-control" type="text" name="preferred_name"
                                    value="{{ $user->preferred_name }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="dob" class="form-label">DOB</label>
                                <input class="form-control datepicker py-2" type="text" id="dob"
                                    placeholder="Select Date" name="dob" value="{{ $user->dob }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="age" class="form-label">Age</label>
                                <input class="form-control" type="text" id="age" name="age"
                                    value="{{ $user->age }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Gender</label>
                                <input class="form-control" type="text" name="gender" value="{{ $user->gender }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Ethnicity</label>
                                <input class="form-control" type="text" name="ethnicity" value="{{ $user->ethnicity }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Disability</label>
                                <input class="form-control" type="text" name="disability" value="{{ $user->disability }}"
                                    disabled />
                            </div>

                            <!-- Address Details -->
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 1</label>
                                <input class="form-control" type="text" name="address1" value="{{ $user->address1 }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 2</label>
                                <input class="form-control" type="text" name="address2" value="{{ $user->address2 }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Town</label>
                                <input class="form-control" type="text" name="town" value="{{ $user->town }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Postcode</label>
                                <input class="form-control" type="text" name="post_code" value="{{ $user->post_code }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}"
                                    disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Mobile Tel</label>
                                <input class="form-control" type="text" name="mobile_tel"
                                    value="{{ $user->mobile_tel }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Home Tel</label>
                                <input class="form-control" type="text" name="home_tel"
                                    value="{{ $user->home_tel }}" disabled />
                            </div>

                            <!-- Emergency Contact -->
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Name</label>
                                <input class="form-control" type="text" name="emergency_1_name"
                                    value="{{ $user->emergency_1_name }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Mobile</label>
                                <input class="form-control" type="number" placeholder="Phone Number"
                                    name="emergency_1_ph_no" value="{{ $user->emergency_1_ph_no }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Relationship</label>
                                <input class="form-control" type="text" name="emergency_1_relation"
                                    value="{{ $user->emergency_1_relation }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Home Number</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_1_home_ph" value="{{ $user->emergency_1_home_ph }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 3</label>
                                <input class="form-control" type="text" name="address3"
                                    value="{{ $user->address3 }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Name</label>
                                <input class="form-control" type="text" name="emergency_2_name"
                                    value="{{ $user->emergency_2_name }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Mobile</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_ph_no" value="{{ $user->emergency_2_ph_no }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Relationship</label>
                                <input class="form-control" type="text" name="emergency_2_relation"
                                    value="{{ $user->emergency_2_relation }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Home Number</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_home_ph" value="{{ $user->emergency_2_home_ph }}" disabled />
                            </div>
                            <!-- Employment Details -->
                            {{-- <h3 class="my-4 text-center">Job Details</h3>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employment Commencement Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="commencement_date" value="{{ $user->commencement_date }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">NI Number</label>
                                <input class="form-control" type="text" name="ni_number"
                                    value="{{ $user->ni_number }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Default Cost Centre</label>
                                <input class="form-control" type="text" name="default_cost_center"
                                    value="{{ $user->default_cost_center }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Salaried / Monthly in Arrears</label>
                                <input class="form-control" type="text" name="salaried"
                                    value="{{ $user->salaried }}" disabled />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contracted From Date </label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="contracted_from_date" value="{{ $user->contracted_from_date }}" disabled />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employment Termination Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="termination_date" value="{{ $user->termination_date }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Termination</label>
                                <input class="form-control" type="text" name="reason_termination"
                                    value="{{ $user->reason_termination }}" disabled />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Handbook Sent</label>
                                <select disabled class="form-control form-select" name="handbook_sent"
                                    value="{{ $user->handbook_sent }}">
                                    <option value="yes" {{ $user->handbook_sent == 'yes' ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option value="no" {{ $user->handbook_sent == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Medical Form Returned</label>
                                <select disabled class="form-control form-select" name="medical_form_returned"
                                    value="{{ $user->medical_form_returned }}">
                                    <option value="yes"{{ $user->medical_form_returned == 'yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no"{{ $user->medical_form_returned == 'no' ? 'selected' : '' }}>
                                        No
                                    </option>
                                    <option value="pending"
                                        {{ $user->medical_form_returned == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">New Entrant Form Returned</label>
                                <select disabled class="form-control form-select" name="new_entrant_form_returned"
                                    value="{{ $user->new_entrant_form_returned }}">
                                    <option value="yes"
                                        {{ $user->new_entrant_form_returned == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no"
                                        {{ $user->new_entrant_form_returned == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Confidentiality Statement</label>
                                <select disabled class="form-control form-select"
                                    name="confidentiality_statement_returned"
                                    value="{{ $user->confidentiality_statement_returned }}">
                                    <option value="yes"
                                        {{ $user->confidentiality_statement_returned == 'yes' ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option value="no"
                                        {{ $user->confidentiality_statement_returned == 'no' ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Work Document Received</label>
                                <select disabled class="form-control form-select" name="work_document_received"
                                    value="{{ $user->work_document_received }}">
                                    <option value="yes" {{ $user->work_document_received == 'yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no" {{ $user->work_document_received == 'no' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Qualifications Checked</label>
                                <select disabled class="form-control form-select" name="qualifications_checked"
                                    value="{{ $user->qualifications_checked }}">
                                    <option value="yes" {{ $user->qualifications_checked == 'yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no" {{ $user->qualifications_checked == 'no' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Requested</label>
                                <select disabled class="form-control form-select" name="references_requested"
                                    value="{{ $user->references_requested }}">
                                    <option value="yes" {{ $user->references_requested == 'yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no" {{ $user->references_requested == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Returned</label>
                                <select disabled class="form-control form-select" name="references_returned"
                                    value="{{ $user->references_returned }}">
                                    <option value="yes" {{ $user->references_returned == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $user->references_returned == 'no' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Payroll Informed</label>
                                <select disabled class="form-control form-select" name="payroll_informed"
                                    value="{{ $user->payroll_informed }}">
                                    <option value="yes" {{ $user->payroll_informed == 'yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no" {{ $user->payroll_informed == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Probation Complete</label>
                                <select disabled class="form-control form-select" name="probation_complete"
                                    value="{{ $user->probation_complete }}">
                                    <option value="yes" {{ $user->probation_complete == 'yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no" {{ $user->probation_complete == 'no' ? 'selected' : '' }}>
                                        No</option>
                                    <option value="not_required"
                                        {{ $user->probation_complete == 'not_required' ? 'selected' : '' }}>Not
                                        Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Required</label>
                                <select disabled class="form-control form-select" name="equipment_required"
                                    value="{{ $user->equipment_required }}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="laptop" {{ $user->equipment_required == 'laptop' ? 'selected' : '' }}>
                                        Laptop
                                    </option>
                                    <option value="desktop"
                                        {{ $user->equipment_required == 'desktop' ? 'selected' : '' }}>Desktop
                                    </option>
                                    <option value="phone" {{ $user->equipment_required == 'phone' ? 'selected' : '' }}>
                                        Phone</option>
                                    <option value="none" {{ $user->equipment_required == 'none' ? 'selected' : '' }}>
                                        None</option>
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'User' && $dropdown->name == 'Equipment Required')
                                            <option value="{{ $dropdown->value }}"
                                                {{ old('equipment_required', $user->equipment_required) == $dropdown->value ? 'selected' : '' }}>
                                                {{ $dropdown->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Ordered</label>
                                <select disabled class="form-control form-select" name="equipment_ordered">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Telphone Ext"
                                        {{ $user->equipment_ordered == 'Telphone Ext' ? 'selected' : '' }}>Telphone
                                        Ext
                                    </option>
                                    <option value="Computer / Laptop"
                                        {{ $user->equipment_ordered == 'Computer / Laptop' ? 'selected' : '' }}>
                                        Computer / Laptop</option>
                                    <option value="Email Address / Login"
                                        {{ $user->equipment_ordered == 'Email Address / Login' ? 'selected' : '' }}>
                                        Email Address / Login</option>
                                    <option value="Mobile" {{ $user->equipment_ordered == 'Mobile' ? 'selected' : '' }}>
                                        Mobile
                                    </option>
                                    <option value="other" {{ $user->equipment_ordered == 'other' ? 'selected' : '' }}>
                                        other
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">P45 / Tax Form Received</label>
                                <select disabled class="form-control form-select" name="p45"
                                    value="{{ $user->p45 }}">
                                    <option value="yes" {{ $user->p45 == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $user->p45 == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Pack Sent</label>
                                <select disabled class="form-control form-select" name="employee_pack_sent"
                                    value="{{ $user->employee_pack_sent }}">
                                    <option value="yes" {{ $user->employee_pack_sent == 'yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no" {{ $user->employee_pack_sent == 'no' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Termination Form to Payroll</label>
                                <select disabled class="form-control form-select" name="termination_form_to_payroll"
                                    value="{{ $user->termination_form_to_payroll }}">
                                    <option value="yes"
                                        {{ $user->termination_form_to_payroll == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no"
                                        {{ $user->termination_form_to_payroll == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Casual Holiday Pay</label>
                                <input class="form-control" type="number" name="casual_holiday_pay"
                                    value="{{ $user->casual_holiday_pay }}" disabled />
                            </div> --}}
                        </div>


                        <!-- Notes Section -->
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="4" disabled>{{ $user->notes }}</textarea>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('show.temp.employees') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
