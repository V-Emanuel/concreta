<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidades = [
            ['cidade' => 'Antônio Gonçalves'],
            ['cidade' => 'Campo Formoso'],
            ['cidade' => 'Jacobina'],
            ['cidade' => 'Pindobaçu'],
            ['cidade' => 'Senhor do Bonfim'],
        ];

        DB::table('cidades')->insert($cidades);
    }
}
