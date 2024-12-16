@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Capability</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Capability List</h6>
                    <div class="table-responsive">
                        <table class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Stage</th>
                                    <th>Date</th>
                                    <th>Outcome</th>
                                    <th>Action</th>
                                </tr>
                                <!-- Search inputs row -->
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search #"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Name"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Stage"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Date"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Outcome"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($capabilities as $key => $capability)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $capability->user->first_name }}</td>
                                        <td>{{ $capability->stage }}</td>
                                        <td>{{ $capability->date }}</td>
                                        <td>{{ $capability->outcome }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $capability->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $capability->id }}">
                                                    {{-- <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('detail.capability', $capability->id) }}">View</a>
                                                    </li> --}}
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.capability', $capability->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="if(confirm('Are you sure you want to delete this capability?')) { window.location.href='{{ route('delete.capability', $capability->id) }}' }"
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
