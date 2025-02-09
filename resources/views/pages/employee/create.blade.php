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
                    <form class="forms-sample" action="{{ route('store.employee') }}" method="POST">
                        @csrf
                        <!-- Tabs for Required and Optional Fields -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="required-fields-tab" data-bs-toggle="tab"
                                    data-bs-target="#required-fields-tab-pane" type="button" role="tab"
                                    aria-controls="required-fields-tab-pane" aria-selected="true">Required Fields</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="optional-fields-tab" data-bs-toggle="tab"
                                    data-bs-target="#optional-fields-tab-pane" type="button" role="tab"
                                    aria-controls="optional-fields-tab-pane" aria-selected="false">Optional
                                    Fields</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <!-- Required Fields Tab -->
                            <div class="tab-pane fade show active" id="required-fields-tab-pane" role="tabpanel"
                                aria-labelledby="required-fields-tab" tabindex="0">
                                <div class="row mb-3">
                                    <div class="d-flex justify-content-between py-2">
                                        <div></div>
                                        <div>
                                            <h4 class="py-2">Employee Detail</h4>
                                        </div>
                                        <div>
                                            <a href="{{ route('show.temp.employees') }}"
                                                class="btn btn-primary"><strong>List</strong><i data-feather="list"
                                                    class="ms-2"></i></a>
                                        </div>
                                    </div>

                                    <!-- Required Fields Here -->
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
                                        <label for="dob" class="form-label">DOB <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control datepicker py-2" type="text" id="dob"
                                            placeholder="Select Date" required name="dob" onchange="calculateAge()" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="age" class="form-label">Age <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="age" readonly required
                                            name="age" />
                                    </div>
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
                                            @foreach ($dropdowns as $dropdown)
                                                @if ($dropdown->module_type == 'User' && $dropdown->name == 'Ethnicity')
                                                    <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Address and Contact Details -->
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
                                        <label class="form-label">Employee Commencement Date <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control datepicker py-2" type="text"
                                            placeholder="Select Date" name="commencement_date" required />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">NI Number <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="ni_number" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Default Cost Centre <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="default_cost_center" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Salaried / Monthly in Arrears <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="salaried" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contact 1 Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="emergency_1_name" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contact 1 Mobile <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="number" placeholder="phone number" required
                                            name="emergency_1_ph_no" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contact 1 Relationship <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required
                                            name="emergency_1_relation" />
                                    </div>
                                </div>
                            </div>

                            <!-- optional Fields Tab -->
                            <div class="tab-pane fade" id="optional-fields-tab-pane" role="tabpanel"
                                aria-labelledby="optional-fields-tab" tabindex="0">
                                <div class="row mb-3">
                                    <div class="d-flex justify-content-between py-2">
                                        <div></div>
                                        <div>
                                            <h4 class="py-2">Employee Detail</h4>
                                        </div>
                                        <div>
                                            <a href="{{ route('show.temp.employees') }}"
                                                class="btn btn-primary"><strong>List</strong><i data-feather="list"
                                                    class="ms-2"></i></a>
                                        </div>
                                    </div>

                                    <!-- Optional Fields Here -->
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Middle Name</label>
                                        <input class="form-control" type="text" name="middle_name" />
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
                                        <label class="form-label">Mobile Tel</label>
                                        <input class="form-control" type="text" name="mobile_tel" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Home Tel</label>
                                        <input class="form-control" type="text" name="home_tel" />
                                    </div>




                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Disability</label>
                                        <select class="form-control form-select" name="disability">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contracted From Date</label>
                                        <input class="form-control datepicker py-2" type="text"
                                            placeholder="Select Date" name="contracted_from_date" />
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Employment Termination Date</label>
                                        <input class="form-control datepicker py-2" type="text"
                                            placeholder="Select Date" name="termination_date" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Reason for Termination</label>
                                        <input class="form-control" type="text" name="reason_termination" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Handbook Sent</label>
                                        <select class="form-control form-select" name="handbook_sent">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Medical Form Returned</label>
                                        <select class="form-control form-select" name="medical_form_returned">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">New Entrant Form Returned</label>
                                        <select class="form-control form-select" name="new_entrant_form_returned">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Confidentiality Statement</label>
                                        <select class="form-control form-select"
                                            name="confidentiality_statement_returned">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Work Document Received</label>
                                        <select class="form-control form-select" name="work_document_received">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Qualifications Checked</label>
                                        <select class="form-control form-select" name="qualifications_checked">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">References Requested</label>
                                        <select class="form-control form-select" name="references_requested">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">References Returned</label>
                                        <select class="form-control form-select" name="references_returned">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Payroll Informed</label>
                                        <select class="form-control form-select" name="payroll_informed">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Probation Complete</label>
                                        <select class="form-control form-select" name="probation_complete">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                            <option value="not_required">Not Required</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Equipment Required</label>
                                        <select class="form-control form-select" name="equipment_required">
                                            <option value="" selected disabled>Select</option>
                                            <option value="laptop">Laptop</option>
                                            <option value="desktop">Desktop</option>
                                            <option value="phone">Phone</option>
                                            <option value="none">None</option>
                                            @foreach ($dropdowns as $dropdown)
                                                @if ($dropdown->module_type == 'User' && $dropdown->name == 'Equipment Required')
                                                    <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Equipment Ordered</label>
                                        <select class="form-control form-select" name="equipment_ordered">
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
                                        <select class="form-control form-select" name="p45">
                                            <option value="" selected disabled>Select</option>
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Employee Pack Sent</label>
                                        <select class="form-control form-select" name="employee_pack_sent">
                                            <option value="" selected disabled>Select</option>
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Termination Form to Payroll</label>
                                        <select class="form-control form-select" name="termination_form_to_payroll">
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
                                        <label class="form-label">Contact 1 Home Number</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            name="emergency_1_home_ph" />
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contact 2 Name</label>
                                        <input class="form-control" type="text" name="emergency_2_name" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contact 2 Mobile</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            name="emergency_2_ph_no" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contact 2 Home Number</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            name="emergency_2_home_ph" />
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
                            </div>
                        </div>

                        <!-- Single Submit Button -->
                        <div class=" mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
