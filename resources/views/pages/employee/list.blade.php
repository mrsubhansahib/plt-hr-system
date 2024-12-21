@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Employee List</h6>
                    <div class="table-responsive">
                        <table id="" class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Status</th> <!-- Status Column -->
                                    <th>Actions</th>
                                </tr>
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search #">
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search First Name"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Email"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Status"></th>
                                    <th></th> <!-- No search for Actions column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $user->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $user->id }}">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('detail.employee', $user->id) }}">View</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.employee', $user->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="if(confirm('Are you sure you want to left this Employee?')) { 
                                                            window.location.href='{{ route('left.employee', $user->id) }}' }"
                                                            class="dropdown-item">Left</button>
                                                    </li>
                                                    @if (auth()->user()->role == 'super_admin')
                                                        <li>
                                                            <button
                                                                onclick="if(confirm('Are you sure you want to delete this record?')) { 
                                                            window.location.href='{{ route('delete.employee', $user->id) }}' }"
                                                                class="dropdown-item">Delete</button>
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
@endpush

@push('custom-scripts')
@endpush
