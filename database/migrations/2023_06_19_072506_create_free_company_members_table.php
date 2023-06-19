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
        Schema::create('free_company_members', function (Blueprint $table) {
            $table->id();
            $table->integer('free_company_id');
            $table->integer('uid');
            $table->string('name');
            $table->string('rank');
            $table->string('rankIcon');
            $table->string('avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_company_members');
    }
};
