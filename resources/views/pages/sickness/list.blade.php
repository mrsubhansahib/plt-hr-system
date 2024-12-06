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
                    <h6 class="card-title">sickness List</h6>
                    <div class="">
                        <table id="" class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Reason for Absence</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Action</th>
                                </tr>
                                <!-- Search inputs row -->
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search #">
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Name"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Reason for Absence"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Date From"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Date To"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sicknesses as $key => $sickness)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $sickness->user->first_name }}</td>
                                        <td>{{ $sickness->reason_for_absence }}</td>
                                        <td>{{ $sickness->date_from }}</td>
                                        <td>{{ $sickness->date_to }}</td>
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
                                                    <li>
                                                        <button
                                                            onclick="if(confirm('Are you sure you want to delete this sickness?')) { window.location.href='{{ route('delete.sickness', $sickness->id) }}' }"
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

{{-- @push('custom-scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#dataTableExample').DataTable({
                autoWidth: false // Prevent table from stretching
            });
        
            // Apply the search on each column
            $('#dataTableExample .filters input').on('keyup change', function() {
                let colIndex = $(this).parent().index(); // Get the column index
                table.column(colIndex).search(this.value).draw(); // Search and redraw the table
            });
        });
    </script>
@endpush --}}
