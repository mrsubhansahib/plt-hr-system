@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Disclosure</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center my-4">Disclosure Details</h3>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-3">
                            <strong>Employee:</strong>
                            <p>{{ $disclosure->user->first_name }} {{ $disclosure->user->surname }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>DBS Level:</strong>
                            <p>{{ $disclosure->dbs_level }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Date Requested:</strong>
                            <p>{{ $disclosure->date_requested }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Date on Certificate:</strong>
                            <p>{{ $disclosure->date_on_certificate }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Certificate Number:</strong>
                            <p>{{ $disclosure->certificate_no }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Paid Liberata:</strong>
                            <p>{{ $disclosure->paid_liberata }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Reimbursed Candidate:</strong>
                            <p>{{ $disclosure->reimbursed_candidate }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Invoice Sent:</strong>
                            <p>{{ ucfirst($disclosure->invoice_sent) }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <strong>Contract Type:</strong>
                            <p>{{ $disclosure->contract_type }}</p>
                        </div>
                        <div class="col-md-12 mt-3">
                            <strong>Notes:</strong>
                            <p>{{ $disclosure->notes }}</p>
                        </div>
                    </div>
    
                    <a href="{{ route('show.disclosures') }}" class="btn btn-secondary mt-4">Back to List</a>
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
