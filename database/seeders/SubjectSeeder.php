<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Program;
use App\Models\Level;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   protected $subjects;
    public function run()
    {
        $programs = Program::get();
        
        foreach($programs as $program){
            if($program->program == "Information Technology"){
                $IT = $program->id;
            }
            if($program->program == "Computer"){
                $computer = $program->id;
            }
            if($program->program == "Civil"){
                $civil = $program->id;
            }
            if($program->program == "BBA"){
                $BBA = $program->id;
            }
            if($program->program == "Architecture"){
                $arc = $program->id;
            }
            if($program->program == "Electronics"){
                $electronics = $program->id;
            }
        }
        $levels = Level::get();
        foreach($levels as $level){
            if($level->level == "first semester"){
                $first = $level->id;
            }
            if($level->level == "second semester"){
                $second = $level->id;
            }
            if($level->level == "third semester"){
                $third = $level->id;
            }
            if($level->level == "fourth semester"){
                $fourth = $level->id;
            }
            if($level->level == "fifth semester"){
                $fifth = $level->id;
            }
            if($level->level == "sixth semester"){
                $sixth = $level->id;
            }
            if($level->level == "seventh semester"){
                $seventh = $level->id;
            }
            if($level->level == "eighth semester"){
                $eighth = $level->id;
            }
            if($level->level == "ninth semester"){
                $ninth = $level->id;
            }
            if($level->level == "tenth semester"){
                $tenth = $level->id;
            }
        }
        $subjects = [
            [
                'subject'                       =>  'Engineering Mathematics I',
                'subject_code'                   =>  'MTH 112',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Physics',
                'subject_code'                   =>  'PHY 111',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Communication Techniques',
                'subject_code'                   =>  'ENG 111',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Problem Solving Techniques',
                'subject_code'                   =>  'CMP 114',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Basic Electrical Engineering',
                'subject_code'                   =>  'ELE 110',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Programing in C',
                'subject_code'                   =>  'CMP 113',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            // second semester IT
            [
                'subject'                       =>  'Engineering Mathematics II',
                'subject_code'                   =>  'MTH 114',
                
                'concurrent_id'                    => '1',
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Nerwork Theory',
                'subject_code'                   =>  'ELE 211',
                
                'concurrent_id'                    => '5',
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Mathematical Foundation of Computer Science',
                'subject_code'                   =>  'MTH 130',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Electronic Devices',
                'subject_code'                   =>  'ELX 210',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Engineering Drawing',
                'subject_code'                   =>  'MEC 120',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Object Oriented Programming in C++',
                'subject_code'                   =>  'CMP 115',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Engineering Mathematics III',
                'subject_code'                   =>  'MTH 212',
                
                'concurrent_id'                    => '7',
                'barrier_id'                       => '1',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Logic Circuits',
                'subject_code'                   =>  'ELX 212',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Data Structure and Algorithm',
                'subject_code'                   =>  'CMP 225',
    
                'concurrent_id'                    => '6',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Probability and Queueing Theory',
                'subject_code'                   =>  'MTH 221',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Web Technology',
                'subject_code'                   =>  'CMP 213',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Electronic Circuit and Instrumentation',
                'subject_code'                   =>  'ELX 213',
              
                'concurrent_id'                    => '10',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Engineering Mathematics IV',
                'subject_code'                   =>  'MTH 214',
               
                'barrier_id'                       => '7',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Microprocessor and Assembly Language Programmming',
                'subject_code'                   =>  'CMP 214',
         
                'concurrent_id'                    => '14',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Programming in JAVA',
                'subject_code'                   =>  'CMP 212',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Database Management Systems',
                'subject_code'                   =>  'CMP 226',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Software Engineering Fundamentals',
                'subject_code'                   =>  'CMP 220',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Project I',
                'subject_code'                   =>  'CMP 290',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$fourth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Applied Operating Systems',
                'subject_code'                   =>  'CMP 331',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Numericals Methods',
                'subject_code'                   =>  'MTH 230',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Computer Organization and Architecture',
                'subject_code'                   =>  'CMP 334',
                
                'barrier_id'                      => '14',
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Organization and Management',
                'subject_code'                   =>  'MGT 321',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Signals,Systems & Processing',
                'subject_code'                   =>  'CMM 311',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Principles of Communications',
                'subject_code'                   =>  'CMM 313',
             
                'concurrent_id'                    => '8',
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Computer Graphics',
                'subject_code'                   =>  'CMP 241',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Computer Networks',
                'subject_code'                   =>  'CMP 335',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Inteligent Systems',
                'subject_code'                   =>  'CMP 456',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Information Systems',
                'subject_code'                   =>  'CMP 481',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Object Oriented Design and Modelling through UML',
                'subject_code'                   =>  'CMP 321',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Project II',
                'subject_code'                   =>  'CMP 390',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$sixth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Multimedia Systems',
                'subject_code'                   =>  'CMP 341',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'ICT Project Management',
                'subject_code'                   =>  'CMP 483',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Business process and IT Strategy',
                'subject_code'                   =>  'CMP 482',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$seventh,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Network Programming',
                'subject_code'                   =>  'CMP 436',

                'concurrent_id'                    => '32',
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Telecommunications',
                'subject_code'                   =>  'CMM 411',
                
                'barrier_id'                       => '30',
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Elective I',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Mobile and Wireless Communications',
                'subject_code'                   =>  'CMM 420',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Engineering Economics',
                'subject_code'                   =>  'ECO 411',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Social and Professional Issues in IT',
                'subject_code'                   =>  'CMP 484',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$eighth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Elective II',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Project III',
                'subject_code'                   =>  'CMP 490',
                
                
                'credit_hours'                     => '5',
                'level_id'                          =>$eighth,
                'program_id'                        =>$IT,
            ],

             // Computer program subject details

            [
                'subject'                       =>  'Engineering Mathematics I',
                'subject_code'                   =>  'MTH 112',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Chemistry',
                'subject_code'                   =>  'CHM 111',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$first,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Communication Techniques',
                'subject_code'                   =>  'ENG 111',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Programming in C',
                'subject_code'                   =>  'CMP 113',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Basic Electrical Engineering',
                'subject_code'                   =>  'ELE 110',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Mechanical Workshop',
                'subject_code'                   =>  'MEC 110',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$first,
                'program_id'                        =>$computer,
            ],
            // second semester computer
            [
                'subject'                       =>  'Engineering Mathematics II',
                'subject_code'                   =>  'MTH 114',
                
                'concurrent_id'                   =>'48',
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Physics',
                'subject_code'                   =>  'PHY 111',
                
                'credit_hours'                     => '4',
                'level_id'                          =>$second,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Engineering Drawing',
                'subject_code'                   =>  'MEC 120',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Object Oriented Programming in C++',
                'subject_code'                   =>  'CMP 115',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Thermal Science',
                'subject_code'                   =>  'MEC 111',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Applied Mechanics I',
                'subject_code'                   =>  'MEC 130',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Engineering Mathematics III',
                'subject_code'                   =>  'MTH 212',
                
                'concurrent_id'                   =>'54',
                'barrier_id'                       =>'48',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Data Structure and Algorithm',
                'subject_code'                   =>  'CMP 225',
    
                'concurrent_id'                   =>'51',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Electrical Engineering Materials',
                'subject_code'                   =>  'ELE 210',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Network Theory',
                'subject_code'                   =>  'ELE 211',
                
                'concurrent_id'                   =>'52',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Electronic Devices and Circuits',
                'subject_code'                   =>  'ELX 211',
              
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Logic Circuits',
                'subject_code'                   =>  'ELX 212',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Engineering Mathematics IV',
                'subject_code'                   =>  'MTH 214',
                
                'concurrent_id'                   =>'60',
                'concurrent_id'                   =>'54',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Instrumentation',
                'subject_code'                   =>  'ELX 231',
         
                'concurrent_id'                   =>'63',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Database Management Systems',
                'subject_code'                   =>  'CMP 226',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Programming Technology',
                'subject_code'                   =>  'CMP 211',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Microprocessors',
                'subject_code'                   =>  'ELX 230',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Project I',
                'subject_code'                   =>  'CMP 290',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$fourth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Numericals Methods',
                'subject_code'                   =>  'MTH 230',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Probability and Statistics',
                'subject_code'                   =>  'MTH 220',
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Operating Systems',
                'subject_code'                   =>  'CMP 330',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Computer Architecture',
                'subject_code'                   =>  'CMP 332',
                
                'barrier_id'                   =>'65',
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Computer Graphics',
                'subject_code'                   =>  'CMP 241',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Theory of Computation',
                'subject_code'                   =>  'CMP 326',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Simulation and Modeling',
                'subject_code'                   =>  'CMP 350',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Data Communication',
                'subject_code'                   =>  'CMM 340',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Object Oriented Software Engineering',
                'subject_code'                   =>  'CMP 320',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Embedded Systems',
                'subject_code'                   =>  'ELX 312',
                
                'concurrent_id'                   =>'70',
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Elective I',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Project II',
                'subject_code'                   =>  'CMP 390',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$sixth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Engineering Economics',
                'subject_code'                   =>  'ECO 411',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Image Processing & Pattern Recognition',
                'subject_code'                   =>  'CMP 441',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Artificial Intelligence',
                'subject_code'                   =>  'CMP 455',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Computer Networks',
                'subject_code'                   =>  'CMP 335',
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'ICT Project Management',
                'subject_code'                   =>  'CMM 483',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Elective II',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Digital Signal Analysis and Processing',
                'subject_code'                   =>  'CMM 442',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Social and Professional Issue in IT',
                'subject_code'                   =>  'CMP 484',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$eighth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Organization and Management',
                'subject_code'                   =>  'MGT 321',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$eighth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Information Systems',
                'subject_code'                   =>  'CMP 481',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Elective III',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$computer,
            ],
            [
                'subject'                       =>  'Project III',
                'subject_code'                   =>  'CMP 490',
                
                
                'credit_hours'                     => '5',
                'level_id'                          =>$eighth,
                'program_id'                        =>$computer,
            ],

            // Civil subject details
            [
                'subject'                       =>  'Engineering Mathematics I',
                'subject_code'                   =>  'MTH 112',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Physics',
                'subject_code'                   =>  'PHY 111',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$first,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Thermal Science',
                'subject_code'                   =>  'MEC 111',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Engineering Drawing',
                'subject_code'                   =>  'MEC 120',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Programming in C',
                'subject_code'                   =>  'CMP 113',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Basic Electrical Engineering',
                'subject_code'                   =>  'ELE 110',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Engineering Mathematics II',
                'subject_code'                   =>  'MTH 114',
                
                'concurrent_id'                   => '96',
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Chemistry',
                'subject_code'                   =>  'CHM 111',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$second,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Object Oriented Programming in C++',
                'subject_code'                   =>  'CMP 115',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Communication Techniques',
                'subject_code'                   =>  'ENG 111',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Mechanical Workshop',
                'subject_code'                   =>  'MEC 110',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$second,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Applied Mechanics I',
                'subject_code'                   =>  'MEC 130',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Engineering Mathematics III',
                'subject_code'                   =>  'MTH 212',
                
                'concurrent_id'                   =>'112',
                'barrier_id'                      =>'96',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Applied Mechanics II',
                'subject_code'                   =>  'MEC 131',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Civil Engineering Materials',
                'subject_code'                   =>  'CVL 211',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Fluid Mechanics',
                'subject_code'                   =>  'WRE 210',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Strength of Materials',
                'subject_code'                   =>  'STR 210',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Engineering Geology',
                'subject_code'                   =>  'GTE 210',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Project I',
                'subject_code'                   =>  'CVL 290',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$third,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Probability and Statistics',
                'subject_code'                   =>  'MTH 220',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Surveying I',
                'subject_code'                   =>  'CVL 221',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Basic Electronics Engineering',
                'subject_code'                   =>  'Elx 110',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fourth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Numerical Methods',
                'subject_code'                   =>  'MTH 230',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Hydraulics',
                'subject_code'                   =>  'WRE 211',
                
                'concurrent_id'                   =>'111',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Structural Analysis I',
                'subject_code'                   =>  'STR 212',
                
                'concurrent_id'                   =>'112',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Building Technology',
                'subject_code'                   =>  'ARC 358',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fifth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Engineering Hydrology',
                'subject_code'                   =>  'WRE 350',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fifth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Structural Analysis II',
                'subject_code'                   =>  'STR 312',
                
                'concurrent_id'                   =>'120',
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Soil Mechanics',
                'subject_code'                   =>  'GTE 320',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$fifth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Water Supply Engineering',
                'subject_code'                   =>  'ENV 330',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Project II',
                'subject_code'                   =>  'CVL 390',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$fifth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Surveying II',
                'subject_code'                   =>  'CVL 321',
                
                'concurrent_id'                   =>'116',
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Irrigation Engineering',
                'subject_code'                   =>  'WRE 320',
                
                'concurrent_id'                   =>'111',
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Design of Steel and Timber Structures',
                'subject_code'                   =>  'STR 320',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Foundation Engineering',
                'subject_code'                   =>  'GTE 321',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Sanitary Engineeering',
                'subject_code'                   =>  'ENV 331',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Concrete Technology & Masonry Structures',
                'subject_code'                   =>  'STR 331',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Survey Field Project',
                'subject_code'                   =>  'CVL 322',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$sixth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Design of R.C.C Structures',
                'subject_code'                   =>  'STR 440',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Transportation Engineering I',
                'subject_code'                   =>  'TRP 441',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Hydropower Engineering',
                'subject_code'                   =>  'WRE 430',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Estimating and Valuation',
                'subject_code'                   =>  'CVL 431',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Elective I',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Engineering Economics',
                'subject_code'                   =>  'ECO 411',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Construction Project Management',
                'subject_code'                   =>  'CVL 441',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Engineering Professional Practice',
                'subject_code'                   =>  'CVL 440',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$eighth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Transportation Engineering II',
                'subject_code'                   =>  'TRP 412',
                
                'concurrent_id'                   =>'135',
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Elective II',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$civil,
            ],
            [
                'subject'                       =>  'Project III',
                'subject_code'                   =>  'CVL 490',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$civil,
            ],

            // Architecture subjects details
            [
                'subject'                       =>  'Mathematics I',
                'subject_code'                   =>  'MTH 112',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Materials',
                'subject_code'                   =>  'ARC 151',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architecture Modeling',
                'subject_code'                   =>  'MARC 111',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Graphics I',
                'subject_code'                   =>  'ARC 112',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Introduction to Architecture',
                'subject_code'                   =>  'ARC 121',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Basic Design I',
                'subject_code'                   =>  'ARC 101',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$first,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Mathematics II',
                'subject_code'                   =>  'MTH 122',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Communication Techniques',
                'subject_code'                   =>  'ENG 104',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Computer and Programming',
                'subject_code'                   =>  'CMP 101',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Graphics II',
                'subject_code'                   =>  'ARC 113',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Photography',
                'subject_code'                   =>  'ARC 114',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Basic Design II',
                'subject_code'                   =>  'ARC 102',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$second,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Structural Forms',
                'subject_code'                   =>  'ARC 222',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Surveying',
                'subject_code'                   =>  'SRV 202',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Science I',
                'subject_code'                   =>  'ARC 241',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Visual Arts',
                'subject_code'                   =>  'ARC 215',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'History of Western Arch.',
                'subject_code'                   =>  'ARC 231',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Design I',
                'subject_code'                   =>  'ARC 203',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$third,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Statics and Dynamics',
                'subject_code'                   =>  'AMEC 208',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fourth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Computer Aided Design I',
                'subject_code'                   =>  'CMP 212',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fourth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Services I',
                'subject_code'                   =>  'ARC 242',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fourth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Construction I',
                'subject_code'                   =>  'ARC 252',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fourth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'History of Eastern Arch.',
                'subject_code'                   =>  'ARC 232',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fourth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Design II',
                'subject_code'                   =>  'ARC 204',
                
                
                'credit_hours'                     => '5',
                'level_id'                          =>$fourth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Structure I',
                'subject_code'                   =>  'STR 331',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fifth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Computer Aided Design II',
                'subject_code'                   =>  'CMP 313',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fifth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Construction II',
                'subject_code'                   =>  'ARC 353',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fifth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Elective I',
                'subject_code'                   =>  'ARC 361',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fifth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'History of Nepalese Arch.',
                'subject_code'                   =>  'ARC 333',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$fifth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Design III',
                'subject_code'                   =>  'ARC 305',
                
                
                'credit_hours'                     => '5',
                'level_id'                          =>$fifth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Structure II',
                'subject_code'                   =>  'STR 332',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Science II',
                'subject_code'                   =>  'ARC 305',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$sixth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Construction III',
                'subject_code'                   =>  'ARC 354',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$sixth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Landscape Architecture',
                'subject_code'                   =>  'ARC 371',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$sixth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'History of Modern Arch.',
                'subject_code'                   =>  'ARC 334',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$sixth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Design IV',
                'subject_code'                   =>  'ARC 306',
                
                
                'credit_hours'                     => '5',
                'level_id'                          =>$sixth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Structure III',
                'subject_code'                   =>  'STR 433',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Working Drawings & Detailing',
                'subject_code'                   =>  'ARC 423',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$seventh,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Settlement Planning',
                'subject_code'                   =>  'ARC 481',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Elective II',
                'subject_code'                   =>  'ARC 462',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$seventh,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Design V',
                'subject_code'                   =>  'ARC 407',
                
                
                'credit_hours'                     => '5',
                'level_id'                          =>$seventh,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Practical Office Experience',
                'subject_code'                   =>  'ARC',
                
                
                'credit_hours'                     => '15',
                'level_id'                          =>$eighth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Structure IV',
                'subject_code'                   =>  'STR 434',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$ninth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Elective III',
                'subject_code'                   =>  'ARC 563',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$ninth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Estimating and Valuation',
                'subject_code'                   =>  'ARC 455',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$ninth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Directed Studies & Seminar',
                'subject_code'                   =>  'ARC 465',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$ninth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Building Services II',
                'subject_code'                   =>  'ARC 443',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$ninth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Design VI',
                'subject_code'                   =>  '408',
                
                
                'credit_hours'                     => '5',
                'level_id'                          =>$ninth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Management & Economics',
                'subject_code'                   =>  'ARC 524',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$tenth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architects & Society',
                'subject_code'                   =>  'SOC 411',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$tenth,
                'program_id'                        =>$arc,
            ],
            [
                'subject'                       =>  'Architectural Design VII Thesis',
                'subject_code'                   =>  'ARC 509',
                
                
                'credit_hours'                     => '10',
                'level_id'                          =>$tenth,
                'program_id'                        =>$arc,
            ],

            // BBA subjects details

            [
                'subject'                       =>  'English I',
                'subject_code'                   =>  'ENG 101',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Business Mathematics I',
                'subject_code'                   =>  'MTH 101',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Financial Accounting I',
                'subject_code'                   =>  'ACC 121',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Principles of Management',
                'subject_code'                   =>  'MGT 111',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Computer and IT Application',
                'subject_code'                   =>  'MIS 101',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$BBA,
            ],
            //2nd sem
            [
                'subject'                       =>  'English II',
                'subject_code'                   =>  'ENG 102',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Business Mathematics II',
                'subject_code'                   =>  'MTH 102',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Financial Accounting II',
                'subject_code'                   =>  'ACC 122',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'General Psychology',
                'subject_code'                   =>  'PSY 101',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Introductory Microeconomics',
                'subject_code'                   =>  'ECO 101',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$BBA,
            ],
            //3rd sem
            [
                'subject'                       =>  'Business Communication I',
                'subject_code'                   =>  'ENG 201',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Business Statistics',
                'subject_code'                   =>  'STT 101',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Essentials of Finance',
                'subject_code'                   =>  'FIN 131',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Fundamentals of Society',
                'subject_code'                   =>  'SCO 101',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Introductory Microeconomics',
                'subject_code'                   =>  'ECO 201',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$BBA,
            ],
            //4th sem
            [
                'subject'                       =>  'Business Communication II',
                'subject_code'                   =>  'ENG 202',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Data Analysis and Modeling',
                'subject_code'                   =>  'STT 201',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'fundamentals of Organizational Behavior',
                'subject_code'                   =>  'MGT 211',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Principle of Marketing',
                'subject_code'                   =>  'MKT 241',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Financial Management',
                'subject_code'                   =>  'FIN 231',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$BBA,
            ],
            //5th sem
            [
                'subject'                       =>  'Basics of Managerial Accounting',
                'subject_code'                   =>  'ACC 211',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Business Research Methods',
                'subject_code'                   =>  'RCH 311',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Management of Human Resources',
                'subject_code'                   =>  'MGT 314',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Fundamentals of Operations Managements',
                'subject_code'                   =>  'MGT 311',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Concentration',
                'subject_code'                   =>  '',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$BBA,
            ],
            //6th sem
            [
                'subject'                       =>  'Introduction to management Information Systems',
                'subject_code'                   =>  'MIS 201',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Legal Aspects of Business and Technology',
                'subject_code'                   =>  'LAW 291',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Business and Society',
                'subject_code'                   =>  'MGT 212',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Project Work',
                'subject_code'                   =>  'PRJ 491',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Concentration II',
                'subject_code'                   =>  '',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$BBA,
            ],
            //7th sem
            [
                'subject'                       =>  'Basics of Managerial Accounting',
                'subject_code'                   =>  'ACC 221',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Basics Research Methods',
                'subject_code'                   =>  'RCH 311',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Management of Human Resource',
                'subject_code'                   =>  'MGT 314',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Fundamentals of Operations Management',
                'subject_code'                   =>  'MGT 311',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Concentration III',
                'subject_code'                   =>  '',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$BBA,
            ],
            //8th sem
            [
                'subject'                       =>  'Strategic Management',
                'subject_code'                   =>  'MGT 412',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Introduction to International Business',
                'subject_code'                   =>  'MGT 313',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Essential of E-Business',
                'subject_code'                   =>  'MIS 202',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Elective II',
                'subject_code'                   =>  '',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$BBA,
            ],
            [
                'subject'                       =>  'Concentration IV',
                'subject_code'                   =>  '',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$BBA,
            ],

             //    Electronics and communiction engineering

             [
                'subject'                       =>  'Engineering Mathematics I',
                'subject_code'                   =>  'MTH 112',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Chemistry',
                'subject_code'                   =>  'CHM 111',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$first,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Programming in C',
                'subject_code'                   =>  'CMP 113',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Communication Techniques',
                'subject_code'                   =>  'ENG 111',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$first,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Mechanical Workshop',
                'subject_code'                   =>  'MEC 110',
                
                
                'credit_hours'                     => '1',
                'level_id'                          =>$first,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Basic Electrical Engineering',
                'subject_code'                   =>  'ELE 110',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Engineering Mathematics II',
                'subject_code'                   =>  'MTH 114',
                
                'concurrent_id'                    =>'236',
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Physics',
                'subject_code'                   =>  'PHY 111',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$second,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Engineering Drawing',
                'subject_code'                   =>  'MEC 120',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Object Oriented Programming in C',
                'subject_code'                   =>  'CMP 115',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Thermal Science',
                'subject_code'                   =>  'MEC 111',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$second,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Applied Mechanics I',
                'subject_code'                   =>  'MEC 130',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Engineering Mathematics III',
                'subject_code'                   =>  'MTH 212',
                
                'concurrent_id'                    =>'242',
                'barrier_id'                       =>'236',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Logic Circuits',
                'subject_code'                   =>  'ELX 212',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Electromagnetic Field and Waves',
                'subject_code'                   =>  'ELX 220',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Network Theory',
                'subject_code'                   =>  'ELE 211',
                
                'concurrent_id'                    =>'241',
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Electronic Devices',
                'subject_code'                   =>  'ELX 210',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$third,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Electrical Engineering Materials',
                'subject_code'                   =>  'ELE 210',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$third,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Engineering Mathematics IV',
                'subject_code'                   =>  'MTH  214',
                
                'concurrent_id'                    =>'248',
                'barrier_id'                    =>'242',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Instrumentation',
                'subject_code'                   =>  'ELX 231',
                
                'concurrent_id'                    =>'251',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Electronics Circuits',
                'subject_code'                   =>  'ELX 214',
                
                'concurrent_id'                    =>'252',
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Mcroprocessors',
                'subject_code'                   =>  'ELX 230',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Numerical Methods',
                'subject_code'                   =>  'MTH  230',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Project I',
                'subject_code'                   =>  'ELX 290',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fourth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Control Systems',
                'subject_code'                   =>  'ELE 322',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Embedded Systems',
                'subject_code'                   =>  'ELX 312',
                
                'concurrent_id'                    =>'257',
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Signals and Systems',
                'subject_code'                   =>  'CMM 310',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Computer Graphics',
                'subject_code'                   =>  'CMP 241',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Integrated Digital Electronics',
                'subject_code'                   =>  'ELX 315',
                
                'concurrent_id'                    =>'256',
                'barrier_id'                       =>'252',
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Probability and Statistics',
                'subject_code'                   =>  'MTH 220',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$fifth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Industrial Electronics and Drives',
                'subject_code'                   =>  'ELX 316',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Analog communication',
                'subject_code'                   =>  'CMM 330',
                
                'concurrent_id'                    =>'260',
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Filter Design',
                'subject_code'                   =>  'ELX 313',
                
                'barrier_id'                       =>'251',
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Computer Organization',
                'subject_code'                   =>  'CMP 333',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Engineering Economics',
                'subject_code'                   =>  'ECO 411',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Elective I',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$sixth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Research Methodology',
                'subject_code'                   =>  'ELE 360',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$seventh,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Electromagnetic Propagation and Antenna',
                'subject_code'                   =>  'ELX 420',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Digital Communication',
                'subject_code'                   =>  'CMM 440',
                
                'concurrent_id'                    =>'267',
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Computer Networks',
                'subject_code'                   =>  'CMP 335',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Digital Signal Processing',
                'subject_code'                   =>  'CMM 441',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Elective II',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$seventh,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Project II',
                'subject_code'                   =>  'ELX 390',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$seventh,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Organization and Management',
                'subject_code'                   =>  'MGT 321',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$eighth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Telecommunications',
                'subject_code'                   =>  'CMM 411',
                
                'concurrent_id'                    =>'273',
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Wireless Communications Technology',
                'subject_code'                   =>  'CMM 421',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Professionals Ethics in Engineering',
                'subject_code'                   =>  'ELX 460',
                
                
                'credit_hours'                     => '2',
                'level_id'                          =>$eighth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Elective III',
                'subject_code'                   =>  '---',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$eighth,
                'program_id'                        =>$electronics,
            ],
            [
                'subject'                       =>  'Project III',
                'subject_code'                   =>  'Elx 490',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$eighth,
                'program_id'                        =>$electronics,
            ],
        ];

        foreach ($subjects as $subject)
        {
            $result = Subject::create($subject);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        // $this->command->info('Inserted '.count($this->subjects). ' records');
    
    }
}
