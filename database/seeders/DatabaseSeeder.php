<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Create customisable site pages
        $standardPages = [
            'About',
            'Services',
            'Contact',
        ];

        foreach ($standardPages as $standardPage) {
            Page::create([
                'title' => $standardPage,
                'hero' => 'media/garden_care.jpg'
            ]);
        }
    }
}
