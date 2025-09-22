@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Lateness</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Edit Lateness Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.lateness', $lateness->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $lateness->user->first_name }}"
                                    disabled>
                                <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type">

                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Triggered</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="lateness_triggered" value="{{ $lateness->lateness_triggered }}" />
                            </div>
                            @php
                                // Collect lateness stage options, ensuring uniqueness and sorting alphabetically
                                $latenessStages = collect($dropdowns)
                                    ->where('module_type', 'Lateness')
                                    ->where('name', 'Lateness Stage')
                                    ->pluck('value')
                                    ->unique()
                                    ->sort()
                                    ->values();
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Stage</label>
                                <select class="form-control form-select" name="lateness_stage">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($latenessStages as $stage)
                                        <option value="{{ $stage }}"
                                            {{ isset($lateness->lateness_stage) && $lateness->lateness_stage == $stage ? 'selected' : '' }}>
                                            {{ $stage }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @php
                                $warningLevels = collect($dropdowns)
                                    ->where('module_type', 'Lateness')
                                    ->where('name', 'Level of Warning Issued')
                                    ->pluck('value')
                                    ->unique()
                                    ->sort()
                                    ->values();
                            @endphp
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Level of Warning Issued</label>
                                <select class="form-control form-select" name="warning_level">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($warningLevels as $level)
                                        <option value="{{ $level }}"
                                            {{ isset($lateness->warning_level) && $lateness->warning_level == $level ? 'selected' : '' }}>
                                            {{ $level }}
                                        </option>
                                    @endforeach   
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome / Action Taken</label>
                                <input class="form-control" type="text" name="outcome"
                                    value="{{ $lateness->outcome }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="review_date" value="{{ $lateness->review_date }}" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4">{{ $lateness->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
