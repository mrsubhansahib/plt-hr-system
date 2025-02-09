@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Disciplinary</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit
                
            </li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="my-4 text-center">Edit Disciplinary Details</h3>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.disciplinary', $disciplinary->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $disciplinary->user->first_name }}" disabled>
                                <input type="hidden" class="form-control" value="{{ $form_type }}" name="form_type" >

                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Reason for Disciplinary</label>
                                <input class="form-control" type="text" name="reason_for_disciplinary" value="{{ $disciplinary->reason_for_disciplinary }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Date of Hearing</label>
                                <input class="form-control datepicker" type="text" placeholder="Select Date"  name="hearing_date" value="{{ $disciplinary->hearing_date }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Outcome</label>
                                <select class="form-control form-select" name="outcome">
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
                                <select id="suspended" class="form-control form-select" name="suspended">
                                    <option value="yes" {{ ($disciplinary->suspended == 'yes') ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ ($disciplinary->suspended == 'no') ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3" id="date-suspended-container">
                                <label class="form-label">Date Suspended</label>
                                <input id="date_suspended" class="form-control datepicker" type="text" placeholder="Select Date" name="date_suspended" value="{{ $disciplinary->date_suspended }}" />
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const suspendedDropdown = document.getElementById('suspended');
        const dateSuspendedContainer = document.getElementById('date-suspended-container');
        const dateSuspendedField = document.getElementById('date_suspended');

        const toggleDateSuspended = () => {
            const isSuspended = suspendedDropdown.value === "yes";
            dateSuspendedContainer.style.display = isSuspended ? "block" : "none";
            if (isSuspended) {
                dateSuspendedField.setAttribute("required", "true");
            } else {
                dateSuspendedField.removeAttribute("required");
                dateSuspendedField.value = "";
            }
        };
        toggleDateSuspended();
        suspendedDropdown.addEventListener('change', toggleDateSuspended);
    });
</script>