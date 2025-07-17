@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">{{ $user->status === 'pending' ? 'New Entrant' : 'Employee' }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('layout.alert')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('update.employee', $user->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <h3 class="my-4 text-center">Personal Details</h3>
                            <!-- Personal Information -->
                            <div class="col-md-3 mt-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="first_name"
                                    value="{{ $user->first_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Middle Name</label>
                                <input class="form-control" type="text" name="middle_name"
                                    value="{{ $user->middle_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Surname <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="surname"
                                    value="{{ $user->surname }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="preferred_name"
                                    value="{{ $user->preferred_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="dob" class="form-label">DOB <span class="text-danger">*</span></label>
                                <input class="form-control datepicker py-2" type="text" id="dob"
                                    placeholder="Select Date" required name="dob" onchange="calculateAge()"
                                    value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('d-m-Y') }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="age" readonly required name="age"
                                    value="{{ $user->age }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="gender">
                                    <option value="" selected disabled>Select</option>
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                            @php
                                // Collect ethnicity options from both seeder and dropdowns
                                $ethnicityOptions = collect($dropdowns)
                                    ->filter(
                                        fn($dropdown) => $dropdown->module_type == 'User' &&
                                            $dropdown->name == 'Ethnicity',
                                    )
                                    ->pluck('value')
                                    ->merge($seededEthnicities ?? []) // Ensure seeded options are included
                                    ->unique()
                                    ->sort() // Sort alphabetically
                                    ->values();
                            @endphp

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Ethnicity <span class="text-danger">*</span></label>
                                <select class="form-control form-select" required name="ethnicity">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($ethnicityOptions as $option)
                                        <option value="{{ $option }}"
                                            {{ old('ethnicity', $user->ethnicity) == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Disability</label>
                                <select class="form-control form-select" name="disability" value="{{ $user->disability }}">
                                    <option value="yes" {{ $user->disability == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $user->disability == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>

                            <!-- Address Details -->
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 1 <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="address1"
                                    value="{{ $user->address1 }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 2</label>
                                <input class="form-control" type="text" name="address2" value="{{ $user->address2 }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Address 3</label>
                                <input class="form-control" type="text" name="address3"
                                    value="{{ $user->address3 }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Town <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="town"
                                    value="{{ $user->town }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Postcode <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="post_code"
                                    value="{{ $user->post_code }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" required name="email"
                                    value="{{ $user->email }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Employment Commencement Date<span
                                        class="text-danger">*</span></label>
                                <input class="form-control datepicker py-2" type="text" placeholder="Select Date"
                                    name="commencement_date" value="{{ $user->commencement_date }}" required />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">NI Number <span class="text-danger">*</span></label>
                                <input id="ni_number" class="form-control" type="text" required name="ni_number"
                                    value="{{ $user->ni_number }}" />
                                <small id="ni-feedback" class="form-text"></small>
                                <input type="hidden" id="user_id" value="{{ $user->id ?? '' }}">
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Default Cost Centre <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="default_cost_center"
                                    value="{{ $user->default_cost_center }}" />
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label">Salaried / Monthly in Arrears <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="salaried"
                                    value="{{ $user->salaried }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Mobile Tel</label>
                                <input class="form-control" type="text" name="mobile_tel"
                                    value="{{ $user->mobile_tel }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Home Tel</label>
                                <input class="form-control" type="text" name="home_tel"
                                    value="{{ $user->home_tel }}" />
                            </div>

                            <!-- Emergency Contact -->
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Name <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_name"
                                    value="{{ $user->emergency_1_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Mobile <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="number" placeholder="Phone Number" required
                                    name="emergency_1_ph_no" value="{{ $user->emergency_1_ph_no }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Relationship <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" required name="emergency_1_relation"
                                    value="{{ $user->emergency_1_relation }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 1 Home Number</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_1_home_ph" value="{{ $user->emergency_1_home_ph }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Name</label>
                                <input class="form-control" type="text" name="emergency_2_name"
                                    value="{{ $user->emergency_2_name }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Mobile</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_ph_no" value="{{ $user->emergency_2_ph_no }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Relationship</label>
                                <input class="form-control" type="text" name="emergency_2_relation"
                                    value="{{ $user->emergency_2_relation }}" />
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Emergency Contact 2 Home Number</label>
                                <input class="form-control" type="number" placeholder="phone number"
                                    name="emergency_2_home_ph" value="{{ $user->emergency_2_home_ph }}" />
                            </div>
                        </div>
                        <div class=" mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        // Ajax
        let isUniqueNI = false;
        $(document).ready(function() {
            $('#ni_number').on('input', function() {
                let ni = $(this).val();
                let userId = $('#user_id').val();

                $.ajax({
                    url: '/check-ni',
                    type: 'POST',
                    data: {
                        ni_number: ni,
                        user_id: userId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        let $msg = $('#ni-feedback');
                        if (res.status === 'exists') {
                            isUniqueNI = false;
                            $msg.text('Already registered!').css('color', 'red');
                        } else {
                            isUniqueNI = true;
                            $msg.text('Unique ✔').css('color', 'green');
                        }
                    }
                });
            });

            $('form').on('submit', function(e) {
                if (!isUniqueNI) {
                    e.preventDefault();
                    alert('Please enter a unique NI Number before submitting.');
                }
            });
        });
        // End ajax
    </script>
@endpush
