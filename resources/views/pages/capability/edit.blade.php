@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Capability</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Edit Capability</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.capability', $capability->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $capability->user->first_name }}"
                                    disabled>
                                <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type">

                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">On Capability Procedure</label>
                                <select class="form-control form-select" name="on_capability_procedure">
                                    <option value="yes"
                                        {{ $capability->on_capability_procedure == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no"
                                        {{ $capability->on_capability_procedure == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Capability Stage</label>
                                <select class="form-control form-select" name="stage">
                                    <option value="" disabled {{ empty($capability->stage) ? 'selected' : '' }}>Select Stage</option>
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Capability' && $dropdown->name == 'Capability Stage')
                                            <option value="{{ $dropdown->value }}"
                                                {{ isset($capability->stage) && $capability->stage == $dropdown->value ? 'selected' : '' }}>
                                                {{ $dropdown->value }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>                                
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="date" value="{{ $capability->date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome</label>
                                <input class="form-control" type="text" name="outcome"
                                    value="{{ $capability->outcome }}" placeholder="Enter Outcome" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Warning Issued Type</label>
                                <select class="form-control form-select" name="warning_issued_type">
                                    <option value="" disabled {{ empty($capability->warning_issued_type) ? 'selected' : '' }}>Select Warning Type</option>
                                    <option value="Verbal Warning"
                                        {{ isset($capability->warning_issued_type) && $capability->warning_issued_type == 'Verbal Warning' ? 'selected' : '' }}>
                                        Verbal Warning
                                    </option>
                                    <option value="Written Warning"
                                        {{ isset($capability->warning_issued_type) && $capability->warning_issued_type == 'Written Warning' ? 'selected' : '' }}>
                                        Written Warning
                                    </option>
                                    <option value="Final Written Warning"
                                        {{ isset($capability->warning_issued_type) && $capability->warning_issued_type == 'Final Written Warning' ? 'selected' : '' }}>
                                        Final Written Warning
                                    </option>
                                    <option value="Dismissal"
                                        {{ isset($capability->warning_issued_type) && $capability->warning_issued_type == 'Dismissal' ? 'selected' : '' }}>
                                        Dismissal
                                    </option>
                                    <option value="NFA"
                                        {{ isset($capability->warning_issued_type) && $capability->warning_issued_type == 'NFA' ? 'selected' : '' }}>
                                        NFA
                                    </option>
                                </select>                                
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="review_date" value="{{ $capability->review_date }}" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4" placeholder="Enter any additional details">{{ $capability->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
