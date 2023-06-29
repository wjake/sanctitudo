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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('channel_id');
            $table->integer('leaderId');
            $table->string('leaderName');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('imageUrl');
            $table->integer('startTime');
            $table->integer('endTime');
            $table->integer('closingTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
