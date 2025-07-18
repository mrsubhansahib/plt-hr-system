@extends('layout.master')

@push('style')
    @livewireStyles
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">Turnover Monthly</li>
        </ol>
    </nav>
    @livewire('turnover-monthly')
@endsection

@push('custom-scripts')
    @livewireScripts
    <script>

        document.addEventListener('livewire:load', function() {
            function initializeDataTable() {
                $('.reportDataTable').DataTable({
                    autoWidth: false,
                    paging: false,
                    searching: true,
                    lengthChange: false,
                    ordering: false,
                    info: true,
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel'],
                    initComplete: function() {
                        this.api().columns.adjust().draw();
                        $('table.reportDataTable td').css({
                            'padding': '5px 10px'
                        });
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
