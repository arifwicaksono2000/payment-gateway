<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction; //Lokasi Model
use App\UserDb;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaction = new Transaction;
        $user_db = new UserDb;

        // $transaction_last = $transaction->orderBy('id', 'desc')->first()->id;
        // $intstr = strval($transaction_last);
        
        $transaction->total_payment = $request->total_payment; // request
        $transaction->payment_status = 'false';

        $user_db->email_buyer = $request->email_buyer; // request
        $user_db->email_seller = $request->email_seller; // request
        $user_db->buyer_name = $request->buyer_name; // request

        $transaction->save();
        $user_db->save();


        // get latest id from tables
        $user_db_last_id = $user_db->orderBy('id', 'desc')->first()->id;
        $transaction_last_id = $transaction->orderBy('id', 'desc')->first()->id;

        // update user_db in latest row of table transaction
        $current_transaction = $transaction->find($transaction_last_id);
        $current_transaction->user_id = $user_db_last_id;
        $current_transaction->save();

        // // get latest buyer_name
        // $user_db_last_buyer = $user_db->orderBy('id', 'desc')->first()->buyer_name;


        return response()->json([
            'url1'=>'https://payment-gateway-iai.herokuapp.com/',
            'url2'=> $transaction_last_id
        ]);

        // return response()->json([
        //     'url1'=>'https://payment-gateway-iai.herokuapp.com/payment/'.$intstr,
        //     'url2'=> $transaction_last
        // ]);

        // $transaction = Transaction::get()->toJson(JSON_PRETTY_PRINT);
        // return response($transaction, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user_db = new UserDb;
        $user_db_last = $user_db->orderBy('id', 'desc')->first();

        return $user_db_last->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trans()
    {
        $transaction = new Transaction;
        $transaction_last = $transaction->orderBy('id', 'desc')->first();

        $transaction_type = $transaction_last->payment_type;

        if($transaction_type == "ewallet"){
            return $transaction_last->toJson();
        }
        else{
            // Update status to true
            $transaction_last_id = $transaction_last->id;
            $current_transaction = $transaction->find($transaction_last_id);
            $current_transaction->payment_status = true;
            $current_transaction->save();

            return $transaction_last->toJson();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function flip()
    {
        $transaction = new Transaction;
        $transaction_last = $transaction->orderBy('id', 'desc')->first();

        $transaction_last_id = $transaction_last->id;
        $current_transaction = $transaction->find($transaction_last_id);
        $current_transaction->payment_status = true;
        $current_transaction->save();

        return $transaction_last->toJson();
    }

    public function type(Request $request)
    {
        $transaction = new Transaction;
        $transaction_last = $transaction->orderBy('id', 'desc')->first();

        // var_dump($request->payment);
        
        $transaction_last_id = $transaction_last->id;
        $current_transaction = $transaction->find($transaction_last_id);
        $current_transaction->payment_type = $request->payment;
        $current_transaction->save();

        return true;
    }

    public function status($id)
    {
        $transaction = new Transaction;
        $current_transaction = $transaction->find($id);
        $transaction_last_status = $current_transaction->payment_status;

        if($transaction_last_status == true){
            return response()->json([
                'status'=> 'true'
            ]);
        }
        else{
            return response()->json([
                'status'=> 'false'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

/* THIS IS FOR REFERENCE */

// public function index(Request $request)
//     {
//         $pkg2s = \App\Pkg2::whereMonth('created_at', $request->indexMonth)->whereYear('created_at', $request->indexYear)->orderBy('id', 'DESC')->get();
//         return $pkg2s->toJson();
//     }

// public function store(Request $request)
//     {
//         $pkg2s = new Pkg2;
//         $last_pkg = new Pkg2;
//         $last_coating = $last_pkg->orderBy('id', 'desc')->first();
//         // $timesVar1A = [2125/100];
//         // $timesVar1B = [1725/100];
//         // $pkg2s->Tanggal = $request->date("Y-m-d");
        
//         $pkg2s->RateProduksi_1A = $request->RateProduksi_1A;
//         $pkg2s->RateProduksi_1B = $request->RateProduksi_1B;
//         $pkg2s->Produksi_1A = $pkg2s->RateProduksi_1A*2125/100;
//         $pkg2s->Produksi_1B = $pkg2s->RateProduksi_1B*1725/100;
//         $pkg2s->TotalProduksi = $pkg2s->Produksi_1A + $pkg2s->Produksi_1B;
//         $pkg2s->Output_Pengatongan_Sub = $request->Output_Pengatongan_Sub;
//         $pkg2s->Output_Pengatongan_NonSub = $request->Output_Pengatongan_NonSub;
//         $pkg2s->Output_BBNPK_Prill = $request->Output_BBNPK_Prill;
//         $pkg2s->Output_ShippingOut_Sub = $request->Output_ShippingOut_Sub;
//         $pkg2s->Output_ShippingOut_NonSub = $request->Output_ShippingOut_NonSub;       
//         $pkg2s->BalanceStockCurah_Sub = $last_coating->BalanceStockCurah_Sub + $pkg2s->Produksi_1A - $pkg2s->Output_Pengatongan_Sub - $pkg2s->Output_BBNPK_Prill - $pkg2s->Output_ShippingOut_Sub;
//         $pkg2s->BalanceStockCurah_NonSub = $last_coating->BalanceStockCurah_NonSub + $pkg2s->Produksi_1B - $pkg2s->Output_Pengatongan_NonSub - $pkg2s->Output_ShippingOut_NonSub;
//         $pkg2s->BalanceStockCurah_Total = $pkg2s->BalanceStockCurah_Sub + $pkg2s->BalanceStockCurah_NonSub;
        
//         $pkg2s->save();
//     }


//Route::delete('/stock/{id}', 'StockController@destroy');

// $transaction_payment = Transaction::select('total_payment')->where('id', 1)->get();
// $transaction_last = $transaction->orderBy('id', 'desc')->first()->id;
// $transaction_last_id = $transaction_last->id;