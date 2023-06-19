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
            $table->id();
            $table->integer('event_uid');
            $table->integer('channelId');
            $table->string('channelName');
            $table->string('channelType');
            $table->integer('leaderId');
            $table->string('leaderName');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('imageUrl');
            $table->integer('startTime');
            $table->integer('endTime');
            $table->integer('closeTime');
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