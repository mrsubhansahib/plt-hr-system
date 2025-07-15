@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Training </a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Edit Training </h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.training', $training->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $training->user->first_name }}"
                                    disabled>
                                <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type">
                            </div>
                            @php
                                // Collect training title options, ensuring uniqueness and sorting alphabetically
                                $trainingTitles = collect($dropdowns)
                                    ->where('module_type', 'Training')
                                    ->where('name', 'Training Course Titles')
                                    ->pluck('value')
                                    ->unique()
                                    ->sort()
                                    ->values();
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Training Title</label>
                                <select class="form-control form-select" name="training_title">
                                    <option value="" selected disabled>Select Training Title</option>
                                    @foreach ($trainingTitles as $title)
                                        <option value="{{ $title }}" {{ isset($training->training_title) && $training->training_title == $title ? 'selected' : '' }}>
                                            {{ $title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Course Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="course_date" value="{{ $training->course_date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Renewal Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="renewal_date" value="{{ $training->renewal_date }}" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" placeholder="Enter Training Details" rows="4">{{ $training->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
