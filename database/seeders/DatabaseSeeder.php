<?php

namespace Database\Seeders;

use App\Models\Contacts;

class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        Contacts::factory()->count(10)->create();
    }
}