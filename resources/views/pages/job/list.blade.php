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
                    <h6 class="card-title">Job List</h6>
                    <div class="table-responsive">
                        <table class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Main Job</th>
                                    <th>Start Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search #"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Name"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Title"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Main Job"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Start Date"></th>
                                    <th></th> <!-- No search for Actions column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $key => $job)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $job->user->first_name }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->main_job }}</td>
                                        <td>{{ $job->start_date }}</td>
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
                                                            href="{{ route('detail.job', $job->id) }}">View</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('edit.job', $job->id) }}">Edit</a></li>
                                                    <li>
                                                        <button
                                                            onclick="if(confirm('Are you sure you want to delete this record?')) { window.location.href='{{ route('delete.job', $job->id) }}' }"
                                                            class="dropdown-item">Delete</button>
                                                    </li>
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
@endpush
