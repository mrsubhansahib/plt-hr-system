@extends('layout.master')

@push('style')
    @livewireStyles
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sickness Indicator</li>
        </ol>
    </nav>
    @livewire('sickness-indicator')
@endsection

@push('custom-scripts')
    @livewireScripts
    <script>
        document.addEventListener('livewire:load', function () {
            function initTable() {
                var table = $('.dataTableSickness').DataTable({
                    autoWidth: true,
                    paging: true,
                    searching: true,
                    ordering: false,
                    info: true,
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel'],
                    scrollX: true,
                    initComplete: function () {
                        this.api().columns.adjust().draw();
                        $('table.dataTableSickness td').css(
                            'white-space', 'nowrap'
                        );
                    }
                });
            }

            initTable();

            Livewire.hook('message.processed', () => {
                let $table = $('.dataTableSickness');
                if ($.fn.dataTable.isDataTable($table)) {
                    $table.DataTable().destroy();
                }
                initTable();
            });

            $('.dataTableSickness .filters input').on('keyup change', function () {
                var colIndex = $(this).parent().index();
                $('.dataTableSickness').DataTable().column(colIndex).search(this.value).draw();
            });
        });
    </script>
@endpush
