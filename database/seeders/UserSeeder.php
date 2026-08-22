<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin BPKAD',
            'email' => 'admin@bpkad.go.id', // Using this as username representation too
            'password' => Hash::make('bpkadadmin'),
        ]);
        
        // Since the prompt mentioned "nama user admin", I'll make sure they can login with email too, 
        // but wait, standard Laravel auth uses email. Let's create a user with email 'admin'.
        // Actually, email format validation might fail if it's not a valid email, so I will use 'admin' as name, and login using name or email.
        // I will change the login logic to allow login by 'email' column but the value doesn't strictly have to be an email if validation allows, or I can add 'username' column.
        // Let's just use 'admin' as email to keep it simple, or 'admin@bpkad.go.id' as email but allow login with 'email' or 'name'.
        // The safest standard way without modifying migration is use 'admin' as email field even though it's not a real email format, but we remove email validation in login.
        
        User::create([
            'name' => 'Administrator',
            'email' => 'admin', 
            'password' => Hash::make('bpkadadmin'),
        ]);
    }
}
