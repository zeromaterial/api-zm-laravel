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
            $table->string('campaign_title');
            $table->string('campaign_image')->nullable();
            $table->string('campaign_location');
            $table->unsignedBigInteger('created_by_user_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('plant_type');
            $table->integer('total_donation')->default(0);
            $table->integer('total_trees_donated')->default(0);
            $table->boolean('isactive')->default(false);
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
