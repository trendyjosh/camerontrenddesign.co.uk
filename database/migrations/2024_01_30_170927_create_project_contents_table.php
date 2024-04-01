<?php

use App\Models\Project;
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
        Schema::create('project_contents', function (Blueprint $table) {
            $table->id();
            $table->boolean('full')->default(0);
            $table->string('style')->nullable();
            $table->string('content')->nullable();
            $table->string('source')->nullable();
            $table->string('caption')->nullable();
            $table->integer('position')->default(0);
            $table->foreignIdFor(Project::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_contents');
    }
};
