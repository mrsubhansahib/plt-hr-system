@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Template</a></li>
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
                            <h4 class="py-2">Template Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.templates') }}" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.template') }}" method="POST">
                        @csrf
                        <div class="col-12 mt-3">
                            <label class="form-label">Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" required />
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Content<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="content" required rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
