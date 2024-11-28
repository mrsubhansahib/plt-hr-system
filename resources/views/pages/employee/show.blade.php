@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employee Detail</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Personal Details -->
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
                <p><strong>Contracted From:</strong> {{ $user->commencement_date }}</p>
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
                <p><strong>Termination Date:</strong> {{ $user->termination_date }}</p>
                <p><strong>Termination Date:</strong> {{ $user->termination_date }}</p>
                <p><strong>Termination Date:</strong> {{ $user->termination_date }}</p>

                
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
            <a href="{{ route('show.employees') }}" class="btn btn-secondary mt-4">Back to List</a>

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
