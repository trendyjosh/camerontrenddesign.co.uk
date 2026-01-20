<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Create user logins
        $defaultUsers = [
            'Josh' => 'trendyjosh@gmail.com',
            'Cameron' => 'cameron.trend@gmail.com'
        ];
        foreach ($defaultUsers as $user => $email) {
            User::create([
                'name' => $user,
                'email' => $email,
                'password' => '$2y$12$Qaw9YNQviHLcr0an49TmG.b8Y0L4r8I1k5xSZh1/yrYysTgcYhjFS' // 'password'
            ]);
        }
    }
}
