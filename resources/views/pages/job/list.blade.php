@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Job</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">Job List</h4>
                        </div>
                        <div>
                            <a href="{{ route('create.job') }}" class="btn btn-primary"><strong>Create</strong><i
                                    data-feather="bookmark" class="ms-2"></i></a>
                        </div>
                    </div>
                    <h6 class="card-title"></h6>
                    <div class="table-responsive">
                        <table class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>Main Job</th>
                                    <th>Start Date</th>
                                    <th>Status</th> <!-- New Column for Job Status -->
                                    <th>Action</th>
                                </tr>
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Name"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Title"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Main Job"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Start Date"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Status"></th>
                                    <th></th> <!-- No search for Actions column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $key => $job)
                                    <tr>
                                        <td>{{ $job->user?->first_name ?? 'N/A' }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->main_job }}</td>
                                        <td>{{ $job->start_date }}</td>
                                        <td>{{ ucfirst($job->status)  }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $job->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $job->id }}">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('edit.job', $job->id) }}">Edit</a></li>
                                                    @if ($job->status == 'active')
                                                        <li>
                                                            <button class="dropdown-item" onclick="confirmTermination({{ $job->id }})">
                                                                Terminate Job
                                                            </button>
                                                            <form id="terminate-job-form-{{ $job->id }}" 
                                                                  action="{{ route('terminate.job', $job->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('POST')
                                                            </form>
                                                        </li>
                                                    @endif
                                                    {{-- Show "Delete" option only for super admins --}}
                                                    @if (auth()->user()->role == 'super_admin')
                                                        <li>
                                                            <form id="delete-job-form-{{ $job->id }}" 
                                                                  action="{{ route('delete.job', $job->id) }}" 
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <button class="dropdown-item" 
                                                                    onclick="if(confirm('Are you sure you want to delete this record?')) {
                                                                        document.getElementById('delete-job-form-{{ $job->id }}').submit();
                                                                    }">
                                                                Delete
                                                            </button>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script>
        function confirmTermination(jobId) {
            if (confirm('Are you sure you want to terminate this job?')) {
                document.getElementById('terminate-job-form-' + jobId).submit();
            }
        }
    </script>
@endpush