@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sickness</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    {{-- <h3 class="card-title">Personal Details</h3> --}}
                    <h3 class="my-4 text-center">Edit Sickness Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.sickness', $sickness->id) }}" method="POST">
                        @csrf
                        <!-- Personal Details -->
                        <!-- Hidden input for the foreign key -->
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $sickness->user->first_name }}"
                                    disabled>
                                <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type">

                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Absence <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="reason_for_absence"
                                    value="{{ $sickness->reason_for_absence }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">date_from <span class="text-danger">*</span></label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date" required
                                    name="date_from"
                                    value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $sickness->date_from)->format('d-m-Y') }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Total Hours</label>
                                <input class="form-control" type="text" name="total_hours"
                                    value="{{ $sickness->total_hours }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Self Certification Form Received</label>
                                <select class="form-control form-select" name="certification_form_received">
                                    <option value="yes"
                                        {{ $sickness->certification_form_received == 'yes' ? 'selected' : '' }}>yes</option>
                                    <option value="no"
                                        {{ $sickness->certification_form_received == 'no' ? 'selected' : '' }}>no</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Fit Note Received</label>
                                <select class="form-control form-select" name="fit_note_received">
                                    <option value="yes {{ $sickness->fit_note_received == 'yes' ? 'selected' : '' }}">yes
                                    </option>
                                    <option value="no" {{ $sickness->fit_note_received == 'no' ? 'selected' : '' }}>no
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date To</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"
                                    name="date_to"
                                    value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $sickness->date_to)->format('d-m-Y') }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4" cols="4">{{ $sickness->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
