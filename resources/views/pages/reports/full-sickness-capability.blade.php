@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <style>
        label {
            font-weight: 500;
        }

        .select2-container--default .select2-selection--single {
            height: 37px !important;
        }

        .select2-selection__arrow {
            top: 6px !important;
        }

        .select2-selection__rendered {
            padding-top: 5px !important;
        }

        .select2-selection__clear {
            display: none !important;
        }

        @media print {
            body * {
                visibility:visible;
            }

            #printSection,
            #printSection * {
                visibility: visible;
            }

            #printSection {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                page-break-before: always;
            }
        }

        @page {
            size: A4;
            margin: 1in;
        }
    </style>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">Full Sickness Capability</li>
        </ol>
    </nav>
    @livewire('full-sickness-capability')
@endsection

@push('custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    @livewireScripts
    <script>
        function printDiv(divId) {
            const printContents = document.getElementById(divId).innerHTML;
            console.log(printContents);
            const originalContents = document.body.innerHTML;
            console.log(originalContents);
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

        document.addEventListener('livewire:load', function() {
            function initSelect2Sync() {
                $('#emergency_info').select2({
                    width: '100%',
                    placeholder: 'Select an employee',
                    allowClear: true
                });

                $('#emergency_info').on('change', function() {
                    const value = $(this).val();
                    let livewireComponent = Livewire.find(document.querySelector('[wire\\:id]')
                        .getAttribute('wire:id'));
                    livewireComponent.set('employee_id', value);
                });
            }

            initSelect2Sync();
            Livewire.hook('message.processed', () => {
                $('#emergency_info').select2('destroy');
                initSelect2Sync();
            });
        });
    </script>
@endpush
