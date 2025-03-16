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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('location');
            $table->foreignId('created_by_user_id')->constrained('users')->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('plant_id')->constrained('plants')->onDelete('restrict');
            $table->decimal('target_donation', 10, 2)->default(0);
            $table->decimal('collected_donation', 10, 2)->default(0);
            $table->integer('total_trees_donated')->default(0);
            $table->enum('status', ['active', 'inactive', 'finished'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
