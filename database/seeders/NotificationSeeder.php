<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationCount;
class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $payments = [
        [
            'count'                       =>  '0',


        ],

    ];

    public function run()
    {
        foreach ($this->payments as $index => $auth)
        {
            $result = NotificationCount::create($auth);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->payments). ' records');
    }
}
