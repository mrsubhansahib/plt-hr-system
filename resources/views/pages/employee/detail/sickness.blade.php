@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sickness</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
@include('layout.alert')
<div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    {{-- <h3 class="card-title">Personal Details</h3> --}}
                    <h3 class="my-4 text-center">Sickness Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.new.sickness') }}" method="POST">
                        @csrf
                        <!-- Personal Details -->
                        <!-- Hidden input for the foreign key -->
                        <input type="hidden" name="user_id" value="">
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $employee->first_name }}"  disabled>
                                <input type="hidden" class="form-control" value="{{ $employee->id }}" name="user_id" >
                                <input type="hidden" class="form-control" value="{{ $user_id }}" name="user_id" >

                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Absence <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="reason_for_absence" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">date_from <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="date_from" />
                            </div>
                            
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Total Hours</label>
                                <input class="form-control" type="text" name="total_hours" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Self Certification Form Received</label>
                                <select class="form-control form-select" name="certification_form_received">
                                    <option value="yes">yes</option>
                                    <option selected value="no">no</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Fit Note Received</label>
                                <select class="form-control form-select" name="fit_note_received">
                                    <option value="yes">yes</option>
                                    <option selected value="no">no</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date To <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="date_to" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4" cols="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
