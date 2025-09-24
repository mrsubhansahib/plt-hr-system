<div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterColleagues">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-3 mb-3">
                                <label for="emergency_info" class="form-label">Select Employee</label>
                                <select class="form-select" wire:model="employee_id" id="emergency_info">
                                    <option selected value="Select" disabled>Select</option>
                                    @foreach ($colleagues as $colleague)
                                        <option value="{{ $colleague->id }}">
                                            {{ $colleague->first_name . ' ' . $colleague->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1 mt-4 pt-1">
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
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" id="printSection">
                        <div class="my-3">
                            <h3
                                class="heading text-center border-bottom border-1 border-dark pb-2 mb-4 border-dark fw-bolder">
                                Full Sickness & Capability Report</h3>

                            <div class="row mb-3 border-bottom border-1 border-dark pb-2 pb-4">

                                <div class="col-12">
                                    <h4 class=" text-center w-50 m-auto border-bottom border-1 border-dark pb-2 mb-3">
                                        Personal&nbsp;Details</h4>

                                </div>
                                <div class="col-3 my-2">
                                    <label>First Name</label>
                                    <input type="text" class="form-control mt-2" value="{{ $employee->first_name }}"
                                        disabled>
                                </div>
                                <div class="col-3 my-2">
                                    <label>Surname</label>
                                    <input type="text" class="form-control mt-2" value="{{ $employee->surname }}"
                                        disabled>
                                </div>


                                <div class="col-3 my-2">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control mt-2"
                                        value="{{ $employee->jobs->where('status', 'active')->where('main_job', 'yes')->first()->title ??
                                            ($employee->jobs->first()->title ?? 'N/A') }}"
                                        disabled>
                                </div>
                                <div class="col-3 my-2">
                                    <label>Facility</label>
                                    <input type="text" class="form-control mt-2"
                                        value="{{ $employee->jobs->where('status', 'active')->where('main_job', 'yes')->first()->facility ??
                                            ($employee->jobs->first()->facility ?? 'N/A') }}"
                                        disabled>
                                </div>
                                <div class="col-3 my-2">
                                    <label>Contract Type</label>
                                    <input type="text" class="form-control mt-2"
                                        value="{{ $employee->jobs->where('status', 'active')->where('main_job', 'yes')->first()->contract_type ??
                                            ($employee->jobs->first()->contract_type ?? 'N/A') }}"
                                        disabled>
                                </div>
                                <div class="col-3 my-2">
                                    <label>Commencement Date</label>
                                    <input type="text" class="form-control mt-2"
                                        value="{{ $employee->commencement_date ? \Carbon\Carbon::parse($employee->commencement_date)->format('d/m/Y') : 'N/A' }}"
                                        disabled>
                                </div>
                                <div class="col-3 my-2">
                                    <label>Contracted From</label>
                                    <input type="text" class="form-control mt-2"
                                        value="{{ $employee->contracted_from_date
                                            ? \Carbon\Carbon::parse($employee->contracted_from_date)->format('d/m/Y')
                                            : 'N/A' }}"
                                        disabled>
                                </div>
                                <div class="col-3 my-2">
                                    <label>Email</label>
                                    <input type="email" class="form-control mt-2" value="{{ $employee->email }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <h4 class="text-center  w-50 m-auto border-bottom border-1 border-dark pb-2 mb-3">
                                    Sickness&nbsp;Record
                                </h4>
                            </div>
                            @forelse ($employee->sicknesses as $sickness)
                                <div class="mt-4 mb-3 border-bottom border-dark pb-4">
                                    <h5 class="text-primary mb-3">NO#{{ $loop->iteration }}</h5>
                                    <div class="row">
                                        <div class="col-3 mt-3">
                                            <label class="form-label">Reason for Absence</label>
                                            <input class="form-control" type="text" required
                                                name="reason_for_absence"
                                                value="{{ $sickness->reason_for_absence ? $sickness->reason_for_absence : 'N/A' }}"
                                                disabled />
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Date From</label>
                                            <input class="form-control datepicker" type="text"
                                                placeholder="Select Date" required name="date_from"
                                                value="{{ \Carbon\Carbon::parse($sickness->date_from)->format('d-m-Y') ? \Carbon\Carbon::parse($sickness->date_from)->format('d-m-Y') : 'N/A' }}"
                                                disabled />
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Total Hours</label>
                                            <input class="form-control" type="text" name="total_hours"
                                                value="{{ $sickness->total_hours ? $sickness->total_hours : 'N/A' }}"
                                                disabled />
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Self Certification Form Received</label>
                                            <input class="form-control" type="text"
                                                value="{{ ucfirst($sickness->certification_form_received ? $sickness->certification_form_received : 'N/A') }}"
                                                disabled />
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Fit Note Received</label>
                                            <input class="form-control" type="text"
                                                value="{{ ucfirst($sickness->fit_note_received ? $sickness->fit_note_received : 'N/A') }}"
                                                disabled />
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Date To</label>
                                            <input class="form-control datepicker" type="text"
                                                placeholder="Select Date" name="date_to"
                                                value="{{ \Carbon\Carbon::parse($sickness->date_to)->format('d-m-Y') ? \Carbon\Carbon::parse($sickness->date_to)->format('d-m-Y') : 'N/A' }}"
                                                disabled />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" name="notes" disabled>{{ $sickness->notes ? $sickness->notes : 'N/A' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 mt-3">
                                    <p class="text-muted text-center fs-5 border-1 border-dark border w-50 m-auto p-3">
                                        No sickness
                                        records found.</p>
                                    <hr>
                            @endforelse

                            <div class="col-12 mt-3">
                                <h4 class="text-center  w-50 m-auto border-bottom border-1 border-dark pb-2 mb-3">
                                    Capability&nbsp;Record
                                </h4>
                            </div>
                            @forelse ($employee->capabilities as $capability)
                                <div class="card-body border-bottom border-dark mb-4 pb-4">
                                    <h5 class="text-primary mb-3">NO#{{ $loop->iteration }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-3 mt-3">
                                            <label class="form-label">On Capability Procedure</label>
                                            <input type="text" class="form-control"
                                                value="{{ ucfirst($capability->on_capability_procedure ? $capability->on_capability_procedure : 'N/A') }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Capability Stage</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->stage ? $capability->stage : 'N/A' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Date</label>
                                            <input type="text" class="form-control datepicker"
                                                value="{{ $capability->date ? $capability->date : 'N/A' }}" disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Outcome</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->outcome ? $capability->outcome : 'N/A' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Warning Issued Type</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->warning_issued_type ? $capability->warning_issued_type : 'N/A' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Review Date</label>
                                            <input type="text" class="form-control datepicker"
                                                value="{{ $capability->review_date ? $capability->review_date : 'N/A' }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" disabled>{{ $capability->notes ? $capability->notes : 'N/A' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 mt-3">
                                    <p class="text-muted text-center fs-5 border-1 border-dark border w-50 m-auto p-3">
                                        No
                                        capability records found.</p>
                                    <hr>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
