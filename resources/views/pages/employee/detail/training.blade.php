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
                    <h3 class="my-4 text-center">Training</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.new.training') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $employee->first_name }}"  disabled>
                                <input type="hidden" class="form-control" value="{{ $employee->id }}" name="user_id" >
                                <input type="hidden" class="form-control" value="{{ $user_id }}" name="user_id" >

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
                                <select class="form-control form-select" name="ihasco_training_sent">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                    <option value="Not Required">Not Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">IHASCO Training Complete<span class="text-danger">*</span></label>
                                <select class="form-control form-select" name="ihasco_training_complete">
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
