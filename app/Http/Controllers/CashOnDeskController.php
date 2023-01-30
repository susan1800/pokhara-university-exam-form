<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class CashOnDeskController extends Controller
{
    public function updatepaymentmethod(){
        $formsubmit = FormData::where('user_id',session()->get('sessionuseridcosmos'))->first();    
        $formsubmit = FormData::find($formsubmit->id);
        $formsubmit->payment_remarks = 'cash on desk';
        $formsubmit->payment = 0;

        $formsubmit->save();
                    
        // return 1;
        return redirect()->route('submit.complete');
    }
}
