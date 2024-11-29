@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Job</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Job Details</h3>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-3">
                            <strong>Employee:</strong>
                            <p>{{ $job->user->first_name }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Title:</strong>
                            <p>{{ $job->title }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Main Job:</strong>
                            <p>{{ $job->main_job }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Facility:</strong>
                            <p>{{ $job->facility }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Cost Center:</strong>
                            <p>{{ $job->cost_center }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Start Date:</strong>
                            <p>{{ \Carbon\Carbon::parse($job->start_date)->format('Y-m-d') }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Termination Date:</strong>
                            <p>{{ \Carbon\Carbon::parse($job->termination_date)->format('Y-m-d') ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Rate of Pay:</strong>
                            <p>{{ $job->rate_of_pay }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Number of Hours:</strong>
                            <p>{{ $job->number_of_hours }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Contract Type:</strong>
                            <p>{{ $job->contract_type }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Contract Returned:</strong>
                            <p>{{ $job->contract_returned }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>JD Returned:</strong>
                            <p>{{ $job->jd_returned }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>DBS Required:</strong>
                            <p>{{ $job->dbs_required }}</p>
                        </div>
                        <div class="col-md-12 mt-3">
                            <strong>Notes:</strong>
                            <p>{{ $job->notes }}</p>
                        </div>
                    </div>
                    <a href="{{ route('show.jobs') }}" class="btn btn-secondary mt-4">Back to Jobs</a>
                </div>
            </div>
        </div>
    </div>
@endsection