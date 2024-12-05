@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Lateness</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Lateness Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.lateness', $lateness->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control" required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ ($lateness->user_id == $employee->id) ? 'selected' : '' }}>
                                            {{ $employee->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Triggered</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"  name="lateness_triggered" value="{{ $lateness->lateness_triggered }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Stage</label>
                                <select class="form-control"  name="lateness_stage">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Triggered Lateness" {{ ($lateness->lateness_stage == 'Triggered Lateness') ? 'selected' : '' }}>Triggered Lateness</option>
                                    <option value="Lateness A Counselling Interview" {{ ($lateness->lateness_stage == 'Lateness A Counselling Interview') ? 'selected' : '' }}>Lateness A Counselling Interview</option>
                                    <option value="Restart Lateness Procedure" {{ ($lateness->lateness_stage == 'Restart Lateness Procedure') ? 'selected' : '' }}>Restart Lateness Procedure</option>
                                    <option value="Further Lateness" {{ ($lateness->lateness_stage == 'Further Lateness') ? 'selected' : '' }}>Further Lateness</option>
                                    <option value="Lateness Formal Interview" {{ ($lateness->lateness_stage == 'Lateness Formal Interview') ? 'selected' : '' }}> Lateness Formal Interview</option>
                                    <option value="Other" {{ ($lateness->lateness_stage == 'Dismissal') ? 'Other' : '' }}> Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Level of Warning Issued</label>
                                <select class="form-control"  name="warning_level">
                                    <option value="" selected disabled>Select</option>
                                    <option value="NFA" {{ ($lateness->warning_level == 'NFA') ? 'selected' : '' }}>NFA</option>
                                    <option value="Verbal Warning" {{ ($lateness->warning_level == 'Verbal Warning') ? 'selected' : '' }}>Verbal Warning</option>
                                    <option value="Written Warning" {{ ($lateness->warning_level == 'Written Warning') ? 'selected' : '' }}>Written Warning</option>
                                    <option value="Final Written Warning" {{ ($lateness->warning_level == 'Final Written Warning') ? 'selected' : '' }}>Final Written Warning</option>
                                    <option value="Dismissal" {{ ($lateness->warning_level == 'Dismissal') ? 'selected' : '' }}> Dismissal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome / Action Taken</label>
                                <input class="form-control" type="text" name="outcome" value="{{ $lateness->outcome }}" />
                            </div>
                            
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"  name="review_date" value="{{ $lateness->review_date }}" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4">{{ $lateness->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
