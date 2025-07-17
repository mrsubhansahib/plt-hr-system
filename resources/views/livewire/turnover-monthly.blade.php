<div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="filter">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-3 mb-3">
                                <label for="from" class="form-label">From</label>
                                <input type="date" wire:model.defer="startDate" class="form-control"
                                    placeholder="Select Date" id="from">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="to" class="form-label">To</label>
                                <input type="date" wire:model.defer="endDate" class="form-control"
                                    placeholder="Select Date" id="to">
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-3 mb-3">
                                <label for="facility" class="form-label">Select Facility</label>
                                <select class="form-select" wire:model="selected_facility" id="facility">
                                    <option selected disabled>Select</option>
                                    @foreach ($facilities as $facility)
                                        <option value="{{ $facility }}">{{ $facility }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-1 mt-4 pt-1">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                            <div class="col-md-1"></div>

                            <!-- <div class="col-md-5"></div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Alert Messages --}}
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

    {{-- Results Table --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body pb-5">
                    <div class="table-responsive">
                        <table class="table table-striped  dataTableNationalStatistics">
                            <thead>
                                <tr>
                                    <th>Total Employees</th>
                                    <th>Overall turnover</th>
                                    <th>Casual turnover</th>
                                    <th>Contracted turnover</th>
                                    <th>Turnover by Facility</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($total_users || $overall_turnover || $casual_turnover || $contracted_turnover || $turnover_by_facility)
                                    <tr>
                                        <td>
                                            <strong>{{ $total_users }}</strong> Employees
                                        </td>
                                        <td>
                                            <strong>{{ round($overall_turnover * $total_users, 1) }}</strong> Leavers
                                            <br>
                                            <small>({{ round($overall_turnover * 100, 1) }}%)</small>
                                        </td>
                                        <td>
                                            <strong>{{ round($casual_turnover * $total_users, 1) }}</strong> Casual
                                            Leavers
                                            <br>
                                            <small>({{ round($casual_turnover * 100, 1) }}%)</small>
                                        </td>
                                        <td>
                                            <strong>{{ round($contracted_turnover * $total_users, 1) }}</strong>
                                            Contracted
                                            Leavers
                                            <br>
                                            <small>({{ round($contracted_turnover * 100, 1) }}%)</small>
                                        </td>
                                        <td>
                                            <strong>{{ round($turnover_by_facility * $users_by_facility, 1) }}</strong>
                                            Leavers
                                            in Facility
                                            <br>
                                            <small>({{ $users_by_facility > 0 ? round($turnover_by_facility * 100, 1) : 0 }}%)</small>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            No Record Found for the selected month or facility.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
