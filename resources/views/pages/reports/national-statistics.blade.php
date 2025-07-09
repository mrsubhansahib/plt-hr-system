@extends('layout.master')

@push('style')
    @livewireStyles
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">National Statistics</li>
        </ol>
    </nav>
    @livewire('national-statistics')
@endsection

@push('custom-scripts')
    @livewireScripts
    <script>
        document.addEventListener('livewire:load', function () {
            function initTable() {
                $('.dataTableNationalStatistics').DataTable({
                    autoWidth: false,
                    paging: true,
                    searching: false,
                    ordering: false,
                    info: true,
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel'],
                    initComplete: function () {
                        this.api().columns.adjust().draw();
                        $('table.dataTableNationalStatistics td').css({ 'padding': '5px 0px' });
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
