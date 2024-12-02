@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Disclosure</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Disclosure Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.disclosure' , $disclosure->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control" required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ ($disclosure->user_id == $employee->id) ? 'selected' : '' }}>
                                            {{ $employee->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">DBS Level<span class="text-danger">*</span></label>
                                <select class="form-control" required name="dbs_level">
                                    <option value="" selected disabled>Select DBS Level</option>
                                    <option value="Enhanced" {{ ($disclosure->dbs_level == 'Enhanced') ? 'selected' : '' }}>Enhanced</option>
                                    <option value="Basic" {{ ($disclosure->dbs_level == 'Basic') ? 'selected' : '' }}>Basic</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date Requested<span class="text-danger">*</span></label>
                                <input class="form-control" type="date" required name="date_requested" value="{{ $disclosure->date_requested }}"/>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date on Certificate<span class="text-danger">*</span></label>
                                <input class="form-control" type="date" required name="date_on_certificate" value="{{ $disclosure->date_on_certificate }}"/>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Certificate Number<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="certificate_no" value="{{ $disclosure->certificate_no }}"/>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Paid Liberata</label>
                                <input type="text" class="form-control" name="paid_liberata"
                                    placeholder="Enter Paid Liberata" value="{{ $disclosure->paid_liberata }}">
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reimbursed Candidate</label>
                                <input type="text" class="form-control" name="reimbursed_candidate"
                                    placeholder="Enter Reimbursed Candidate" value="{{ $disclosure->reimbursed_candidate }}">
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Invoice Sent</label>
                                <select class="form-control" name="invoice_sent">
                                    <option value="" selected disabled>Select Option</option>
                                    <option value="yes" {{ ($disclosure->invoice_sent == 'yes') ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ ($disclosure->invoice_sent == 'no') ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Contract Type<span class="text-danger">*</span></label>
                                <select class="form-control" required name="contract_type">
                                    <option value="" selected disabled>Select Contract Type</option>
                                    <option value="Employee" {{ ($disclosure->contract_type == 'Employee') ? 'selected' : '' }}>Employee</option>
                                    <option value="Volunteer" {{ ($disclosure->contract_type == 'Volunteer') ? 'selected' : '' }}>Volunteer</option>
                                    <option value="Self Employed" {{ ($disclosure->contract_type == 'Self Employed') ? 'selected' : '' }}>Self Employed</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4">{{ $disclosure->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection