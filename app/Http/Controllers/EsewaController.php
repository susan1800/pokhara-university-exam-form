<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class EsewaController extends Controller
{
    public function verifyPayment(Request $request , $q ,$order_code)
    {
        
        $status = $request->q;
        
        $oid = $request->oid;
        $refId = $request->refId;
        $amt = $request->amt;
       

        if ($status == 'su') {
            $url = "https://uat.esewa.com.np/epay/transrec";
            $data = [
                'amt' => $amt,
                'rid' => $refId,
                'pid' => $oid,
                'scd' => "{{  env('ESHEWA_SCD_KEY') }}",
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
 
            if (strpos($response, "Success") == true) {
                $orders = Order::where('combined_order_id',session()->get('combined_order_id'))->get();;
                    foreach ($orders as $order) {
                        $order = Order::find($order->id);
                        $order->payment_type = 'E-Sewa';
                        $order->payment_status = "paid";

                        $order->save();
                    }
            flash(translate('Your order has been placed successfully. Please submit payment information from purchase history'))->success();
                    return redirect()->route('order_confirmed');
            } else {
                return redirect()->route('order_confirmed');
            }
        } else {
            return redirect()->route('order_confirmed');
        }
    }
}
