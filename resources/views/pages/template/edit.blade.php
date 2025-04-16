@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Template</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Template Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.template', $template->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 mt-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input class="form-control" required type="text" name="title" value="{{ $template->title }}" />
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label">Content<span class="text-danger">*</span></label>
                                <textarea class="form-control" required name="content" rows="10">{{ $template->content }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
