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
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Working Hours</th>
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
                                                            $hours = 0;
                                                            $jobs = \App\Job::where('user_id', $colleague->id)
                                                                ->where('status', 'active')
                                                                ->get();
                                                    foreach ($jobs as $job) {
                                                        if ($job->status === 'active') {
                                                            $hours += $job->number_of_hours;
                                                        }else {
                                                                # code...
                                                            $hours = 0;
                                                        }
                                                    }
                                                    $hours = number_format($hours, 2);
                                                @endphp
                                                {{ $hours }}
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
