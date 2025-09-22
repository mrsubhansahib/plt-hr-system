@extends('layout.master')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <style>
        .heading {
            display: none;
        }

        #printContent {
            display: none !important;
            border: none;
            box-shadow: none;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }

        @media print {
            #app {
                display: none;
            }

            .heading {
                display: block;
            }

            #printContent {
                display: block !important;
            }
        }


        @page {
            size: A4;
            margin: 0.5in 0.5in 0.5in 1in;
        }
    </style>

@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">HR Checklist</li>
        </ol>
    </nav>
    @livewire('hr-checklist')
    <style>
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

        @media print {
            body * {
                visibility: hidden;
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
                /* Ensures full width */
                page-break-before: always;
            }
        }

        @page {
            size: A4;
            margin: 0.5in 0.5in 0.5in 1in;
        }
    </style>
@endsection

@push('custom-scripts')
    @livewireScripts
    <script>
        function printDiv(divId) {
            const printContents = document.getElementById(divId).innerHTML;
            const originalContents = document.body.innerHTML;

            // Replace body content with the section to print
            document.body.innerHTML = printContents;

            window.print(); // Trigger the print dialog

            // Restore original page content
            document.body.innerHTML = originalContents;
            location.reload(); // Optional: reload to rebind JS/CSS
        }
    </script>
    <script>
        document.addEventListener('livewire:load', function() {
            function initializeDataTable() {
                $('.reportDataTable').DataTable({
                    autoWidth: false,
                    paging: true,
                    searching: true,
                    ordering: false,
                    info: true,
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel'],
                    initComplete: function() {
                        this.api().columns.adjust().draw();

                    }
                });
            }
            Livewire.hook('message.processed', () => {
                $('.reportDataTable').DataTable().destroy();
                initializeDataTable();
            });

            initializeDataTable();
        });
    </script>
@endpush
