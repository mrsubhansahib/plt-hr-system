<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
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
                                    <th>Days Left for Retirement</th>
                                    <th>Job Title</th>
                                    <th>Facility</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if ($colleagues !== [])
                                    @foreach ($colleagues as $colleague)
                                        <tr>
                                            <td>{{ $colleague->first_name }}</td>
                                            <td>{{ $colleague->surname }}</td>
                                            <td>
                                                @php
                                                    $retirementDate = \Carbon\Carbon::parse($colleague->dob)->addYears(
                                                        67,
                                                    );
                                                    $daysLeft = now()->diffInDays($retirementDate, false); // false = allow negative values
                                                @endphp

                                                @if ($daysLeft > 0)
                                                    {{ $daysLeft }} days left
                                                @elseif ($daysLeft === 0)
                                                    Retiring today
                                                @else
                                                    Retired {{ abs($daysLeft) }} days ago
                                                @endif
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->title ??
                                                    ($colleague->jobs->first()->title ?? 'No Main Job Assigned') }}
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->facility ??
                                                    ($colleague->jobs->first()->facility ?? 'No Facility Assigned') }}
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
