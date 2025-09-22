@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Lateness</a></li>
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
                            <h4 class="py-2">Lateness Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.latenesses') }}" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.lateness') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="user_id" id="employeeSelect">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" data-surname="{{ $employee->surname }}">
                                            {{ $employee->first_name . ' ' . $employee->surname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Triggered</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="lateness_triggered" />
                            </div>

                            @php
                                $latenessStageDropdowns = collect($dropdowns)
                                    ->where('module_type', 'Lateness')
                                    ->where('name', 'Lateness Stage')
                                    ->sortBy('value');
                            @endphp
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Stage</label>
                                <select class="form-control form-select" name="lateness_stage">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($latenessStageDropdowns as $dropdown)
                                        <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @php
                                $warningLevelDropdowns = collect($dropdowns)
                                    ->where('module_type', 'Lateness')
                                    ->where('name', 'Level of Warning Issued')
                                    ->sortBy('value');
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Level of Warning Issued</label>
                                <select class="form-control form-select" name="warning_level">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($warningLevelDropdowns as $dropdown)
                                        <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome / Action Taken</label>
                                <input class="form-control" name="outcome" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="review_date" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
