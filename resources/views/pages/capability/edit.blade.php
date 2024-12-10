@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Capability</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Update Capability</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.capability', $capability->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $capability->user->first_name }}" disabled>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">On Capability Procedure</label>
                                <select class="form-control form-select" required name="on_capability_procedure">
                                    <option value="yes"
                                        {{ $capability->on_capability_procedure == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no"
                                        {{ $capability->on_capability_procedure == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Capability Stage</label>
                                <select class="form-control form-select" required name="stage">
                                    <option value="" disabled>Select Stage</option>
                                    <option value="Triggered Capability"
                                        {{ $capability->stage == 'Triggered Capability' ? 'selected' : '' }}>Triggered
                                        Capability</option>
                                    <option value="Capability A Counselling Interview"
                                        {{ $capability->stage == 'Capability A Counselling Interview' ? 'selected' : '' }}>
                                        Capability A Counselling Interview</option>
                                    <option value="Restart Capability Procedure"
                                        {{ $capability->stage == 'Restart Capability Procedure' ? 'selected' : '' }}>Restart
                                        Capability Procedure</option>
                                    <option value="Further Sickness"
                                        {{ $capability->stage == 'Further Sickness' ? 'selected' : '' }}>Further Sickness
                                    </option>
                                    <option value="Long Term Sickness Counselling Interview"
                                        {{ $capability->stage == 'Long Term Sickness Counselling Interview' ? 'selected' : '' }}>
                                        Long Term Sickness Counselling Interview</option>
                                    <option value="Long Term Sickness Review"
                                        {{ $capability->stage == 'Long Term Sickness Review' ? 'selected' : '' }}>Long Term
                                        Sickness Review</option>
                                    <option value="Capability Formal Interview"
                                        {{ $capability->stage == 'Capability Formal Interview' ? 'selected' : '' }}>
                                        Capability Formal Interview</option>
                                    <option value="Other" {{ $capability->stage == 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="date"
                                    value="{{ $capability->date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome</label>
                                <input class="form-control" type="text" required name="outcome"
                                    value="{{ $capability->outcome }}" placeholder="Enter Outcome" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Warning Issued Type</label>
                                <select class="form-control form-select" required name="warning_issued_type">
                                    <option value="" disabled>Select Warning Type</option>
                                    <option value="Verbal Warning"
                                        {{ $capability->warning_issued_type == 'Verbal Warning' ? 'selected' : '' }}>Verbal
                                        Warning</option>
                                    <option value="Written Warning"
                                        {{ $capability->warning_issued_type == 'Written Warning' ? 'selected' : '' }}>
                                        Written Warning</option>
                                    <option value="Final Written Warning"
                                        {{ $capability->warning_issued_type == 'Final Written Warning' ? 'selected' : '' }}>
                                        Final Written Warning</option>
                                    <option value="Dismissal"
                                        {{ $capability->warning_issued_type == 'Dismissal' ? 'selected' : '' }}>Dismissal
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="review_date"
                                    value="{{ $capability->review_date }}" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4" placeholder="Enter any additional details">{{ $capability->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
