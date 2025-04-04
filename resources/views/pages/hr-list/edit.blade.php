@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Profile Edit</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.hr_list', $user->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $user->first_name }}" disabled>
                            </div>
                            
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Middle Name</label>
                                <input class="form-control" type="text" name="middle_name"
                                value="{{ $user->middle_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Home Tel</label>
                                <input class="form-control" type="text" name="home_tel"
                                    value="{{ $user->home_tel }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 2</label>
                                <input class="form-control" type="text" name="address2"
                                    value="{{ $user->address2 }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 3</label>
                                <input class="form-control" type="text" name="address3"
                                    value="{{ $user->address3 }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Disability</label>
                                <select class="form-control form-select" name="disability"
                                    value="{{ $user->disability }}">
                                    <option value="yes" {{ $user->disability == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $user->disability == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Name</label>
                                <input class="form-control" type="text" name="emergency_2_name"
                                    value="{{ $user->emergency_2_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Mobile</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_ph_no" value="{{ $user->emergency_2_ph_no }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Home Number</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_home_ph" value="{{ $user->emergency_2_home_ph }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Relationship</label>
                                <input class="form-control" type="text" name="emergency_2_relation"
                                    value="{{ $user->emergency_2_relation }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Mobile</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_ph_no" value="{{ $user->emergency_2_ph_no }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Relationship</label>
                                <input class="form-control" type="text" name="emergency_2_relation"
                                    value="{{ $user->emergency_2_relation }}" />
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Contracted From Date </label>
                                    <input class="form-control datepicker" type="text" placeholder="Select Date"
                                        name="contracted_from_date" value="{{ $user->contracted_from_date }}" />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Employment Termination Date</label>
                                    <input class="form-control datepicker" type="text" placeholder="Select Date"
                                        name="termination_date" value="{{ $user->termination_date }}" />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Reason for Termination</label>
                                    <input class="form-control" type="text" name="reason_termination"
                                        value="{{ $user->reason_termination }}" />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Handbook Sent</label>
                                    <select class="form-control form-select" name="handbook_sent"
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
                                    <select class="form-control form-select" name="medical_form_returned"
                                        value="{{ $user->medical_form_returned }}">
                                        <option
                                            value="yes"{{ $user->medical_form_returned == 'yes' ? 'selected' : '' }}>
                                            Yes</option>
                                        <option
                                            value="no"{{ $user->medical_form_returned == 'no' ? 'selected' : '' }}>
                                            No
                                        </option>
                                        <option value="pending"
                                            {{ $user->medical_form_returned == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">New Entrant Form Returned</label>
                                    <select class="form-control form-select" name="new_entrant_form_returned"
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
                                    <select class="form-control form-select" name="confidentiality_statement_returned"
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
                                    <select class="form-control form-select" name="work_document_received"
                                        value="{{ $user->work_document_received }}">
                                        <option value="yes"
                                            {{ $user->work_document_received == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no"
                                            {{ $user->work_document_received == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Qualifications Checked</label>
                                    <select class="form-control form-select" name="qualifications_checked"
                                        value="{{ $user->qualifications_checked }}">
                                        <option value="yes"
                                            {{ $user->qualifications_checked == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no"
                                            {{ $user->qualifications_checked == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">References Requested</label>
                                    <select class="form-control form-select" name="references_requested"
                                        value="{{ $user->references_requested }}">
                                        <option value="yes"
                                            {{ $user->references_requested == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no"
                                            {{ $user->references_requested == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">References Returned</label>
                                    <select class="form-control form-select" name="references_returned"
                                        value="{{ $user->references_returned }}">
                                        <option value="yes"
                                            {{ $user->references_returned == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ $user->references_returned == 'no' ? 'selected' : '' }}>
                                            No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Payroll Informed</label>
                                    <select class="form-control form-select" name="payroll_informed"
                                        value="{{ $user->payroll_informed }}">
                                        <option value="yes" {{ $user->payroll_informed == 'yes' ? 'selected' : '' }}>
                                            Yes</option>
                                        <option value="no" {{ $user->payroll_informed == 'no' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Probation Complete</label>
                                    <select class="form-control form-select" name="probation_complete"
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
                                    <select class="form-control form-select" name="equipment_required"
                                        value="{{ $user->equipment_required }}">
                                        <option value="" selected disabled>Select</option>
                                        <option value="laptop"
                                            {{ $user->equipment_required == 'laptop' ? 'selected' : '' }}>Laptop
                                        </option>
                                        <option value="desktop"
                                            {{ $user->equipment_required == 'desktop' ? 'selected' : '' }}>Desktop
                                        </option>
                                        <option value="phone"
                                            {{ $user->equipment_required == 'phone' ? 'selected' : '' }}>Phone</option>
                                        <option value="none"
                                            {{ $user->equipment_required == 'none' ? 'selected' : '' }}>None</option>
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
                                    <select class="form-control form-select" name="equipment_ordered">
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
                                        <option value="Mobile"
                                            {{ $user->equipment_ordered == 'Mobile' ? 'selected' : '' }}>Mobile
                                        </option>
                                        <option value="other"
                                            {{ $user->equipment_ordered == 'other' ? 'selected' : '' }}>other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">P45 / Tax Form Received</label>
                                    <select class="form-control form-select" name="p45" value="{{ $user->p45 }}">
                                        <option value="yes" {{ $user->p45 == 'yes' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="no" {{ $user->p45 == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Employee Pack Sent</label>
                                    <select class="form-control form-select" name="employee_pack_sent"
                                        value="{{ $user->employee_pack_sent }}">
                                        <option value="yes" {{ $user->employee_pack_sent == 'yes' ? 'selected' : '' }}>
                                            Yes</option>
                                        <option value="no" {{ $user->employee_pack_sent == 'no' ? 'selected' : '' }}>
                                            No</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Termination Form to Payroll</label>
                                    <select class="form-control form-select" name="termination_form_to_payroll"
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
                                    <select class="form-control" name="casual_holiday_pay">
                                        <option value="no" {{ $user->casual_holiday_pay == 'no' ? 'selected' : '' }}>No</option>
                                        <option value="yes" {{ $user->casual_holiday_pay == 'yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Cost Centre </label>
                                    <input class="form-control" type="text" value="{{ $user->default_cost_center }}"
                                    name="default_cost_center" />
                                </div>
                                
                                <div class="col-md-12 mt-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes" value="" rows="4">{{ $user->notes }}</textarea>
                                </div>
                            </div>
                            <div class=" mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
