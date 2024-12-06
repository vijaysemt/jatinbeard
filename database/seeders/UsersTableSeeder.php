<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users= new Users;
        $users->name='admin';
        $users->email='admin@gmail.com';
        $users->password='$2y$12$UPVABDmVn3czDOaHMzwEt.yIK6f/46F0qVgZ8CG01BN.5NfuLOCBS';
        $users->role_as=1;
        $users->save();
    }
}
