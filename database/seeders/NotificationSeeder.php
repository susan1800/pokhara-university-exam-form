<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KeyValue;
class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $payments = [
        [
            'key'                       =>  'notification_count',
            'value'                     =>'0',


        ],

    ];

    public function run()
    {
        foreach ($this->payments as $index => $auth)
        {
            $result = KeyValue::create($auth);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->payments). ' records');
    }
}
