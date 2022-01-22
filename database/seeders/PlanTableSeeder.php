<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Monthly Plan',
            'slug' => 'monthly-plan',
            'stripe_name' => 'monthly',
            'stripe_id' => 'price_1KKa5rHevYrwEZwstp12o2I3',
            'price' => 2,
            'abbreviation' => '/month'
        ]);

        Plan::create([
            'name' => 'Yearly Plan',
            'slug' => 'yearly-plan',
            'stripe_name' => 'yearly',
            'stripe_id' => 'price_1KKa6NHevYrwEZwsS5uHhKIz',
            'price' => 20,
            'abbreviation' => '/year'
        ]);
    }
}
