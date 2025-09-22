@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Capability</a></li>
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
                            <h4 class="py-2">Capability Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.capabilities') }}"
                                class="btn btn-primary"><strong>List</strong><i data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.capability') }}" method="POST">
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
                            <div class="col-md-3 mt-3">
                                <label class="form-label">On Capability Procedure</label>
                                <select class="form-control form-select" name="on_capability_procedure">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            @php
                                $capabilityStageDropdowns = collect($dropdowns)->where('module_type', 'Capability')->where('name', 'Capability Stage')->sortBy('value');
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Capability Stage</label>
                                <select class="form-control form-select" name="stage">
                                    <option value="" selected disabled>Select Stage</option>
                                    @foreach ($capabilityStageDropdowns as $dropdown)
                                        <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"  name="date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome</label>
                                <input class="form-control" type="text" name="outcome" 
                                    placeholder="Enter Outcome" />
                            </div>
                            @php
                                $capabilityStageDropdowns = collect($dropdowns)->where('module_type', 'Capability')->where('name', 'Warning Issued Type')->sortBy('value');
                            @endphp
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Warning Issued Type</label>
                                <select class="form-control form-select" name="warning_issued_type">
                                    <option value="" selected disabled>Select Warning Type</option>
                                    @foreach ($capabilityStageDropdowns as $dropdown)
                                        <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" name="review_date" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4" placeholder="Enter any additional details"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
