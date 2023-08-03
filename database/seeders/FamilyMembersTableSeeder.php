<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('family_members')->insert([
            ['id' => 1, 'name' => 'Budi', 'gender' => 'M', 'parent_id' => NULL],
            ['id' => 2, 'name' => 'Dedi', 'gender' => 'M', 'parent_id' => 1],
            ['id' => 3, 'name' => 'Dodi', 'gender' => 'M', 'parent_id' => 1],
            ['id' => 4, 'name' => 'Dede', 'gender' => 'M', 'parent_id' => 1],
            ['id' => 5, 'name' => 'Dewi', 'gender' => 'F', 'parent_id' => 1],
            ['id' => 6, 'name' => 'Feri', 'gender' => 'M', 'parent_id' => 2],
            ['id' => 7, 'name' => 'Farah', 'gender' => 'F', 'parent_id' => 2],
            ['id' => 8, 'name' => 'Gugus', 'gender' => 'M', 'parent_id' => 3],
            ['id' => 9, 'name' => 'Gandi', 'gender' => 'M', 'parent_id' => 3],
            ['id' => 10, 'name' => 'Hani', 'gender' => 'F', 'parent_id' => 4],
            ['id' => 11, 'name' => 'Hana', 'gender' => 'F', 'parent_id' => 4],
        ]);
    }
}
