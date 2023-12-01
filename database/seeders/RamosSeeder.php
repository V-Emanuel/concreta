<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ramos = [
            ['ramo' => 'Ambiental'],
            ['ramo' => 'Civil'],
            ['ramo' => 'Constitucional'],
            ['ramo' => 'Consumidor'],
            ['ramo' => 'Empresarial'],
            ['ramo' => 'Previdenciário'],
            ['ramo' => 'Tributário'],
        ];

        DB::table('ramos')->insert($ramos);
    }
}
