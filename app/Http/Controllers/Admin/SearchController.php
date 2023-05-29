<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FormData;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request->search;
        $searchpayments = User::where('roll_no', 'like', '%' . $query . '%')->latest()->limit(15)->get();
        if(count($searchpayments)>0){
        // $searchpayments = User::where('roll_no' , 'like' , '%'.$query.'%')->get();
        // dd($searchpayments);
        return view('admin.partials.search' , compact('searchpayments'));
        }
        else{
            return 1;
        }
    }
    public function formSearch(Request $request){
        $query = $request->search;

        $searchdatas = FormData::where('college_roll_no', 'like', '%' . $query . '%')->where('past_semester',0)->get();

        if(count($searchdatas)>0){


        return view('admin.partials.formsearch' , compact('searchdatas'));
        }
        else{
            return 1;
        }
    }
}
