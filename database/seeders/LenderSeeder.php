<?php

namespace Database\Seeders;

use App\Models\Lender;
use Database\Factories\LenderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lender::factory(50)->create();
    }
}
