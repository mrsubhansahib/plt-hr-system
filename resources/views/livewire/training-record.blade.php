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
                            <h3 class="heading text-center border-bottom border-1 border-dark pb-2 mb-4 fw-bolder">
                                Training Record Report
                            </h3>

                            <div class="row mb-3 border-bottom border-1 border-dark pb-2 pb-4">
                                <div class="col-12">
                                    <h4 class="text-center w-50 m-auto border-bottom border-1 border-dark pb-2 mb-3">
                                        Personal&nbsp;Details
                                    </h4>
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
                                        value="{{ $employee->jobs->where('status', 'active')->where('main_job', 'yes')->first()->title ?? 'N/A' }}"
                                        disabled>
                                </div>
                                <div class="col-3 my-2">
                                    <label>Facility</label>
                                    <input type="email" class="form-control mt-2"
                                        value="{{ $employee->jobs->where('status', 'active')->where('main_job', 'yes')->first()->facility ?? 'N/A' }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <h4 class="text-center w-50 m-auto border-bottom border-1 border-dark pb-2 mb-3">
                                    Training&nbsp;Record
                                </h4>
                            </div>

                            @forelse ($employee->trainings as $training)
                                <div class="mt-4 mb-3 border-bottom border-dark pb-4">
                                    <h5 class="text-primary mb-3">NO#{{ $loop->iteration }}</h5>
                                    <div class="row">
                                        <div class="col-4 mt-3">
                                            <label class="form-label">Training Title</label>
                                            <input class="form-control" type="text"
                                                value="{{ $training->training_title ?? 'N/A' }}" disabled />
                                        </div>
                                        <div class="col-4 mt-3">
                                            <label class="form-label">Course Date</label>
                                            <input class="form-control" type="text"
                                                value="{{ $training->course_date ? \Carbon\Carbon::parse($training->course_date)->format('d-m-Y') : 'N/A' }}"
                                                disabled />
                                        </div>
                                        <div class="col-4 mt-3">
                                            <label class="form-label">Renewal Date</label>
                                            <input class="form-control" type="text"
                                                value="{{ $training->renewal_date ? \Carbon\Carbon::parse($training->renewal_date)->format('d-m-Y') : 'N/A' }}"
                                                disabled />
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" name="notes" disabled  rows="4">{{ $training->notes ?? 'N/A' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 mt-3">
                                    <p class="text-muted text-center fs-5 border border-dark w-50 m-auto p-3">
                                        No training records found.
                                    </p>
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
