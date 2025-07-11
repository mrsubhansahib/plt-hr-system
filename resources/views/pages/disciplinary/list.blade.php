@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Disciplinary</a></li>
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
                            <h4 class="py-2">Disciplinary List</h4>
                        </div>
                        <div>
                            <a href="{{ route('create.disciplinary') }}" class="btn btn-primary"><strong>Create</strong><i
                                    data-feather="bookmark" class="ms-2"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Employement Commencement Date</th>
                                    <th>Contracted From Date</th>
                                    <th>Reason for Disciplinary</th>
                                    <th>Date of Hearing</th>
                                    <th>Action</th>
                                </tr>
                                <!-- Search inputs row -->
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Name">
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Surname"></th>
                                    <th>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Search Employement Commencement Date">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Search Contracted From Date">
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Reason"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Hearing Date"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($disciplinaries as $key => $disciplinary)
                                    <tr>
                                        <td>{{ $disciplinary->user->first_name }}</td>
                                        <td>{{ $disciplinary->user->surname }}</td>
                                        <td>{{ $disciplinary->user->commencement_date??'N/A' }}</td>
                                        <td>{{ $disciplinary->user->contracted_from_date ?? 'N/A'  }}</td>
                                        <td>{{ $disciplinary->reason_for_disciplinary ?? 'N/A' }}</td>
                                        <td>{{ $disciplinary->hearing_date ?? 'N/A' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $disciplinary->id }}"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $disciplinary->id }}">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.disciplinary', $disciplinary->id) }}">Edit</a>
                                                    </li>
                                                    @if (auth()->user()->role == 'super_admin')
                                                        <li>
                                                            <button
                                                                onclick="if(confirm('Are you sure you want to delete this disciplinary?')) { window.location.href='{{ route('delete.disciplinary', $disciplinary->id) }}' }"
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
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
