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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->boolean('status')->default(0);
            $table->string('link')->nullable();
            $table->timestamps();
        });

        $this->insertData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }

    /**
     * Insert initial values needed for pages in
     * navigation to work.
     */
    private function insertData(): void
    {
        // Press page
        Page::create([
            'title' => 'Press',
            'sub_title' => null,
            'hero' => ''
        ]);
    }
};
