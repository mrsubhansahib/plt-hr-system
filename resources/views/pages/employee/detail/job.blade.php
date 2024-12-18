@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Job</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
@include('layout.alert')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3 class="my-4 text-center">Job Details</h3>
                <hr>
                <form class="forms-sample" action="{{route('store.new.job')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Employee<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $employee->first_name }}"  disabled>
                            <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type" >
                        </div>                        
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Title<span class="text-danger">*</span></label>
                            <select class="form-control form-select" required name="title">
                                <option value="" selected disabled>Select Title</option>
                                <option value="Activo Administration Assistant">Activo Administration Assistant</option>
                                <option value="Administration Assistant">Administration Assistant</option>
                                <option value="Administration Assistant Senior">Administration Assistant Senior</option>
                                <option value="Administration Assistant/Wages Clerk (REC)">Administration Assistant/Wages Clerk (REC)</option>
                                <option value="Allotment Assistant">Allotment Assistant</option>
                                <option value="Allotment Development Worker">Allotment Development Worker</option>
                                <option value="Aquarhythmics Teacher">Aquarhythmics Teacher</option>
                                <option value="Assistant Finance Manager">Assistant Finance Manager</option>
                                <option value="Assistant Theatre Manager">Assistant Theatre Manager</option>
                                <option value="Bar and Catering Assistant">Bar and Catering Assistant</option>
                                <option value="Bar Assistant">Bar Assistant</option>
                                <option value="Bar Supervisor">Bar Supervisor</option>
                                <option value="Box Office / Information Sales Co-Ordinator">Box Office / Information Sales Co-Ordinator</option>
                                <option value="Business Development Manager">Business Development Manager</option>
                                <option value="Catering Assistant">Catering Assistant</option>
                                <option value="Catering Supervisor">Catering Supervisor</option>
                                <option value="Centre Manager">Centre Manager</option>
                                <option value="Chief Executive">Chief Executive</option>
                                <option value="Cleaner">Cleaner</option>
                                <option value="Course Co-ordinator">Course Co-ordinator</option>
                                <option value="Credit Controller / Finance Assistant">Credit Controller / Finance Assistant</option>
                                <option value="Customer Focus Manager">Customer Focus Manager</option>
                                <option value="Digital Content Co-ordinator">Digital Content Co-ordinator</option>
                                <option value="Executive Manager (Finance)">Executive Manager (Finance)</option>
                                <option value="Executive Manager (Human Resources)">Executive Manager (Human Resources)</option>
                                <option value="Feelgood Suite Instructor">Feelgood Suite Instructor</option>
                                <option value="Fitness / Class Instructor">Fitness / Class Instructor</option>
                                <option value="Fitness Class Instructor">Fitness Class Instructor</option>
                                <option value="Fitness Instructor">Fitness Instructor</option>
                                <option value="Front of House Supervisor">Front of House Supervisor</option>
                                <option value="Grant Funding/Administration Manager/PA">Grant Funding/Administration Manager/PA</option>
                                <option value="Graphic Designer">Graphic Designer</option>
                                <option value="Gym Manager">Gym Manager</option>
                                <option value="Hallkeeper">Hallkeeper</option>
                                <option value="Health Activator">Health Activator</option>
                                <option value="Healthy Weight Coach">Healthy Weight Coach</option>
                                <option value="Healthy Weight Co-ordinator">Healthy Weight Co-ordinator</option>
                                <option value="Leisure Attendant">Leisure Attendant</option>
                                <option value="Marketing Assistant">Marketing Assistant</option>
                                <option value="Marketing Manager">Marketing Manager</option>
                                <option value="Operations Manager">Operations Manager</option>
                                <option value="Personal Training Instructor">Personal Training Instructor</option>
                                <option value="Pinpoint Trainer">Pinpoint Trainer</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Relief Assistant Customer Focus Manager">Relief Assistant Customer Focus Manager</option>
                                <option value="Relief Customer Focus Manager">Relief Customer Focus Manager</option>
                                <option value="Repair and Maintenance Operative">Repair and Maintenance Operative</option>
                                <option value="Seedhill Supervisor">Seedhill Supervisor</option>
                                <option value="Senior Spa Therapist">Senior Spa Therapist</option>
                                <option value="Senior Usher">Senior Usher</option>
                                <option value="Site Supervisor">Site Supervisor</option>
                                <option value="Spa Customer Focus Manager">Spa Customer Focus Manager</option>
                                <option value="Spa Receptionist">Spa Receptionist</option>
                                <option value="Spa Therapist">Spa Therapist</option>
                                <option value="Stage Technician">Stage Technician</option>
                                <option value="Swimming Teacher">Swimming Teacher</option>
                                <option value="Swimming Teacher Administration">Swimming Teacher Administration</option>
                                <option value="Swimming Teacher Co-ordinator">Swimming Teacher Co-ordinator</option>
                                <option value="Technical Manager">Technical Manager</option>
                                <option value="Theatre Manager">Theatre Manager</option>
                                <option value="Usher">Usher</option>
                                <option value="Wages Assistant">Wages Assistant</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Main Job</label>
                            <select class="form-control form-select" name="main_job">
                                <option value="yes">Yes</option>
                                <option selected value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Facility<span class="text-danger">*</span></label>
                            <select class="form-control form-select" required name="facility">
                                <option value="" selected disabled>Select Facility</option>
                                <option value="No 1 Market Street">No 1 Market Street</option>
                                <option value="Pendle Leisure Centre">Pendle Leisure Centre</option>
                                <option value="Pendle Wavelengths">Pendle Wavelengths</option>
                                <option value="West Craven Sports Centre">West Craven Sports Centre</option>
                                <option value="The Muni">The Muni</option>
                                <option value="Seedhill Athletics and Fitness Centre">Seedhill Athletics and Fitness Centre</option>
                                <option value="Inside Spa">Inside Spa</option>
                                <option value="Good Life">Good Life</option>
                                <option value="All Facilities">All Facilities</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Cost Center </label>
                            <input class="form-control" type="text" name="cost_center" />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Start Date <span class="text-danger">*</span></label>
                            <input class="form-control datepicker" type="text" placeholder="Select Date" required name="start_date" />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Termination Date </label>
                            <input class="form-control datepicker" type="text" placeholder="Select Date" name="termination_date" />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Rate of Pay <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" required name="rate_of_pay" />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Number of Hours <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" required name="number_of_hours" />
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Contract Type <span class="text-danger">*</span></label>
                            <select class="form-control form-select" required name="contract_type">
                                <option value="" selected disabled>Select Contract Type</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Casual">Casual</option>
                                <option value="Fixed Term">Fixed Term</option>
                                <option value="Temporary">Temporary</option>
                                <option value="Permanent Variable">Permanent Variable</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Contract Returned</label>
                            <select class="form-control form-select" required name="contract_returned">
                                <option value="" selected disabled>Select Option</option>
                                <option value="yes">Yes</option>
                                <option selected value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">JD Returned</label>
                            <select class="form-control form-select" required name="jd_returned">
                                <option value="yes">Yes</option>
                                <option selected value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">DBS Required <span class="text-danger">*</span></label>
                            <select class="form-control form-select" required name="dbs_required">
                                <option value="yes">Yes</option>
                                <option selected value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes </label>
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
