<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionSeeder extends Seeder
{
    private $institution = [
        [
            'name' => 'Laboratoire d\'analyses médicales Absi',
            'location'=> 'Rue Nguyen van troy',
            'opening' => 'Open 24 hours',
            'work_days' => '7 days a week',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institutions')->insert($this->institution);
    }
}
