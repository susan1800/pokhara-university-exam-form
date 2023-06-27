<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Program;
use App\Models\Level;
use App\Models\Subject;

class SubjectController extends BaseController
{
    public function index(){
        $subjects = Subject::get();

        $this->setPageTitle('Subject', 'Subject');
        return view('admin.subject.index',compact('subjects'));
    }

    public function create(){
        $programs = Program::get();
        $levels = Level::get();
        $this->setPageTitle('Subject', 'Subject');
        return view('admin.subject.create',compact('programs','levels'));
    }


    public function store(Request $request){
        $this->validate($request, [
            'subject'      =>  'required',
            'subject_code'      =>  'required',
            'credit_hours'      =>  'required',
            'level_id'      =>  'required',
            'program_id'      =>  'required',
            'newbatch' =>  'required',
        ]);

        try{

        $subject = new Subject();

        $subject['subject'] = $request->subject;
        $subject['subject_code'] = $request->subject_code;
        $subject['credit_hours'] = $request->credit_hours;
        $subject['level_id'] = $request->level_id;
        $subject['program_id'] = $request->program_id;
        $subject['newbatch'] = $request->newbatch;
        $subject['is_barrier'] = $request->is_barrier;
        $subject['barrier_id'] = $request->barrier_id;
        $subject['concurrent_id'] = $request->concurrent_id;
        // dd($subject);
        $subject->save();

        return $this->responseRedirect('admin.subject.index','Data Created successfully.', 'success', false, false);
    } catch (QueryException $exception) {
        return $this->responseRedirectBack('Error occurred while creating data.  Please try again.', 'error', true, true)->withInput($request->input());
    }
    }

    public function edit($id){
        $subject = Subject::find($id);
        $subjects = Subject::where('program_id',$subject->program_id)->get();
        $programs = Program::get();
        $levels = Level::get();
        $this->setPageTitle('Subject', 'Subject');
        return view('admin.subject.edit',compact('subject','programs','levels','subjects'));
    }


    public function update(Request $request){
        $this->validate($request, [
            'subject'      =>  'required',
            'subject_code'      =>  'required',
            'credit_hours'      =>  'required',
            'level_id'      =>  'required',
            'program_id'      =>  'required',
            'newbatch' =>  'required',
        ]);

        try {
            // dd($request->newbatch);

        $subject = Subject::find($request->id);

        $subject['subject'] = $request->subject;
        $subject['subject_code'] = $request->subject_code;
        $subject['credit_hours'] = $request->credit_hours;
        $subject['level_id'] = $request->level_id;
        $subject['program_id'] = $request->program_id;
        $subject['newbatch'] = $request->newbatch;
        $subject['is_barrier'] = $request->is_barrier;
        $subject['barrier_id'] = $request->barrier_id;
        $subject['concurrent_id'] = $request->concurrent_id;
        // dd($subject);
        $subject->save();

        return $this->responseRedirectBack('Data Updated successfully.', 'success', true, true);
    } catch (QueryException $exception) {
        return $this->responseRedirectBack('Error occurred while updating data.  Please try again.', 'error', true, true)->withInput($request->input());
    }
    }



    public function delete($id){
        try{
            $subject = Subject::find($id);
            $subject->delete();
            return $this->responseRedirectBack('Data deleted successfully.', 'success', true, true);
        } catch (QueryException $exception) {
            return $this->responseRedirectBack('Error occurred while deleting data.  Please try again.', 'error', true, true)->withInput($request->input());
        }

    }


}
