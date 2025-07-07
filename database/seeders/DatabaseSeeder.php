<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
public function run(): void
{
    $this->call([
        UtilisateursSeeder::class,
        AdminSeeder::class,
        CoursSeeder::class,
        QuizSeeder::class,
        ResulteSeeder::class,
        ReserverSeeder::class,
        NoterSeeder::class,
        MessageSeeder::class,
    ]);
}

}
