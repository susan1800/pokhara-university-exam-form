<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentStatus;
class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $payments = [
        [
            'roll_no'                       =>  '100101',
             'approve_form'                       =>  '1',
                'name'          =>          'abcd',

        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->payments as $index => $auth)
        {
            $result = PaymentStatus::create($auth);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->payments). ' records');
    }
}
