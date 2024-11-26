@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
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
                    <form class="forms-sample" action="{{ route('update.employee',$user->id) }}" method="POST">
                        @csrf
                        <!-- Personal Details -->
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="first_name" value="{{$user->first_name}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Middle Name</label>
                                <input class="form-control" type="text" name="middle_name" value="{{$user->middle_name}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Surname <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="surname" value="{{$user->surname}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="preferred_name" value="{{$user->preferred_name}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 1 <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="address1" value="{{$user->address1}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 2</label>
                                <input class="form-control" type="text" name="address2" value="{{$user->address2}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 3</label>
                                <input class="form-control" type="text" name="address3" value="{{$user->address3}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Town <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="town" value="{{$user->town}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Postcode <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="post_code" value="{{$user->post_code}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Mobile Tel</label>
                                <input class="form-control" type="text" name="mobile_tel" value="{{$user->mobile_tel}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Home Tel</label>
                                <input class="form-control" type="text" name="home_tel" value="{{$user->home_tel}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" required name="email" value="{{$user->email}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">DOB <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" required name="dob" value="{{$user->dob}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Age <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" required name="age" value="{{$user->age}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control" required name="gender" value="{{$user->gender}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Ethnicity <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="ethnicity" value="{{$user->ethnicity}}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Disability</label>
                                <select class="form-control" name="disability" value="{{$user->disability}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Employment Details -->
                        <h3 class="my-4 text-center pt-3">Employment Details</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employment Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" required name="employment_date" value="{{$user->employment_date}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contracted From Date</label>
                                <input class="form-control" type="date" name="contracted_from_date" value="{{$user->contracted_from_date}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Commencement Date</label>
                                <input class="form-control" type="date" name="commencement_date" required/>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employment Termination Date</label>
                                <input class="form-control" type="date" name="termination_date" value="{{$user->termination_date}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Termination</label>
                                <input class="form-control" type="text" name="reason_termination" value="{{$user->reason_termination}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Handbook Sent</label>
                                <select class="form-control" name="handbook_sent" value="{{$user->handbook_sent}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes" {{($user->handbook_sent=="yes")?'selected':''}}>Yes</option>
                                    <option value="no" {{($user->handbook_sent=="no")?'selected':''}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Medical Form Returned</label>
                                <select class="form-control" name="medical_form_returned" value="{{$user->medical_form_returned}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes"{{($user->medical_form_returned=='yes')?"selected":""}}>Yes</option>
                                    <option value="no"{{($user->medical_form_returned=='no')?"selected":""}}>No</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">New Entrant Form Returned</label>
                                <select class="form-control" name="new_entrant_form_returned" value="{{$user->new_entrant_form_returned}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Confidentiality Statement</label>
                                <select class="form-control" name="confidentiality_statement_returned" value="{{$user->confidentiality_statement_returned}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Work Document Received</label>
                                <select class="form-control" name="work_document_received" value="{{$user->work_document_received}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Qualifications Checked</label>
                                <select class="form-control" name="qualifications_checked" value="{{$user->qualifications_checked}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Requested</label>
                                <select class="form-control" name="references_requested" value="{{$user->references_requested}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Returned</label>
                                <select class="form-control" name="references_returned" value="{{$user->references_returned}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Payroll Informed</label>
                                <select class="form-control" name="payroll_informed" value="{{$user->payroll_informed}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Probation Complete</label>
                                <select class="form-control" name="probation_complete" value="{{$user->probation_complete}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    <option value="not_required">Not Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Required</label>
                                <select class="form-control" name="equipment_required" value="{{$user->equipment_required}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="laptop">Laptop</option>
                                    <option value="desktop">Desktop</option>
                                    <option value="phone">Phone</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Ordered</label>
                                <select class="form-control" name="equipment_ordered" value="{{$user->equipment_ordered}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">P45 / Tax Form Received</label>
                                <select class="form-control" name="p45" value="{{$user->p45}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Pack Sent</label>
                                <select class="form-control" name="employee_pack_sent" value="{{$user->employee_pack_sent}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Termination Form to Payroll</label>
                                <select class="form-control" name="termination_form_to_payroll" value="{{$user->termination_form_to_payroll}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Casual Holiday Pay</label>
                                <input class="form-control" type="number" name="casual_holiday_pay" value="{{$user->casual_holiday_pay}}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">NI Number <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="ni_number" value="{{$user->ni_number}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Default Cost Centre <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="default_cost_center" value="{{$user->default_cost_center}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Salaried / Monthly in Arrears <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="salaried" value="{{$user->salaried}}" />
                            </div>
                        </div>

                        <!-- Emergency Contacts -->
                        <h3 class="my-4 text-center pt-3">Emergency Contacts</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_name" value="{{$user->emergency_1_name}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_ph_no" value="{{$user->emergency_1_ph_no}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Home Number</label>
                                <input class="form-control" type="text" name="emergency_1_home_ph" value="{{$user->emergency_1_home_ph}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 1 Relationship <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_relation" value="{{$user->emergency_1_relation}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Name</label>
                                <input class="form-control" type="text" name="emergency_2_name" value="{{$user->emergency_2_name}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Mobile</label>
                                <input class="form-control" type="text" name="emergency_2_ph_no" value="{{$user->emergency_2_ph_no}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Home Number</label>
                                <input class="form-control" type="text" name="emergency_2_home_ph" value="{{$user->emergency_2_home_ph}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contact 2 Relationship</label>
                                <input class="form-control" type="text" name="emergency_2_relation" value="{{$user->emergency_2_relation}}" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" value="" rows="4">{{$user->notes}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
