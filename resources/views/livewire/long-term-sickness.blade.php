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
                                <input type="date" wire:model="start_date" class="form-control" id="from">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">To</label>
                                <input type="date" wire:model="end_date" class="form-control" id="to">
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
                        <table id="" class="table dataTableSickness">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>Facility</th>
                                    <th>Contract Type</th>
                                    <th>Commencement Date</th>
                                    <th>Contracted From</th>
                                    <th>Email</th>
                                    {{-- <th>Sickness From</th>
                                    <th>Sickness To</th>  --}}
                                    {{-- <th>Total Days</th>
                                    <th>Notes</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sickUsers as $sick)
                                    @php
                                        $mainJob = $sick->user->jobs->firstWhere('main_job', 'yes');
                                    @endphp
                                    <tr>
                                        <td>{{ $sick->user->first_name . ' ' . $sick->user->surname }}</td>
                                        <td>{{ $mainJob ? $mainJob->title : 'N/A' }}</td>
                                        <td>{{ $mainJob ? $mainJob->facility : 'N/A' }}</td>
                                        <td>{{ $mainJob ? $mainJob->contract_type : 'N/A' }}</td>
                                        <td>{{ $sick->user->commencement_date }}</td>
                                        <td>{{ $sick->user->contracted_from ?? 'N/A' }}</td>
                                        <td>{{ $sick->user->email ?? 'N/A' }}</td>
                                        {{-- <td>{{ \Carbon\Carbon::parse($sick->date_from)->format('d/m/Y') }}</td>
                                        <td>
                                            {{ $sick->date_to ? \Carbon\Carbon::parse($sick->date_to)->format('d/m/Y') : '—' }}
                                        </td> --}}
                                        {{-- <td>{{ \Carbon\Carbon::parse($sick->date_from)->diffInDays($sick->date_to) + 1 }}
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
