<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\FreeCompany::factory()->create([
            'uid' => env('FREE_COMPANY_ID'),
            'Name' => '',
            'ActiveMemberCount' => 0,
            'EstateGreeting' => '',
            'EstateName' => '',
            'EstatePlot' => '',
            'Formed' => 0,
            'Recruitment' => '',
            'Slogan' => '',
            'Tag' => '',
        ]);
    }
}
