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
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">Disciplinary Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.disciplinaries') }}" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.disciplinary') }}" method="POST">
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
                                <label class="form-label">Reason for Disciplinary<span class="text-danger">*</span></label>
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
                                    <option value="Dismissal">Dismissal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Suspended<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="suspended" id="suspended">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3" id="date-suspended-container" style="display:none;">
                                <label class="form-label">Date Suspended<span class="text-danger">*</span></label>
                                <input class="form-control datepicker" required type="text" placeholder="Select Date"
                                    name="date_suspended" id="date_suspended" />
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
            }
        };
        toggleDateSuspended();
        suspendedDropdown.addEventListener('change', toggleDateSuspended);
    });
</script>