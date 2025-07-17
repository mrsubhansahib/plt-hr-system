<div>
    {{-- Filter Form --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="filter">
                        <div class="row justify-content-center">
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-3 mb-3">
                                <label for="date" class="form-label">Select Date</label>
                                <input type="date" class="form-control" wire:model="date" id="date">
                            </div>

                            <div class="col-md-2 mt-4 pt-1">
                                <button class="btn btn-primary">Filter</button>
                            </div>

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
    @if ($resultCounts)
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-body pb-5">
                        <div class="table-responsive">
                            <table class="table table-striped   table-striped  reportDataTable">
                                <thead>
                                    <tr>
                                        <th>Gender</th>
                                        <th>More then 30 Hours</th>
                                        <th>Less then or equal to 30 Hours</th>
                                        <th>Total Employees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Male</td>
                                        <td>{{ $resultCounts['male_gt_30'] }}</td>
                                        <td>{{ $resultCounts['male_lte_30'] }}</td>
                                        <td>{{ $resultCounts['male_gt_30'] + $resultCounts['male_lte_30'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Female</td>
                                        <td>{{ $resultCounts['female_gt_30'] }}</td>
                                        <td>{{ $resultCounts['female_lte_30'] }}</td>
                                        <td>{{ $resultCounts['female_gt_30'] + $resultCounts['female_lte_30'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Other</td>
                                        <td>{{ $resultCounts['other_gt_30'] }}</td>
                                        <td>{{ $resultCounts['other_lte_30'] }}</td>
                                        <td>{{ $resultCounts['other_gt_30'] + $resultCounts['other_lte_30'] }}</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td>Total</td>
                                        <td>{{ $resultCounts['other_gt_30'] + $resultCounts['male_gt_30'] + $resultCounts['female_gt_30'] }}
                                        </td>
                                        <td>{{ $resultCounts['other_lte_30'] + $resultCounts['male_lte_30'] + $resultCounts['female_lte_30'] }}
                                        </td>
                                        <td>
                                            {{ $resultCounts['male_gt_30'] +
                                                $resultCounts['male_lte_30'] +
                                                $resultCounts['female_gt_30'] +
                                                $resultCounts['female_lte_30'] +
                                                $resultCounts['other_gt_30'] +
                                                $resultCounts['other_lte_30'] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>
