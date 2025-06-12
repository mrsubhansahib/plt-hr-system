@extends('layout.master')

@push('style')
    @livewireStyles
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">Left Colleagues</li>
        </ol>
    </nav>
    @livewire('left-colleagues')
@endsection

@push('custom-scripts')
    @livewireScripts
    <script>
        document.addEventListener('livewire:load', function() {
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
