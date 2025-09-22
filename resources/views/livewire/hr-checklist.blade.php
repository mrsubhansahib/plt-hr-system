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
                        <h3 class="w-50 m-auto border-bottom border-2 pb-2 text-center">HR Checklist</h3>
                        <div class="row  border-bottom border-2 pb-2 my-3">
                            <h3 class="heading text-center border-bottom border-2 pb-2 mb-4 border-dark fw-bolder">
                                Employee Report</h3>
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
                        <div class="row  mb-3">
                            {{-- Contracted From Date --}}
                            @if (is_null($employee->contracted_from_date))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Contracted From Date</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Employment Termination Date --}}
                            @if (is_null($employee->termination_date))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Employment Termination Date</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Reason for Termination --}}
                            @if (is_null($employee->reason_termination))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Reason for Termination</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Handbook Sent --}}
                            @if (is_null($employee->handbook_sent))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Handbook Sent</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Medical Form Returned --}}
                            @if (is_null($employee->medical_form_returned))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Medical Form Returned</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- New Entrant Form Returned --}}
                            @if (is_null($employee->new_entrant_form_returned))
                                <div class="col-3 mt-3">
                                    <label class="form-label">New Entrant Form Returned</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Confidentiality Statement --}}
                            @if (is_null($employee->confidentiality_statement_returned))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Confidentiality Statement</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Work Document Received --}}
                            @if (is_null($employee->work_document_received))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Work Document Received</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Qualifications Checked --}}
                            @if (is_null($employee->qualifications_checked))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Qualifications Checked</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- References Requested --}}
                            @if (is_null($employee->references_requested))
                                <div class="col-3 mt-3">
                                    <label class="form-label">References Requested</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- References Returned --}}
                            @if (is_null($employee->references_returned))
                                <div class="col-3 mt-3">
                                    <label class="form-label">References Returned</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Payroll Informed --}}
                            @if (is_null($employee->payroll_informed))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Payroll Informed</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Probation Complete --}}
                            @if (is_null($employee->probation_complete))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Probation Complete</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Equipment Required --}}
                            @if (is_null($employee->equipment_required))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Equipment Required</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Equipment Ordered --}}
                            @if (is_null($employee->equipment_ordered))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Equipment Ordered</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- P45 / Tax Form --}}
                            @if (is_null($employee->p45))
                                <div class="col-3 mt-3">
                                    <label class="form-label">P45 / Tax Form Received</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Employee Pack Sent --}}
                            @if (is_null($employee->employee_pack_sent))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Employee Pack Sent</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Termination Form to Payroll --}}
                            @if (is_null($employee->termination_form_to_payroll))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Termination Form to Payroll</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- Casual Holiday Pay --}}
                            @if (is_null($employee->casual_holiday_pay))
                                <div class="col-3 mt-3">
                                    <label class="form-label">Casual Holiday Pay</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- IHASCO Training Sent --}}
                            @if (is_null($employee->ihasco_training_sent))
                                <div class="col-3 mt-3">
                                    <label class="form-label">IHASCO Training Sent</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                            {{-- IHASCO Training Complete --}}
                            @if (is_null($employee->ihasco_training_complete))
                                <div class="col-3 mt-3">
                                    <label class="form-label">IHASCO Training Complete</label>
                                    <input class="form-control" type="text" disabled
                                        value="Empty" />
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
