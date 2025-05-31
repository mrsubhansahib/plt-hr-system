<div>
    @include('layout.alert')
    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filterColleagues">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="colleagueStatus" class="form-label">Colleague Status</label>
                                <select class="form-select" wire:model="status" id="colleagueStatus">
                                    <option selected disabled>Select</option>
                                    <option value="active">Active</option>
                                    <option value="terminated">Terminated</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="from" class="form-label">From</label>
                                <input type="date" wire:model="start_date" class="form-control"
                                    placeholder="Select Date" id="from">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">To</label>
                                <input type="date" wire:model="end_date" class="form-control"
                                    placeholder="Select Date" id="to">
                            </div>
                            <div class="col-md-1 mt-4  pt-1">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search First Name"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Surname"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Job Title"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Facility"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($colleagues !== [])
                                    @foreach ($colleagues as $colleague)
                                        <tr>
                                            <td>{{ $colleague->first_name }}</td>
                                            <td>{{ $colleague->surname }}</td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->title ?? 'No Main Job Assigned' }}
                                            </td>
                                            <td>
                                                {{ $colleague->jobs->where('main_job', 'yes')->where('status', 'active')->first()->facility ?? ($colleague->jobs->first()->facility ?? 'No Facility Assigned') }}
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
