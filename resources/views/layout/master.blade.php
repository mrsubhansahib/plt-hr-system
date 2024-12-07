<!DOCTYPE html>
<!--
Template Name: NobleUI - Laravel Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_laravel
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

    <title>NobleUI - Laravel Admin Dashboard Template</title>

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
    <!-- end plugin css -->


    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- end common css -->

    @stack('style')
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
    <!-- end common js -->

    {{-- date formate change --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    @push('plugin-scripts')
        <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    @endpush

    @stack('custom-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap Datepicker
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy', // Format for display
                autoclose: true, // Auto-close picker after date select
                todayHighlight: true // Highlight today's date
            });

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
    {{-- datatable search bar script --}}
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('.dataTableExample').DataTable({
                autoWidth: false // Prevent table from stretching
            });

            // Apply the search on each column
            $('.dataTableExample .filters input').on('keyup change', function() {
                let colIndex = $(this).parent().index(); // Get the column index
                table.column(colIndex).search(this.value).draw(); // Search and redraw the table
            });
        });
    </script> 
</body>

</html>
