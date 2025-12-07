@extends('layout.master')
<style>
    .title-bg {
        background-color: #6571ff;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        color: white;
    }
</style>
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
                    <ul class="nav nav-tabs" id="detailsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#job" type="button" role="tab">Job Details</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="detailsTabContent">
                        <div class="tab-pane fade show active" id="personal" role="tabpanel">
                            <!-- <h3 class="my-4 text-center">Personal Details</h3> -->
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
                                        value="{{ $user->middle_name ?? 'N/A' }}" disabled />
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
                                        placeholder="Select Date" name="dob" value="{{ \Carbon\Carbon::parse($user->dob)->format('d-m-Y') ?? 'N/A' }}" disabled />
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
                                    <input class="form-control" type="text" name="disability" value="{{ $user->disability ?? 'N/A'}}"
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
                                    <input class="form-control" type="text" name="address2" value="{{ $user->address2 ?? 'N/A'}}"
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
                                        value="{{ $user->mobile_tel ?? 'N/A' }}" disabled />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Home Tel</label>
                                    <input class="form-control" type="text" name="home_tel"
                                        value="{{ $user->home_tel ?? 'N/A' }}" disabled />
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
                                    <input class="form-control" type="text" placeholder="phone number"
                                        name="emergency_1_home_ph" value="{{ $user->emergency_1_home_ph ?? 'N/A' }}" disabled />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Address 3</label>
                                    <input class="form-control" type="text" name="address3"
                                        value="{{ $user->address3 ?? 'N/A' }}" disabled />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Emergency Contact 2 Name</label>
                                    <input class="form-control" type="text" name="emergency_2_name"
                                        value="{{ $user->emergency_2_name ?? 'N/A'}}" disabled />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Emergency Contact 2 Mobile</label>
                                    <input class="form-control" type="text" placeholder="phone number"
                                        name="emergency_2_ph_no" value="{{ $user->emergency_2_ph_no ?? 'N/A' }}" disabled />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Emergency Contact 2 Relationship</label>
                                    <input class="form-control" type="text" name="emergency_2_relation"
                                        value="{{ $user->emergency_2_relation ?? 'N/A' }}" disabled />
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Emergency Contact 2 Home Number</label>
                                    <input class="form-control" type="text" placeholder="phone number"
                                        name="emergency_2_home_ph" value="{{ $user->emergency_2_home_ph ?? 'N/A' }}" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="job" role="tabpanel">
                            <h3 class="my-4 text-center">Job Details</h3>
                            @if($user->jobs->count() > 0)
                                @foreach($user->jobs as $index => $job)
                                    <h5 class="mt-3 title-bg">Job :{{ $index + 1 }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Job Title</label>
                                            <input type="text" class="form-control" value="{{ $job->title ?? 'Not Entered' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Main Job</label>
                                            <input type="text" class="form-control" value="{{ $job->main_job ?? 'Not Entered' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Facility</label>
                                            <input type="text" class="form-control" value="{{ $job->facility ?? 'Not Entered' }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Cost Center</label>
                                            <input type="text" class="form-control" value="{{ $job->cost_center ?? 'Not Entered' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Start Date</label>
                                            <input type="text" class="form-control"
                                                value="{{ $job->start_date ? \Carbon\Carbon::parse($job->start_date)->format('d-m-Y') : 'Not Entered' }}"
                                                disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">
                                                {{ in_array($job->contract_type, ['Fixed Term', 'Temporary']) ? 'Fix/Temp Expiry' : 'Job Termination Date' }}
                                            </label>
                                            <input type="text" class="form-control" value="{{ $job->termination_date ? \Carbon\Carbon::parse($job->termination_date)->format('d-m-Y') : 'Not Entered' }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Rate of Pay</label>
                                            <input type="text" class="form-control" value="{{ $job->rate_of_pay ?? 'Not Entered' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Pay Frequency</label>
                                            <input type="text" class="form-control" value="{{ $job->pay_frequency ?? 'Not Entered' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Number of Hours</label>
                                            <input type="text" class="form-control" value="{{ $job->number_of_hours ?? 'Not Entered' }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Contract Type</label>
                                            <input type="text" class="form-control" value="{{ $job->contract_type ?? 'Not Entered' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Contract Returned</label>
                                            <input type="text" class="form-control" value="{{ $job->contract_returned ?? 'Not Entered' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">JD Returned</label>
                                            <input type="text" class="form-control" value="{{ $job->jd_returned ?? 'Not Entered' }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">DBS Required</label>
                                            <input type="text" class="form-control" value="{{ $job->dbs_required ?? 'Not Entered' }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" disabled>{{ $job->notes ?? 'Not Entered' }}</textarea>
                                    </div>

                                    <hr class="mt-3">
                                @endforeach
                            @else
                                <p class="text-muted">No job details available.</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('show.temp.employees') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection