@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Training </a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Update Training </h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.training', $training->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control" required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $employee->id == $training->user_id ? 'selected' : '' }}>
                                            {{ $employee->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Training Title</label>
                                <select class="form-control" required name="training_title">
                                    <option value="" selected disabled>Select Training Title</option>
                                    <option value="NPLQ" {{ $training->training_title == 'NPLQ' ? 'selected' : '' }}>NPLQ
                                    </option>
                                    <option value="NPLQ Renewal"
                                        {{ $training->training_title == 'NPLQ Renewal' ? 'selected' : '' }}>NPLQ Renewal
                                    </option>
                                    <option value="FAAW" {{ $training->training_title == 'FAAW' ? 'selected' : '' }}>FAAW
                                    </option>
                                    <option value="FAAW Renewal"
                                        {{ $training->training_title == 'FAAW Renewal' ? 'selected' : '' }}>FAAW Renewal
                                    </option>
                                    <option value="Emergency First Aid"
                                        {{ $training->training_title == 'Emergency First Aid' ? 'selected' : '' }}>Emergency
                                        First Aid</option>
                                    <option value="Monthly Staff Training"
                                        {{ $training->training_title == 'Monthly Staff Training' ? 'selected' : '' }}>
                                        Monthly Staff Training</option>
                                    <option value="Emergency Response"
                                        {{ $training->training_title == 'Emergency Response' ? 'selected' : '' }}>Emergency
                                        Response</option>
                                    <option value="Pool Plant Operators"
                                        {{ $training->training_title == 'Pool Plant Operators' ? 'selected' : '' }}>Pool
                                        Plant Operators</option>
                                    <option value="Ladder and Steps Inspection Training"
                                        {{ $training->training_title == 'Ladder and Steps Inspection Training' ? 'selected' : '' }}>
                                        Ladder and Steps Inspection Training</option>
                                    <option value="iHasco allocated modules"
                                        {{ $training->training_title == 'iHasco allocated modules' ? 'selected' : '' }}>
                                        iHasco allocated modules</option>
                                    <option value="IOSH Managing Safely"
                                        {{ $training->training_title == 'IOSH Managing Safely' ? 'selected' : '' }}>IOSH
                                        Managing Safely</option>
                                    <option value="Swimming Teaching Course"
                                        {{ $training->training_title == 'Swimming Teaching Course' ? 'selected' : '' }}>
                                        Swimming Teaching Course</option>
                                    <option value="Other" {{ $training->training_title == 'Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Course Date</label>
                                <input class="form-control" type="date" required name="course_date"
                                    value="{{ $training->course_date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Renewal Date</label>
                                <input class="form-control" type="date" required name="renewal_date"
                                    value="{{ $training->renewal_date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">IHASCO Training Sent</label>
                                <select class="form-control" name="ihasco_training_sent">
                                    <option value="" selected disabled>Select Option</option>
                                    <option value="yes"
                                        {{ $training->ihasco_training_sent == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $training->ihasco_training_sent == 'no' ? 'selected' : '' }}>
                                        No</option>
                                    <option value="Not Required"
                                        {{ $training->ihasco_training_sent == 'Not Required' ? 'selected' : '' }}>Not
                                        Required</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">IHASCO Training Complete</label>
                                <select class="form-control" name="ihasco_training_complete">
                                    <option value="" selected disabled>Select Option</option>
                                    <option value="yes"
                                        {{ $training->ihasco_training_complete == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no"
                                        {{ $training->ihasco_training_complete == 'no' ? 'selected' : '' }}>No</option>
                                    <option value="Not Required"
                                        {{ $training->ihasco_training_complete == 'Not Required' ? 'selected' : '' }}>Not
                                        Required</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" placeholder="Enter Training Details" rows="4">{{ $training->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
