@extends('layout.master')
@push('plugin-styles')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
   @endpush
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Template</a></li>
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
                            <h4 class="py-2">Template Details</h4>
                        </div>
                        <div>
                            <a href="{{ route('show.templates') }}" class="btn btn-primary"><strong>List</strong><i
                                    data-feather="list" class="ms-2"></i></a>
                        </div>
                    </div>
                    <hr>
                    <form class="forms-sample" action="{{ route('store.template') }}" id="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" required />
                            </div>
                           {{-- <hr> --}}
                            <h4 style="text-align: center; text-decoration: underline;">Merge Fields</h4>
                            <div class="col-5 mt-2">
                                <label class="form-label" class="personalInfoSelect">Personal Info</label>
                                <select class="form-control form-select" id="personalInfoSelect">
                                    <option value="" selected disabled>Select Field</option>
                                    <option value="{ $user->first_name }">First Name</option>
                                    <option value="{ $user->middle_name }">Middle Name</option>
                                    <option value="{ $user->surname }">Surname</option>
                                    <option value="{ $user->preferred_name }">Preferred Name</option>
                                    <option value="{ $user->email }">Email</option>
                                    <option value="{ $user->address1 }">Address 1</option>
                                    <option value="{ $user->address2 }">Address 2</option>
                                    <option value="{ $user->address3 }">Address 3</option>
                                    <option value="{ $user->town }">Town</option>
                                    <option value="{ $user->post_code }">Post Code</option>
                                    <option value="{ $user->mobile_tel }">Mobile Telephone</option>
                                    <option value="{ $user->home_tel }">Home Telephone</option>
                                    <option value="{ $user->dob }">Date of Birth</option>
                                    <option value="{ $user->age }">Age</option>
                                    <option value="{ $user->gender }">Gender</option>
                                    <option value="{ $user->ethnicity }">Ethnicity</option>
                                    <option value="{ $user->disability }">Disability</option>
                                    <option value="{ $user->ni_number }">NI Number</option>
                                    <option value="{ $user->commencement_date }">Commencement Date</option>
                                    <option value="{ $user->contracted_from_date }">Contracted From Date</option>
                                    <option value="{ $user->termination_date }">Termination Date</option>
                                    <option value="{ $user->reason_termination }">Reason for Termination</option>
                                    <option value="{ $user->handbook_sent }">Handbook Sent</option>
                                    <option value="{ $user->medical_form_returned }">Medical Form Returned</option>
                                    <option value="{ $user->new_entrant_form_returned }">New Entrant Form Returned</option>
                                    <option value="{ $user->confidentiality_statement_returned }">Confidentiality
                                        StatementReturned</option>
                                    <option value="{ $user->work_document_received }">Work Document Received</option>
                                    <option value="{ $user->qualifications_checked }">Qualifications Checked</option>
                                    <option value="{ $user->references_requested }">References Requested</option>
                                    <option value="{ $user->references_returned }">References Returned</option>
                                    <option value="{ $user->payroll_informed }">Payroll Informed</option>
                                    <option value="{ $user->probation_complete }">Probation Complete</option>
                                    <option value="{ $user->equipment_required }">Equipment Required</option>
                                    <option value="{ $user->equipment_ordered }">Equipment Ordered</option>
                                    <option value="{ $user->default_cost_center }">Default Cost Center</option>
                                    <option value="{ $user->salaried }">Salaried</option>
                                    <option value="{ $user->casual_holiday_pay }">Casual Holiday Pay</option>
                                    <option value="{ $user->p45 }">P45</option>
                                    <option value="{ $user->employee_pack_sent }">Employee Pack Sent</option>
                                    <option value="{ $user->emergency_1_name }">Emergency Contact 1 Name</option>
                                    <option value="{ $user->emergency_1_ph_no }">Emergency Contact 1 Phone</option>
                                    <option value="{ $user->emergency_1_home_ph }">Emergency Contact 1 Home Phone</option>
                                    <option value="{ $user->emergency_1_relation }">Emergency Contact 1 Relation</option>
                                    <option value="{ $user->emergency_2_name }">Emergency Contact 2 Name</option>
                                    <option value="{ $user->emergency_2_ph_no }">Emergency Contact 2 Phone</option>
                                    <option value="{ $user->emergency_2_home_ph }">Emergency Contact 2 Home Phone</option>
                                    <option value="{ $user->emergency_2_relation }">Emergency Contact 2 Relation</option>
                                    <option value="{ $user->termination_form_to_payroll }">Termination Form to Payroll
                                    </option>
                                    <option value="{ $user->ihasco_training_sent }">iHasco Training Sent</option>
                                    <option value="{ $user->ihasco_training_complete }">iHasco Training Complete</option>
                                </select>
                            </div>
                            <div class="col-1 mt-2 "style="padding-top: 22px">
                                <button type="button" id="add_personal_info_button"
                                    class="btn btn-secondary btn-sm mt-2">Add</button>
                            </div>
                            <div class="col-5 mt-2">
                                <label class="form-label" class="jobInfoSelect">Job Info</label>
                                <select class="form-control form-select" id="jobInfoSelect">
                                    <option value="" selected disabled>Select Field</option>
                                    <option value="{ $job->title }">Title </option>
                                    <option value="{ $job->facility }">Facility</option>
                                    <option value="{ $job->cost_center }">Cost Center </option>
                                    <option value="{ $job->start_date }">Start Date </option>
                                    <option value="{ $job->rate_of_pay }">Rate of pay </option>
                                    <option value="{ $job->pay_frequency }">Pay Frequency</option>
                                    <option value="{ $job->number_of_hours }">No of hours </option>
                                    <option value="{ $job->contract_type }">Contract Type</option>
                                    <option value="{ $job->termination_date }">Termination Date</option>
                                    <option value="{ $job->contract_returned }">Contract Returned</option>
                                    <option value="{ $job->jd_returned }">JD Returned</option>
                                    <option value="{ $job->dbs_required }">DBS</option>
                                    <option value="{ $job->ethnicity }">Ethnicity</option>
                                </select>
                            </div>
                            <div class="col-1 mt-2 "style="padding-top: 22px">
                                <button type="button" id="add_job_info_button"
                                    class="btn btn-secondary btn-sm mt-2">Add</button>
                            </div>
                        </div>
                        <input type="hidden" name="personal_info" id="personal_info" value="false">
                        <input type="hidden" name="job_info" id="job_info" value="false">
                        <input type="hidden" name="disclosure_info" id="disclosure_info" value="false">
                        <input type="hidden" name="sickness_info" id="sickness_info" value="false">
                        <input type="hidden" name="capability_info" id="capability_info" value="false">
                        <input type="hidden" name="disciplinary_info" id="disciplinary_info" value="false">
                        <input type="hidden" name="lateness_info" id="lateness_info" value="false">
                        <input type="hidden" name="training_info" id="training_info" value="false">
                        <div class="row">
                           
                            <div class="col-12 mt-3">
                                <label class="form-label">Content<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="content" id="contentEditor" required rows="10"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Remove the click event listener for the button since it's now a submit button
            const form = document.querySelector('#form');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                // alert('Form submitted!');
                const contentEditor = CKEDITOR.instances.contentEditor;
                if (contentEditor) {
                    const content = contentEditor.getData();
                    // Replace &gt; with >
                    const updatedContent = content.replace(/&gt;/g, '>');
                    contentEditor.setData(updatedContent);
                    form.submit();
                }
            });
        });
    </script>
@endsection
@push('custom-scripts')
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace('contentEditor', {
                    height: 700,
                    toolbar: [{
                            name: 'clipboard',
                            items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo']
                        },
                        {
                            name: 'find',
                            items: ['Find', 'Replace', 'SelectAll']
                        },
                        {
                            name: 'basicstyles',
                            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript',
                                'RemoveFormat'
                            ]
                        },
                        {
                            name: 'paragraph',
                            items: ['NumberedList', 'BulletedList', 'Blockquote', 'Indent', 'Outdent']
                        },
                        {
                            name: 'align',
                            items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                        },
                        {
                            name: 'styles',
                            items: ['Styles', 'Format', 'Font', 'FontSize']
                        },
                        {
                            name: 'insert',
                            items: ['HorizontalRule']
                        }, 

                        {
                            name: 'colors',
                            items: ['TextColor']
                        },

                    ]
                });

                // Insert merge fields
                CKEDITOR.instances.contentEditor.on('instanceReady', function() {
                    const add_personal_info_button = document.querySelector('#add_personal_info_button');
                    const personalInfoSelect = document.querySelector('#personalInfoSelect');
                    const add_job_info_button = document.querySelector('#add_job_info_button');
                    const jobInfoSelect = document.querySelector('#jobInfoSelect');

                    if (add_personal_info_button && personalInfoSelect) {
                        add_personal_info_button.addEventListener('click', function() {
                            const selectedField = personalInfoSelect.value;
                            if (selectedField) {
                                CKEDITOR.instances.contentEditor.insertText(' {' + selectedField +
                                    '} ');
                                personalInfoSelect.selectedIndex = 0;
                            }
                        });
                    }
                    if (jobInfoSelect && add_job_info_button) {
                        add_job_info_button.addEventListener('click', function() {
                            const selectedField = jobInfoSelect.value;
                            if (selectedField) {
                                CKEDITOR.instances.contentEditor.insertText(' {' + selectedField +
                                    '} ');
                                jobInfoSelect.selectedIndex = 0; // Update this line to reset jobInfoSelect
                            }
                        });
                    }
                });
            } else {
                console.error('CKEditor not loaded.');
            }
        });
    </script>
@endpush
