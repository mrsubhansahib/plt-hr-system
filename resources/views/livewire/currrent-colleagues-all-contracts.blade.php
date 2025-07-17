<div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterColleagues">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-3 mb-3">
                                <label for="to" class="form-label">Select Date</label>
                                <input type="date" wire:model.defer ="date" class="form-control" placeholder="Select Date"
                                    id="to">
                            </div>
                            <div class="col-md-1 mt-4  pt-1">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                            <div class="col-md-4"></div>
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
                                    <th>Contract Type</th>
                                    <th>Contracted From</th>
                                    <th>Job Start Date</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Mobile No</th>
                                    <th>Status</th>

                                </tr>

                            </thead>
                            <tbody>
                                @if ($colleagues !== [])
                                    @foreach ($colleagues as $colleague)
                                      
                                        @foreach ($colleague->jobs as $job)
                                            <tr>
                                                {{-- @dd($job) --}}
                                                <td>{{ $colleague->first_name }}</td>
                                                <td>{{ $colleague->surname }}</td>
                                                {{-- Check if the main job exists and is active --}}
                                                <td>
                                                    {{ $job->title ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $job->facility ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $job->contract_type ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $colleague->contracted_from_date ?? 'Not Specified' }}
                                                </td>
                                                <td>
                                                    {{ $job->start_date ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $colleague->email ?? 'Not Specified' }}
                                                </td>
                                                <td>
                                                    {{ $colleague->address1 ?? 'Not Specified' }}
                                                </td>
                                                <td>
                                                    {{ $colleague->mobile_tel ?? 'Not Specified' }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                        @endforeach
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
