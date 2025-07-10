<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Organization;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $organizations = Organization::all();

        $contacts = [
            // TechCorp Solutions
            [
                'organization_id' => $organizations->where('name', 'TechCorp Solutions')->first()->id,
                'first_name' => 'John',
                'last_name' => 'Mwangi',
                'job_title' => 'Chief Executive Officer',
                'department' => 'Executive',
                'is_primary_contact' => true,
                'email' => 'john.mwangi@techcorp.com',
                'office_phone_number' => '+254-20-1234567',
                'mobile_phone_number' => '+254-701-234567',
                'notes' => 'Primary contact for all executive decisions',
                'is_active' => true
            ],
            [
                'organization_id' => $organizations->where('name', 'TechCorp Solutions')->first()->id,
                'first_name' => 'Sarah',
                'last_name' => 'Wanjiku',
                'job_title' => 'Chief Technology Officer',
                'department' => 'Technology',
                'is_primary_contact' => false,
                'email' => 'sarah.wanjiku@techcorp.com',
                'office_phone_number' => '+254-20-1234568',
                'mobile_phone_number' => '+254-701-234568',
                'notes' => 'Technical lead for all development projects',
                'is_active' => true
            ],
            
            // Digital Innovations Ltd
            [
                'organization_id' => $organizations->where('name', 'Digital Innovations Ltd')->first()->id,
                'first_name' => 'Michael',
                'last_name' => 'Ochieng',
                'job_title' => 'Managing Director',
                'department' => 'Executive',
                'is_primary_contact' => true,
                'email' => 'michael.ochieng@digitalinnovations.co.ke',
                'office_phone_number' => '+254-20-2345678',
                'mobile_phone_number' => '+254-702-345678',
                'notes' => 'Main point of contact for business partnerships',
                'is_active' => true
            ],
            
            // Kenya Commercial Bank
            [
                'organization_id' => $organizations->where('name', 'Kenya Commercial Bank')->first()->id,
                'first_name' => 'Grace',
                'last_name' => 'Kimani',
                'job_title' => 'Branch Manager',
                'department' => 'Banking Operations',
                'is_primary_contact' => true,
                'email' => 'grace.kimani@kcb.co.ke',
                'office_phone_number' => '+254-20-3456789',
                'mobile_phone_number' => '+254-703-456789',
                'notes' => 'Handles corporate banking relationships',
                'is_active' => true
            ],
            [
                'organization_id' => $organizations->where('name', 'Kenya Commercial Bank')->first()->id,
                'first_name' => 'Peter',
                'last_name' => 'Mutua',
                'job_title' => 'Customer Relations Officer',
                'department' => 'Customer Service',
                'is_primary_contact' => false,
                'email' => 'peter.mutua@kcb.co.ke',
                'office_phone_number' => '+254-20-3456790',
                'mobile_phone_number' => '+254-703-456790',
                'notes' => 'Handles customer inquiries and complaints',
                'is_active' => true
            ],
            
            // Safaricom PLC
            [
                'organization_id' => $organizations->where('name', 'Safaricom PLC')->first()->id,
                'first_name' => 'David',
                'last_name' => 'Ngugi',
                'job_title' => 'Corporate Affairs Director',
                'department' => 'Corporate Affairs',
                'is_primary_contact' => true,
                'email' => 'david.ngugi@safaricom.co.ke',
                'office_phone_number' => '+254-20-4567890',
                'mobile_phone_number' => '+254-704-567890',
                'notes' => 'Handles corporate partnerships and government relations',
                'is_active' => true
            ],
            
            // Nairobi Hospital
            [
                'organization_id' => $organizations->where('name', 'Nairobi Hospital')->first()->id,
                'first_name' => 'Dr. Mary',
                'last_name' => 'Akinyi',
                'job_title' => 'Chief Medical Officer',
                'department' => 'Medical',
                'is_primary_contact' => true,
                'email' => 'mary.akinyi@nairobihospital.org',
                'office_phone_number' => '+254-20-5678901',
                'mobile_phone_number' => '+254-705-678901',
                'notes' => 'Senior medical officer overseeing patient care',
                'is_active' => true
            ],
            [
                'organization_id' => $organizations->where('name', 'Nairobi Hospital')->first()->id,
                'first_name' => 'James',
                'last_name' => 'Kariuki',
                'job_title' => 'Administrator',
                'department' => 'Administration',
                'is_primary_contact' => false,
                'email' => 'james.kariuki@nairobihospital.org',
                'office_phone_number' => '+254-20-5678902',
                'mobile_phone_number' => '+254-705-678902',
                'notes' => 'Handles administrative and operational matters',
                'is_active' => true
            ],
            
            // University of Nairobi
            [
                'organization_id' => $organizations->where('name', 'University of Nairobi')->first()->id,
                'first_name' => 'Prof. Jane',
                'last_name' => 'Nyong',
                'job_title' => 'Vice Chancellor',
                'department' => 'Administration',
                'is_primary_contact' => true,
                'email' => 'jane.nyong@uonbi.ac.ke',
                'office_phone_number' => '+254-20-6789012',
                'mobile_phone_number' => '+254-706-789012',
                'notes' => 'University leadership and strategic planning',
                'is_active' => true
            ],
            
            // East African Breweries
            [
                'organization_id' => $organizations->where('name', 'East African Breweries')->first()->id,
                'first_name' => 'Robert',
                'last_name' => 'Macharia',
                'job_title' => 'General Manager',
                'department' => 'Operations',
                'is_primary_contact' => true,
                'email' => 'robert.macharia@eabl.com',
                'office_phone_number' => '+254-20-7890123',
                'mobile_phone_number' => '+254-707-890123',
                'notes' => 'Oversees production and distribution operations',
                'is_active' => true
            ],
            
            // Bidco Africa
            [
                'organization_id' => $organizations->where('name', 'Bidco Africa')->first()->id,
                'first_name' => 'Alice',
                'last_name' => 'Wambui',
                'job_title' => 'Marketing Director',
                'department' => 'Marketing',
                'is_primary_contact' => true,
                'email' => 'alice.wambui@bidcoafrica.com',
                'office_phone_number' => '+254-20-8901234',
                'mobile_phone_number' => '+254-708-901234',
                'notes' => 'Leads marketing and brand management initiatives',
                'is_active' => true
            ],
            
            // Equity Bank
            [
                'organization_id' => $organizations->where('name', 'Equity Bank')->first()->id,
                'first_name' => 'Samuel',
                'last_name' => 'Kiprotich',
                'job_title' => 'Regional Manager',
                'department' => 'Banking',
                'is_primary_contact' => true,
                'email' => 'samuel.kiprotich@equitybank.co.ke',
                'office_phone_number' => '+254-20-9012345',
                'mobile_phone_number' => '+254-709-012345',
                'notes' => 'Manages regional banking operations',
                'is_active' => true
            ],
            
            // Kenyatta University
            [
                'organization_id' => $organizations->where('name', 'Kenyatta University')->first()->id,
                'first_name' => 'Dr. Catherine',
                'last_name' => 'Wangari',
                'job_title' => 'Dean of Students',
                'department' => 'Student Affairs',
                'is_primary_contact' => true,
                'email' => 'catherine.wangari@ku.ac.ke',
                'office_phone_number' => '+254-20-0123456',
                'mobile_phone_number' => '+254-710-123456',
                'notes' => 'Oversees student welfare and academic affairs',
                'is_active' => true
            ]
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}