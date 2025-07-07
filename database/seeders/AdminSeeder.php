<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{
public function run(): void
{
    DB::table('admins')->insert([
        'id_admin'     => Str::uuid(),
        'nom'          => 'Nelson',
        'prenom'       => 'Gilot',
        'email'        => 'nelson@mail.com',
        'mot_de_passe' => Hash::make('1234'),
        'created_at'   => now(),
        'updated_at'   => now(),
    ]);
}

}
