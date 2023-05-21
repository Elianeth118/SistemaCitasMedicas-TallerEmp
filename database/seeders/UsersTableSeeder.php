<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Elianeth',
            'email' => 'aragonelianeth@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('aragon2'), // password
            'cedula'=>'03400023',
            'address'=>'Oaxaca de Juarez',
            'phone'=>'9512544162',
            'role'=>'admin'
        ]);
        User::create([
            'name' => 'Paciente1',
            'email' => 'paciente1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role'=>'paciente'
        ]);
        User::create([
            'name' => 'Medico 1',
            'email' => 'medico1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role'=>'doctor'
        ]);
        User::factory()
        ->count(50)
        ->state(['role'=>'paciente'])
        ->create();
    }
}
