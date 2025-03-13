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
                            @php
                                // Collect job title options, ensuring uniqueness and sorting alphabetically
                                $jobTitleOptions = collect($dropdowns)
                                    ->filter(fn($dropdown) => $dropdown->module_type == 'Job' && $dropdown->name == 'Title')
                                    ->pluck('value')
                                    ->unique()
                                    ->sort() // Sort alphabetically
                                    ->values();
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Job Title <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="title">
                                    <option value="" selected disabled>Select Title</option>
                                    @foreach ($jobTitleOptions as $option)
                                        <option value="{{ $option }}" {{ old('title', $job->title) == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
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
                            @php
                                $facilityDropdowns = collect($dropdowns)
                                    ->where('module_type', 'Job')
                                    ->where('name', 'Facility')
                                    ->sortBy('value');
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Facility<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="facility">
                                    <option value="" selected disabled>Select Facility</option>
                                    @foreach ($facilityDropdowns as $dropdown)
                                        <option value="{{ $dropdown->value }}" {{ old('facility', $job->facility) == $dropdown->value ? 'selected' : '' }}>
                                            {{ $dropdown->value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Cost Centre </label>
                                <input class="form-control" type="text" value="{{ $job->cost_center }}"
                                    name="cost_center" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Job Start Date <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    value="{{ $job->start_date }}" required name="start_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label" id="terminationLabel">Job Termination Date </label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    value="{{ $job->termination_date }}" name="termination_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Rate of Pay <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{ $job->rate_of_pay }}" type="text" required name="rate_of_pay" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Pay Frequency<span class="text-danger">*</span></label>
                                <select class="form-control form-select" name="pay_frequency">
                                    <option value="Per Annum" {{ $job->pay_frequency == 'Per Annum' ? 'selected' : '' }}>Per
                                        Annum</option>
                                    <option value="Per Hour" {{ $job->pay_frequency == 'Per Hour' ? 'selected' : '' }}>Per
                                        Hour</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Number of Hours <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required value="{{ $job->number_of_hours }}"
                                    name="number_of_hours" />
                            </div>
                            @php
                                $defaultContractTypes = collect([
                                    'Permanent',
                                    'Casual',
                                    'Fixed Term',
                                    'Temporary',
                                    'Permanent Variable'
                                ]);

                                $contractTypeDropdowns = collect($dropdowns)->where('module_type', 'Job')->where('name', 'Contract Type')->pluck('value');
                                $allContractTypes = $defaultContractTypes->merge($contractTypeDropdowns)->unique()->sort();
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contract Type <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="contract_type">
                                    <option value="" selected disabled>Select Contract Type</option>

                                    @foreach ($allContractTypes as $contractType)
                                        <option value="{{ $contractType }}" {{ old('contract_type', $job->contract_type) == $contractType ? 'selected' : '' }}>
                                            {{ $contractType }}
                                        </option>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const contractTypeSelect = document.querySelector("select[name='contract_type']");
        const terminationLabel = document.getElementById("terminationLabel");

        contractTypeSelect.addEventListener("change", function () {
            const selectedValue = this.value.trim(); // Trim to remove any unwanted spaces

            if (selectedValue === "Fixed Term" || selectedValue === "Temporary") {
                terminationLabel.textContent = "Fix/Tem Expiry";
            } else {
                terminationLabel.textContent = "Job Termination Date";
            }
        });
    });
</script>
