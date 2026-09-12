<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => '企業登録者',
            'email' => 'company@iclou.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        
    }
}
