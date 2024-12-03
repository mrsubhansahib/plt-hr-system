@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Lateness</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Lateness List</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Lateness Triggered</th>
                                    <th>Lateness Stage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latenesses as $key => $lateness)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $lateness->user->first_name}}</td>
                                        <td>{{ $lateness->lateness_triggered }}</td>
                                        <td>{{ $lateness->lateness_stage }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $lateness->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $lateness->id }}">

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.lateness', $lateness->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="if(confirm('Are you sure you want to delete this lateness?')) { window.location.href='{{ route('delete.lateness', $lateness->id) }}' }"
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

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
