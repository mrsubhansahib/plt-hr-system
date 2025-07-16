<div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterColleagues">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-md-3 mb-3">
                                <label for="facility" class="form-label">Facility</label>
                                <select class="form-select" wire:model="facility" id="facility">
                                    <option selected disabled>Select</option>
                                    <option value="No 1 Market Street">No 1 Market Street</option>
                                    <option value="Pendle Leisure Centre">Pendle Leisure Centre</option>
                                    <option value="Pendle Wavelengths">Pendle Wavelengths</option>
                                    <option value="West Craven Sports Centre">West Craven Sports Centre</option>
                                    <option value="The Muni">The Muni</option>
                                    <option value="Seedhill Athletics and Fitness Centre">Seedhill Athletics and Fitness
                                        Centre</option>
                                    <option value="Inside Spa">Inside Spa</option>
                                    <option value="Good Life">Good Life</option>
                                    <option value="All Facilities">All Facilities</option>
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
                        <table id="" class="table dataTableColleagues">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Surname</th>
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
                                                {{ $colleague->jobs->where('facility', $nowFacility)->where('status', 'active')->first()->title }}
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('facility', $nowFacility)->where('status', 'active')->first()->facility ?? 'No Facility Assigned' }}
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
