<div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterColleagues">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-md-3 mb-3">
                                <label for="emergency_info" class="form-label">Select Employee</label>
                                <select class="form-select" wire:model="employee_id" id="emergency_info">
                                    <option selected value="Select" disabled>Select</option>
                                    @foreach ($colleagues as $colleague)
                                        <option value="{{ $colleague->id }}">
                                            {{ $colleague->first_name . ' ' . $colleague->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1 mt-4  pt-1">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-1 mt-4 pt-1">
                                <button {{ $employee ? '' : 'disabled' }} onclick="printDiv('printSection')"
                                    class="btn btn-secondary">Print</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($errorMsg)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $errorMsg }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif
    @if ($successMsg)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $successMsg }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif
    @if ($employee)
        <div class="row"id="printSection">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="w-50 m-auto border-bottom border-2 pb-2 text-center">Emergency Info</h3>
                        <div class="row my-3">
                            <h3 class="heading text-center border-bottom border-2 pb-2 mb-4 border-dark fw-bolder">Employee Emergency Report</h3>
                            <div class="col-3 my-2">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control mt-2" id="first_name"
                                    value="{{ $employee->first_name }}" disabled>
                            </div>
                            <div class="col-3 my-2">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control mt-2" id="surname"
                                    value="{{ $employee->surname }}" disabled>
                            </div>

                            @php
                                $job = $employee->jobs->firstWhere('main_job', 'yes') ?? $employee->jobs->first();
                            @endphp

                            @if ($job)
                                <div class="col-3 my-2">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control mt-2" id="job_title"
                                        value="{{ $job->title ? $job->title : 'N/A' }}" disabled>
                                </div>

                                <div class="col-3 my-2">
                                    <label for="facility">Facility</label>
                                    <input type="text" class="form-control mt-2" id="facility"
                                        value="{{ $job->facility ? $job->facility : 'N/A' }}" disabled>
                                </div>
                            @endif
                            <!-- Emergency Contact -->
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Name </label>
                                <input class="form-control" type="text" required name="emergency_1_name" disabled
                                    value="{{ $employee->emergency_1_name }}" />
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Mobile </label>
                                <input class="form-control" type="number" placeholder="Phone Number" required
                                    name="emergency_1_ph_no" disabled value="{{ $employee->emergency_1_ph_no }}" />
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Relationship </label>
                                <input class="form-control" type="text" required name="emergency_1_relation" disabled
                                    value="{{ $employee->emergency_1_relation }}" />
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Home Number</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_1_home_ph" disabled value="{{ $employee->emergency_1_home_ph }}" />
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Name</label>
                                <input class="form-control" type="text" name="emergency_2_name" disabled
                                    value="{{ $employee->emergency_2_name }}" />
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Mobile</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_ph_no" disabled value="{{ $employee->emergency_2_ph_no }}" />
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Home Number</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_home_ph" disabled
                                    value="{{ $employee->emergency_2_home_ph }}" />
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Relationship</label>
                                <input class="form-control" type="text" name="emergency_2_relation" disabled
                                    value="{{ $employee->emergency_2_relation }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
