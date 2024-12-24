@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dropdowns</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <h4 class="py-2">Edit Dropdown</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.dropdowns') }}" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.dropdown', $dropdown->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <!-- Module Type -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Module Type<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="module_type" id="moduleType">
                                    <option value="" selected disabled>Select Module Type</option>
                                    <option value="User" {{ $dropdown->module_type == 'User' ? 'selected' : '' }}>User</option>
                                    <option value="Job" {{ $dropdown->module_type == 'Job' ? 'selected' : '' }}>Job</option>
                                    <option value="Capability" {{ $dropdown->module_type == 'Capability' ? 'selected' : '' }}>Capability</option>
                                    <option value="Lateness" {{ $dropdown->module_type == 'Lateness' ? 'selected' : '' }}>Lateness</option>
                                    <option value="Training" {{ $dropdown->module_type == 'Training' ? 'selected' : '' }}>Training</option>
                                </select>
                            </div>
                            <!-- Dropdown Name -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="name" id="dropdownName">
                                    <option value="" selected disabled>Select Dropdown Name</option>
                                    <option value="Ethnicity" {{ $dropdown->name == 'Ethnicity' ? 'selected' : '' }}>Ethnicity</option>
                                    <option value="Facility" {{ $dropdown->name == 'Facility' ? 'selected' : '' }}>Facility</option>
                                    <option value="Job Title" {{ $dropdown->name == 'Job Title' ? 'selected' : '' }}>Job Title</option>
                                    <option value="Contract Type" {{ $dropdown->name == 'Contract Type' ? 'selected' : '' }}>Contract Type</option>
                                    <option value="Equipment Required" {{ $dropdown->name == 'Equipment Required' ? 'selected' : '' }}>Equipment Required</option>
                                    <option value="Capability Stage" {{ $dropdown->name == 'Capability Stage' ? 'selected' : '' }}>Capability Stage</option>
                                    <option value="Lateness Stage" {{ $dropdown->name == 'Lateness Stage' ? 'selected' : '' }}>Lateness Stage</option>
                                    <option value="Training Course Titles" {{ $dropdown->name == 'Training Course Titles' ? 'selected' : '' }}>Training Course Titles</option>
                                </select>
                            </div>
                            <!-- Dropdown Value -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Value" required name="value"
                                    value="{{ $dropdown->value }}" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
            User: ['Ethnicity', 'Equipment Required'],
            Job: ['Job Title', 'Facility', 'Contract Type'],
            Capability: ['Capability Stage'],
            Lateness: ['Lateness Stage'],
            Training: ['Training Course Titles'],
        };
        // Pre-populate Dropdown Name based on current Module Type
        const selectedModule = moduleTypeSelect.value;
        if (moduleOptions[selectedModule]) {
            dropdownNameSelect.innerHTML = '<option value="" selected disabled>Select Dropdown Name</option>';
            moduleOptions[selectedModule].forEach(option => {
                const newOption = document.createElement('option');
                newOption.value = option;
                newOption.textContent = option;
                newOption.selected = option === "{{ $dropdown->name }}"; // Pre-select current name
                dropdownNameSelect.appendChild(newOption);
            });
        }
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
