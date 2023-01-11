<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->getUserData();

        foreach($data as $userItem) {
            DB::table('users')->insert($userItem);
        }
    }

    /**
     * @return array[]
     */
    private function getUserData()
    {
        return [
            [
                'username' => 'dungdoan',
                'email' => 'dungdq8393@gmail.com',
                'password' => Hash::make('admin'),
                'department_id' => 1,
                'first_name' => 'Dung',
                'last_name' => 'Doan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'quocdoan',
                'email' => 'quoc.doan@gmail.com',
                'password' => Hash::make('admin'),
                'department_id' => 2,
                'first_name' => 'Quoc',
                'last_name' => 'Doan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'doandung',
                'email' => 'doan.dung@gmail.com',
                'password' => Hash::make('admin'),
                'department_id' => 2,
                'first_name' => 'Doan',
                'last_name' => 'Dung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
