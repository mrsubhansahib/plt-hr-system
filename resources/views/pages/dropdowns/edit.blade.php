@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dropdowns</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Dropdown</li>
        </ol>
    </nav>
    @include('layout.alert')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="py-2">Edit Dropdown</h4>
                    <hr>
                    <form class="forms-sample" action="{{ route('update.dropdown', $dropdown->id) }}" method="POST">
                        @csrf
                        {{-- @method('PUT') --}}

                        <div class="row mb-3">
                            <!-- Module Type (Disabled Field) -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Module Type<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $dropdown->module_type }}" disabled />
                                <input type="hidden" name="module_type" value="{{ $dropdown->module_type }}" />
                            </div>

                            <!-- Dropdown Name -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="name" id="dropdownName">
                                    <option value="" selected disabled>Select Dropdown Name</option>
                                    <!-- Options will be loaded dynamically based on module_type -->
                                </select>
                            </div>

                            <!-- Dropdown Value -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Value<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Value" required name="value" value="{{ $dropdown->value }}" />
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
        // Get reference to the dropdown name select field
        const dropdownNameSelect = document.getElementById('dropdownName');

        // Define options for each Module Type
        const moduleOptions = {
            User: ['Ethnicity', 'Equipment Ordered'],
            Job: ['Title', 'Facility', 'Contract Type'],
            Disclosure: ['Contract Type'],
            Capability: ['Capability Stage', 'Warning Issued Type' ],
            Lateness: ['Lateness Stage'],
            Training: ['Training Course Titles'],
        };

        // Get selected module type
        const selectedModule = "{{ $dropdown->module_type }}";
        const selectedName = "{{ $dropdown->name }}";

        // Populate options based on selected Module Type
        if (moduleOptions[selectedModule]) {
            moduleOptions[selectedModule].forEach(option => {
                const newOption = document.createElement('option');
                newOption.value = option;
                newOption.textContent = option;
                if (option === selectedName) {
                    newOption.selected = true;
                }
                dropdownNameSelect.appendChild(newOption);
            });
        }
    });
</script>
