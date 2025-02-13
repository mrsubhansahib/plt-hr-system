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
                                <label for="dob">DOB</label>
                                <input type="text" class="form-control mt-2" id="dob" value="{{ $user->dob }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control mt-2" id="age" value="{{ $user->age }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="mobile_tel">Mobile No</label>
                                <input type="text" class="form-control mt-2" id="mobile_tel"
                                    value="{{ $user->mobile_tel }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="commencement_date">Employment Commencement Date</label>
                                <input type="text" class="form-control mt-2" id="commencement_date"
                                    value="{{ $user->commencement_date }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="contracted_from_date">Contract From Date</label>
                                <input type="text" class="form-control mt-2" id="contracted_from_date"
                                    value="{{ $user->contracted_from_date }}" disabled>
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
                        <button class="nav-link" id="sickness-tab" data-bs-toggle="tab"
                            data-bs-target="#sickness-tab-pane" type="button" role="tab"
                            aria-controls="sickness-tab-pane" aria-selected="false">Sickness</button>
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes-tab-pane"
                            type="button" role="tab" aria-controls="notes-tab-pane"
                            aria-selected="false">Notes</button>
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
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Job Title</th>
                                        <th>Facility</th>
                                        <th>Number of Hours</th>
                                        <th>Main Job</th>
                                        <th>Types of Contract</th>
                                        <th>Job Start Date</th>
                                        <th>Job Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->jobs as $key => $job)
                                        <tr>
                                            <td>{{ $job->user->first_name }}</td>
                                            <td>{{ $job->user->surname }}</td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->facility }}</td>
                                            <td>{{ $job->number_of_hours }}</td>
                                            <td>{{ $job->main_job }}</td>
                                            <td>{{ $job->contract_type }}</td>
                                            <td>{{ $job->start_date }}</td>
                                            <td>{{ ucfirst($job->status) }}</td>
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
                            <div>
                                <a href="{{ route('create.new.disclosure', $user->id) }}"
                                    class="btn btn-primary"><strong>New</strong><i data-feather="bookmark"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>DBS Level</th>
                                        <th>Certification No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->disclosures->isNotEmpty())
                                        <!-- Check if there are any disclosures -->
                                        @foreach ($user->disclosures as $index => $disclosure)
                                            <!-- Loop through each disclosure -->
                                            <tr>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->surname }}</td>
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
                                        <th>Name</th>
                                        <th>Surname</th>
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
                                                <td>{{ $sickness->user->first_name }}</td>
                                                <td>{{ $sickness->user->surname }}</td>
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
                                        <th>Name</th>
                                        <th>Surname</th>
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
                                                <td>{{ $capability->user->first_name }}</td>
                                                <td>{{ $capability->user->surname }}</td>
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
                                        <th>Name</th>
                                        <th>Surname</th>
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
                                                <td>{{ $training->user->first_name }}</td>
                                                <td>{{ $training->user->surname }}</td>
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
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Reason for Disciplinary</th>
                                        <th>Date of Hearing</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->disciplinaries->isNotEmpty())
                                        @foreach ($user->disciplinaries as $key => $disciplinary)
                                            <tr>
                                                <td>{{ $disciplinary->user->first_name }}</td>
                                                <td>{{ $disciplinary->user->surname }}</td>
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
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Lateness Triggered</th>
                                        <th>Lateness Stage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->latenesses->isNotEmpty())
                                        @foreach ($user->latenesses as $key => $lateness)
                                            <tr>
                                                <td>{{ $lateness->user->first_name }}</td>
                                                <td>{{ $lateness->user->surname }}</td>
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

                    {{-- notes tab --}}
                    <div class="tab-pane fade" id="notes-tab-pane" role="tabpanel" aria-labelledby="notes-tab"
                        tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">Notes</h4>
                            </div>
                        </div>
                        <div class="">
                            <table class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Admin Name</th>
                                        <th>Note</th>
                                        <th>Module Name</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->all_notes->isNotEmpty())
                                        @foreach ($user->all_notes as $note)
                                            <tr>
                                                <td>{{ $note->user->first_name }}</td>
                                                <td>{{ $note->user->surname }}</td>
                                                <td>{{ $note->admin->first_name }}</td> 
                                                <td>{{ $note->notes }}</td>
                                                <td>{{ $note->module_name }}</td> 
                                                <td>{{ $note->created_at->format('d-m-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">No notes available</td>
                                        </tr>
                                    @endif
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
