<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('channels')->insert([
            'id' => env('STATIC_CHANNEL_ID'),
            'tag' => env('STATIC_CHANNEL_TAG'),
            'name' => env('STATIC_CHANNEL_TAG'),
            'description' => env('STATIC_CHANNEL_TAG'),
        ]);

        DB::table('channels')->insert([
            'id' => env('RAID_CHANNEL_ID'),
            'tag' => env('RAID_CHANNEL_TAG'),
            'name' => env('RAID_CHANNEL_TAG'),
            'description' => env('RAID_CHANNEL_TAG'),
        ]);

        DB::table('channels')->insert([
            'id' => env('MAPS_CHANNEL_ID'),
            'tag' => env('MAPS_CHANNEL_TAG'),
            'name' => env('MAPS_CHANNEL_TAG'),
            'description' => env('MAPS_CHANNEL_TAG'),
        ]);

        Artisan::call('freecompany:update');
        Artisan::call('raidhelper:update');
    }
}
