<?php

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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resume_id')->constrained()->onDelete('cascade');
            $table->string('type'); // e.g., "education", "experience", "skill"
            $table->string('title')->nullable(); // e.g., "Bachelor of Science", "PHP"
            $table->text('description')->nullable(); // description for experience, education, etc.
            $table->string('institution')->nullable(); // optional for education
            $table->string('company')->nullable(); // optional for experience
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('position')->default(0); // for drag-drop sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
