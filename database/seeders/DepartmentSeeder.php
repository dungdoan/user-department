<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->getDepartmentData();

        foreach($data as $departmentData) {
            DB::table('departments')->insert($departmentData);
        }
    }

    /**
     * @return array[]
     */
    private function getDepartmentData()
    {
        return [
            [
                'id' => 1,
                'name' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
