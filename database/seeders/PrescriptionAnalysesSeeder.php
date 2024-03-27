<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionAnalysesSeeder extends Seeder
{

    protected $preAn = [
        [
            'analyse_id' => 1,
        'prescription_id' => 1,
        ],
        [
            'analyse_id' => 3,
        'prescription_id' => 1,
        ],
        [
            'analyse_id' => 4,
        'prescription_id' => 1,
        ],
        [
            'analyse_id' => 3,
        'prescription_id' => 2,
        ],
        [
            'analyse_id' => 1,
        'prescription_id' => 3,
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prescription_analyses')->insert($this->preAn);
    }
}
