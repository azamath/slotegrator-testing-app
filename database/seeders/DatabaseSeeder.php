<?php

namespace Database\Seeders;

use App\Models\Fund;
use App\Models\Good;
use App\Models\MoneyPrize;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
             'email' => 'azamat@test.com',
         ]);

         Good::factory()->count(3)->create();

         Fund::factory()->create([
             'name' => MoneyPrize::FUND_NAME,
             'amount' => 100000,
         ]);
    }
}
