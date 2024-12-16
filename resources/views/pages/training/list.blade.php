@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Training</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Training List</h6>
                    <div class="table-responsive">
                        <table class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Training Title</th>
                                    <th>Course Date</th>
                                    <th>Renewal Date</th>
                                    <th>Action</th>
                                </tr>
                                <!-- Search inputs row -->
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search #"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Name"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Title"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Date"></th>
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Renewal"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainings as $key => $training)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $training->user->first_name }}</td>
                                        <td>{{ $training->training_title }}</td>
                                        <td>{{ $training->course_date }}</td>
                                        <td>{{ $training->renewal_date }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $training->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $training->id }}">
                                                    {{-- <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('detail.training', $training->id) }}">View</a>
                                                    </li> --}}
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.training', $training->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="if(confirm('Are you sure you want to delete this training?')) { window.location.href='{{ route('delete.training', $training->id) }}' }"
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
