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
                                <input type="text" class="form-control mt-2" id="dob"
                                    value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('d-m-Y') }}"
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
                                    value="{{ $user->mobile_tel ?? 'Not Entered' }}" disabled>
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
                                    value="{{ $user->contracted_from_date ?? 'Not Entered' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="termination_date">Employment Termination Date</label>
                                <input class="form-control datepicker mt-2" type="text" name="termination_date"
                                    value="{{ $user->termination_date ?? 'Not Entered' }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label for="reason_termination">Reason for Termination</label>
                                <input class="form-control mt-2" type="text"
                                    value="{{ $user->reason_termination ?? 'Not Entered' }}" disabled>
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
                        <button class="nav-link" id="training-tab" data-bs-toggle="tab"
                            data-bs-target="#training-tab-pane" type="button" role="tab"
                            aria-controls="training-tab-pane" aria-selected="false">Training</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes-tab-pane"
                            type="button" role="tab" aria-controls="notes-tab-pane"
                            aria-selected="false">Notes</button>
                    </li>
                    {{-- @if (!empty($user->home_tel) &&
    !empty($user->address2) &&
    !empty($user->address3) &&
    !empty($user->disability) &&
    !empty($user->emergency_2_name) &&
    !empty($user->emergency_2_ph_no) &&
    !empty($user->emergency_2_home_ph) &&
    !empty($user->emergency_2_relation) &&
    !empty($user->contracted_from_date) &&
    !empty($user->termination_date) &&
    !empty($user->reason_termination) &&
    !empty($user->handbook_sent) &&
    !empty($user->medical_form_returned) &&
    !empty($user->new_entrant_form_returned) &&
    !empty($user->confidentiality_statement_returned) &&
    !empty($user->work_document_received) &&
    !empty($user->qualifications_checked) &&
    !empty($user->references_requested) &&
    !empty($user->references_returned) &&
    !empty($user->payroll_informed) &&
    !empty($user->probation_complete) &&
    !empty($user->equipment_required) &&
    !empty($user->equipment_ordered) &&
    !empty($user->p45) &&
    !empty($user->employee_pack_sent) &&
    !empty($user->termination_form_to_payroll) &&
    !empty($user->casual_holiday_pay) &&
    !empty($user->notes))
                    @else --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hr-checklist-tab" data-bs-toggle="tab"
                            data-bs-target="#hr-checklist-tab-pane" type="button" role="tab"
                            aria-controls="hr-checklist-tab-pane" aria-selected="false">HR Checklist</button>
                    </li>
                    {{-- @endif --}}
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
                            <table class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
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
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->facility }}</td>
                                            <td>{{ $job->number_of_hours }}</td>
                                            <td>{{ ucfirst($job->main_job) }}</td>
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
                                                        @if ($job->status == 'terminated')
                                                            <li>
                                                                <button class="dropdown-item"
                                                                    onclick="confirmActivation({{ $job->id }})">
                                                                    Activate
                                                                </button>
                                                                <form id="activate-job-form-{{ $job->id }}"
                                                                    action="{{ route('activate.job', $job->id) }}"
                                                                    method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('POST')
                                                                </form>
                                                            </li>
                                                        @elseif ($job->status == 'active')
                                                            <li>
                                                                <button class="dropdown-item"
                                                                    onclick="confirmTermination({{ $job->id }})">
                                                                    Terminate
                                                                </button>
                                                                <form id="terminate-job-form-{{ $job->id }}"
                                                                    action="{{ route('terminate.job', $job->id) }}"
                                                                    method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('POST')
                                                                </form>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('edit.job', ['id' => $job->id, 'form_type' => 'tab']) }}">
                                                                Edit
                                                            </a>
                                                        </li>
                                                        @if (auth()->user()->role == 'super_admin')
                                                            <li>
                                                                <form id="delete-job-form-{{ $job->id }}"
                                                                    action="{{ route('delete.job', $job->id) }}"
                                                                    style="display: none;">
                                                                    @csrf
                                                                </form>
                                                                <button class="dropdown-item"
                                                                    onclick="if(confirm('Are you sure you want to delete this record?')) { 
                                                                        document.getElementById('delete-job-form-{{ $job->id }}').submit();
                                                                    }">
                                                                    Delete
                                                                </button>
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
                            <table id="" class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
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
                            <table id="" class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
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

                                                <td>{{ $sickness->reason_for_absence }}</td>
                                                <td>{{ \Carbon\Carbon::parse($sickness->date_from)->format('d/m/Y') }}</td>
                                                <td>
                                                    {{ $sickness->date_to ? \Carbon\Carbon::parse($sickness->date_to)->format('d/m/Y') : '—' }}
                                                </td>
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
                            <table id="" class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
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
                            <table id="" class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
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
                            <table id="" class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
                                        <th>Reason for Disciplinary</th>
                                        <th>Date of Hearing</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->disciplinaries->isNotEmpty())
                                        @foreach ($user->disciplinaries as $key => $disciplinary)
                                            <tr>
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
                            <table id="" class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
                                        <th>Lateness Triggered</th>
                                        <th>Lateness Stage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->latenesses->isNotEmpty())
                                        @foreach ($user->latenesses as $key => $lateness)
                                            <tr>
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
                            <table class="table table-striped detailTable dataTableExampleDetail">
                                <thead>
                                    <tr>
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
                                                <td>{{ $note->admin->first_name . ' ' . $note->admin->surname }}</td>
                                                <td>{{ $note->notes }}</td>
                                                <td>
                                                    @if ($note->module_name == 'User')
                                                        Employee
                                                    @else
                                                        {{ $note->module_name }}
                                                    @endif
                                                </td>
                                                <td>{{ $note->created_at->format('d-m-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- HR Checklist Tab (Form will go here) -->
                    <div class="tab-pane fade" id="hr-checklist-tab-pane" role="tabpanel"
                        aria-labelledby="hr-checklist-tab" tabindex="0">
                        <div class="d-flex justify-content-between py-2">
                            <div>
                                <h4 class="py-2">HR Checklist</h4>
                            </div>
                        </div>
                        <div class="">
                            <form class="forms-sample" action="{{ route('update.hr_list', $user->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    {{-- @if (empty($user->home_tel)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Home Tel</label>
                                        <input class="form-control" type="text" name="home_tel"
                                            value="{{ $user->home_tel }}" />
                                    </div> --}}
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->address2)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Address 2</label>
                                        <input class="form-control" type="text" name="address2"
                                            value="{{ $user->address2 }}" />
                                    </div> --}}
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->address3)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Address 3</label>
                                        <input class="form-control" type="text" name="address3"
                                            value="{{ $user->address3 }}" />
                                    </div> --}}
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->disability)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Disability</label>
                                        <select class="form-control form-select" value="{{ $user->disability }}"
                                            name="disability">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div> --}}
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->emergency_2_name)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Name</label>
                                        <input class="form-control" type="text" value="{{ $user->emergency_2_name }}"
                                            name="emergency_2_name" />
                                    </div> --}}
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->emergency_2_ph_no)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Mobile</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            value="{{ $user->emergency_2_ph_no }}" name="emergency_2_ph_no" />
                                    </div> --}}
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->emergency_2_home_ph)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Home Number</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            value="{{ $user->emergency_2_home_ph }}" name="emergency_2_home_ph" />
                                    </div> --}}
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->emergency_2_relation)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Relationship</label>
                                        <input class="form-control" type="text"
                                            value="{{ $user->emergency_2_relation }}" name="emergency_2_relation" />
                                    </div> --}}
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->emergency_2_ph_no)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Mobile</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            value="{{ $user->emergency_2_ph_no }}" name="emergency_2_ph_no" />
                                    </div> --}}
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->emergency_2_relation)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Relationship</label>
                                        <input class="form-control" type="text"
                                            value="{{ $user->emergency_2_relation }}" name="emergency_2_relation" />
                                    </div> --}}
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->contracted_from_date)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Contracted From Date</label>
                                        <input class="form-control datepicker" type="text" placeholder="Select Date"
                                            value="{{ $user->contracted_from_date }}" name="contracted_from_date" />
                                    </div>
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->termination_date)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Employment Termination Date</label>
                                        <input class="form-control datepicker" type="text" placeholder="Select Date"
                                            value="{{ $user->termination_date }}" name="termination_date" />
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->reason_termination)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Reason for Termination</label>
                                        <input class="form-control" type="text"
                                            value="{{ $user->reason_termination }}" name="reason_termination" />
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->handbook_sent)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Handbook Sent</label>
                                        <select class="form-control form-select" name="handbook_sent">
                                            <option value="yes" {{ $user->handbook_sent == 'yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="no"
                                                {{ empty($user->handbook_sent) || $user->handbook_sent == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->medical_form_returned)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Medical Form Returned</label>
                                        <select class="form-control form-select" name="medical_form_returned">
                                            <option value="yes"
                                                {{ $user->medical_form_returned == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->medical_form_returned) || $user->medical_form_returned == 'no' ? 'selected' : '' }}>
                                                No</option>
                                            <option value="pending"
                                                {{ $user->medical_form_returned == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->new_entrant_form_returned)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">New Entrant Form Returned</label>
                                        <select class="form-control form-select" name="new_entrant_form_returned">
                                            <option value="yes"
                                                {{ $user->new_entrant_form_returned == 'yes' ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="no"
                                                {{ empty($user->new_entrant_form_returned) || $user->new_entrant_form_returned == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->confidentiality_statement_returned)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Confidentiality Statement</label>
                                        <select class="form-control form-select"
                                            name="confidentiality_statement_returned">
                                            <option value="yes"
                                                {{ $user->confidentiality_statement_returned == 'yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="no"
                                                {{ empty($user->confidentiality_statement_returned) || $user->confidentiality_statement_returned == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->work_document_received)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Work Document Received</label>
                                        <select class="form-control form-select" name="work_document_received">
                                            <option value="yes"
                                                {{ $user->work_document_received == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->work_document_received) || $user->work_document_received == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->qualifications_checked)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Qualifications Checked</label>
                                        <select class="form-control form-select" name="qualifications_checked">
                                            <option value="yes"
                                                {{ $user->qualifications_checked == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->qualifications_checked) || $user->qualifications_checked == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->references_requested)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">References Requested</label>
                                        <select class="form-control form-select" name="references_requested">
                                            <option value="yes"
                                                {{ $user->references_requested == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->references_requested) || $user->references_requested == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->references_returned)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">References Returned</label>
                                        <select class="form-control form-select" name="references_returned">
                                            <option value="yes"
                                                {{ $user->references_returned == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->references_returned) || $user->references_returned == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->payroll_informed)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Payroll Informed</label>
                                        <select class="form-control form-select" name="payroll_informed">
                                            <option value="yes"
                                                {{ $user->payroll_informed == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->payroll_informed) || $user->payroll_informed == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->probation_complete)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Probation Complete</label>
                                        <select class="form-control form-select" name="probation_complete">
                                            <option value="yes"
                                                {{ $user->probation_complete == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->probation_complete) || $user->probation_complete == 'no' ? 'selected' : '' }}>
                                                No</option>
                                            <option value="not_required"
                                                {{ $user->probation_complete == 'not_required' ? 'selected' : '' }}>Not
                                                Required</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->equipment_required)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Equipment Required</label>
                                        <select class="form-control form-select" name="equipment_required">
                                            <option value="yes"
                                                {{ $user->equipment_required == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->equipment_required) || $user->equipment_required == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->equipment_ordered)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Equipment Ordered</label>
                                        <select class="form-control form-select" name="equipment_ordered">
                                            <option value="Telphone Ext"
                                                {{ $user->equipment_ordered == 'Telphone Ext' ? 'selected' : '' }}>
                                                Telephone Ext</option>
                                            <option value="Computer / Laptop"
                                                {{ $user->equipment_ordered == 'Computer / Laptop' ? 'selected' : '' }}>
                                                Computer / Laptop</option>
                                            <option value="Email Address / Login"
                                                {{ $user->equipment_ordered == 'Email Address / Login' ? 'selected' : '' }}>
                                                Email Address / Login</option>
                                            <option value="Mobile"
                                                {{ $user->equipment_ordered == 'Mobile' ? 'selected' : '' }}>Mobile
                                            </option>
                                            <option value="other"
                                                {{ empty($user->equipment_ordered) || $user->equipment_ordered == 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}
                                    {{-- @if (empty($user->p45)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">P45 / Tax Form Received</label>
                                        <select class="form-control form-select" name="p45">
                                            <option value="yes" {{ $user->p45 == 'yes' ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="no"
                                                {{ empty($user->p45) || $user->p45 == 'no' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->employee_pack_sent)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Employee Pack Sent</label>
                                        <select class="form-control form-select" name="employee_pack_sent">
                                            <option value="yes"
                                                {{ $user->employee_pack_sent == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ empty($user->employee_pack_sent) || $user->employee_pack_sent == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->termination_form_to_payroll)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Termination Form to Payroll</label>
                                        <select class="form-control form-select" name="termination_form_to_payroll">
                                            <option value="yes"
                                                {{ $user->termination_form_to_payroll == 'yes' ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="no"
                                                {{ empty($user->termination_form_to_payroll) || $user->termination_form_to_payroll == 'no' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->casual_holiday_pay)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Casual Holiday Pay</label>
                                        <select class="form-control form-select" name="casual_holiday_pay">
                                            <option value="no"
                                                {{ $user->casual_holiday_pay == 'no' ? 'selected' : '' }}>No</option>
                                            <option value="yes"
                                                {{ $user->casual_holiday_pay == 'yes' ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>

                                    {{-- @endif --}}
                                    {{-- @if (empty($user->default_cost_center)) --}}
                                    {{-- <div class="col-md-3 mt-3">
                                        <label class="form-label">Cost Centre </label>
                                        <input class="form-control" type="text"
                                            value="{{ $user->default_cost_center }}" name="default_cost_center" />
                                    </div> --}}
                                    {{-- @endif --}}

                                    {{-- @if (empty($user->notes)) --}}
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">IHASCO Training Sent</label>
                                        <select class="form-control form-select" name="ihasco_training_sent">
                                            <option value="yes"
                                                {{ ($user->ihasco_training_sent ?? 'no') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="no"
                                                {{ ($user->ihasco_training_sent ?? 'no') == 'no' ? 'selected' : '' }}>
                                                No</option>
                                            <option value="Not Required"
                                                {{ ($user->ihasco_training_sent ?? 'no') == 'Not Required' ? 'selected' : '' }}>
                                                Not Required</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">IHASCO Training Complete</label>
                                        <select class="form-control form-select" name="ihasco_training_complete">
                                            <option value="yes"
                                                {{ ($user->ihasco_training_complete ?? 'no') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="no"
                                                {{ ($user->ihasco_training_complete ?? 'no') == 'no' ? 'selected' : '' }}>
                                                No</option>
                                            <option value="Not Required"
                                                {{ ($user->ihasco_training_complete ?? 'no') == 'Not Required' ? 'selected' : '' }}>
                                                Not Required</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" name="notes" rows="4">{{ $user->notes }}</textarea>
                                    </div>
                                    {{-- @endif --}}
                                    <input type="hidden" name="hr_checklist_employee_detail">
                                </div>
                                <div class=" mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
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
                function initDataTables() {
                    $('.dataTableExampleDetail').each(function() {
                        const table = $(this);

                        if ($.fn.DataTable.isDataTable(table)) {
                            table.DataTable().destroy();
                        }

                        table.DataTable({
                            autoWidth: false,
                            paging: true,
                            searching: true,
                            ordering: true,
                            info: true,
                            dom: 'Bfrtip',
                            buttons: [{
                                    extend: 'excelHtml5',
                                    className: 'btn btn-sm btn-outline-success',
                                    title: '', // ❌ Remove default title (like PLT HR System)
                                    exportOptions: {
                                        columns: ':not(:last-child)' // ✅ Exclude last column (e.g. Action/Edit)
                                    },
                                    customize: function(xlsx) {
                                        const sheet = xlsx.xl.worksheets['sheet1.xml'];

                                        const firstName = '{{ $user->first_name }}';
                                        const surname = '{{ $user->surname }}';
                                        const commencementDate =
                                            '{{ $user->commencement_date }}';
                                        const contractedFrom =
                                            '{{ $user->contracted_from_date ?? 'Not Entered' }}';

                                        const $sheetData = $(sheet).find('sheetData');

                                        // Shift all existing rows 4 down
                                        $sheetData.find('row').each(function() {
                                            const $row = $(this);
                                            const r = parseInt($row.attr('r'));
                                            $row.attr('r', r + 4);
                                            $row.find('c').each(function() {
                                                const $cell = $(this);
                                                const cellRef = $cell.attr('r');
                                                if (cellRef) {
                                                    const col = cellRef.replace(
                                                        /[0-9]/g, '');
                                                    const row = parseInt(cellRef
                                                        .replace(/[A-Z]/g,
                                                            '')) + 4;
                                                    $cell.attr('r', col + row);
                                                }
                                            });
                                        });

                                        // Insert user info rows
                                        const userInfoRows = `
                                    <row r="1">
                                        <c t="inlineStr" r="A1"><is><t>First Name</t></is></c>
                                        <c t="inlineStr" r="B1"><is><t>${firstName}</t></is></c>
                                    </row>
                                    <row r="2">
                                        <c t="inlineStr" r="A2"><is><t>Surname</t></is></c>
                                        <c t="inlineStr" r="B2"><is><t>${surname}</t></is></c>
                                    </row>
                                    <row r="3">
                                        <c t="inlineStr" r="A3"><is><t>Employment Commencement Date</t></is></c>
                                        <c t="inlineStr" r="B3"><is><t>${commencementDate}</t></is></c>
                                    </row>
                                    <row r="4">
                                        <c t="inlineStr" r="A4"><is><t>Contract From Date</t></is></c>
                                        <c t="inlineStr" r="B4"><is><t>${contractedFrom}</t></is></c>
                                    </row>
                                `;

                                        $sheetData.prepend(userInfoRows);
                                    }
                                },
                                {
                                    extend: 'csvHtml5',
                                    className: 'btn btn-sm btn-outline-primary',
                                    title: '', // ❌ Remove default title
                                    exportOptions: {
                                        columns: ':not(:last-child)' // ✅ Exclude Edit/Action column
                                    },
                                    customize: function(csv) {
                                        const firstName = '{{ $user->first_name }}';
                                        const surname = '{{ $user->surname }}';
                                        const commencementDate =
                                            '{{ $user->commencement_date }}';
                                        const contractedFrom =
                                            '{{ $user->contracted_from_date ?? 'Not Entered' }}';

                                        const info = [
                                            `First Name:,${firstName}`,
                                            `Surname:,${surname}`,
                                            `Employment Commencement Date:,${commencementDate}`,
                                            `Contract From Date:,${contractedFrom}`
                                        ].join('\n');

                                        return info + '\n\n' + csv;
                                    }
                                }
                            ],
                            initComplete: function() {
                                let api = this.api();
                                api.columns.adjust().draw();
                                table.find('td').css({
                                    'padding': '5px 0px'
                                });
                            }
                        });
                    });
                }

                initDataTables();

                $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function() {
                    initDataTables();
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Adjust DataTable columns when tab is shown
                $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                    const target = $(e.target).data('bs-target');
                    $(target).find('table').DataTable().columns.adjust();
                });
            });

            function confirmTermination(jobId) {
                if (confirm('Are you sure you want to terminate this job?')) {
                    document.getElementById('terminate-job-form-' + jobId).submit();
                }
            }

            function confirmActivation(jobId) {
                if (confirm('Are you sure you want to activate this job?')) {
                    document.getElementById('activate-job-form-' + jobId).submit();
                }
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Get tab from sessionStorage or use default
                let activeTab = sessionStorage.getItem("activeTab") ||
                    "{{ session('active_tab', 'default-tab-id') }}";
                if (activeTab) {
                    let tabButton = document.getElementById(activeTab);
                    if (tabButton) {
                        new bootstrap.Tab(tabButton).show();
                    }
                }
                // Save clicked tab in sessionStorage
                document.querySelectorAll(".nav-link").forEach(tab => {
                    tab.addEventListener("click", function() {
                        sessionStorage.setItem("activeTab", this.id);
                    });
                });
                // Reset on full reload
                window.addEventListener("beforeunload", function() {
                    sessionStorage.removeItem("activeTab");
                });
            });
        </script>
    @endpush
@endsection
