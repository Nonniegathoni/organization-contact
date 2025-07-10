<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            IndustrySeeder::class,
            OrganizationSeeder::class,
            ContactSeeder::class,
        ]);
        
        $this->command->info('Database seeded successfully!');
        $this->command->info('Created:');
        $this->command->info('- Industries: ' . \App\Models\Industry::count());
        $this->command->info('- Organizations: ' . \App\Models\Organization::count());
        $this->command->info('- Contacts: ' . \App\Models\Contact::count());
    }
}