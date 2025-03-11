@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Activities</a></li>
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
                            <h4 class="py-2">Activities List</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="" class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>Admin Name</th>
                                    <th>Employee Name</th>
                                    <th>Module</th>
                                    <th>Action</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $key => $log)
                                    <tr>
                                        <td>{{ $log->admin->first_name ?? 'N/A' }}</td>
                                        <td>
                                            @if (
                                                ($log->employee->role === 'admin' || $log->employee->role === 'super_admin') &&
                                                    $log->admin->id === $log->employee->id)
                                                Self
                                            @elseif ($log->employee->role === 'admin')
                                                {{ $log->employee->first_name }} (Admin)
                                            @else
                                                {{ $log->employee->first_name }}
                                            @endif
                                        </td>
                                        <td>{{ $log->module_type }}</td>
                                        <td>{{ ucfirst($log->action) }}</td>
                                        <td>{{ $log->created_at->format('d-M-Y') }}</td>
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
