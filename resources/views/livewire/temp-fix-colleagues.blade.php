<div>


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
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>Facility</th>
                                    <th>Contract Type</th>
                                    <th>Expiry In</th>
                                    <th>Commencement Date</th>
                                    <th>Status</th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse ($colleagues as $job)
                                    @php
                                        $user = $job->user;
                                        $expiryIn = \Carbon\Carbon::parse($job->termination_date)->diffInDays(now());
                                    @endphp
                                    <tr>
                                        <td>{{ $user->first_name . ' ' . $user->surname }}</td>
                                        <td>{{ $job->title ?? 'N/A' }}</td>
                                        <td>{{ $job->facility ?? 'N/A' }}</td>
                                        <td>{{ $job->contract_type ?? 'N/A' }}</td>
                                        <td>{{ $job->termination_date ? $expiryIn . ' days (ends on ' . \Carbon\Carbon::parse($job->termination_date)->format('d-m-Y') . ')' : 'No Termination Date' }}
                                        </td>
                                        <td>{{ $user->commencement_date ?? 'N/A' }}</td>
                                        <td>
                                            @if ($user->status === 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Terminated</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Record Found</td>
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
