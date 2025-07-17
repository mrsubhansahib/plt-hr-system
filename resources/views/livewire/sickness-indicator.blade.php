<div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterSickness">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4 mb-3">
                                <label for="from" class="form-label">From</label>
                                <input type="date" wire:model.defer="start_date" class="form-control" id="from">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">To</label>
                                <input type="date" wire:model.defer="end_date" class="form-control" id="to">
                            </div>
                            <div class="col-md-2 mt-4 pt-1">
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
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($successMsg)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $successMsg }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped  reportDataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>Facility</th>
                                    <th>Contract Type</th>
                                    <th>Commencement Date</th>
                                    <th>Contracted From</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sickUsers as $user)
                                    <tr>
                                        <td>{{ $user->first_name . ' ' . $user->surname }}</td>
                                        <td>{{ $user->jobs->where('main_job', 'yes')->where('user_id', $user->id)->first()->title ?? 'N/A' }}</td>
                                        <td>{{ $user->jobs->where('main_job', 'yes')->where('user_id', $user->id)->first()->facility ?? 'N/A' }}</td>
                                        <td>{{ $user->jobs->where('main_job', 'yes')->where('user_id', $user->id)->first()->contract_type ?? 'N/A' }}</td>
                                        <td>{{ $user->commencement_date }}</td>
                                        <td>{{ $user->contracted_from ?? 'N/A' }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
