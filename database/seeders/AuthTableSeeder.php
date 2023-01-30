<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auth;
class AuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        protected $auths = [
            [
                'title'                       =>  'admin',

            ],
            [
                'title'                       =>  'user',

            ],


            // [
            //     'longitude'                       =>  'Longitude',
            //     'value'                           =>  '85.3096',
            // ],
            // [
            //     'website'                       =>  'paypal_secret_id',
            //     'value'                     =>  '',
            // ],
        ];

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            foreach ($this->auths as $index => $auth)
            {
                $result = Auth::create($auth);
                if (!$result) {
                    $this->command->info("Insert failed at record $index.");
                    return;
                }
            }
            $this->command->info('Inserted '.count($this->auths). ' records');
        }


}
