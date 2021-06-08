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
        
        $transaction->total_payment = $request->total_payment; // request
        $transaction->payment_status = 'false';

        $user_db->email_buyer = $request->email_buyer; // request
        $user_db->email_seller = $request->email_seller; // request
        $user_db->buyer_name = $request->buyer_name; // request

        $transaction->save();
        $user_db->save();


        // get latest id from tables
        $user_db_last_id = $user_db->latest('id')->first();
        $transaction_last_id = $transaction->latest('id')->first();

        // update user_db in latest row of table transaction
        $current_transaction = $transaction->find($transaction_last_id)
        $current_transaction->user_id = $user_db_last_id
        $current_transaction->save()

        // get latest buyer_name
        $user_db_last_buyer = $user_db->latest('buyer_name')->first();


        return response()->json([
            'url1'=>'https://payment-gateway-iai.herokuapp.com/payment/' + $transaction_last_id + $user_db_last_buyer,
            'url2'=>'false'
        ]);

        // $transaction = Transaction::get()->toJson(JSON_PRETTY_PRINT);
        // return response($transaction, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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