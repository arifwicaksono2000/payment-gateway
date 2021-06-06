<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_db = \App\UserDb::get()->toJson(JSON_PRETTY_PRINT);
        return response($user_db, 200);
        // $user_db = UserDb::where('id', $id)->first();
        // //You can also use
        // /* $footballer = Footballer::find($id); */
        // if($user_db){
        //  $user_db = $user_db->toJson(JSON_PRETTY_PRINT);
        //  return response($user_db, 200);
        // }
        // else{
        //     return response()->json([
        //         "message" => "User not found",
        //       ], 404);
        // }
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
        // $user_db = UserDb::where('id', $id)->first();
        // //You can also use
        // /*
        // $footballer = Footballer::find($id);*/
        // if($user_db){
        //  $user_db = $user_db->toJson(JSON_PRETTY_PRINT);
        //  return response($user_db, 200);
        // }
        // else{
        //     return response()->json([
        //         "message" => "User not found",
        //       ], 404);
        // }
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
