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
                    <h3 class="my-4 text-center">Lateness Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.lateness') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Triggered </label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"  name="lateness_triggered" />
                            </div>
                            
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Stage</label>
                                <select class="form-control form-select"  name="lateness_stage">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Triggered Lateness">Triggered Lateness</option>
                                    <option value="Lateness A Counselling Interview">Lateness A Counselling Interview</option>
                                    <option value="Restart Lateness Procedure">Restart Lateness Procedure</option>
                                    <option value="Further Lateness">Further Lateness</option>
                                    <option value="Lateness Formal Interview"> Lateness Formal Interview</option>
                                    <option value="Other"> Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Level of Warning Issued</label>
                                <select class="form-control form-select"  name="warning_level">
                                    <option value="" selected disabled>Select</option>
                                    <option value="NFA">NFA</option>
                                    <option value="Verbal Warning">Verbal Warning</option>
                                    <option value="Written Warning">Written Warning</option>
                                    <option value="Final Written Warning">Final Written Warning</option>
                                    <option value="Dismissal"> Dismissal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome / Action Taken</label>
                                <input class="form-control"  name="outcome" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"  name="review_date" />
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
