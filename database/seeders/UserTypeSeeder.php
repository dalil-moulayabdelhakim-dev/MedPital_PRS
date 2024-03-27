<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    private $userType = [
        [
            'name' => 'patient',
        ],
        [
            'name' => 'admin',
        ],
        [
            'name' => 'laboratorian',
        ],
        [
            'name' => 'super-admin',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_types')->insert($this->userType);
    }
}
