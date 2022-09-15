<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
class KhaltiController extends Controller
{
    public function verifyPayment(Request $request)
    {
        
        
        $token = $request->token;
        $product_identity = $request->product_identity;
        $total = $request->amount;
        $args = http_build_query(array(
            'token' => $token,
            'amount'  => $total
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $secret_key = "test_secret_key_8c3c0fee7497493fa4c83ca55334f341";


        // test_secret_key_8c3c0fee7497493fa4c83ca55334f341
        $headers = ["Authorization: Key $secret_key"];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($status_code == 200){
            $formsubmit = FormData::where('user_id',session()->get('sessionuseridcosmos'))->first();
                    
                        $formsubmit = FormData::find($formsubmit->id);
                        $formsubmit->payment_remarks = 'Khalti';
                        $formsubmit->payment = 1;

                        $formsubmit->save();
                    
            return 1;
        }
        else{ 
            return 0;
        }
        
    }
}
