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
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="dob" value="{{$user->dob}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Age <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" required name="age" value="{{$user->age}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Ethnicity <span class="text-danger">*</span></label>
                                <select class="form-control" required name="ethnicity">
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
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control" required name="gender" value="{{ $user->gender }}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="male" {{($user->gender=='male')?"selected":""}}>Male</option>
                                    <option value="female" {{($user->gender=='female')?"selected":""}}>Female</option>
                                    <option value="other" {{($user->gender=='other')?"selected":""}}>Other</option>
                                </select>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Disability</label>
                                <select class="form-control" name="disability" value="{{$user->disability}}">
                                    <option value="yes" {{($user->disability=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->disability=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Employment Details -->
                        <h3 class="my-4 text-center pt-3">Employment Details</h3>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contracted From Date </label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="contracted_from_date" value="{{$user->contracted_from_date}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Commencement Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="commencement_date" required value="{{$user->commencement_date}}"/>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employment Termination Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="termination_date" value="{{$user->termination_date}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Termination</label>
                                <input class="form-control" type="text" name="reason_termination" value="{{$user->reason_termination}}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Handbook Sent</label>
                                <select class="form-control" name="handbook_sent" value="{{$user->handbook_sent}}">
                                    <option value="yes" {{($user->handbook_sent=="yes")?'selected':''}}>Yes</option>
                                    <option value="no" {{($user->handbook_sent=="no")?'selected':''}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Medical Form Returned</label>
                                <select class="form-control" name="medical_form_returned" value="{{$user->medical_form_returned}}">
                                    <option value="yes"{{($user->medical_form_returned=='yes')?"selected":""}}>Yes</option>
                                    <option value="no"{{($user->medical_form_returned=='no')?"selected":""}}>No</option>
                                    <option value="pending" {{($user->medical_form_returned=='pending')?"selected":""}}>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">New Entrant Form Returned</label>
                                <select class="form-control" name="new_entrant_form_returned" value="{{$user->new_entrant_form_returned}}">
                                    <option value="yes" {{($user->new_entrant_form_returned=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->new_entrant_form_returned=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Confidentiality Statement</label>
                                <select class="form-control" name="confidentiality_statement_returned" value="{{$user->confidentiality_statement_returned}}">
                                    <option value="yes" {{($user->confidentiality_statement_returned=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->confidentiality_statement_returned=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Work Document Received</label>
                                <select class="form-control" name="work_document_received" value="{{$user->work_document_received}}">
                                    <option value="yes" {{($user->work_document_received=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->work_document_received=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Qualifications Checked</label>
                                <select class="form-control" name="qualifications_checked" value="{{$user->qualifications_checked}}">
                                    <option value="yes" {{($user->qualifications_checked=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->qualifications_checked=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Requested</label>
                                <select class="form-control" name="references_requested" value="{{$user->references_requested}}">
                                    <option value="yes" {{($user->references_requested=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->references_requested=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">References Returned</label>
                                <select class="form-control" name="references_returned" value="{{$user->references_returned}}">
                                    <option value="yes" {{($user->references_returned=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->references_returned=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Payroll Informed</label>
                                <select class="form-control" name="payroll_informed" value="{{$user->payroll_informed}}">
                                    <option value="yes" {{($user->payroll_informed=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->payroll_informed=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Probation Complete</label>
                                <select class="form-control" name="probation_complete" value="{{$user->probation_complete}}">
                                    <option value="yes" {{($user->probation_complete=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->probation_complete=='no')?"selected":""}}>No</option>
                                    <option value="not_required" {{($user->probation_complete=='not_required')?"selected":""}}>Not Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Required</label>
                                <select class="form-control" name="equipment_required" value="{{$user->equipment_required}}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="laptop" {{($user->equipment_required=='laptop')?"selected":""}}>Laptop</option>
                                    <option value="desktop" {{($user->equipment_required=='desktop')?"selected":""}}>Desktop</option>
                                    <option value="phone" {{($user->equipment_required=='phone')?"selected":""}}>Phone</option>
                                    <option value="none" {{($user->equipment_required=='none')?"selected":""}}>None</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Equipment Ordered</label>
                                <select class="form-control" name="equipment_ordered">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Telphone Ext" {{($user->equipment_ordered=='Telphone Ext')?"selected":""}}>Telphone Ext</option>
                                    <option value="Computer / Laptop" {{($user->equipment_ordered=='Computer / Laptop')?"selected":""}}>Computer / Laptop</option>
                                    <option value="Email Address / Login" {{($user->equipment_ordered=='Email Address / Login')?"selected":""}}>Email Address / Login</option>
                                    <option value="Mobile" {{($user->equipment_ordered=='Mobile')?"selected":""}}>Mobile</option>
                                    <option value="other" {{($user->equipment_ordered=='other')?"selected":""}}>other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">P45 / Tax Form Received</label>
                                <select class="form-control" name="p45" value="{{$user->p45}}">
                                    <option value="yes" {{($user->p45=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->p45=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee Pack Sent</label>
                                <select class="form-control" name="employee_pack_sent" value="{{$user->employee_pack_sent}}">
                                    <option value="yes" {{($user->employee_pack_sent=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->employee_pack_sent=='no')?"selected":""}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Termination Form to Payroll</label>
                                <select class="form-control" name="termination_form_to_payroll" value="{{$user->termination_form_to_payroll}}">
                                    <option value="yes" {{($user->termination_form_to_payroll=='yes')?"selected":""}}>Yes</option>
                                    <option value="no" {{($user->termination_form_to_payroll=='no')?"selected":""}}>No</option>
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
