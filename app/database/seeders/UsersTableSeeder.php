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
        [    
            'name' => '企業ユーザー1',
            'email' => 'company@iclou.com',
            'password' => Hash::make('siro1220'),
            'role' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],

        [
            'name' => '企業ユーザー2',
            'email' => 'company2@iclou.com',
            'password' => Hash::make('siro1220'),
            'role' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],
        
        [
            'name' => '企業ユーザー3',
            'email' => 'company3@iclou.com',
            'password' => Hash::make('siro1220'),
            'role' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]
        ]);
        
    }
}
