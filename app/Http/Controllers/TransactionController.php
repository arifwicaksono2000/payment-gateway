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
        return response()->json([
            'url1'=>'test1',
            'url2'=>'test2'
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
        $transaction = new Transcation;
        $user_db = new UserDb;

        // $transaction = 3->user_id;
        // $transaction = $request->total_payment;
        // $transaction = 'COD'->payment_type;
        // $transaction = false->payment_status;

        // $user_db = $request->email_buyer;
        // $user_db = $request->email_seller;
        // $user_db = $request->buyer_name;

        // $transaction->save();
        // $user_db->save();
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
