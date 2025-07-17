@extends('layout.master')
@push('style')
    @livewireStyles

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-container--bootstrap4 .select2-selection {
            box-shadow: none !important;
        }

        .select2-container--default .select2-selection--single {
            height: 37px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {

            top: 6px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-top: 5px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            display: none;
        }

        /* Make Select2 match Bootstrap form-control */
        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(2.25rem + 2px);
            /* same as .form-control */
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .select2-container--bootstrap4 .select2-selection--single:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        /* Fix arrow height alignment */
        .select2-container--bootstrap4 .select2-selection__arrow {
            height: 100% !important;
        }

        /* Remove double border caused by default Bootstrap select + Select2 */
        select.form-select,
        select.form-control {
            display: none !important;
        }
    </style>
@endpush
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function initSelect2() {
            $('select[wire\\:model]').each(function() {
                let el = $(this);
                if (!el.hasClass("select2-hidden-accessible")) {
                    el.select2({
                        width: '100%',
                        theme: 'bootstrap4',
                        placeholder: el.data('placeholder') || 'Select an option',
                        allowClear: true
                    });

                    // Sync change to Livewire
                    el.on('change', function(e) {
                        let model = el.attr('wire:model');
                        let componentId = el.closest('[wire\\:id]').attr('wire:id');
                        if (model && componentId) {
                            Livewire.find(componentId).set(model, e.target.value);
                        }
                    });
                }
            });
        }

        document.addEventListener("livewire:load", function() {
            initSelect2();

            Livewire.hook('message.processed', (message, component) => {
                initSelect2();
            });
        });
    </script>
@endpush
