@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Training</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">Training Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.trainings') }}"
                                class="btn btn-primary"><strong>List</strong><i data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.training') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Training Title<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="training_title">
                                    <option value="" selected disabled>Select Training Title</option>
                                    <option value="NPLQ">NPLQ</option>
                                    <option value="NPLQ Renewal">NPLQ Renewal</option>
                                    <option value="FAAW">FAAW</option>
                                    <option value="FAAW Renewal">FAAW Renewal</option>
                                    <option value="Emergency First Aid">Emergency First Aid</option>
                                    <option value="Monthly Staff Training">Monthly Staff Training</option>
                                    <option value="Emergency Response">Emergency Response</option>
                                    <option value="Pool Plant Operators">Pool Plant Operators</option>
                                    <option value="Ladder and Steps Inspection Training">Ladder and Steps Inspection
                                        Training</option>
                                    <option value="iHasco allocated modules">iHasco allocated modules</option>
                                    <option value="IOSH Managing Safely">IOSH Managing Safely</option>
                                    <option value="Swimming Teaching Course">Swimming Teaching Course</option>
                                    <option value="Other">Other</option>
                                    @foreach ($dropdowns as $dropdown)
                                                @if ($dropdown->module_type == 'Training' && $dropdown->name == 'Training Course Titles')
                                                    <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                                @endif
                                            @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Course Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="course_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Renewal Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="renewal_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">IHASCO Training Sent<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="ihasco_training_sent">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                    <option value="Not Required">Not Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">IHASCO Training Complete<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="ihasco_training_complete">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                    <option value="Not Required">Not Required</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" placeholder="Enter Training Details" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
