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
                            <a href="{{ route('show.latenesses') }}"
                                class="btn btn-primary"><strong>List</strong><i data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
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
                                <label class="form-label">Lateness Triggered <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required name="lateness_triggered" />
                            </div>
                            
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Stage<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="lateness_stage">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Triggered Lateness">Triggered Lateness</option>
                                    <option value="Lateness A Counselling Interview">Lateness A Counselling Interview</option>
                                    <option value="Restart Lateness Procedure">Restart Lateness Procedure</option>
                                    <option value="Further Lateness">Further Lateness</option>
                                    <option value="Lateness Formal Interview"> Lateness Formal Interview</option>
                                    <option value="Other"> Other</option>
                                    @foreach ($dropdowns as $dropdown)
                                                @if ($dropdown->module_type == 'Lateness' && $dropdown->name == 'Lateness Stage')
                                                    <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                                @endif
                                            @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Level of Warning Issued<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="warning_level">
                                    <option value="" selected disabled>Select</option>
                                    <option value="NFA">NFA</option>
                                    <option value="Verbal Warning">Verbal Warning</option>
                                    <option value="Written Warning">Written Warning</option>
                                    <option value="Final Written Warning">Final Written Warning</option>
                                    <option value="Dismissal"> Dismissal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome / Action Taken<span class="text-danger">*</span></label>
                                <input class="form-control" required name="outcome" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required  name="review_date" />
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
