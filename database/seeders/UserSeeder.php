<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //to delete all coloum and add again avoid dablecated
        User::truncate();

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'kiro@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'messi@gmail.com',
            'password' => Hash::make(value: '12345678'),
        ]);
    }
}
