<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionAnalyse extends Seeder
{
    protected $insAnaly = [
        [
            'institution_id' => 1,
            'analyse_id' => 1,
            'cost' => 5000,
        ],
        [
            'institution_id' => 1,
            'analyse_id' => 3,
            'cost' => 2000,
        ],
        [
            'institution_id' => 1,
            'analyse_id' => 4,
            'cost' => 2000,
        ],
        [
            'institution_id' => 1,
            'analyse_id' => 5,
            'cost' => 5800,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institution_analyses')->insert($this->insAnaly);
    }
}
