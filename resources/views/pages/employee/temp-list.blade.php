@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Temp Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Temp Employee List</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Status</th> <!-- Status Column -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }} </td>
                                        <td>
                                            <!-- Toggler Actions -->
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $user->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="navbar-toggler-icon">
                                                        <div class="col-sm-6 col-md-4 col-lg-3"> <i
                                                                data-feather="align-justify"></i></div>
                                                    </span>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton-{{ $user->id }}">
                                                    <li><a class="dropdown-item" href="{{ route('detail.employee', $user->id) }}">View</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('edit.employee', $user->id) }}">Edit</a></li>
                                                    <li><button
                                                            onclick="if(confirm('Are you sure you want to delete this record?')){window.location.href='{{ route('delete.employee', $user->id) }}'}"
                                                            class="dropdown-item">Delete</button></li>
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

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
