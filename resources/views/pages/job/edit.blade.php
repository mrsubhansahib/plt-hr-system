@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Job</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Job Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.job', $job->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $job->user->first_name }}" disabled>
                                <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type">
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="title">
                                    <option value="" selected disabled>Select Title</option>
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Title')
                                            <option value="{{ $dropdown->value }}"
                                                {{ old('title', $job->title) == $dropdown->value ? 'selected' : '' }}>
                                                {{ $dropdown->value }}</option>
                                        @endif
                                    @endforeach
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
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Facility')
                                            <option value="{{ $dropdown->value }}"
                                                {{ old('facility', $job->facility) == $dropdown->value ? 'selected' : '' }}>
                                                {{ $dropdown->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Cost Center </label>
                                <input class="form-control" type="text" value="{{ $job->cost_center }}"
                                    name="cost_center" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    value="{{ $job->start_date }}" required name="start_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Termination Date </label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    value="{{ $job->termination_date }}" name="termination_date" />
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
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Contract Type')
                                            <option value="{{ $dropdown->value }}"
                                                {{ old('contract_type', $job->contract_type) == $dropdown->value ? 'selected' : '' }}>
                                                {{ $dropdown->value }}</option>
                                        @endif
                                    @endforeach
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
