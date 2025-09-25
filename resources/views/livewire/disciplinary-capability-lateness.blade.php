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
                        <h3
                            class="heading text-center border-bottom border-1 border-dark pb-2 mb-4 border-dark fw-bolder">
                            Disciplinary, Capability & Lateness Report</h3>
                        <div class="row my-3  border-bottom pb-4 border-dark">
                            <div class="col-12">
                                <h4 class=" text-center w-50 m-auto border-bottom border-1 border-dark pb-2 mb-3">
                                    Personal&nbsp;Details</h4>

                            </div>
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

                        </div>
                        @if ($employee->capabilities->count() > 0)
                            <h4 class="w-50 m-auto border-bottom border-1 border-dark pb-2 text-center">Capability Details</h3>
                            @foreach ($employee->capabilities as $index => $capability)
                                <div class="mt-4 mb-3 border-bottom pb-4 border-dark">
                                    <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                    <div class="row">
                                        <div class="col-3 mt-3">
                                            <label class="form-label">On Capability Procedure</label>
                                            <input type="text" class="form-control"
                                                value="{{ ucfirst($capability->on_capability_procedure) ? $capability->on_capability_procedure : 'empty' }}"
                                                disabled>
                                        </div>
                                        {{-- capability procedure date --}}
                                        <div class="col-3 mt-3">
                                            <label class="form-label">Capability Procedure Date</label>
                                            <input type="text" class="form-control datepicker"
                                                value="{{ $capability->capability_procedure_date ? \Carbon\Carbon::parse($capability->capability_procedure_date)->format('d-m-Y') : 'N/A' }}"
                                                disabled>   
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Capability Stage</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->stage ? $capability->stage : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Date</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->date ? $capability->date : 'empty' }}" disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Outcome</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->outcome ? $capability->outcome : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Warning Issued Type</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->warning_issued_type ? $capability->warning_issued_type : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Review Date</label>
                                            <input type="text" class="form-control"
                                                value="{{ $capability->review_date ? $capability->review_date : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" rows="3" disabled>{{ $capability->notes ?? 'empty' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class=" text-center fs-5 border-1 border-dark border w-50 m-auto p-3">No capability
                                records found.</p>
                            <hr class="opacity-100">
                        @endif


                        @if ($employee->disciplinaries->count() > 0)
                            <h4 class="w-50 m-auto border-bottom border-1 border-dark pb-2 text-center">Disciplinary Details</h3>

                            @foreach ($employee->disciplinaries as $index => $disciplinary)
                                <div class="mt-4 mb-3 border-bottom pb-4 border-dark">
                                    <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                    <div class="row">
                                        <div class="col-3 mt-3">
                                            <label class="form-label">Reason for Disciplinary</label>
                                            <input class="form-control" type="text"
                                                value="{{ $disciplinary->reason_for_disciplinary ? $disciplinary->reason_for_disciplinary : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Date of Hearing</label>
                                            <input class="form-control" type="text"
                                                value="{{ $disciplinary->hearing_date ? $disciplinary->hearing_date : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Outcome</label>
                                            <input class="form-control" type="text"
                                                value="{{ $disciplinary->outcome ? $disciplinary->outcome : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Suspended</label>
                                            <input class="form-control" type="text"
                                                value="{{ ucfirst($disciplinary->suspended ? $disciplinary->suspended : 'empty') }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Date Suspended</label>
                                            <input class="form-control" type="text"
                                                value="{{ $disciplinary->date_suspended ? $disciplinary->date_suspended : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" rows="3" disabled>{{ $disciplinary->notes ?? 'empty' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class=" text-center fs-5 border-1 border-dark border w-50 m-auto p-3">No disciplinary
                                records found.</p>
                            <hr class="opacity-100">
                        @endif

                        @if ($employee->latenesses->count() > 0)
                            <h4 class="w-50 m-auto border-bottom border-1 border-dark pb-2 text-center">Lateness Details</h4>


                            @foreach ($employee->latenesses as $index => $lateness)
                                <div class="mt-4 mb-3 border-bottom pb-4 border-dark">
                                    <h5 class="text-primary mb-3">NO#{{ $index + 1 }}</h5>
                                    <div class="row">
                                        <div class="col-3 mt-3">
                                            <label class="form-label">Lateness Triggered</label>
                                            <input class="form-control" type="text"
                                                value="{{ $lateness->lateness_triggered ? $lateness->lateness_triggered : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Lateness Stage</label>
                                            <input class="form-control" type="text"
                                                value="{{ $lateness->lateness_stage ? $lateness->lateness_stage : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Level of Warning Issued</label>
                                            <input class="form-control" type="text"
                                                value="{{ $lateness->warning_level ? $lateness->warning_level : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Outcome / Action Taken</label>
                                            <input class="form-control" type="text"
                                                value="{{ $lateness->outcome ? $lateness->outcome : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-3 mt-3">
                                            <label class="form-label">Review Date</label>
                                            <input class="form-control" type="text"
                                                value="{{ $lateness->review_date ? $lateness->review_date : 'empty' }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" rows="3" disabled>{{ $lateness->notes ?? 'empty' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class=" text-center fs-5 border-1 border-dark border w-50 m-auto p-3">No lateness records
                                found.</p>
                            <hr class="opacity-100">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
