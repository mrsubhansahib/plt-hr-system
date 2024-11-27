@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
      <div class="card">
        <h4 class="card-title">Personal Detail</h4>
          <div class="card-body">
              
              <form class="forms-sample" action="{{ route('update.admin', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT or PATCH for updates -->
                  <!-- Personal Details -->
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="first_name" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="middle_name" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="surname" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="preferred_name" />
                      </div>
                  </div>

                  <!-- Address Details -->
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="address1" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="address2" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="address3" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="town" />
                      </div>
                  </div>

                  <!-- Contact Details -->
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="postcode" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="mobile_tel" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="home_tel" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="email" name="email" />
                      </div>
                  </div>

                  <!-- Personal Info -->
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="date" name="dob" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="number" name="age" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <select class="form-control" name="gender">
                              <option value="" selected disabled></option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="other">Other</option>
                          </select>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <input class="form-control" type="text" name="ethnicity" />
                      </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-3">
                      <label class="form-label">{{ $user-> }}</label>
                      <select class="form-control" name="disability">
                        <option value="" selected disabled></option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                  </div>

                  <!-- Employment Details -->
                  <h4 class="my-4">Employment Details</h4>
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="date" name="employment_start_date" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="date" name="contracted_from_date" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="date" name="termination_date" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="termination_reason" />
                      </div>
                  </div>

                  <!-- Additional Fields -->
                  <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="handbook_sent">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="medical_form_returned">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="new_entrant_form_returned">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="confidentiality_statement_returned">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="right_to_work_document">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="qualifications_checked">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}:</label>
                        <select class="form-control" name="references_requested">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="references_returned">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="payroll_informed">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="probation_complete">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="not_required">Not Required</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="equipment_required">
                            <option value="" selected disabled></option>
                            <option value="laptop">Laptop</option>
                            <option value="desktop">Desktop</option>
                            <option value="phone">Phone</option>
                            <option value="none">None</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="equipment_ordered">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="p45_tax_form_received">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="employee_pack_sent">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $user-> }}</label>
                        <select class="form-control" name="termination_form_to_payroll">
                            <option value="" selected disabled></option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label">{{ $user-> }}</label>
                      <input class="form-control" type="number" name="holiday_pay" />
                  </div>
                    
                </div>
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="ni_number" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="default_cost_centre" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="salary_type" />
                      </div>
                  </div>

                  <!-- Emergency Contacts -->
                  <h4 class="my-4">Emergency Contacts</h4>
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact1_name" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact1_mobile" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact1_home" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact1_relationship" />
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact2_name" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact2_mobile" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact2_home" />
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">{{ $user-> }}</label>
                          <input class="form-control" type="text" name="emergency_contact2_relationship" />
                      </div>
                  </div>

                  <!-- Notes -->
                  <div class="row mb-3">
                      <div class="col-md-12">
                          <label class="form-label">{{ $user-> }}</label>
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