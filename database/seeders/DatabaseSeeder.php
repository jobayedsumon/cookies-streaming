<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RewardsPackage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@rewardsconverter.online';
        $admin->password = bcrypt('Rewards@Converter@1234');
        $admin->save();

        $rewards = [25, 50, 75, 100, 125, 250, 500, 1000, 2500];

        foreach ($rewards as $reward) {
            RewardsPackage::create([
                'sku_id' => $reward,
            ]);
        }
    }
}
