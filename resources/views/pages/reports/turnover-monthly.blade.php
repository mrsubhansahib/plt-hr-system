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
        document.addEventListener('livewire:load', function () {
            function initTable() {
                $('.dataTableNationalStatistics').DataTable({
                    autoWidth: false,
                    paging: false,
                    searching: false,
                    ordering: false,
                    info: false,
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel'],
                    initComplete: function () {
                        this.api().columns.adjust().draw();
                        $('table.dataTableNationalStatistics td').css({ 'padding': '5px 10px' });
                    }
                });
            }

            Livewire.hook('message.processed', () => {
                $('.dataTableNationalStatistics').DataTable().destroy();
                initTable();
            });

            initTable();
        });
    </script>
@endpush
