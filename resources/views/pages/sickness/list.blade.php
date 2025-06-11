@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sickness</a></li>
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
                            <h4 class="py-2">Sickness List</h4>
                        </div>
                        <div>
                            <a href="{{ route('create.sickness') }}" class="btn btn-primary"><strong>Create</strong><i
                                    data-feather="bookmark" class="ms-2"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>SurName</th>
                                    <th>Reason for Absence</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Action</th>
                                </tr>
                                <!-- Search inputs row -->
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Name">
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Surname"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Reason for Absence"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Date From"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Date To"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sicknesses as $key => $sickness)
                                    <tr>
                                        <td>{{ $sickness->user->first_name }}</td>
                                        <td>{{ $sickness->user->surname  }}</td>
                                        <td>{{ $sickness->reason_for_absence }}</td>
                                        <td>{{ ($sickness->date_from)?\Carbon\Carbon::createFromFormat('Y-m-d', $sickness->date_from)->format('d-m-Y') : '' }}</td>
                                        <td>{{ ($sickness->date_to) ? \Carbon\Carbon::createFromFormat('Y-m-d', $sickness->date_to)->format('d-m-Y') : '' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $sickness->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $sickness->id }}">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.sickness', $sickness->id) }}">Edit</a>
                                                    </li>
                                                    @if (auth()->user()->role == 'super_admin')
                                                        <li>
                                                            <button
                                                                onclick="if(confirm('Are you sure you want to delete this sickness?')) { window.location.href='{{ route('delete.sickness', $sickness->id) }}' }"
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
