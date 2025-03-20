@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dropdowns</a></li>
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
                            <h4 class="py-2">Add New Dropdown</h4>
                        </div>
                        {{-- <div>
                            <a href="" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div> --}}
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.dropdown') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <!-- Module Type -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Module Type<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="module_type" id="moduleType">
                                    <option value="" selected disabled>Select Module Type</option>
                                    <option value="User">User</option>
                                    <option value="Job">Job</option>
                                    <option value="Capability">Capability</option>
                                    <option value="Lateness">Lateness</option>
                                    <option value="Training">Training</option>
                                </select>
                            </div>
                            <!-- Dropdown Name -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="name" id="dropdownName">
                                    <option value="" selected disabled>Select Dropdown Name</option>
                                    <option value="Ethnicity">Ethnicity</option>
                                    <option value="Facility">Facility</option>
                                    <option value="Title">Title</option>
                                    <option value="Contract Type">Contract Type</option>
                                    <!-- <option value="Equipment Required">Equipment Required</option> -->
                                    <option value="Capability Stage">Capability Stage</option>
                                    <option value="Lateness Stage">Lateness Stage</option>
                                    <option value="Training Course Titles">Training Course Titles</option>
                                </select>
                            </div>
                            <!-- Dropdown Value -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Value" required name="value" />
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
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the dropdowns
        const moduleTypeSelect = document.getElementById('moduleType');
        const dropdownNameSelect = document.getElementById('dropdownName');
        // Define options for each Module Type
        const moduleOptions = {
            User: ['Ethnicity'],
            Job: ['Title', 'Facility', 'Contract Type'],
            Capability: ['Capability Stage'],
            Lateness: ['Lateness Stage'],
            Training: ['Training Course Titles'],
        };
        // Event listener for Module Type selection
        moduleTypeSelect.addEventListener('change', function () {
            const selectedModule = moduleTypeSelect.value;
            // Clear existing options in Dropdown Name
            dropdownNameSelect.innerHTML = '<option value="" selected disabled>Select Dropdown Name</option>';
            // Populate options based on selected Module Type
            if (moduleOptions[selectedModule]) {
                moduleOptions[selectedModule].forEach(option => {
                    const newOption = document.createElement('option');
                    newOption.value = option;
                    newOption.textContent = option;
                    dropdownNameSelect.appendChild(newOption);
                });
            }
        });
    });
</script>