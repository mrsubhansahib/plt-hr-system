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
                    <h3 class="my-4 text-center">Capability</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.new.capability') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $employee->first_name }}"  disabled>
                                <input type="hidden" class="form-control" value="{{ $employee->id }}" name="user_id" >
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">On Capability Procedure</label>
                                <select class="form-control form-select" required name="on_capability_procedure">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Capability Stage<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="stage">
                                    <option value="" selected disabled>Select Stage</option>
                                    <option value="Triggered Capability">Triggered Capability</option>
                                    <option value="Capability A Counselling Interview">Capability A Counselling Interview</option>
                                    <option value="Restart Capability Procedure">Restart Capability Procedure</option>
                                    <option value="Further Sickness">Further Sickness</option>
                                    <option value="Long Term Sickness Counselling Interview">Long Term Sickness Counselling Interview</option>
                                    <option value="Long Term Sickness Review">Long Term Sickness Review</option>
                                    <option value="Capability Formal Interview">Capability Formal Interview</option>
                                    <option value="Other">Other </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="date" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="outcome" 
                                    placeholder="Enter Outcome" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Warning Issued Type<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="warning_issued_type">
                                    <option value="" selected disabled>Select Warning Type</option>
                                    <option value="Verbal Warning">Verbal Warning</option>
                                    <option value="Written Warning">Written Warning</option>
                                    <option value="Final Written Warning">Final Written Warning</option>
                                    <option value="Dismissal">Dismissal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="review_date" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes<span class="text-danger">*</span></label>
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
