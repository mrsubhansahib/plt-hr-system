@extends('layout.master')

@push('style')
    @livewireStyles
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">Current Colleagues by Type</li>
        </ol>
    </nav>
    @livewire('colleague-terms')
     <style>
        td {
            white-space: wrap !important;
            word-wrap: break-word !important
        }
    </style>
@endsection

@push('custom-scripts')
    @livewireScripts
    
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
