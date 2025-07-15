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
                        <table id="" class="table dataTableColleagues">
                            <thead>
                                <tr>
                                    <th style="text-align: left !important;">First Name</th>
                                    <th style="text-align: left !important;">Surname</th>
                                    <th style="text-align: left !important;">DBS Level</th>
                                    <th style="text-align: left !important;">Certificate No</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if ($colleagues !== [])

                                    @foreach ($colleagues as $colleague)
                                        <tr>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">
                                                {{ $colleague->first_name }}</td>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">
                                                {{ $colleague->surname }}</td>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">
                                                {{ $colleague->disclosures->whereNull('certificate_no')->first()->dbs_level ?? 'No DBS Level Assigned' }}
                                            </td>
                                            <td style="text-align: left !important;  padding-left: 10px !important;">
                                                Empty
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
