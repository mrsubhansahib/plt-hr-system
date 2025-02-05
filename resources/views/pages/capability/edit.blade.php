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
                                <label class="form-label">On Capability Procedure<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="on_capability_procedure">
                                    <option value="yes"
                                        {{ $capability->on_capability_procedure == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no"
                                        {{ $capability->on_capability_procedure == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Capability Stage<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="stage">
                                    <option value="" disabled>Select Stage</option>
                                    <!-- Dynamic Options -->
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Capability' && $dropdown->name == 'Capability Stage')
                                            <option value="{{ $dropdown->value }}"
                                                {{ $capability->stage == $dropdown->value ? 'selected' : '' }}>
                                                {{ $dropdown->value }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required
                                    name="date" value="{{ $capability->date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="outcome"
                                    value="{{ $capability->outcome }}" placeholder="Enter Outcome" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Warning Issued Type<span class="text-danger">*</span></label>
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
                                <label class="form-label">Review Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required
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
