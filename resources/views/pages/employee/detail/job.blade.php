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
                    <form class="forms-sample" action="{{ route('store.new.job') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $employee->first_name.' '.$employee->surname  }}" disabled>
                                <input type="hidden" class="form-control" value="{{ $user_id }}" name="user_id">
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Job Title<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="title">
                                    <option value="" selected disabled>Select Title</option>
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Title')
                                            <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                        @endif
                                    @endforeach
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
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Facility')
                                            <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Cost Center </label>
                                <input class="form-control" type="text" name="cost_center" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Job Start Date <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required
                                    name="start_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label" id="terminationLabel">Job Termination Date </label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="termination_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Rate of Pay <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="rate_of_pay" />
                            </div> <!-- Pay Frequency Field -->
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Pay Frequency<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="pay_frequency">
                                    <option selected value="Per Annum">Per Annum</option>
                                    <option value="Per Hour"> Per Hour</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Number of Hours <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="number_of_hours" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contract Type <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="contract_type">
                                    <option value="" selected disabled>Select Contract Type</option>
                                    @foreach ($dropdowns->where('module_type', 'Job')->where('name', 'Contract Type')->unique('value') as $dropdown)
                                        <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                    @endforeach
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
                                    <option selected value="yes">Yes</option>
                                    <option  value="no">No</option>
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