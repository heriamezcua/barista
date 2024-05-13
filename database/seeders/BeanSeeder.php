<?php

namespace Database\Seeders;

use App\Models\Bean;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bean::firstOrCreate([
            'product_id' => '4',
            'intensity' => '3',
            'type' => 'vanilla',
        ]);
    }
}
