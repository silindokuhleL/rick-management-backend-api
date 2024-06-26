<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'Luyanda',
            'email' => 'Luyanda@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');

        $user2 = User::create([
            'name' => 'Sinokuhle',
            'email' => 'Sinokuhle@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user2->assignRole('super admin');

        $this->command->info('User seeded successfully.');
    }
}
