<?php

namespace Database\Seeders;

use App\Models\Monitoring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonitoringSeeder extends Seeder
{
    public function run(): void
    {
        Monitoring::factory(1)->create();
    }
}
