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
            $('.dataTableSicknesses').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                dom: 'Bfrtip',
                buttons: ['csv', 'excel'],
                initComplete: function () {
                    this.api().columns.adjust().draw();
                }
            });

            Livewire.hook('message.processed', (message, component) => {
                $('.dataTableSicknesses').DataTable().destroy();
                $('.dataTableSicknesses').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel'],
                    initComplete: function () {
                        this.api().columns.adjust().draw();
                    }
                });
            });
        });
    </script>
@endpush
