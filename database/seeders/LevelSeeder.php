<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $levels = [
        [
           
            'level'                       =>  'first semester',
        ],
        [
           
            'level'                       =>  'second semester',
        ],
        [
           
            'level'                       =>  'third semester',
        ],
        [
           
            'level'                       =>  'fourth semester',
        ],
        [
           
            'level'                       =>  'fifth semester',
        ],
        [
           
            'level'                       =>  'sixth semester',
        ],
        [
           
            'level'                       =>  'seventh semester',
        ],
        [
           
            'level'                       =>  'eighth semester',
        ],
        [
           
            'level'                       =>  'ninth semester',
        ],
        [
           
            'level'                       =>  'tenth semester',
        ],
        [
           
            'level'                       =>  'Passover',
        ],
    ];
    public function run()
    {
        foreach ($this->levels as $auth)
        {
            $result = Level::create($auth);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->levels). ' records');
    }
}
