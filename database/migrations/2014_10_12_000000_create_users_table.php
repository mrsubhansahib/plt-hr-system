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
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->string('preferred_name');
            $table->string('role')->default('employee'); // Role field
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('town');
            $table->string('post_code');
            $table->string('mobile_tel')->nullable();
            $table->string('home_tel')->nullable();
            $table->string('dob');
            $table->string('age');
            $table->string('gender');
            $table->text('ethnicity');
            $table->string('disability')->nullable();
            $table->string('ni_number')->unique();
            $table->string('commencement_date');
            $table->string('contracted_from_date')->nullable();
            $table->string('termination_date')->nullable();
            $table->text('reason_termination')->nullable();
            $table->string('handbook_sent')->nullable();
            $table->string('medical_form_returned')->nullable();
            $table->string('new_entrant_form_returned')->nullable();
            $table->string('confidentiality_statement_returned')->nullable();
            $table->string('work_document_received')->nullable();
            $table->string('qualifications_checked')->nullable();
            $table->string('references_requested')->nullable();
            $table->string('references_returned')->nullable();
            $table->string('payroll_informed')->nullable();
            $table->string('probation_complete')->nullable();
            $table->text('equipment_required')->nullable();
            $table->string('equipment_ordered')->nullable();
            $table->string('default_cost_center');
            $table->string('salaried');
            $table->string('casual_holiday_pay')->nullable();
            $table->string('p45')->nullable();
            $table->string('employee_pack_sent')->nullable();
            $table->string('emergency_1_name');
            $table->string('emergency_1_ph_no');
            $table->string('emergency_1_home_ph')->nullable();
            $table->string('emergency_1_relation');
            $table->string('emergency_2_name')->nullable();
            $table->string('emergency_2_ph_no')->nullable();
            $table->string('emergency_2_home_ph')->nullable();
            $table->string('emergency_2_relation')->nullable();
            $table->string('termination_form_to_payroll')->nullable();
            $table->text('notes')->nullable();
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
