<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'status'=>'active',
            'first_name'=>'Softic',
            'middle_name'=>'Era',
            'surname'=>'Admin',
            'preferred_name'=>'',
            'role'=>'super_admin',
            'email'=>'admin@softicera.com',
            'password'=>Hash::make('password'),
            'address1'=>'Jinnah Colony It Tower 2',
            'address2'=>'',
            'address3'=>'',
            'town'=>'',
            'post_code'=>'',
            'mobile_tel'=>'(+92) 3052-2205',
            'home_tel'=>'',
            'dob'=>'',
            'age'=>'',
            'gender'=>'',
            'ethnicity'=>'',
            'disability'=>'',
            'ni_number'=>'',
            'commencement_date'=>'',
            'contracted_from_date'=>'',
            'termination_date'=>'',
            'reason_termination'=>'',
            'handbook_sent'=>'',
            'medical_form_returned'=>'',
            'new_entrant_form_returned'=>'',
            'confidentiality_statement_returned'=>'',
            'work_document_received'=>'',
            'qualifications_checked'=>'',
            'references_requested'=>'',
            'references_returned'=>'',
            'payroll_informed'=>'',
            'probation_complete'=>'',
            'equipment_required'=>'',
            'equipment_ordered'=>'',
            'default_cost_center'=>'',
            'salaried'=>'',
            'casual_holiday_pay'=>'',
            'p45'=>'',
            'employee_pack_sent'=>'',
            'emergency_1_name'=>'',
            'emergency_1_ph_no'=>'',
            'emergency_1_home_ph'=>'',
            'emergency_1_relation'=>'',
            'emergency_2_name'=>'',
            'emergency_2_ph_no'=>'',
            'emergency_2_home_ph'=>'',
            'emergency_2_relation'=>'',
            'termination_form_to_payroll'=>'',
            'notes'=>''

        ]);
    }
}
