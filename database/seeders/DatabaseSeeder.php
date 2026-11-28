<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $name = config('admin.name');
        $email = config('admin.email');
        $password = config('admin.password');

        if (filled($name) && filled($email) && filled($password)) {
            User::updateOrCreate(
                ['email' => $email],
                ['name' => $name, 'password' => Hash::make($password)],
            );
        }
    }
}
