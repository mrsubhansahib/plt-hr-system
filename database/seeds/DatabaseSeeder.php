<?php

use App\Dropdown;
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
    protected $dropdowns = [
        'User' => [
            'Ethnicity' => [
                'White British',
                'White Irish',
                'White Other',
                'Mixed White and Black Caribbean',
                'Mixed White and Black African',
                'Mixed White and Asian',
                'Mixed Other Background',
                'Asian or Asian British Indian',
                'Asian or Asian British Pakistani',
                'Asian or Asian British Bangladeshi',
                'Asian or Asian British Kashmiri',
                'Asian or Asian British Other',
                'Black or Black British Caribbean',
                'Black or Black British African',
                'Black or Black British Other',
                'Chinese',
                'Other Ethnic Group'
            ],
            'Equipment Ordered' => [
                'Telphone Ext',
                'Computer / Laptop',
                'Email Address / Login',
                'Mobile',
                'Other'
            ]
        ],
        'Job' => [
            'Facility' => [
                'No 1 Market Street',
                'Pendle Leisure Centre',
                'Pendle Wavelengths',
                'West Craven Sports Centre',
                'The Muni',
                'Seedhill Athletics and Fitness Centre',
                'Inside Spa',
                'Good Life',
                'All Facilities'
            ],
            'Title' => [
                'Activo Administration Assistant',
                'Administration Assistant',
                'Administration Assistant Senior',
                'Administration Assistant/Wages Clerk (REC)',
                'Allotment Assistant',
                'Allotment Development Worker',
                'Aquarhythmics Teacher',
                'Assistant Finance Manager',
                'Assistant Theatre Manager',
                'Bar and Catering Assistant',
                'Bar Assistant',
                'Bar Supervisor',
                'Box Office / Information Sales Co-Ordinator',
                'Business Development Manager',
                'Catering Assistant',
                'Catering Supervisor',
                'Centre Manager',
                'Chief Executive',
                'Cleaner',
                'Course Co-ordinator',
                'Credit Controller / Finance Assistant',
                'Customer Focus Manager',
                'Digital Content Co-ordinator',
                'Executive Manager (Finance)',
                'Executive Manager (Human Resources)',
                'Feelgood Suite Instructor',
                'Fitness / Class Instructor',
                'Fitness Class Instructor',
                'Fitness Instructor',
                'Front of House Supervisor',
                'Grant Funding/Administration Manager/PA',
                'Graphic Designer',
                'Gym Manager',
                'Hallkeeper',
                'Health Activator',
                'Healthy Weight Coach',
                'Healthy Weight Co-ordinator',
                'Leisure Attendant',
                'Marketing Assistant',
                'Marketing Manager',
                'Operations Manager',
                'Personal Training Instructor',
                'Pinpoint Trainer',
                'Receptionist',
                'Relief Assistant Customer Focus Manager',
                'Relief Customer Focus Manager',
                'Repair and Maintenance Operative',
                'Seedhill Supervisor',
                'Senior Spa Therapist',
                'Senior Usher',
                'Site Supervisor',
                'Spa Customer Focus Manager',
                'Spa Receptionist',
                'Spa Therapist',
                'Stage Technician',
                'Swimming Teacher',
                'Swimming Teacher Administration',
                'Swimming Teacher Co-ordinator',
                'Technical Manager',
                'Theatre Manager',
                'Usher',
                'Wages Assistant'
            ],
            'Contract Type' => [
                'Permanent',
                'Casual',
                'Fixed Term',
                'Temporary',
                'Permanent Variable',
            ]
        ],
        'Disclosure' => [
            'Contract Type' => [
                'Employee',
                'Volunteer',
                'Self Employed',
            ]
        ],
        'Capability' => [
            'Capability Stage' => [
                'Triggered Capability',
                'Capability A Counselling Interview',
                'Restart Capability Procedure',
                'Further Sikness',
                'Long Term Sickness Counselling Interview',
                'Long Term Sickness Review',
                'Capability Formal Interview',
                'Other'
            ],
            'Warning Issued Type' => [
                'Dismissal',
                'Final Written Warning',
                'NFA',
                'Verbal Warning',
                'Written Warning'
            ]
        ],
        'Disciplinary' => [
            'Outcome' => [
                'Dismissal',
                'Final Written Warning',
                'NFA',
                'Verbal Warning',
                'Written Warning'
            ]
        ],
        'Lateness' => [
            'Lateness Stage' => [
                'Triggered Lateness',
                'Lateness A Counselling Interview',
                'Restart Lateness Procedure',
                'Further Lateness',
                'Lateness Formal Interview',
                'Other'
            ],
            'Level of Warning Issued' => [
                'Dismissal',
                'Final Written Warning',
                'NFA',
                'Verbal Warning',
                'Written Warning'
            ]
        ],
        'Training' => [
            'Training Course Titles' => [
                'NPLQ',
                'NPLQ Renewal',
                'FAAW',
                'FAAW Renewal',
                'Emergency First Aid',
                'Monthly Staff Training',
                'Emergency Response',
                'Pool Plant Operators',
                'Ladder and Steps Inspection Training',
                'iHasco allocated modules',
                'IOSH Managing Safely',
                'Swimming Teaching Course',
                'Other'
            ]
        ]
    ];
    public function run()
    {
           // Truncate logs table before seeding
    // DB::table('logs')->truncate();

        // $this->call(UsersTableSeeder::class);
        User::create([
            'status' => 'active',
            'first_name' => 'Thumbs Up',
            'middle_name' => 'Digital',
            'surname' => 'Admin',
            'preferred_name' => '',
            'role' => 'super_admin',
            'email' => 'admin@thumbsupdigital.com',
            'password' => Hash::make('password'),
            'address1' => 'Jinnah Colony It Tower 2',
            'address2' => '',
            'address3' => '',
            'town' => '',
            'post_code' => '',
            'mobile_tel' => '00000000000',
            'home_tel' => '00000000000',
            'dob' => '',
            'age' => '',
            'gender' => '',
            'ethnicity' => '',
            'disability' => '',
            'ni_number' => '',
            'commencement_date' => '',
            'contracted_from_date' => '',
            'termination_date' => '',
            'reason_termination' => '',
            'handbook_sent' => '',
            'medical_form_returned' => '',
            'new_entrant_form_returned' => '',
            'confidentiality_statement_returned' => '',
            'work_document_received' => '',
            'qualifications_checked' => '',
            'references_requested' => '',
            'references_returned' => '',
            'payroll_informed' => '',
            'probation_complete' => '',
            'equipment_required' => '',
            'equipment_ordered' => '',
            'default_cost_center' => '',
            'salaried' => '',
            'casual_holiday_pay' => '',
            'p45' => '',
            'employee_pack_sent' => '',
            'emergency_1_name' => '',
            'emergency_1_ph_no' => '',
            'emergency_1_home_ph' => '',
            'emergency_1_relation' => '',
            'emergency_2_name' => '',
            'emergency_2_ph_no' => '',
            'emergency_2_home_ph' => '',
            'emergency_2_relation' => '',
            'termination_form_to_payroll' => '',
            'notes' => ''

        ]);
        foreach ($this->dropdowns as $moduleType => $names) {
            foreach ($names as $name => $values) {
                foreach ($values as $value) {
                    Dropdown::create([
                        'module_type' => $moduleType,
                        'name' => $name,
                        'value' => $value,
                        'user_id' => 1,
                    ]);
                }
            }
        }
    }
}
