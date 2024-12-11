@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Disciplinary</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Disciplinary Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.disciplinary') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Disciplinary<span class="text-danger">*</span> </label>
                                <input class="form-control" type="text" required name="reason_for_disciplinary" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date of Hearing<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" required type="text" placeholder="Select Date"
                                    name="hearing_date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="outcome">
                                    <option value="" selected disabled>Select</option>
                                    <option value="NFA">NFA</option>
                                    <option value="Verbal Warning">Verbal Warning</option>
                                    <option value="Written Warning">Written Warning</option>
                                    <option value="Final Written Warning">Final Written Warning</option>
                                    <option value="Dismissal"> Dismissal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Suspended<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="suspended">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date Suspended<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" required type="text" placeholder="Select Date"
                                    name="date_suspended" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes<span class="text-danger">*</span></label>
                                <textarea class="form-control" required name="notes" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

