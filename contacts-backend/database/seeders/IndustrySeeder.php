<?php
// database/seeders/IndustrySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Industry;

class IndustrySeeder extends Seeder
{
    public function run()
    {
        $industries = [
            [
                'name' => 'Technology',
                'description' => 'Software development, IT services, and technology solutions',
                'is_active' => true
            ],
            [
                'name' => 'Finance',
                'description' => 'Banking, insurance, investment, and financial services',
                'is_active' => true
            ],
            [
                'name' => 'Healthcare',
                'description' => 'Medical services, pharmaceuticals, and healthcare technology',
                'is_active' => true
            ],
            [
                'name' => 'Education',
                'description' => 'Schools, universities, and educational services',
                'is_active' => true
            ],
            [
                'name' => 'Manufacturing',
                'description' => 'Production, manufacturing, and industrial processes',
                'is_active' => true
            ],
            [
                'name' => 'Retail',
                'description' => 'Retail stores, e-commerce, and consumer goods',
                'is_active' => true
            ],
            [
                'name' => 'Agriculture',
                'description' => 'Farming, livestock, agribusiness, and food production',
                'is_active' => true
            ],
            [
                'name' => 'Construction',
                'description' => 'Building construction, infrastructure, and real estate',
                'is_active' => true
            ],
            [
                'name' => 'Transportation',
                'description' => 'Logistics, shipping, transportation, and supply chain',
                'is_active' => true
            ],
            [
                'name' => 'Non-Profit',
                'description' => 'NGOs, charitable organizations, and social services',
                'is_active' => true
            ],
            [
                'name' => 'Energy',
                'description' => 'Oil, gas, renewable energy, and utilities',
                'is_active' => true
            ],
            [
                'name' => 'Media & Entertainment',
                'description' => 'Broadcasting, publishing, gaming, and entertainment',
                'is_active' => true
            ],
            [
                'name' => 'Tourism & Hospitality',
                'description' => 'Hotels, restaurants, travel, and hospitality services',
                'is_active' => true
            ],
            [
                'name' => 'Government',
                'description' => 'Public sector, government agencies, and municipal services',
                'is_active' => true
            ],
            [
                'name' => 'Telecommunications',
                'description' => 'Phone, internet, and communication services',
                'is_active' => true
            ]
        ];

        foreach ($industries as $industry) {
            Industry::create($industry);
        }
    }
}

// database/seeders/OrganizationSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\Industry;
use Carbon\Carbon;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        $techIndustry = Industry::where('name', 'Technology')->first();
        $financeIndustry = Industry::where('name', 'Finance')->first();
        $healthcareIndustry = Industry::where('name', 'Healthcare')->first();
        $educationIndustry = Industry::where('name', 'Education')->first();
        $manufacturingIndustry = Industry::where('name', 'Manufacturing')->first();

        $organizations = [
            [
                'name' => 'TechCorp Solutions',
                'description' => 'Leading software development company specializing in web and mobile applications',
                'industry_id' => $techIndustry->id,
                'website' => 'https://techcorp.com',
                'founded_date' => Carbon::parse('2015-03-15'),
                'tax_id' => 'P051234567A',
                'is_active' => true
            ],
            [
                'name' => 'Digital Innovations Ltd',
                'description' => 'Cutting-edge technology solutions for businesses',
                'industry_id' => $techIndustry->id,
                'website' => 'https://digitalinnovations.co.ke',
                'founded_date' => Carbon::parse('2018-07-22'),
                'tax_id' => 'P051234568B',
                'is_active' => true
            ],
            [
                'name' => 'Kenya Commercial Bank',
                'description' => 'Full-service commercial bank providing financial services',
                'industry_id' => $financeIndustry->id,
                'website' => 'https://kcbgroup.com',
                'founded_date' => Carbon::parse('1970-01-01'),
                'tax_id' => 'P051234569C',
                'is_active' => true
            ],
            [
                'name' => 'Safaricom PLC',
                'description' => 'Leading telecommunications and mobile money provider',
                'industry_id' => $techIndustry->id,
                'website' => 'https://safaricom.co.ke',
                'founded_date' => Carbon::parse('1997-04-03'),
                'tax_id' => 'P051234570D',
                'is_active' => true
            ],
            [
                'name' => 'Nairobi Hospital',
                'description' => 'Premier healthcare facility providing specialized medical services',
                'industry_id' => $healthcareIndustry->id,
                'website' => 'https://nairobihospital.org',
                'founded_date' => Carbon::parse('1954-10-15'),
                'tax_id' => 'P051234571E',
                'is_active' => true
            ],
            [
                'name' => 'University of Nairobi',
                'description' => 'Leading public university in Kenya',
                'industry_id' => $educationIndustry->id,
                'website' => 'https://uonbi.ac.ke',
                'founded_date' => Carbon::parse('1956-09-01'),
                'tax_id' => 'P051234572F',
                'is_active' => true
            ],
            [
                'name' => 'East African Breweries',
                'description' => 'Manufacturing and distribution of alcoholic beverages',
                'industry_id' => $manufacturingIndustry->id,
                'website' => 'https://eabl.com',
                'founded_date' => Carbon::parse('1922-06-12'),
                'tax_id' => 'P051234573G',
                'is_active' => true
            ],
            [
                'name' => 'Bidco Africa',
                'description' => 'Leading manufacturer of consumer goods and edible oils',
                'industry_id' => $manufacturingIndustry->id,
                'website' => 'https://bidcoafrica.com',
                'founded_date' => Carbon::parse('1985-11-20'),
                'tax_id' => 'P051234574H',
                'is_active' => true
            ],
            [
                'name' => 'Equity Bank',
                'description' => 'Pan-African financial services provider',
                'industry_id' => $financeIndustry->id,
                'website' => 'https://equitybank.co.ke',
                'founded_date' => Carbon::parse('1984-02-14'),
                'tax_id' => 'P051234575I',
                'is_active' => true
            ],
            [
                'name' => 'Kenyatta University',
                'description' => 'Public university focusing on technology and innovation',
                'industry_id' => $educationIndustry->id,
                'website' => 'https://ku.ac.ke',
                'founded_date' => Carbon::parse('1985-08-23'),
                'tax_id' => 'P051234576J',
                'is_active' => true
            ]
        ];

        foreach ($organizations as $organization) {
            Organization::create($organization);
        }
    }
}
