@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Document</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">Document List</h4>
                        </div>
                        <div>
                            <a href="{{ route('create.document') }}" class="btn btn-primary"><strong>Create</strong><i
                                    data-feather="bookmark" class="ms-2"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table dataTableExample">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Employee</th>
                                    <th>Created At</th>    
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                <!-- Search inputs row -->
                                <tr class="filters">
                                    <th><input type="text" class="form-control form-control-sm" placeholder="Search Title">
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search User"></th> 
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Created At"></th>
                                    <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Updated At"></th>
                                    <!-- <th><input type="text" class="form-control form-control-sm"
                                            placeholder="Search Certification No"></th> -->
                                    <th></th> <!-- No search for Action column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $key => $document)
                                    <tr>
                                        <td>{{ $document->title }}</td>
                                        <td>{{ $document->user->first_name.' '.$document->user->surname }}</td>
                                        <td>{{ $document->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $document->updated_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0" type="button"
                                                    id="dropdownMenuButton-{{ $document->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="align-justify"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton-{{ $document->id }}">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('detail.document', $document->id) }}">View</a>
                                                    </li>
                                                    @if (auth()->user()->role == 'super_admin')
                                                        <li>
                                                            <button
                                                                onclick="if(confirm('Are you sure you want to delete this document?')) { window.location.href='{{ route('delete.document', $document->id) }}' }"
                                                                class="dropdown-item">Delete</button>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush
