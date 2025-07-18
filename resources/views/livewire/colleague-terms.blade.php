<div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterColleagues">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-md-3 mb-3">
                                <label for="colleagueTerm" class="form-label">Colleague Term</label>
                                <select class="form-select" wire:model.defer="colleagueTerm" id="colleagueTerm">
                                    <option selected disabled>Select</option>
                                    <option value="Casual">Casual</option>
                                    <option value="Fixed Term">Fixed Term</option>
                                    <option value="Permanent">Permanent</option>
                                    <option value="Permanent Variable">Permanent Variable</option>
                                    <option value="Temporary">Temporary</option>
                                </select>
                            </div>
                            <div class="col-md-1 mt-4  pt-1">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                            <div class="col-4"></div>
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

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-striped reportDataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>Facility</th>
                                    <th>Commencement Date</th>
                                    <th>Status</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if ($colleagues !== [])
                                    @foreach ($colleagues as $colleague)
                                        <tr>
                                            <td>{{ $colleague->first_name . ' ' . $colleague->surname }}</td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->title ?? 'No Main Job Assigned' }}
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->facility ?? 'No Facility Assigned' }}
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->commencement_date ?? 'No Facility Assigned' }}
                                            </td>
                                            <td>
                                                @if ($colleague->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Terminated</span>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
