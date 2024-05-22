<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Pavyzdys',
            'email' => 'test@api.org',
            'email_verified_at' => now(),
            'password' => Hash::make('test_api'),
            'remember_token' => Str::random(10),
        ]);
    }
}
