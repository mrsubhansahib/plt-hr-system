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
                                    <th style="text-align: left !important;">First Name</th>
                                    <th style="text-align: left !important;">Surname</th>
                                    <th style="text-align: left !important;">Contract Type</th>
                                    <th style="text-align: left !important;">Job Title</th>
                                    <th style="text-align: left !important;">Facility</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if ($colleagues !== [])
                                    @foreach ($colleagues as $colleague)
                                        <tr>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">{{ $colleague->first_name }}</td>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">{{ $colleague->surname }}</td>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">
                                                {{ $colleague->jobs->whereIn('contract_type', ['Permanent', 'Fixed Term', 'Temporary', 'Permanent Variable'])->where('status', 'active')->first()->contract_type ?? 'No Contract Type Assigned' }}
                                            </td>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">
                                                {{ $colleague->jobs->whereIn('contract_type', ['Permanent', 'Fixed Term', 'Temporary', 'Permanent Variable'])->where('status', 'active')->first()->title ?? 'No Job Title Assigned' }}
                                            </td>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">
                                                {{ $colleague->jobs->whereIn('contract_type', ['Permanent', 'Fixed Term', 'Temporary', 'Permanent Variable'])->where('status', 'active')->first()->facility ?? 'No Facility Assigned' }}
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
