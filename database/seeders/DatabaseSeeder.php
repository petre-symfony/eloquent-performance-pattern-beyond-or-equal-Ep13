<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        /** Ep 13
        User::factory()->create(['name' => 'Ted Bossman', 'is_owner' => true]);
        User::factory()->create(['name' => 'Sarah Seller']);
        User::factory()->create(['name' => 'Chase Indeals']);

        User::all()->each(fn ($user) =>
            Customer::factory(25)->create([
                'sales_rep_id' => $user->id
            ])
        );
         */

        // User::factory(100000)->create(); Ep14

        /**  Ep15
        User::factory(50000)->create()->each(fn ($user) =>
            Company::factory()->create([
                'user_id' => $user->id
            ])
        );
        */

        Company::factory(10000)->create()->each(fn ($company) =>
            User::factory(5)->create([
                'company_id' => $company->id
            ])
        );
    }
}
