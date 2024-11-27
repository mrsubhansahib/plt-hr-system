<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('status')->default('pending'); // Status field
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('surname');
            $table->string('preferred_name');
            $table->string('role')->default('employee'); // Role field
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('town');
            $table->string('Postcode');
            $table->string('mobile_tel');
            $table->string('home_tel');
            $table->string('dob');
            $table->string('age');
            $table->string('gender');
            $table->text('ethnicity');
            $table->string('disability');
            $table->string('ni_number');
            $table->string('employment_date');
            $table->string('contracted_from_date');
            $table->string('termination_date');
            $table->text('reason_termination');
            $table->string('handbook_sent');
            $table->string('medical_form_returned');
            $table->string('new_entrant_form_returned');
            $table->string('confidentiality_statement_returned');
            $table->string('work_document_received');
            $table->string('qualifications_checked');
            $table->string('references_requested');
            $table->string('references_returned');
            $table->string('payroll_informed');
            $table->string('probation_complete');
            $table->text('equipment_required');
            $table->string('equipment_ordered');
            $table->string('default_cost_centre');
            $table->string('salaried');
            $table->string('casual_holiday_pay');
            $table->string('p45');
            $table->string('employee_pack_sent');
            $table->string('emergency_1_name');
            $table->string('emergency_1_ph_no');
            $table->string('emergency_1_home_ph');
            $table->string('emergency_1_relation');
            $table->string('emergency_2_name');
            $table->string('emergency_2_ph_no');
            $table->string('emergency_2_home_ph');
            $table->string('emergency_2_relation');
            $table->string('termination_form_to_payroll');
            $table->text('notes');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
