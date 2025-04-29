@extends('layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Document</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">Document Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.documents') }}" class="btn btn-primary">
                                <strong>List</strong><i data-feather="list" class="ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <hr>
                    @livewire('document-form')

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    @livewireScripts
@endpush
