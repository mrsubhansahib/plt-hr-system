@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Lateness</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Edit Lateness Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.lateness', $lateness->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $lateness->user->first_name }}"
                                    disabled>
                                <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type">

                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Triggered<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" required type="text" placeholder="Select Date"
                                    name="lateness_triggered" value="{{ $lateness->lateness_triggered }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Lateness Stage<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="lateness_stage">
                                    <option value="" selected disabled>Select</option>
                                    <!-- Dynamic Options -->
                                    @foreach ($dropdowns as $dropdown)
                                        @if ($dropdown->module_type == 'Lateness' && $dropdown->name == 'Lateness Stage')
                                            <option value="{{ $dropdown->value }}"
                                                {{ $lateness->lateness_stage == $dropdown->value ? 'selected' : '' }}>
                                                {{ $dropdown->value }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Level of Warning Issued<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="warning_level">
                                    <option value="" selected disabled>Select</option>
                                    <option value="NFA" {{ $lateness->warning_level == 'NFA' ? 'selected' : '' }}>NFA
                                    </option>
                                    <option value="Verbal Warning"
                                        {{ $lateness->warning_level == 'Verbal Warning' ? 'selected' : '' }}>Verbal
                                        Warning</option>
                                    <option value="Written Warning"
                                        {{ $lateness->warning_level == 'Written Warning' ? 'selected' : '' }}>Written
                                        Warning</option>
                                    <option value="Final Written Warning"
                                        {{ $lateness->warning_level == 'Final Written Warning' ? 'selected' : '' }}>Final
                                        Written Warning</option>
                                    <option value="Dismissal"
                                        {{ $lateness->warning_level == 'Dismissal' ? 'selected' : '' }}> Dismissal
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome / Action Taken<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="outcome"
                                    value="{{ $lateness->outcome }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Review Date<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" required type="text" placeholder="Select Date"
                                    name="review_date" value="{{ $lateness->review_date }}" />
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
