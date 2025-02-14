@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">New Entrant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('store.employee') }}" method="POST">
                        @csrf
                        <!-- Tabs for Required and Optional Fields -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="required-fields-tab" data-bs-toggle="tab"
                                    data-bs-target="#required-fields-tab-pane" type="button" role="tab"
                                    aria-controls="required-fields-tab-pane" aria-selected="true">Personal Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="optional-fields-tab" data-bs-toggle="tab"
                                    data-bs-target="#optional-fields-tab-pane" type="button" role="tab"
                                    aria-controls="optional-fields-tab-pane" aria-selected="false">Job Details</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <!-- Required Fields Tab -->
                            <div class="tab-pane fade show active" id="required-fields-tab-pane" role="tabpanel"
                                aria-labelledby="required-fields-tab" tabindex="0">
                                <div class="row mb-3">
                                    <div class="d-flex justify-content-between py-2">
                                        <div></div>
                                        <div>
                                            <h4 class="py-2">Employee Detail</h4>
                                        </div>
                                        <div>
                                            <a href="{{ route('show.temp.employees') }}"
                                                class="btn btn-primary"><strong>List</strong><i data-feather="list"
                                                    class="ms-2"></i></a>
                                        </div>
                                    </div>

                                    <!-- Required Fields Here -->
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="first_name" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Middle Name</label>
                                        <input class="form-control" type="text" name="middle_name" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Surname <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="surname" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="preferred_name" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="dob" class="form-label">DOB <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control datepicker py-2" type="text" id="dob"
                                            placeholder="Select Date" required name="dob" onchange="calculateAge()" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="age" class="form-label">Age <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="auto-calculated" type="text" id="age" readonly required
                                            name="age" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" required name="gender">
                                            <option value="" selected disabled>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Ethnicity <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" required name="ethnicity">
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($dropdowns as $dropdown)
                                                @if ($dropdown->module_type == 'User' && $dropdown->name == 'Ethnicity')
                                                    <option value="{{ $dropdown->value }}">{{ $dropdown->value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Address and Contact Details -->
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Disability</label>
                                        <select class="form-control form-select" name="disability">
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Address 1 <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="address1" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Address 2</label>
                                        <input class="form-control" type="text" name="address2" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Address 3</label>
                                        <input class="form-control" type="text" name="address3" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Town <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="town" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Postcode <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="post_code" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" required name="email" />
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Employment Commencement Date<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control datepicker py-2" type="text"
                                            placeholder="Select Date" name="commencement_date" required />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">NI Number <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="ni_number" />
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Default Cost Centre <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="default_cost_center" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Salaried/Monthly in Arrears <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="salaried" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Mobile Tel</label>
                                        <input class="form-control" type="text" name="mobile_tel" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Home Tel</label>
                                        <input class="form-control" type="text" name="home_tel" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 1 Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required name="emergency_1_name" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 1 Mobile <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="number" placeholder="phone number" required
                                            name="emergency_1_ph_no" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 1 Relationship <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" required
                                            name="emergency_1_relation" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 1 Home Number</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            name="emergency_1_home_ph" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Name</label>
                                        <input class="form-control" type="text" name="emergency_2_name" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Mobile</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            name="emergency_2_ph_no" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Home Number</label>
                                        <input class="form-control" type="number" placeholder="phone number"
                                            name="emergency_2_home_ph" />
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label class="form-label">Emergency Contact 2 Relationship</label>
                                        <input class="form-control" type="text" name="emergency_2_relation" />
                                    </div>
                                </div>
                            </div>

                            <!-- optional Fields Tab -->
                            <div class="tab-pane fade" id="optional-fields-tab-pane" role="tabpanel"
                                aria-labelledby="optional-fields-tab" tabindex="0">
                                <div class="row mb-3">
                                    <div class="d-flex justify-content-between py-2">
                                        <div></div>
                                        <div>
                                            <h4 class="py-2">Job Details</h4>
                                        </div>
                                        <div>
                                            {{-- <a href="{{ route('show.temp.employees') }}" class="btn btn-primary">
                                                <strong>List</strong><i data-feather="list" class="ms-2"></i>
                                            </a> --}}
                                            <button type="button" class="btn btn-sm btn-success ms-2" title="Add New Job"
                                                id="add-job"><i data-feather="plus"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger  ms-2" title="Remove Last Job"
                                                id="remove-job"><i data-feather="minus"></i></button>
                                        </div>
                                    </div>

                                    <!-- Job Fields -->
                                    <hr style="margin: 5px 0;"><h4 class="my-3 ">Job # 1</h4>
                                    <div id="job-fields">
                                        <div class="row job-entry">
                                            <!-- Job Title Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Job Title<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select title-select" required
                                                    name="title[]">
                                                    <option value="" selected disabled>Select Title</option>
                                                    @foreach ($dropdowns as $dropdown)
                                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Title')
                                                            <option value="{{ $dropdown->value }}">{{ $dropdown->value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Main Job Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Main Job</label>
                                                <select class="form-control form-select main-job-select"
                                                    name="main_job[]">
                                                    <option value="yes">Yes</option>
                                                    <option selected value="no">No</option>
                                                </select>
                                            </div>

                                            <!-- Facility Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Facility<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select facility-select" required
                                                    name="facility[]">
                                                    <option value="" selected disabled>Select Facility</option>
                                                    @foreach ($dropdowns as $dropdown)
                                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Facility')
                                                            <option value="{{ $dropdown->value }}">{{ $dropdown->value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Cost Centre Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Cost Centre</label>
                                                <input class="form-control cost-center" type="text"
                                                    name="cost_center[]" />
                                            </div>

                                            <!-- Job Start Date Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Job Start Date <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control datepicker start-date" type="text"
                                                    placeholder="Select Date" required name="start_date[]" />
                                            </div>

                                            <!-- Job Termination Date Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Job Termination Date</label>
                                                <input class="form-control datepicker termination-date" type="text"
                                                    placeholder="Select Date" name="termination_date[]" />
                                            </div>

                                            <!-- Rate of Pay Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Rate of Pay <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control rate-of-pay" type="text" required
                                                    name="rate_of_pay[]" />
                                            </div>

                                            <!-- Pay Frequency Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Pay Frequency<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select" required name="pay_frequency[]">
                                                    <option selected value="Per Annum">Per Annum</option>
                                                    <option value="Per Hour"> Per Hour</option>
                                                </select>
                                            </div>

                                            <!-- Number of Hours Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Number of Hours <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" required
                                                    name="number_of_hours[]" />
                                            </div>

                                            <!-- Contract Type Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Contract Type <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select" required name="contract_type[]">
                                                    <option value="" selected disabled>Select Contract Type</option>
                                                    @foreach ($dropdowns as $dropdown)
                                                        @if ($dropdown->module_type == 'Job' && $dropdown->name == 'Contract Type')
                                                            <option value="{{ $dropdown->value }}">{{ $dropdown->value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Contract Returned Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">Contract Returned</label>
                                                <select class="form-control form-select" required
                                                    name="contract_returned[]">
                                                    <option value="" selected disabled>Select Option</option>
                                                    <option value="yes">Yes</option>
                                                    <option selected value="no">No</option>
                                                </select>
                                            </div>

                                            <!-- JD Returned Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">JD Returned</label>
                                                <select class="form-control form-select" required name="jd_returned[]">
                                                    <option value="yes">Yes</option>
                                                    <option selected value="no">No</option>
                                                </select>
                                            </div>

                                            <!-- DBS Required Field -->
                                            <div class="col-md-3 mt-3">
                                                <label class="form-label">DBS Required <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select" required name="dbs_required[]">
                                                    <option selected value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>

                                            <!-- Notes Field -->
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label">Notes</label>
                                                <textarea class="form-control notes" name="notes[]" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Single Submit Button -->
                        <div class=" mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#add-job").click(function() {
            let jobEntry = $(".job-entry:first").clone();
            let jobCount = $(".job-entry").length + 1;
            jobEntry.find("input, textarea").not(".datepicker").val(""); 
            jobEntry.find("select").prop("selectedIndex", 0);
            jobEntry.find("hr, h5").remove();
            jobEntry.prepend(`<hr class="my-3"><h5 class="mt-4 mb-2">Job ${jobCount}</h5>`);
            // Remove ID (so master file datepicker applies automatically)
            jobEntry.find(".datepicker").removeAttr("id").val("");

            $("#job-fields").append(jobEntry);
        });
        $("#remove-job").click(function() {
            let jobs = $(".job-entry");
            if (jobs.length > 1) jobs.last().prev("hr").remove().end().remove();
            else alert("At least one job entry is required.");
        });
        // Ensure new datepicker fields get initialized
        $(document).on("focus", ".datepicker", function() {
            $(this).datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                endDate: new Date()
            });
        });
    });
</script>