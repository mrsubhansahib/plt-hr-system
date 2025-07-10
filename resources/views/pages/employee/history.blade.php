@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <!--  -->
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3 border-bottom border-2 pb-2 pb-4">

                        <div class="">
                            <h3 class=" text-center w-25 m-auto border-bottom border-2 pb-2">Personal Details</h3>

                        </div>
                        <!-- Personal Information -->
                        <div class="col-md-3 mt-3">
                            <label class="form-label">First Name</label>
                            <input class="form-control" type="text" required name="first_name"
                                value="{{ $user->first_name ? $user->first_name : 'empty' }}" disabled />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Middle Name</label>
                            <input class="form-control" type="text" name="middle_name"
                                value="{{ $user->middle_name ? $user->middle_name : 'empty' }}" disabled />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Surname</label>
                            <input class="form-control" type="text" required name="surname"
                                value="{{ $user->surname ? $user->surname : 'empty' }}" disabled />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Preferred Name</label>
                            <input class="form-control" type="text" required name="preferred_name"
                                value="{{ $user->preferred_name ? $user->preferred_name : 'empty' }}" disabled />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="dob" class="form-label">DOB
                                <input class="form-control datepicker py-2" type="text" id="dob"
                                    placeholder="Select Date" required name="dob" onchange="calculateAge()"
                                    value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('d-m-Y') }}"
                                    disabled />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="age" class="form-label">Age
                                <input class="form-control" type="text" id="age" readonly required name="age"
                                    value="{{ $user->age ? $user->age : 'empty' }}" disabled />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Gender</label>
                            <select class="form-control form-select" required name="gender" disabled>
                                <option value="" selected>Select</option>
                                <option value="male"
                                    {{ ($user->gender == 'male') ? 'selected' : '' }}>Male
                                </option>
                                <option value="female"
                                    {{ ($user->gender == 'female') ? 'selected' : '' }}>Female
                                </option>
                                <option value="other"
                                    {{ ($user->gender == 'other') ? 'selected' : '' }}>Other
                                </option>
                            </select>
                        </div>
                        @php
                            // Collect ethnicity options from both seeder and dropdowns
                            $ethnicityOptions = collect($dropdowns)
                                ->filter(
                                    fn($dropdown) => $dropdown->module_type == 'User' && $dropdown->name == 'Ethnicity',
                                )
                                ->pluck('value')
                                ->merge($seededEthnicities ?? []) // Ensure seeded options are included
                                ->unique()
                                ->sort() // Sort alphabetically
                                ->values();
                        @endphp

                    <div class="col-md-3 mt-3">
                        <label class="form-label">Ethnicity <span class="text-danger">*</span></label>
                        <select class="form-control form-select" required name="ethnicity" disabled>
                            <option value="" selected disabled>Select</option>
                            @foreach ($ethnicityOptions as $option)
                            <option value="{{ $option }}" {{ old('ethnicity', $user->ethnicity) == $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label">Disability</label>
                            <select class="form-control form-select" name="disability" disabled>
                                <option value="yes"
                                    {{ ($user->disability  == 'yes') ? 'selected' : '' }}>Yes
                                </option>
                                <option value="no"
                                    {{ ($user->disability  == 'no') ? 'selected' : '' }}>No
                                </option>
                            </select>
                        </div>

                    <!-- Address Details -->
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Address 1 <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="address1"
                            value="{{ $user->address1 }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Address 2</label>
                        <input class="form-control" type="text" name="address2"
                            value="{{ $user->address2 }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Address 3</label>
                        <input class="form-control" type="text" name="address3" value="{{ $user->address3 }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Town <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="town"
                            value="{{ $user->town }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Postcode <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="post_code"
                            value="{{ $user->post_code }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" required name="email"
                            value="{{ $user->email }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Employment Commencement Date<span class="text-danger">*</span></label>
                        <input class="form-control datepicker py-2" type="text" placeholder="Select Date" name="commencement_date"
                            value="{{ $user->commencement_date }}" required disabled />
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label">NI Number <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="ni_number" value="{{ $user->ni_number }}" disabled />
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label">Default Cost Centre <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="default_cost_center" value="{{ $user->default_cost_center }}" disabled />
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label">Salaried / Monthly in Arrears <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="salaried" value="{{ $user->salaried }}" disabled />
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
                        <label class="form-label">Emergency Contact 1 Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="emergency_1_name"
                            value="{{ $user->emergency_1_name }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Emergency Contact 1 Mobile <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="number" placeholder="Phone Number" required
                            name="emergency_1_ph_no" value="{{ $user->emergency_1_ph_no }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Emergency Contact 1 Relationship <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" required name="emergency_1_relation"
                            value="{{ $user->emergency_1_relation }}" disabled />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Emergency Contact 1 Home Number</label>
                        <input class="form-control" type="number" placeholder="phone number"
                            name="emergency_1_home_ph" value="{{ $user->emergency_1_home_ph }}" disabled />
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
                </div>
                @if ($user->jobs->count() > 0)

                <h3 class="my-4 text-center">Job Details</h3>
                <hr>

                        @foreach ($user->jobs as $index => $job)
                            <div class="mt-4 mb-3 border-bottom pb-4">
                                <h4 class="text-primary mb-3">NO#{{ $index + 1 }}</h4>
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Job Title</label>
                                        <input type="text" class="form-control"
                                            value="{{ $job->title ? $job->title : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Main Job</label>
                                        <input type="text" class="form-control" value="{{ ucfirst($job->main_job) }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Facility</label>
                                        <input type="text" class="form-control"
                                            value="{{ $job->facility ? $job->facility : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Cost Centre</label>
                                        <input type="text" class="form-control"
                                            value="{{ $job->cost_center ? $job->cost_center : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="text" class="form-control"
                                            value="{{ ($job->start_date)?\Carbon\Carbon::parse($job->start_date)->format('d-m-Y') : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Termination Date</label>
                                        <input type="text" class="form-control"
                                            value="{{ ($job->termination_date)? \Carbon\Carbon::parse($job->termination_date)->format('d-m-Y') : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Rate of Pay</label>
                                        <input type="text" class="form-control"
                                            value="{{ $job->rate_of_pay ? $job->rate_of_pay : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Pay Frequency</label>
                                        <input type="text" class="form-control"
                                            value="{{ $job->pay_frequency ? $job->pay_frequency : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Number of Hours</label>
                                        <input type="text" class="form-control"
                                            value="{{ $job->number_of_hours ? $job->number_of_hours : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contract Type</label>
                                        <input type="text" class="form-control"
                                            value="{{ $job->contract_type ? $job->contract_type : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contract Returned</label>
                                        <input type="text" class="form-control"
                                            value="{{ ucfirst($job->contract_returned)? $job->contract_returned : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">JD Returned</label>
                                        <input type="text" class="form-control"
                                            value="{{ ucfirst($job->jd_returned)? $job->jd_returned : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">DBS Required</label>
                                        <input type="text" class="form-control"
                                            value="{{ ucfirst($job->dbs_required)? $job->dbs_required : 'empty' }}" disabled>
                                    </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" disabled>{{ $job->notes }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-muted">No job records found.</p>
                @endif

                    @if ($user->disclosures->count() > 0)
                        <h3 class="text-center w-25 m-auto border-bottom border-2 pb-2">Disclosure Details</h3>
                        <hr>
                        @foreach ($user->disclosures as $index => $disclosure)
                            <div class="mt-4 mb-3 border-bottom pb-3">
                                <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                <div class="row">

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">DBS Level</label>
                                        <input type="text" class="form-control"
                                            value="{{ $disclosure->dbs_level ? $disclosure->dbs_level : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Date Requested</label>
                                        <input type="text" class="form-control"
                                            value="{{ $disclosure->date_requested ? $disclosure->date_requested : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Date on Certificate</label>
                                        <input type="text" class="form-control"
                                            value="{{ $disclosure->date_on_certificate ? $disclosure->date_on_certificate : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Certificate Number</label>
                                        <input type="text" class="form-control"
                                            value="{{ $disclosure->certificate_no ? $disclosure->certificate_no : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Paid Liberata</label>
                                        <input type="text" class="form-control"
                                            value="{{ ucfirst($disclosure->paid_liberata ? $disclosure->paid_liberata : 'empty') }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Reimbursed Candidate</label>
                                        <input type="text" class="form-control"
                                            value="{{ $disclosure->reimbursed_candidate ? $disclosure->reimbursed_candidate : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Invoice Sent</label>
                                        <input type="text" class="form-control"
                                            value="{{ ucfirst($disclosure->invoice_sent)? $job->contract_type : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contract Type</label>
                                        <input type="text" class="form-control"
                                            value="{{ $disclosure->contract_type ? $disclosure->contract_type : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" rows="3" disabled>{{ $disclosure->notes ? $disclosure->notes : 'empty' }}</textarea>
                                    </div>

                    </div>
                </div>
                @endforeach
                @else
                <p class="text-muted">No disclosure records found.</p>
                @endif


                    @if ($user->sicknesses->count() > 0)
                        <h3 class=" text-center w-25 m-auto border-bottom border-2 pb-2">Sickness Details</h3>

                        @foreach ($user->sicknesses as $index => $sickness)
                            <div class="mt-4 mb-3 border-bottom pb-4">
                                <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Reason for Absence</label>
                                        <input class="form-control" type="text"
                                            value="{{ $sickness->reason_for_absence ? $sickness->reason_for_absence : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Date From</label>
                                        <input class="form-control" type="text"
                                            value="{{ ($sickness->date_from)?\Carbon\Carbon::parse($sickness->date_from)->format('d-m-Y'):'' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Date To</label>
                                        <input class="form-control" type="text"
                                            value="{{ ($sickness->date_to)?\Carbon\Carbon::parse($sickness->date_to)->format('d-m-Y'):'' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Total Hours</label>
                                        <input class="form-control" type="text"
                                            value="{{ $sickness->total_hours ? $sickness->total_hours : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Self Certification Form Received</label>
                                        <input class="form-control" type="text"
                                            value="{{ ucfirst($sickness->certification_form_received)? $sickness->certification_form_received:'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Fit Note Received</label>
                                        <input class="form-control" type="text"
                                            value="{{ ucfirst($sickness->fit_note_received) }}" disabled>
                                    </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" disabled>{{ $sickness->notes }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-muted">No sickness records found.</p>
                @endif



                    @if ($user->capabilities->count() > 0)
                        <h3 class="w-25 m-auto border-bottom border-2 pb-2 text-center">Capability Details</h3>
                        @foreach ($user->capabilities as $index => $capability)
                            <div class="mt-4 mb-3 border-bottom pb-4">
                                <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">On Capability Procedure</label>
                                        <input type="text" class="form-control"
                                            value="{{ ucfirst($capability->on_capability_procedure)?$capability->on_capability_procedure:'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Capability Stage</label>
                                        <input type="text" class="form-control"
                                            value="{{ $capability->stage ? $capability->stage : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control"
                                            value="{{ $capability->date ? $capability->date : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Outcome</label>
                                        <input type="text" class="form-control"
                                            value="{{ $capability->outcome ? $capability->outcome : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Warning Issued Type</label>
                                        <input type="text" class="form-control"
                                            value="{{ $capability->warning_issued_type ? $capability->warning_issued_type : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Review Date</label>
                                        <input type="text" class="form-control"
                                            value="{{ $capability->review_date ? $capability->review_date : 'empty' }}"
                                            disabled>
                                    </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" disabled>{{ $capability->notes }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-muted">No capability records found.</p>
                @endif


                    @if ($user->disciplinaries->count() > 0)
                        <h3 class="w-25 m-auto border-bottom border-2 pb-2 text-center">Disciplinary Details</h3>

                        @foreach ($user->disciplinaries as $index => $disciplinary)
                            <div class="mt-4 mb-3 border-bottom pb-4">
                                <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Reason for Disciplinary</label>
                                        <input class="form-control" type="text"
                                            value="{{ $disciplinary->reason_for_disciplinary ? $disciplinary->reason_for_disciplinary : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Date of Hearing</label>
                                        <input class="form-control" type="text"
                                            value="{{ $disciplinary->hearing_date ? $disciplinary->hearing_date : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Outcome</label>
                                        <input class="form-control" type="text"
                                            value="{{ $disciplinary->outcome ? $disciplinary->outcome : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Suspended</label>
                                        <input class="form-control" type="text"
                                            value="{{ ucfirst($disciplinary->suspended?$disciplinary->suspended:'empty') }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Date Suspended</label>
                                        <input class="form-control" type="text"
                                            value="{{ $disciplinary->date_suspended ? $disciplinary->date_suspended : 'empty' }}"
                                            disabled>
                                    </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" disabled>{{ $disciplinary->notes }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <p class="text-muted">No disciplinary records found.</p>
                @endif

                    @if ($user->latenesses->count() > 0)
                        <h3 class="w-25 m-auto border-bottom border-2 pb-2 text-center">Lateness Details</h3>


                        @foreach ($user->latenesses as $index => $lateness)
                            <div class="mt-4 mb-3 border-bottom pb-4">
                                <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Lateness Triggered</label>
                                        <input class="form-control" type="text"
                                            value="{{ $lateness->lateness_triggered ? $lateness->lateness_triggered : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Lateness Stage</label>
                                        <input class="form-control" type="text"
                                            value="{{ $lateness->lateness_stage ? $lateness->lateness_stage : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Level of Warning Issued</label>
                                        <input class="form-control" type="text"
                                            value="{{ $lateness->warning_level ? $lateness->warning_level : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Outcome / Action Taken</label>
                                        <input class="form-control" type="text"
                                            value="{{ $lateness->outcome ? $lateness->outcome : 'empty' }}" disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Review Date</label>
                                        <input class="form-control" type="text"
                                            value="{{ $lateness->review_date ? $lateness->review_date : 'empty' }}"
                                            disabled>
                                    </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" disabled>{{ $lateness->notes }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <p class="text-muted">No lateness records found.</p>
                @endif


                    @if ($user->trainings->count() > 0)
                        <h3 class="w-25 m-auto border-bottom border-2 pb-2 text-center">Training Details</h3>


                        @foreach ($user->trainings as $index => $training)
                            <div class="mt-4 mb-3 border-bottom pb-4">
                                <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Training Title</label>
                                        <input type="text" class="form-control"
                                            value="{{ $training->training_title ? $training->training_title : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Course Date</label>
                                        <input type="text" class="form-control"
                                            value="{{ $training->course_date ? $training->course_date : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Renewal Date</label>
                                        <input type="text" class="form-control"
                                            value="{{ $training->renewal_date ? $training->renewal_date : 'empty' }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" rows="3" disabled>{{ $training->notes ? $training->notes : 'empty' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted text-center fs-5 border-2 border w-50 m-auto p-3">No training records found.
                        </p>
                        <hr>
                    @endif

                </div>
                @else
                <p class="text-muted">No training records found.</p>
                @endif

            </div>
        </div>
    </div>
@endsection
