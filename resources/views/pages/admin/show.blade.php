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
                    <!-- make a role fied here -->
                    <div class="col-md-3 mt-3">
                        <strong>Role:</strong>
                        <p>{{ $user->role }}</p>
                    </div>
                    <div class="col-md-3 mt-3">
                        <strong>Email:</strong>
                        <p>{{ $user->email }}</p>
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