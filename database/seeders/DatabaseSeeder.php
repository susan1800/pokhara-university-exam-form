<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(NotificationSeeder::class);
        $this->call(AuthTableSeeder::class);
        $this->call(PaymentStatusSeeder::class);
        $this->call(UserTableStatusSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
