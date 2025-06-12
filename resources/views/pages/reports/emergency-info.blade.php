@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <style>
        label {
            font-weight: 500;
        }
    </style>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">Emergency Info</li>
        </ol>
    </nav>
    @livewire('emergency-info')
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
    </style>
@endsection

@push('custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @livewireScripts
    <script>
        document.addEventListener('livewire:load', function() {
            function initSelect2Sync() {
                $('#emergency_info').select2({
                    width: '100%',
                    placeholder: 'Select an employee',
                    allowClear: true
                });

                $('#emergency_info').on('change', function(e) {
                    const value = $(this).val();
                    let livewireComponent = Livewire.find(document.querySelector('[wire\\:id]')
                        .getAttribute('wire:id'));
                    livewireComponent.set('employee_id', value);
                });
            }

            initSelect2Sync();
            // Initialize the DataTable with optimized options
            var table = $('.dataTableColleagues').DataTable({
                autoWidth: false, // Prevent table from stretching
                paging: true, // Enable pagination
                searching: true, // Enable column search
                ordering: true, // Enable sorting on columns
                info: true,
                dom: 'Bfrtip', // Add the buttons above the table
                ordering: false, // Disable default column sorting
                buttons: [
                    'csv', // CSV export
                    'excel', // Excel export
                    // You can also add other buttons like 'pdf', 'copy', etc.
                ],
                initComplete: function() {
                    // Fix table layout after initialization
                    var table = this.api();
                    table.columns.adjust().draw();
                    // Ensure consistent padding across cells
                    $('table.dataTableColleagues td').css({
                        'padding': '5px 0px'
                    });
                }
            });
            Livewire.hook('message.processed', (message, component) => {
                $('.dataTableColleagues').DataTable().destroy();

                $('#emergency_info').select2('destroy');
                initSelect2Sync();
                // Initialize the DataTable with optimized options
                var table = $('.dataTableColleagues').DataTable({
                    autoWidth: false, // Prevent table from stretching
                    paging: true, // Enable pagination
                    searching: true, // Enable column search
                    ordering: true, // Enable sorting on columns
                    info: true,
                    dom: 'Bfrtip', // Add the buttons above the table
                    ordering: false, // Disable default column sorting
                    buttons: [
                        'csv', // CSV export
                        'excel', // Excel export
                        // You can also add other buttons like 'pdf', 'copy', etc.
                    ],
                    initComplete: function() {
                        // Fix table layout after initialization
                        var table = this.api();
                        table.columns.adjust().draw();
                        // Ensure consistent padding across cells
                        $('table.dataTableColleagues td').css({
                            'padding': '5px 0px'
                        });
                    }
                });


            });

            // Apply the column-wise search functionality
            $('.dataTableColleagues .filters input').on('keyup change', function() {
                var colIndex = $(this).parent().index(); // Get column index
                table.column(colIndex).search(this.value).draw(); // Search and redraw table
            });

            // Style the 'No records found' message for better visibility
            $('.dataTableColleagues').css({
                'text-align': 'center', // Center the 'No records found' message
                'padding': '20px 0', // Add padding to balance the space
            });

            // Optional: Style the column search input for consistency
            $('.dataTableColleagues .filters input').css({
                'padding': '10px', // Make the search inputs uniform
            });
        });
    </script>
@endpush
