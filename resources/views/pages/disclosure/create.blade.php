@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Disclosure</a></li>
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
                            <h4 class="py-2">Disclosure Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.disclosures') }}" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.disclosure') }}" method="POST">
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
                                <label class="form-label">DBS Level<span class="text-danger">*</span></label>
                                <select class="form-contro form-select" required name="dbs_level">
                                    <option value="" selected disabled>Select DBS Level</option>
                                    <option value="Enhanced">Enhanced</option>
                                    <option value="Basic">Basic</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date Requested<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required
                                    name="date_requested" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date on Certificate</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="date_on_certificate" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Certificate Number</label>
                                <input class="form-control" type="text" name="certificate_no" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Paid Liberata</label>
                                <select class="form-control form-select" name="paid_liberata">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reimbursed Candidate</label>
                                <input type="text" class="form-control" name="reimbursed_candidate"
                                    placeholder="Enter Reimbursed Candidate">
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Invoice Sent</label>
                                <select class="form-control form-select" name="invoice_sent">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contract Type<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="contract_type">
                                    <option value="" selected disabled>Select Contract Type</option>
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Disclosure' && $dropdown->name == 'Contract Type')
                                            <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
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
