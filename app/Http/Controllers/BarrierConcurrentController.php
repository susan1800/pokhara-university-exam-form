<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarrierConcurrentController extends Controller
{
    public function checkBarrierAndConcurrent(Request $request){



        $backconcurrent = Subject::find($request->subjectid);
        $backs = explode(',',$request->backsub);
        $backsubjects = [];
        foreach($backs as $back){
            if($back != "" && $back != null){
                array_push($backsubjects,$back);
            }
        }



        if($request->addbarrier){

            $addbarrier = Subject::find($request->addbarrier);
            if($addbarrier->concurrent_id){

                    $data1 = Subject::find($addbarrier->concurrent_id);
                    if(!$data1->is_barrier){
                        array_push($backsubjects,$data1->id);


                        if($data1->concurrent_id){

                            $data2 = Subject::find($data1->concurrent_id);
                            if(!$data2->is_barrier){
                                array_push($backsubjects,$data2->id);


                                if($data2->concurrent_id){
                                    $data3 = Subject::find($data2->concurrent_id);
                                    if(!$data->is_barrier){
                                    array_push($backsubjects,$data3->id);
                                    }


                                }
                            }

                        }
                    }


                }

        }

        if($request->addbacksub){



            $addbacksub = Subject::find($request->addbacksub);

                array_push($backsubjects,$addbacksub->id);

                if($addbacksub->concurrent_id){
                    $data1 = Subject::find($addbacksub->concurrent_id);

                    if(!$data1->is_barrier){
                        array_push($backsubjects,$data1->id);


                        if($data1->concurrent_id){

                            $data2 = Subject::find($data1->concurrent_id);
                            dd($data2->is_barrier);
                            if(!$data2->is_barrier){
                                array_push($backsubjects,$data2->id);


                                if($data2->concurrent_id){
                                    $data3 = Subject::find($data2->concurrent_id);
                                    if(!$data->is_barrier){
                                    array_push($backsubjects,$data3->id);
                                    }


                                }
                            }

                        }
                    }


                }

        }
        $regulardata = session()->get('regulardata');



        foreach($regulardata as $regular){

            $i=0;
            foreach($backsubjects as $back){

                $subject = Subject::find($back);

                if($subject->is_barrier == $regular){
                    unset($backsubjects[$i]);
                }
                $i++;

            }

        }
        foreach($backsubjects as $regular){

            $i=0;
            foreach($backsubjects as $back){

                $subject = Subject::find($back);

                if($subject->is_barrier == $regular){
                    unset($backsubjects[$i]);
                }
                $i++;

            }

        }

        $backsubjects = array_unique($backsubjects);

        return view('form.partials.addbacksubject' , compact('backsubjects'));
    }






    public function removeBackSubject(Request $request){


        $backs = explode(',',$request->backsub);
        $backsubjects = [];
        foreach($backs as $back){
            if($back != "" && $back != null){
                array_push($backsubjects,$back);
            }
        }

        $removeid = $request->subjectid;


        $i=0;
        foreach($backsubjects as $back){
            if($back == $removeid){
                unset($backsubjects[$i]);
                // $backsubjects[$i]="";

            }
            $i++;

        }

        return view('form.partials.addbacksubject' , compact('backsubjects'));
    }
}
