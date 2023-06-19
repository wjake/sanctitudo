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
        Schema::create('free_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->string('name');
            $table->integer('activeMemberCount');
            $table->string('estateGreeting');
            $table->string('estateName');
            $table->string('estatePlot');
            $table->integer('formed');
            $table->string('recruitment');
            $table->string('slogan');
            $table->string('tag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_companies');
    }
};
