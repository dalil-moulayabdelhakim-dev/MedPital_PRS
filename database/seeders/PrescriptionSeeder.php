<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionSeeder extends Seeder
{
    private $presc = [
        [
            'patient_id' => 1,
            'institution_id' => 1,
            'status' => 0,
            'created_at' => '2024-01-11 23:27:44',
            'updated_at' => '2024-01-11 23:27:44'
        ],

        [
            'patient_id' => 1,
            'institution_id' => 1,
            'status' => 0,
            'created_at' => '2024-01-11 23:27:44',
            'updated_at' => '2024-01-11 23:27:44'
        ],

        [
            'patient_id' => 1,
            'institution_id' => 1,
            'status' => 0,
            'created_at' => '2024-01-11 23:27:44',
            'updated_at' => '2024-01-11 23:27:44'
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prescriptions')->insert($this->presc);
    }
}
