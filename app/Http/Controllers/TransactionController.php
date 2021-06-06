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
    public function index()
    {
        $transaction = Transaction::get()->toJson(JSON_PRETTY_PRINT);
        return response($transaction, 200);
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

        $user_db->email_buyer = 

        $pkt2s->Rate_Produksi_P1 = $request->Rate_Produksi_P1;
        $pkt2s->Rate_Produksi_P2 = $request->Rate_Produksi_P2;
        $pkt2s->Rate_Produksi_P3 = $request->Rate_Produksi_P3;
        $pkt2s->Rate_Produksi_P4 = $request->Rate_Produksi_P4;
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
