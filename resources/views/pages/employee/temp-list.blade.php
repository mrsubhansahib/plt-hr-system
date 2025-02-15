@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">New Entrants</a></li>
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
                            <h4 class="py-2">New Entrants List</h4>
                        </div>
                        <div>
                            <a href="{{ route('create.temp.employee') }}" class="btn btn-primary"><strong>Create</strong><i
                                    data-feather="bookmark" class="ms-2"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="" class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Facility</th>
                                    <th>Status</th> <!-- Status Column -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->jobs->where('main_job', 'yes')->first()->facility ?? ($user->jobs->first()->facility ?? 'No Job Assigned') }}
                                        </td>
                                        <td>{{ $user->status }} </td>
                                        <td>
                                            <!-- Toggler Actions -->

                                            <a href="{{ route('accept.employee', $user->id) }}" title="Accept"
                                                onclick="return confirm('Are you sure you want to accept this new entrant?')"
                                                class="btn btn-sm btn-success" style="padding:3px"><i
                                                    data-feather="check"></i></a>
                                            @if (Auth::user()->role == 'super_admin')
                                                <a href="{{ route('reject.employee', $user->id) }}" title="Reject"
                                                    onclick="return confirm('Are you sure you want to reject this new entrant?')"
                                                    class="btn btn-sm btn-danger" style="padding:3px"><i
                                                        data-feather="x"></i></a>
                                            @endif
                                            <a href="{{ route('edit.employee', $user->id) }}" title="Edit"
                                                class="btn btn-sm btn-primary" style="padding:3px">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a href="{{ route('view.temp.employees', $user->id) }}" title="view"
                                                class="btn btn-sm btn-primary" style="padding:3px">
                                                <i data-feather="eye"></i>
                                            </a>

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
