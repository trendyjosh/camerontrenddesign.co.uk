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
            'About' => null,
            'Services' => 'The creative endeavour to implement visual ideas into gardens',
            'Contact' => null,
        ];

        foreach ($standardPages as $title => $subTitle) {
            Page::create([
                'title' => $title,
                'sub_title' => $subTitle,
                'hero' => ''
            ]);
        }
    }
}
