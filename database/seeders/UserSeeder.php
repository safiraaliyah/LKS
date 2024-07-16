<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
  {
    // Data Admin
    DB::table('users')->insert([
    'name' => 'Ragil',
    'username' => 'ragil',
    'email' => 'ragil@gmail.com',
    'password' => '1234', // Kata sandi tidak di-hash
    'role' => 'admin',
    'created_at' => now(),
    'updated_at' => now(),
    ]);

    DB::table('users')->insert([
    'name' => 'Diana',
    'username' => 'diana',
    'email' => 'diana@gmail.com',
    'password' => '1234', // Kata sandi tidak di-hash
    'role' => 'admin',
    'created_at' => now(),
    'updated_at' => now(),
    ]);

    // Data LKS
    DB::table('users')->insert([
    'name' => 'Panti Wreda Hanna',
    'username' => 'hanna',
    'email' => 'hanna@gmail.com',
    'password' => '1234', // Kata sandi tidak di-hash
    'role' => 'lks',
    'created_at' => now(),
    'updated_at' => now(),
    ]);

    DB::table('users')->insert([
    'name' => 'Panti Wreda Pandu',
    'username' => 'pandu',
    'email' => 'pandu@gmail.com',
    'password' => '1234', // Kata sandi tidak di-hash
    'role' => 'lks',
    'created_at' => now(),
    'updated_at' => now(),
    ]);

    DB::table('users')->insert([
    'name' => 'Panti Wreda Mulya',
    'username' => 'mulya',
    'email' => 'mulya@gmail.com',
    'password' => '1234', // Kata sandi tidak di-hash
    'role' => 'lks',
    'created_at' => now(),
    'updated_at' => now(),
    ]);
  }
}
