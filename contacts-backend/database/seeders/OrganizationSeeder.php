<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\Industry;
use Carbon\Carbon;
use Faker\Factory as Faker;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all industries
        $industries = Industry::all();
        
        $organizations = [
            [
                'name' => 'TechCorp Solutions',
                'description' => 'Leading provider of enterprise software solutions and IT consulting services',
                'industry_id' => $industries->where('name', 'Technology')->first()->id,
                'website' => 'https://techcorp.com',
                'logo_url' => 'https://via.placeholder.com/150x150?text=TechCorp',
                'founded_date' => '2010-03-15',
                'tax_id' => 'P051234567A',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kenya Commercial Bank',
                'description' => 'Premier financial institution offering comprehensive banking services',
                'industry_id' => $industries->where('name', 'Finance')->first()->id,
                'website' => 'https://kcbgroup.com',
                'logo_url' => 'https://via.placeholder.com/150x150?text=KCB',
                'founded_date' => '1970-01-01',
                'tax_id' => 'P051234568B',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nairobi Hospital',
                'description' => 'Leading private healthcare facility providing specialized medical services',
                'industry_id' => $industries->where('name', 'Healthcare')->first()->id,
                'website' => 'https://nairobihospital.org',
                'logo_url' => 'https://via.placeholder.com/150x150?text=NH',
                'founded_date' => '1954-05-20',
                'tax_id' => 'P051234569C',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'University of Nairobi',
                'description' => 'Premier institution of higher learning and research in East Africa',
                'industry_id' => $industries->where('name', 'Education')->first()->id,
                'website' => 'https://uonbi.ac.ke',
                'logo_url' => 'https://via.placeholder.com/150x150?text=UON',
                'founded_date' => '1970-07-01',
                'tax_id' => 'P051234570D',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'East African Breweries',
                'description' => 'Leading manufacturer of alcoholic and non-alcoholic beverages',
                'industry_id' => $industries->where('name', 'Manufacturing')->first()->id,
                'website' => 'https://eabl.com',
                'logo_url' => 'https://via.placeholder.com/150x150?text=EABL',
                'founded_date' => '1922-06-10',
                'tax_id' => 'P051234571E',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Safaricom PLC',
                'description' => 'Leading telecommunications and technology company in Kenya',
                'industry_id' => $industries->where('name', 'Technology')->first()->id,
                'website' => 'https://safaricom.co.ke',
                'logo_url' => 'https://via.placeholder.com/150x150?text=Safaricom',
                'founded_date' => '1997-04-03',
                'tax_id' => 'P051234572F',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Green Energy Kenya',
                'description' => 'Renewable energy solutions and sustainable power generation',
                'industry_id' => $industries->where('name', 'Energy')->first()->id,
                'website' => 'https://greenenergykenya.com',
                'logo_url' => 'https://via.placeholder.com/150x150?text=GEK',
                'founded_date' => '2015-02-28',
                'tax_id' => 'P051234573G',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kenya Red Cross',
                'description' => 'Humanitarian organization providing emergency response and community services',
                'industry_id' => $industries->where('name', 'Non-Profit')->first()->id,
                'website' => 'https://kenyaredcross.org',
                'logo_url' => 'https://via.placeholder.com/150x150?text=KRC',
                'founded_date' => '1965-09-15',
                'tax_id' => 'P051234574H',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Twiga Foods',
                'description' => 'Technology-driven food distribution platform connecting farmers to retailers',
                'industry_id' => $industries->where('name', 'Agriculture')->first()->id,
                'website' => 'https://twigafoods.com',
                'logo_url' => 'https://via.placeholder.com/150x150?text=Twiga',
                'founded_date' => '2014-11-01',
                'tax_id' => 'P051234575I',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Serena Hotels',
                'description' => 'Luxury hospitality chain with properties across East Africa',
                'industry_id' => $industries->where('name', 'Tourism & Hospitality')->first()->id,
                'website' => 'https://serenahotels.com',
                'logo_url' => 'https://via.placeholder.com/150x150?text=Serena',
                'founded_date' => '1972-08-12',
                'tax_id' => 'P051234576J',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Add some faker-generated organizations
        for ($i = 0; $i < 15; $i++) {
            $organizations[] = [
                'name' => $faker->company,
                'description' => $faker->catchPhrase . '. ' . $faker->bs,
                'industry_id' => $industries->random()->id,
                'website' => $faker->url,
                'logo_url' => 'https://via.placeholder.com/150x150?text=' . substr($faker->company, 0, 8),
                'founded_date' => $faker->dateTimeBetween('1990-01-01', '2020-12-31')->format('Y-m-d'),
                'tax_id' => 'P' . $faker->numerify('0512#####') . chr(rand(65, 90)),
                'is_active' => $faker->boolean(90), // 90% chance of being active
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert all organizations
        Organization::insert($organizations);
    }
}
