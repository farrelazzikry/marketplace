<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Calvera ID',
            'email' => 'admin@calvera.id',
            'password' => Hash::make('admincalvera123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}