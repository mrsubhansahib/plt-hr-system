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
                </div>
                <div class="my-4">
                    <div class="row mb-3">
                        <div class="col-md-3 mt-3">
                            <strong>First Name:</strong>
                            <p>{{ $user->first_name }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Surname:</strong>
                            <p>{{ $user->surname }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Preferred Name:</strong>
                            <p>{{ $user->preferred_name }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Address:</strong>
                            <p>{{ $user->address1 }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Town:</strong>
                            <p>{{ $user->town }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Postcode:</strong>
                            <p>{{ $user->post_code }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Email:</strong>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>DOB:</strong>
                            <p>{{ $user->dob }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Age:</strong>
                            <p>{{ $user->age }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Gender:</strong>
                            <p>{{ ucfirst($user->gender) }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Ethnicity:</strong>
                            <p>{{ $user->ethnicity }}</p>
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
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>DBS Level</th>
                                        <th>Certification No</th>
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
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Reason for Absence</th>
                                        <th>Date From</th>
                                        <th>Date To</th>
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
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Stage</th>
                                        <th>Date</th>
                                        <th>Outcome</th>
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
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Training Title</th>
                                        <th>Course Date</th>
                                        <th>Renewal Date</th>
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
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Reason for Disciplinary</th>
                                        <th>Date of Hearing</th>
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
                        </div>
                        <div class="">
                            <table id="" class="table table-striped detailTable dataTableExample">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Lateness Triggered</th>
                                        <th>Lateness Stage</th>
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
                                        <th>First Name</th>
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
                                                <td>{{ $note->admin->first_name.' '.$note->admin->surname }}</td> 
                                                <td>{{ $note->notes }}</td>
                                                <td>
                                                    @if($note->module_name == "User")
                                                        Employee
                                                    @else
                                                        {{ $note->module_name }}
                                                    @endif
                                                </td>                                                
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
