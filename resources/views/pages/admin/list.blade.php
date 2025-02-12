@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
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
                            <h4 class="py-2">User List</h4>
                        </div>
                        <div>
                            <a href="{{ route('create.admin') }}"
                                class="btn btn-primary"><strong>Create</strong><i data-feather="bookmark" class="ms-2"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="" class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>SurName</th>
                                    <th>Email</th>
                                    @if (auth()->user()->role == 'super_admin')
                                        <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if (auth()->user()->role == 'super_admin')
                                            <td>
                                                <!-- Toggler Actions -->
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0" type="button"
                                                        id="dropdownMenuButton-{{ $user->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="navbar-toggler-icon">
                                                            <div class="col-sm-6 col-md-4 col-lg-3"> <i
                                                                    data-feather="align-justify"></i></div>
                                                        </span>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $user->id }}">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('detail.admin', $user->id) }}">View</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('edit.admin', $user->id) }}">Edit</a></li>
                                                        <li><button
                                                                onclick="if(confirm('Are you sure you want to delete this record?')){window.location.href='{{ route('delete.admin', $user->id) }}'}"
                                                                class="dropdown-item">Delete</button></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        @endif
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
