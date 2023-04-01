<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CookiePackage;
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
        $admin->email = 'admin@cookies';
        $admin->password = bcrypt('cookies');
        $admin->save();

        $cookies = [25, 60, 90, 120, 300, 600, 1200, 3000];

        foreach ($cookies as $cookie) {
            CookiePackage::create([
                'sku_id' => $cookie,
            ]);
        }
    }
}
