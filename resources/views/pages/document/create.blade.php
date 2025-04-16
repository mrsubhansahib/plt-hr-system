@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Document</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">Document Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.documents') }}" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.document') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-12 mt-3">
                                <label class="form-label">New Title<span class="text-danger">*</span></label>
                                <input class="form-control" required type="text" name="title" />
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="user_id" id="employeeSelect">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" data-surname="{{ $employee->surname }}">
                                        {{ $employee->first_name.' '.$employee->surname  }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Template<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="template_id" id="template">
                                    <option value="" selected disabled>Select Template</option>
                                    @foreach ($templates as $template)
                                    <option value="{{ $template->id }}">
                                        {{ $template->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
