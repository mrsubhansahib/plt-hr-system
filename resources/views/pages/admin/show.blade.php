@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center my-4">Personal Details</h3>
                    <hr>
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
    
                    <!-- Employment Details -->
                    <h3 class="my-4 text-center">Employment Details</h3>
                    <hr>
                    <div class="row mb-3">
                        {{-- <div class="col-md-3 mt-3">
                            <strong>Employment Date:</strong>
                            <p>{{ $user->employment_date }}</p>
                        </div> --}}
                        <div class="col-md-3 mt-3">
                            <strong>Commencement Date:</strong>
                            <p>{{ $user->commencement_date }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>NI Number:</strong>
                            <p>{{ $user->ni_number }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Default Cost Centre:</strong>
                            <p>{{ $user->default_cost_center }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Salaried/Monthly in Arrears:</strong>
                            <p>{{ $user->salaried }}</p>
                        </div>
                    </div>
    
                    <!-- Emergency Contacts -->
                    <h3 class="my-4 text-center">Emergency Contacts</h3>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-3">
                            <strong>Contact 1 Name:</strong>
                            <p>{{ $user->emergency_1_name }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Contact 1 Mobile:</strong>
                            <p>{{ $user->emergency_1_ph_no }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Contact 1 Relationship:</strong>
                            <p>{{ $user->emergency_1_relation }}</p>
                        </div>
                    </div>
    
                    <a href="{{ route('show.admins') }}" class="btn btn-secondary mt-4">Back to List</a>
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
