<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

    <title>PLT HR System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.0/css/buttons.dataTables.min.css">
    <!-- end plugin css -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    @stack('plugin-styles')



    {{-- date formate change --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <!-- common css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- end common css -->

    @stack('style')
    <style>
        .datepicker {
            padding: 7px !important;
        }
    </style>
</head>

<body data-base-url="{{ url('/') }}">

    <script src="{{ asset('assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        @include('layout.sidebar')
        <div class="page-wrapper">
            @include('layout.header')
            <div class="page-content">
                @yield('content')
            </div>
            @include('layout.footer')
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.2.0/js/dataTables.buttons.min.js"></script>

    <!-- JSZip (for Excel export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>

    <!-- DataTables Buttons for Excel, CSV, etc. -->
    <script src="https://cdn.datatables.net/buttons/2.2.0/js/buttons.html5.min.js"></script>
    @stack('custom-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap Datepicker
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy', // Format for display
            autoclose: true, // Auto-close picker after date select
            todayHighlight: true // Highlight today's date
        }).on('changeDate', function () {
            calculateAge(); // Trigger age calculation when date is selected
        });
    });

    // Age Calculator Function
    function calculateAge() {
        const dobInput = document.getElementById('dob').value;

        // Parse DOB in the same format
        const parts = dobInput.split('-');
        const dob = new Date(parts[2], parts[1] - 1, parts[0]); // Convert dd-mm-yyyy to Date object
        const today = new Date();

        // Validate if DOB is valid
        if (isNaN(dob)) {
            document.getElementById('age').value = "Invalid Date!";
            return;
        }

        // Calculate age
        const diffInMilliseconds = today - dob;
        const ageDate = new Date(diffInMilliseconds);
        const years = Math.abs(ageDate.getUTCFullYear() - 1970);

        // Display the result
        document.getElementById('age').value = `${years} years`;
    }

            // Get all forms with the class 'forms-sample'
            let forms = document.querySelectorAll('.forms-sample');

            forms.forEach(function(form) {
                let isFormDirty = false;

                // Track changes in each form
                form.addEventListener('change', function() {
                    isFormDirty = true;
                });

                // Show warning alert when navigating away
                window.addEventListener('beforeunload', function(e) {
                    if (isFormDirty) {
                        // Modern browsers display a default message in the alert
                        e.preventDefault();
                        e.returnValue = ''; // Required for Chrome, Safari, and Edge
                    }
                });

                // Reset the flag when the form is submitted
                form.addEventListener('submit', function() {
                    isFormDirty = false;
                });
            });
        });
    </script>
    <script>
        function validatePassword() {
            const password = document.getElementById("password").value;
            const hint = document.getElementById("password-hint");
            const checks = [{
                    valid: password.length >= 8,
                    message: "Minimum 8 characters"
                },
                {
                    valid: /[0-9]/.test(password),
                    message: "At least one number"
                },
                {
                    valid: /[!@#$%^&*(),.?":{}|<>]/.test(password),
                    message: "At least one special character"
                },
                {
                    valid: /[A-Z]/.test(password),
                    message: "At least one uppercase letter"
                },
            ];
            const unmetCondition = checks.find(check => !check.valid);
            if (unmetCondition) {
                hint.innerHTML = `<span style="color: red;">✘ ${unmetCondition.message}</span>`;
            } else {
                hint.innerHTML = '<span style="color: green;">✔ Password is strong</span>';
            }
        }

        function checkPasswordComplexity() {
            const password = document.getElementById("password").value;
            const isPasswordValid = password.length >= 8 &&
                /[0-9]/.test(password) &&
                /[!@#$%^&*(),.?":{}|<>]/.test(password) &&
                /[A-Z]/.test(password);
            if (!isPasswordValid) {
                alert("Password must meet all complexity requirements before submission.");
                return false;
            }
            return true;
        }
    </script>







    <script>
        $(document).ready(function() {
            // Initialize the DataTable with optimized options
            var table = $('.dataTableExample').DataTable({
                autoWidth: false, // Prevent table from stretching
                paging: true, // Enable pagination
                searching: true, // Enable column search
                ordering: true, // Enable sorting on columns
                info: true,
                dom: 'Bfrtip', // Add the buttons above the table
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
                    $('table.dataTableExample td').css({
                        'padding': '5px 0px'
                    });
                }
            });

            // Apply the column-wise search functionality
            $('.dataTableExample .filters input').on('keyup change', function() {
                var colIndex = $(this).parent().index(); // Get column index
                table.column(colIndex).search(this.value).draw(); // Search and redraw table
            });

            // Style the 'No records found' message for better visibility
            $('.dataTables_empty').css({
                'text-align': 'center', // Center the 'No records found' message
                'padding': '20px 0', // Add padding to balance the space
            });

            // Optional: Style the column search input for consistency
            $('.dataTableExample .filters input').css({
                'padding': '10px', // Make the search inputs uniform
            });
        });
    </script>


</body>

</html>
