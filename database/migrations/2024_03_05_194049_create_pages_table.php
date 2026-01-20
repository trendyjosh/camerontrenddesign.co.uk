<?php

use App\Models\Page;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('hero');
            $table->timestamps();
        });

        $this->insertData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }

    /**
     * Insert initial values needed for pages in
     * navigation to work.
     */
    private function insertData(): void
    {
        // Base site pages
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
};
