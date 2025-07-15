@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <style>
        #printContent {
            display: none!important;
            border: none;
            box-shadow: none;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }

        @media print {
            #app {
                display: none;
            }

            #printContent {
                display: block !important;
            }
        }

        .cke_notification_warning {
            display: none !important;
        }

        .cke_top ,.cke_bottom {
            display: none !important;
        }

        .cke_editor_contentEditor,.cke_editor_content  {
            border: none !important;
        }
    </style>
    <div id="printContent">

        <div class="text-center mb-4">
            <h3>{{ $document->title }}</h3>
        </div>
        {!! $document->content !!}
    </div>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Document</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                            <button class="btn btn-secondary" onclick="window.print()"><strong>Print</strong><i
                                    data-feather="printer" class="ms-2"></i></button>
                            <a href="{{ route('edit.document', $document->id) }}"
                                class="btn btn-primary"><strong>Edit</strong><i data-feather="edit" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-4  mt-3">
                            <label class="form-label">Template Used</label>
                            <input class="form-control" type="text" disabled value="{{ $document->template->title }}">
                        </div>
                        <div class="col-md-4  mt-3">
                            <label class="form-label">Employee</label>
                            <input class="form-control" type="text" disabled
                                value="{{ $document->user->first_name . ' ' . $document->user->surname }}">
                        </div>
                        <div class="col-md-4  mt-3">
                            <label class="form-label">Title Used</label>
                            <input class="form-control" type="text" name="title" disabled
                                value="{{ $document->title }}" />
                        </div>
                        <div class="col-md-12 mt-3 border p-3">
                            <strong>Content:</strong>

                            <textarea id="contentEditor" disabled>{{ $document->content }}</textarea>

                        </div>
                    </div>

                    <a href="{{ route('show.documents') }}" class="btn btn-secondary mt-4">Back to List</a>
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
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace('contentEditor', {
                    height: 700,
                });
            } else {
                console.error('CKEditor not loaded.');
            }
            if (typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace('content', {
                    height: 900,
                });
            } else {
                console.error('CKEditor not loaded.');
            }
        });
    </script>
@endpush
