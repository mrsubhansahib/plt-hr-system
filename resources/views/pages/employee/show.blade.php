@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet">
@endpush
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">Personal Details</li>
        </ol>
    </nav>
    <div class="container">
        @include('layout.alert')
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between py-2">
                    <div>
                        <h4 class="py-2">Personal Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('edit.employee', $user->id) }}" class="btn btn-primary"><strong
                                class="me-1">Edit</strong><i data-feather="edit"></i></a>
                    </div>
                </div>
                <div class="my-4">
                    <div class="row my-3">
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control mt-2" id="first_name"
                                    value="{{ $user->first_name }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control mt-2" id="surname" value="{{ $user->surname }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control mt-2" id="email" value="{{ $user->email }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="ni_number">Ni Number</label>
                                <input type="text" class="form-control mt-2" id="ni_number"
                                    value="{{ $user->ni_number }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="address1">Address-1</label>
                                <input type="text" class="form-control mt-2" id="address1" value="{{ $user->address1 }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="town">Town</label>
                                <input type="text" class="form-control mt-2" id="town" value="{{ $user->town }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="job-tab" data-bs-toggle="tab" data-bs-target="#job-tab-pane"
                            type="button" role="tab" aria-controls="job-tab-pane" aria-selected="false">Job</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disclosure-tab" data-bs-toggle="tab"
                            data-bs-target="#disclosure-tab-pane" type="button" role="tab"
                            aria-controls="disclosure-tab-pane" aria-selected="false">Disclosure</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sickness-tab" data-bs-toggle="tab" data-bs-target="#sickness-tab-pane"
                            type="button" role="tab" aria-controls="sickness-tab-pane"
                            aria-selected="false">Sickness</button>
                    </li>
                    <!-- Add more tabs manually here -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="capability-tab" data-bs-toggle="tab"
                            data-bs-target="#capability-tab-pane" type="button" role="tab"
                            aria-controls="capability-tab-pane" aria-selected="false">Capability</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="training-tab" data-bs-toggle="tab"
                            data-bs-target="#training-tab-pane" type="button" role="tab"
                            aria-controls="training-tab-pane" aria-selected="false">Training</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disciplinary-tab" data-bs-toggle="tab"
                            data-bs-target="#disciplinary-tab-pane" type="button" role="tab"
                            aria-controls="disciplinary-tab-pane" aria-selected="false">Disciplinary</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="lateness-tab" data-bs-toggle="tab"
                            data-bs-target="#lateness-tab-pane" type="button" role="tab"
                            aria-controls="lateness-tab-pane" aria-selected="false">Lateness</button>
                    </li>
                </ul>
                <!-- Static Tab Panes -->
                <div class="tab-content" id="myTabContent">
                    <!-- Job Tab -->
                    <div class="tab-pane fade show active" id="job-tab-pane" role="tabpanel" aria-labelledby="job-tab"
                        tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Job Details</h4>
                            </div>
                            <div>
                                <a href="{{ route('create.new.job', $user->id) }}"
                                    class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <table class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Main Job</th>
                                        <th>Start Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->jobs as $key => $job)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $job->user->first_name }}</td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->main_job }}</td>
                                            <td>{{ $job->start_date }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0" type="button"
                                                        id="dropdownMenuButton-{{ $job->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i data-feather="align-justify"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuButton-{{ $job->id }}">
                                                        {{-- <li><a class="dropdown-item"
                                                            href="{{ route('detail.job', $job->id) }}">View</a></li> --}}
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('edit.job', ['id' => $job->id, 'form_type' => 'tab']) }}">Edit</a>
                                                        </li>
                                                        @if (auth()->user()->role == 'super_admin')
                                                            <li>
                                                                <button
                                                                    onclick="if(confirm('Are you sure you want to delete this record?')) { window.location.href='{{ route('delete.job', $job->id) }}' }"
                                                                    class="dropdown-item">Delete</button>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Add your data here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Disclosure Tab -->
                    <div class="tab-pane fade" id="disclosure-tab-pane" role="tabpanel" aria-labelledby="disclosure-tab"
                        tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Disclosure Details</h4>
                            </div>
                            @if ($hasDisclosure == 0)
                                <div>
                                    <a href="{{ route('create.new.disclosure', $user->id) }}"
                                        class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                                </div>
                            @endif
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>DBS Level</th>
                                        <th>Certification No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->disclosure->isNotEmpty())
                                        <!-- Check if there are any disclosures -->
                                        @foreach ($user->disclosure as $index => $disclosure)
                                            <!-- Loop through each disclosure -->
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $disclosure->dbs_level }}</td>
                                                <td>{{ $disclosure->certificate_no }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link p-0" type="button"
                                                            id="dropdownMenuButton-{{ $disclosure->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="align-justify"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuButton-{{ $disclosure->id }}">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('edit.disclosure', ['id' => $disclosure->id, 'form_type' => 'tab']) }}">
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            @if (auth()->user()->role == 'super_admin')
                                                                <li>
                                                                    <button
                                                                        onclick="if(confirm('Are you sure you want to delete this disclosure?')) { window.location.href='{{ route('delete.disclosure', $disclosure->id) }}' }"
                                                                        class="dropdown-item">Delete</button>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No disclosure data available.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <!-- Sickness Tab -->
                    <div class="tab-pane fade" id="sickness-tab-pane" role="tabpanel" aria-labelledby="sickness-tab"
                        tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Sickness Details</h4>
                            </div>
                            <div>
                                <a href="{{ route('create.new.sickness', $user->id) }}"
                                    class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Reason for Absence</th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->sicknesses->isNotEmpty())
                                        @foreach ($user->sicknesses as $key => $sickness)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $sickness->user->first_name }}</td>
                                                <td>{{ $sickness->reason_for_absence }}</td>
                                                <td>{{ $sickness->date_from }}</td>
                                                <td>{{ $sickness->date_to }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link p-0" type="button"
                                                            id="dropdownMenuButton-{{ $sickness->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="align-justify"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuButton-{{ $sickness->id }}">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('edit.sickness', ['id' => $sickness->id, 'form_type' => 'tab']) }}">Edit</a>
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
                                    @else
                                        {{-- <td colspan="6" class="text-center">No sickness data available</td> --}}
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- capability Tab -->
                    <div class="tab-pane fade" id="capability-tab-pane" role="tabpanel" aria-labelledby="capability-tab"
                        tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Capability Details</h4>
                            </div>
                            <div>
                                <a href="{{ route('create.new.capability', $user->id) }}"
                                    class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Stage</th>
                                        <th>Date</th>
                                        <th>Outcome</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->capabilities->isNotEmpty())
                                        @foreach ($user->capabilities as $key => $capability)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $capability->user->first_name }}</td>
                                                <td>{{ $capability->stage }}</td>
                                                <td>{{ $capability->date }}</td>
                                                <td>{{ $capability->outcome }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link p-0" type="button"
                                                            id="dropdownMenuButton-{{ $capability->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="align-justify"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuButton-{{ $capability->id }}">
                                                            {{-- <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('detail.capability', $capability->id) }}">View</a>
                                                            </li> --}}
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('edit.capability', ['id' => $capability->id, 'form_type' => 'tab']) }}">Edit</a>
                                                            </li>
                                                            @if (auth()->user()->role == 'super_admin')
                                                                <li>
                                                                    <button
                                                                        onclick="if(confirm('Are you sure you want to delete this capability?')) { window.location.href='{{ route('delete.capability', $capability->id) }}' }"
                                                                        class="dropdown-item">Delete</button>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        {{-- <p class="text-center">No capability data available</> --}}
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- training Tab -->
                    <div class="tab-pane fade" id="training-tab-pane" role="tabpanel" aria-labelledby="training-tab"
                        tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Training Details</h4>
                            </div>
                            <div>
                                <a href="{{ route('create.new.training', $user->id) }}"
                                    class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Training Title</th>
                                        <th>Course Date</th>
                                        <th>Renewal Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->trainings->isNotEmpty())
                                        @foreach ($user->trainings as $key => $training)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $training->user->first_name }}</td>
                                                <td>{{ $training->training_title }}</td>
                                                <td>{{ $training->course_date }}</td>
                                                <td>{{ $training->renewal_date }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link p-0" type="button"
                                                            id="dropdownMenuButton-{{ $training->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
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
                                                                    href="{{ route('edit.training', ['id' => $training->id, 'form_type' => 'tab']) }}">Edit</a>
                                                            </li>
                                                            @if (auth()->user()->role == 'super_admin')
                                                                <li>
                                                                    <button
                                                                        onclick="if(confirm('Are you sure you want to delete this training?')) { window.location.href='{{ route('delete.training', $training->id) }}' }"
                                                                        class="dropdown-item">Delete</button>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        {{-- <td colspan="6" class="text-center">No training data available</td> --}}
                                    @endif
                                    <!-- Add your data here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- disciplinary Tab -->
                    <div class="tab-pane fade" id="disciplinary-tab-pane" role="tabpanel"
                        aria-labelledby="disciplinary-tab" tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Disciplinary Details</h4>
                            </div>
                            <div>
                                <a href="{{ route('create.new.disciplinary', $user->id) }}"
                                    class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Reason for Disciplinary</th>
                                        <th>Date of Hearing</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->disciplinaries->isNotEmpty())
                                        @foreach ($user->disciplinaries as $key => $disciplinary)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $disciplinary->user->first_name }}</td>
                                                <td>{{ $disciplinary->reason_for_disciplinary }}</td>
                                                <td>{{ $disciplinary->hearing_date }}</td>
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
                                                                    href="{{ route('edit.disciplinary', ['id' => $disciplinary->id, 'form_type' => 'tab']) }}">Edit</a>
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
                                    @else
                                        {{-- <td colspan="6" class="text-center">No disciplinary data available</td> --}}
                                    @endif
                                    <!-- Add your data here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- lateness Tab -->
                    <div class="tab-pane fade" id="lateness-tab-pane" role="tabpanel" aria-labelledby="lateness-tab"
                        tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Lateness Details</h4>
                            </div>
                            <div>
                                <a href="{{ route('create.new.lateness', $user->id) }}"
                                    class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
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
                                    @if ($user->latenesses->isNotEmpty())
                                        @foreach ($user->latenesses as $key => $lateness)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $lateness->user->first_name }}</td>
                                                <td>{{ $lateness->lateness_triggered }}</td>
                                                <td>{{ $lateness->lateness_stage }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link p-0" type="button"
                                                            id="dropdownMenuButton-{{ $lateness->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="align-justify"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuButton-{{ $lateness->id }}">

                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('edit.lateness', ['id' => $lateness->id, 'form_type' => 'tab']) }}">Edit</a>
                                                            </li>
                                                            @if (auth()->user()->role == 'super_admin')
                                                                @if (auth()->user()->role == 'super_admin')
                                                                @endif

                                                                <li>
                                                                    <button
                                                                        onclick="if(confirm('Are you sure you want to delete this lateness?')) { window.location.href='{{ route('delete.lateness', $lateness->id) }}' }"
                                                                        class="dropdown-item">Delete</button>
                                                                </li>
                                                            @endif
                                                            @if (auth()->user()->role == 'super_admin')
                                                            @endif

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        {{-- <td colspan="6" class="text-center">No lateness data available</td> --}}
                                    @endif
                                    <!-- Add your data here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('plugin-scripts')
        <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    @endpush
    @push('custom-scripts')
        <script>
            $(document).ready(function() {


                // Adjust DataTable columns when tab is shown
                $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                    const target = $(e.target).data('bs-target');
                    $(target).find('table').DataTable().columns.adjust();
                });
            });
        </script>
    @endpush
@endsection





{{-- <!-- Personal Details -->
                <h4 class="text-center pt-4">Personal Details</h4>
                <hr>
                <p><strong>First Name:</strong> {{ $user->first_name }}</p>
                <p><strong>Middle Name:</strong> {{ $user->middle_name }}</p>
                <p><strong>Surname:</strong> {{ $user->surname }}</p>
                <p><strong>Preferred Name:</strong> {{ $user->preferred_name }}</p>
                <p><strong>Address 1:</strong> {{ $user->address1 }}</p>
                <p><strong>Address 2:</strong> {{ $user->address2 }}</p>
                <p><strong>Address 3:</strong> {{ $user->address3 }}</p>
                <p><strong>Town:</strong> {{ $user->town }}</p>
                <p><strong>Postcode:</strong> {{ $user->post_code }}</p>
                <p><strong>Mobile Tel:</strong> {{ $user->mobile_tel }}</p>
                <p><strong>Home Tel:</strong> {{ $user->home_tel }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
                <p><strong>Ethnicity:</strong> {{ $user->ethnicity }}</p>
                <p><strong>DOB:</strong> {{ $user->dob }}</p>
                <p><strong>Age:</strong> {{ $user->age }}</p>
                <p><strong>Disability:</strong> {{ ucfirst($user->disability) }}</p>

    
                <!-- Employment Details -->
                <h4 class="text-center pt-4">Employment Details</h4>
                <hr>
                <p><strong>Employment Date:</strong> {{ $user->employment_date }}</p>
                <p><strong>Contracted From:</strong> {{ $user->contracted_from_date }}</p>
                <p><strong>Employee Commencement Date:</strong> {{ $user->commencement_date }}</p>
                <p><strong>Termination Date:</strong> {{ $user->termination_date }}</p>
                <p><strong>Reason for Termination:</strong> {{ $user->reason_termination }}</p>
                <p><strong>Handbook Sent:</strong> {{ ucfirst($user->handbook_sent) }}</p>
                <p><strong>Medical Form Returned:</strong> {{ ucfirst($user->medical_form_returned) }}</p>
                <p><strong>New Entrant Form Returned:</strong> {{ ucfirst($user->new_entrant_form_returned) }}</p>
                <p><strong>Confidentiality Statement:</strong> {{ ucfirst($user->confidentiality_statement_returned) }}</p>
                <p><strong>Work Document Received:</strong> {{ ucfirst($user->work_document_received) }}</p>
                <p><strong>Qualifications Checked:</strong> {{ ucfirst($user->qualifications_checked) }}</p>
                <p><strong>References Requested:</strong> {{ ucfirst($user->references_requested) }}</p>
                <p><strong>References Returned:</strong> {{ ucfirst($user->references_returned) }}</p>
                <p><strong>Payroll Informed:</strong> {{ ucfirst($user->payroll_informed) }}</p>
                <p><strong>Probation Complete:</strong> {{ ucfirst($user->probation_complete) }}</p>
                <p><strong>Equipment Required:</strong> {{ ucfirst($user->equipment_required) }}</p>
                <p><strong>Equipment Ordered:</strong> {{ ucfirst($user->equipment_ordered) }}</p>
                <p><strong>P45 / Tax Form Received:</strong> {{ ucfirst($user->p45) }}</p>
                <p><strong>Employee Pack Sent:</strong> {{ ucfirst($user->employee_pack_sent) }}</p>
                <p><strong>Termination Form to Payroll:</strong> {{ ucfirst($user->termination_form_to_payroll) }}</p>
                <p><strong>Casual Holiday Pay:</strong> {{ $user->casual_holiday_pay }}</p>
                <p><strong>NI Number:</strong> {{ $user->ni_number }}</p>
                <p><strong>Default Cost Centre:</strong> {{ $user->default_cost_center }}</p>
                <p><strong>Salaried / Monthly in Arrears:</strong> {{ $user->salaried }}</p>

                
                <!-- Add other fields as required -->
    
                <!-- Emergency Contacts -->
                <h4 class="text-center pt-4">Emergency Contacts</h4>
                <hr>
                <p><strong>Emergency Contact 1 Name:</strong> {{ $user->emergency_1_name }}</p>
                <p><strong>Emergency Contact 1 Mobile:</strong> {{ $user->emergency_1_ph_no }}</p>
                <p><strong>Emergency Contact 1 Home Mobile:</strong> {{ $user->emergency_1_home_ph }}</p>
                <p><strong>Emergency Contact 1 Relationship:</strong> {{ $user->emergency_1_relation }}</p>
                <p><strong>Emergency Contact 2 Name:</strong> {{ $user->emergency_2_name }}</p>
                <p><strong>Emergency Contact 2 Mobile:</strong> {{ $user->emergency_2_ph_no }}</p>
                <p><strong>Emergency Contact 2  Home Mobile:</strong> {{ $user->emergency_2_home_ph }}</p>
                <p><strong>Emergency Contact 2 Relationship:</strong> {{ $user->emergency_2_relation }}</p>
    
                <!-- Notes -->
                <h4 class="text-center pt-4">Notes</h4>
                <hr>
                <p>{{ $user->notes }}</p>
                <a href="{{ route('show.employees') }}" class="btn btn-secondary mt-4">Back to List</a> --}}
