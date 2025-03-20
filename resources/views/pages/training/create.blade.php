@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Training</a></li>
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
                            <h4 class="py-2">Training Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.trainings') }}"
                                class="btn btn-primary"><strong>List</strong><i data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.training') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
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
                            @php
                                $trainingTitleDropdowns = collect($dropdowns)->where('module_type', 'Training')->where('name', 'Training Course Titles')->sortBy('value');
                            @endphp
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Training Title</label>
                                <select class="form-control form-select" name="training_title">
                                    <option value="" selected disabled>Select Training Title</option>
                                    @foreach ($trainingTitleDropdowns as $dropdown)
                                        <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Course Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="course_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Renewal Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="renewal_date" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" placeholder="Enter Training Details" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
