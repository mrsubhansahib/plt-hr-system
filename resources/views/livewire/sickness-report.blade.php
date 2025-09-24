<div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterColleagues">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4 mb-3">
                                <label for="from" class="form-label">From</label>
                                <input type="date" wire:model.defer="start_date" class="form-control"
                                    placeholder="Select Date" id="from">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">To</label>
                                <input type="date" wire:model.defer="end_date" class="form-control"
                                    placeholder="Select Date" id="to">
                            </div>
                            <div class="col-md-1 mt-4  pt-1">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                            <div class="col-md-1"></div>
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
                        <table id="" class="table  table-striped  reportDataTable">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Job Title</th>
                                    <th>Facility</th>
                                    <th>Contract Type</th>
                                    <th>Commencement Date</th>
                                    <th>Contracted From</th>
                                    <th>Email</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if ($colleagues !== [])
                                    @foreach ($colleagues as $colleague)
                                        <tr>
                                            <td>{{ $colleague->first_name }}</td>
                                            <td>{{ $colleague->surname }}</td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->title ?? ($colleague->jobs->first()->title ?? 'No Main Job Assigned') }}
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->facility ?? ($colleague->jobs->first()->facility ?? 'N/A') }}
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->contract_type ?? ($colleague->jobs->first()->contract_type ?? 'N/A') }}
                                            </td>
                                            <td>
                                                {{ $colleague->commencement_date
                                                    ? \Carbon\Carbon::parse($colleague->commencement_date)->format('d-m-Y')
                                                    : 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $colleague->contracted_from ? \Carbon\Carbon::parse($colleague->contracted_from)->format('d-m-Y') : 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $colleague->email ?? 'N/A' }}
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
