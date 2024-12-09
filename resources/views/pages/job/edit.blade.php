@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Job</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    @include('layout.alert')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Job Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.job' , $job->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" 
                                            {{ $employee->id == $job->user_id ? 'selected' : '' }}>
                                            {{ $employee->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="title">
                                    <option value="" selected disabled>Select Title</option>
                                    <option value="Activo Administration Assistant"
                                        {{ $job->title == 'Activo Administration Assistant' ? 'selected' : '' }}>Activo
                                        Administration Assistant</option>
                                    <option value="Administration Assistant"
                                        {{ $job->title == 'Administration Assistant' ? 'selected' : '' }}>Administration
                                        Assistant</option>
                                    <option value="Administration Assistant Senior"
                                        {{ $job->title == 'Administration Assistant Senior' ? 'selected' : '' }}>
                                        Administration Assistant Senior</option>
                                    <option value="Administration Assistant/Wages Clerk (REC)"
                                        {{ $job->title == 'Administration Assistant/Wages Clerk (REC)' ? 'selected' : '' }}>
                                        Administration Assistant/Wages Clerk (REC)</option>
                                    <option value="Allotment Assistant"
                                        {{ $job->title == 'Allotment Assistant' ? 'selected' : '' }}>Allotment Assistant
                                    </option>
                                    <option value="Allotment Development Worker"
                                        {{ $job->title == 'Allotment Development Worker' ? 'selected' : '' }}>Allotment
                                        Development Worker</option>
                                    <option value="Aquarhythmics Teacher"
                                        {{ $job->title == 'Aquarhythmics Teacher' ? 'selected' : '' }}>Aquarhythmics
                                        Teacher</option>
                                    <option value="Assistant Finance Manager"
                                        {{ $job->title == 'Assistant Finance Manager' ? 'selected' : '' }}>Assistant
                                        Finance Manager</option>
                                    <option value="Assistant Theatre Manager"
                                        {{ $job->title == 'Assistant Theatre Manager' ? 'selected' : '' }}>Assistant
                                        Theatre Manager</option>
                                    <option value="Bar and Catering Assistant"
                                        {{ $job->title == 'Bar and Catering Assistant' ? 'selected' : '' }}>Bar and
                                        Catering Assistant</option>
                                    <option value="Bar Assistant" {{ $job->title == 'Bar Assistant' ? 'selected' : '' }}>
                                        Bar Assistant</option>
                                    <option value="Bar Supervisor" {{ $job->title == 'Bar Supervisor' ? 'selected' : '' }}>
                                        Bar Supervisor</option>
                                    <option value="Box Office / Information Sales Co-Ordinator"
                                        {{ $job->title == 'Box Office / Information Sales Co-Ordinator' ? 'selected' : '' }}>
                                        Box Office / Information Sales Co-Ordinator</option>
                                    <option value="Business Development Manager"
                                        {{ $job->title == 'Business Development Manager' ? 'selected' : '' }}>Business
                                        Development Manager</option>
                                    <option value="Catering Assistant"
                                        {{ $job->title == 'Catering Assistant' ? 'selected' : '' }}>Catering Assistant
                                    </option>
                                    <option value="Catering Supervisor"
                                        {{ $job->title == 'Catering Supervisor' ? 'selected' : '' }}>Catering Supervisor
                                    </option>
                                    <option value="Centre Manager" {{ $job->title == 'Centre Manager' ? 'selected' : '' }}>
                                        Centre Manager</option>
                                    <option value="Chief Executive"
                                        {{ $job->title == 'Chief Executive' ? 'selected' : '' }}>Chief Executive</option>
                                    <option value="Cleaner" {{ $job->title == 'Cleaner' ? 'selected' : '' }}>Cleaner
                                    </option>
                                    <option value="Course Co-ordinator"
                                        {{ $job->title == 'Course Co-ordinator' ? 'selected' : '' }}>Course Co-ordinator
                                    </option>
                                    <option value="Credit Controller / Finance Assistant"
                                        {{ $job->title == 'Credit Controller / Finance Assistant' ? 'selected' : '' }}>
                                        Credit Controller / Finance Assistant</option>
                                    <option value="Customer Focus Manager"
                                        {{ $job->title == 'Customer Focus Manager' ? 'selected' : '' }}>Customer Focus
                                        Manager</option>
                                    <option value="Digital Content Co-ordinator"
                                        {{ $job->title == 'Digital Content Co-ordinator' ? 'selected' : '' }}>Digital
                                        Content Co-ordinator</option>
                                    <option value="Executive Manager (Finance)"
                                        {{ $job->title == 'Executive Manager (Finance)' ? 'selected' : '' }}>Executive
                                        Manager (Finance)</option>
                                    <option value="Executive Manager (Human Resources)"
                                        {{ $job->title == 'Executive Manager (Human Resources)' ? 'selected' : '' }}>
                                        Executive Manager (Human Resources)</option>
                                    <option value="Feelgood Suite Instructor"
                                        {{ $job->title == 'Feelgood Suite Instructor' ? 'selected' : '' }}>Feelgood Suite
                                        Instructor</option>
                                    <option value="Fitness / Class Instructor"
                                        {{ $job->title == 'Fitness / Class Instructor' ? 'selected' : '' }}>Fitness /
                                        Class Instructor</option>
                                    <option value="Fitness Class Instructor"
                                        {{ $job->title == 'Fitness Class Instructor' ? 'selected' : '' }}>Fitness Class
                                        Instructor</option>
                                    <option value="Fitness Instructor"
                                        {{ $job->title == 'Fitness Instructor' ? 'selected' : '' }}>Fitness Instructor
                                    </option>
                                    <option value="Front of House Supervisor"
                                        {{ $job->title == 'Front of House Supervisor' ? 'selected' : '' }}>Front of House
                                        Supervisor</option>
                                    <option value="Grant Funding/Administration Manager/PA"
                                        {{ $job->title == 'Grant Funding/Administration Manager/PA' ? 'selected' : '' }}>
                                        Grant Funding/Administration Manager/PA</option>
                                    <option value="Graphic Designer"
                                        {{ $job->title == 'Graphic Designer' ? 'selected' : '' }}>Graphic Designer
                                    </option>
                                    <option value="Gym Manager" {{ $job->title == 'Gym Manager' ? 'selected' : '' }}>Gym
                                        Manager</option>
                                    <option value="Hallkeeper" {{ $job->title == 'Hallkeeper' ? 'selected' : '' }}>
                                        Hallkeeper</option>
                                    <option value="Health Activator"
                                        {{ $job->title == 'Health Activator' ? 'selected' : '' }}>Health Activator
                                    </option>
                                    <option value="Healthy Weight Coach"
                                        {{ $job->title == 'Healthy Weight Coach' ? 'selected' : '' }}>Healthy Weight
                                        Coach</option>
                                    <option value="Healthy Weight Co-ordinator"
                                        {{ $job->title == 'Healthy Weight Co-ordinator' ? 'selected' : '' }}>Healthy
                                        Weight Co-ordinator</option>
                                    <option value="Leisure Attendant"
                                        {{ $job->title == 'Leisure Attendant' ? 'selected' : '' }}>Leisure Attendant
                                    </option>
                                    <option value="Marketing Assistant"
                                        {{ $job->title == 'Marketing Assistant' ? 'selected' : '' }}>Marketing Assistant
                                    </option>
                                    <option value="Marketing Manager"
                                        {{ $job->title == 'Marketing Manager' ? 'selected' : '' }}>Marketing Manager
                                    </option>
                                    <option value="Operations Manager"
                                        {{ $job->title == 'Operations Manager' ? 'selected' : '' }}>Operations Manager
                                    </option>
                                    <option value="Personal Training Instructor"
                                        {{ $job->title == 'Personal Training Instructor' ? 'selected' : '' }}>Personal
                                        Training Instructor</option>
                                    <option value="Pinpoint Trainer"
                                        {{ $job->title == 'Pinpoint Trainer' ? 'selected' : '' }}>Pinpoint Trainer
                                    </option>
                                    <option value="Receptionist" {{ $job->title == 'Receptionist' ? 'selected' : '' }}>
                                        Receptionist</option>
                                    <option value="Relief Assistant Customer Focus Manager"
                                        {{ $job->title == 'Relief Assistant Customer Focus Manager' ? 'selected' : '' }}>
                                        Relief Assistant Customer Focus Manager</option>
                                    <option value="Relief Customer Focus Manager"
                                        {{ $job->title == 'Relief Customer Focus Manager' ? 'selected' : '' }}>Relief
                                        Customer Focus Manager</option>
                                    <option value="Repair and Maintenance Operative"
                                        {{ $job->title == 'Repair and Maintenance Operative' ? 'selected' : '' }}>Repair
                                        and Maintenance Operative</option>
                                    <option value="Seedhill Supervisor"
                                        {{ $job->title == 'Seedhill Supervisor' ? 'selected' : '' }}>Seedhill Supervisor
                                    </option>
                                    <option value="Senior Spa Therapist"
                                        {{ $job->title == 'Senior Spa Therapist' ? 'selected' : '' }}>Senior Spa
                                        Therapist</option>
                                    <option value="Senior Usher" {{ $job->title == 'Senior Usher' ? 'selected' : '' }}>
                                        Senior Usher</option>
                                    <option value="Site Supervisor"
                                        {{ $job->title == 'Site Supervisor' ? 'selected' : '' }}>Site Supervisor</option>
                                    <option value="Spa Customer Focus Manager"
                                        {{ $job->title == 'Spa Customer Focus Manager' ? 'selected' : '' }}>Spa Customer
                                        Focus Manager</option>
                                    <option value="Spa Receptionist"
                                        {{ $job->title == 'Spa Receptionist' ? 'selected' : '' }}>Spa Receptionist
                                    </option>
                                    <option value="Spa Therapist" {{ $job->title == 'Spa Therapist' ? 'selected' : '' }}>
                                        Spa Therapist</option>
                                    <option value="Stage Technician"
                                        {{ $job->title == 'Stage Technician' ? 'selected' : '' }}>Stage Technician
                                    </option>
                                    <option value="Swimming Teacher"
                                        {{ $job->title == 'Swimming Teacher' ? 'selected' : '' }}>Swimming Teacher
                                    </option>
                                    <option value="Swimming Teacher Administration"
                                        {{ $job->title == 'Swimming Teacher Administration' ? 'selected' : '' }}>Swimming
                                        Teacher Administration</option>
                                    <option value="Swimming Teacher Co-ordinator"
                                        {{ $job->title == 'Swimming Teacher Co-ordinator' ? 'selected' : '' }}>Swimming
                                        Teacher Co-ordinator</option>
                                    <option value="Technical Manager"
                                        {{ $job->title == 'Technical Manager' ? 'selected' : '' }}>Technical Manager
                                    </option>
                                    <option value="Theatre Manager"
                                        {{ $job->title == 'Theatre Manager' ? 'selected' : '' }}>Theatre Manager</option>
                                    <option value="Usher" {{ $job->title == 'Usher' ? 'selected' : '' }}>Usher</option>
                                    <option value="Wages Assistant"
                                        {{ $job->title == 'Wages Assistant' ? 'selected' : '' }}>Wages Assistant</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Main Job</label>
                                <select class="form-control form-select" name="main_job">
                                    <option value="yes" {{ $job->main_job == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $job->main_job == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Facility<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="facility">
                                    <option value="" selected disabled>Select Facility</option>
                                    <option value="No 1 Market Street"
                                        {{ $job->facility == 'No 1 Market Street' ? 'selected' : '' }}>No 1 Market Street
                                    </option>
                                    <option value="Pendle Leisure Centre"
                                        {{ $job->facility == 'Pendle Leisure Centre' ? 'selected' : '' }}>Pendle Leisure
                                        Centre</option>
                                    <option value="Pendle Wavelengths"
                                        {{ $job->facility == 'Pendle Wavelengths' ? 'selected' : '' }}>Pendle Wavelengths
                                    </option>
                                    <option value="West Craven Sports Centre"
                                        {{ $job->facility == 'West Craven Sports Centre' ? 'selected' : '' }}>West Craven
                                        Sports Centre</option>
                                    <option value="The Muni" {{ $job->facility == 'The Muni' ? 'selected' : '' }}>The
                                        Muni</option>
                                    <option value="Seedhill Athletics and Fitness Centre"
                                        {{ $job->facility == 'Seedhill Athletics and Fitness Centre' ? 'selected' : '' }}>
                                        Seedhill Athletics and Fitness Centre</option>
                                    <option value="Inside Spa" {{ $job->facility == 'Inside Spa' ? 'selected' : '' }}>
                                        Inside Spa</option>
                                    <option value="Good Life" {{ $job->facility == 'Good Life' ? 'selected' : '' }}>Good
                                        Life</option>
                                    <option value="All Facilities"
                                        {{ $job->facility == 'All Facilities' ? 'selected' : '' }}>All Facilities
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Cost Center </label>
                                <input class="form-control" type="text" value="{{ $job->cost_center }}"
                                    name="cost_center" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" value="{{ $job->start_date }}" required
                                    name="start_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Termination Date </label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" value="{{ $job->termination_date }}"
                                    name="termination_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Rate of Pay <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required value="{{ $job->rate_of_pay }}"
                                    name="rate_of_pay" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Number of Hours <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required value="{{ $job->number_of_hours }}"
                                    name="number_of_hours" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contract Type <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="contract_type">
                                    <option value="" selected disabled>Select Contract Type</option>
                                    <option value="Permanent" {{ $job->contract_type == 'Permanent' ? 'selected' : '' }}>
                                        Permanent</option>
                                    <option value="Casual" {{ $job->contract_type == 'Casual' ? 'selected' : '' }}>
                                        Casual</option>
                                    <option value="Fixed Term"
                                        {{ $job->contract_type == 'Fixed Term' ? 'selected' : '' }}>Fixed Term</option>
                                    <option value="Temporary" {{ $job->contract_type == 'Temporary' ? 'selected' : '' }}>
                                        Temporary</option>
                                    <option value="Permanent Variable"
                                        {{ $job->contract_type == 'Permanent Variable' ? 'selected' : '' }}>Permanent
                                        Variable</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contract Returned</label>
                                <select class="form-control form-select" required name="contract_returned">
                                    <option value="yes" {{ $job->contract_returned == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $job->contract_returned == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">JD Returned</label>
                                <select class="form-control form-select" required name="jd_returned">
                                    <option value="yes" {{ $job->jd_returned == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $job->jd_returned == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">DBS Required <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="dbs_required">
                                    <option value="yes" {{ $job->dbs_required == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $job->dbs_required == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4">{{ $job->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
