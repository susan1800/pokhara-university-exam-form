<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $programs = [
        [
            'program'                       =>  'Information Technology',
            'departnment'                   =>  'ICT',
        ],
        [
            'program'                       =>  'Computer',
            'departnment'                   =>  'ICT',
        ],
        [
            'program'                       =>  'Electronics',
            'departnment'                   => 'ICT',
        ],
        [
            'program'                       =>  'Civil',
            'departnment'                   =>  'Civil',
        ],
        [
            'program'                       =>  'Architecture',
            'departnment'                   =>  'Architecture',
        ],
        [
            'program'                       =>  'BBA',
            'departnment'                   =>  'BBA',
        ],

    ];
    public function run()
    {
        foreach ($this->programs as $auth)
        {
            $result = Program::create($auth);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->programs). ' records');
    }
}

