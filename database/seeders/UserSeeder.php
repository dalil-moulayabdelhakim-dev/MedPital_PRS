<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    private $users = [
        [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => null,
            'id_card_number' => '35245324635',
            'date_of_birth' => null,
            'phone' => '0543676508',
            'gender' => null,
            'user_type_id' => 4,
            'institution_id' => null,
            'address' => 'Bechar - debdaba - Rue de Amir abdelkader',
            'email_verified_at' => null,
            'remember_token' => null,
            'ac_status' => 1,
            'created_at' => '2023-06-09 22:25:09',
            'updated_at' => '2023-06-09 22:25:09'
        ],
        [
            'name' => 'patient',
            'email' => 'patient@gmail.com',
            'password' => null,
            'id_card_number' => '984620376523',
            'date_of_birth' => '2000-11-23',
            'phone' => '0541865568',
            'gender' => 2,
            'user_type_id' => 1,
            'institution_id' => null,
            'address' => 'Bechar - debdaba - Rue de Amir abdelkader',
            'email_verified_at' => null,
            'remember_token' => null,
            'ac_status' => 1,
            'created_at' => '2023-06-09 22:25:09',
            'updated_at' => '2023-06-09 22:25:09'
        ],
        [
            'name' => 'laboratorian',
            'email' => 'lab@gmail.com',
            'password' => null,
            'id_card_number' => '2352689756892',
            'date_of_birth' => null,
            'phone' => '0544826508',
            'gender' => null,
            'user_type_id' => 3,
            'institution_id' => 1,
            'address' => 'Bechar - debdaba - Rue de Amir abdelkader',
            'email_verified_at' => null,
            'remember_token' => null,
            'ac_status' => 1,
            'created_at' => '2023-06-09 22:25:09',
            'updated_at' => '2023-06-09 22:25:09'
        ],

    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < count($this->users); $i++){
            $this->users[$i]['password'] = Hash::make('12345678');
            $rememberToken = str::random(60);
            $this->users[$i]['remember_token'] = $rememberToken;
        }

        DB::table('users')->insert($this->users);
    }
}
