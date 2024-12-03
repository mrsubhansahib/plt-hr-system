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
                    <form class="forms-sample" action="{{ route('update.disciplinary', $disciplinary->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <select class="form-control" required name="user_id">
                                    <option value="" selected disabled>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ ($disciplinary->user_id == $employee->id) ? 'selected' : '' }}>
                                            {{ $employee->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Disciplinary</label>
                                <input class="form-control" type="text"  name="reason_for_disciplinary" value="{{ $disciplinary->reason_for_disciplinary }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date of Hearing</label>
                                <input class="form-control" type="date"  name="hearing_date" value="{{ $disciplinary->hearing_date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome</label>
                                <select class="form-control"  name="outcome">
                                    <option value="" selected disabled>Select</option>
                                    <option value="NFA" {{ ($disciplinary->outcome == 'NFA') ? 'selected' : '' }}>NFA</option>
                                    <option value="Verbal Warning" {{ ($disciplinary->outcome == 'Verbal Warning') ? 'selected' : '' }}>Verbal Warning</option>
                                    <option value="Written Warning" {{ ($disciplinary->outcome == 'Written Warning') ? 'selected' : '' }}>Written Warning</option>
                                    <option value="Final Written Warning" {{ ($disciplinary->outcome == 'Final Written Warning') ? 'selected' : '' }}>Final Written Warning</option>
                                    <option value="Dismissal" {{ ($disciplinary->outcome == 'Dismissal') ? 'selected' : '' }}> Dismissal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Suspended</label>
                                <select class="form-control" name="suspended">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes" {{ ($disciplinary->suspended == 'yes') ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ ($disciplinary->suspended == 'no') ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date Suspended</label>
                                <input class="form-control" type="date" name="date_suspended" value="{{ $disciplinary->date_suspended }}" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="4">{{ $disciplinary->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
