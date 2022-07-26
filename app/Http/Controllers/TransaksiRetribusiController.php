<?php

namespace App\Http\Controllers;

use App\TransaksiRetribusi;
use Illuminate\Http\Request;

class TransaksiRetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('ok');
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

    public function afterCreate(Request $request){
        
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
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiRetribusi $transaksiRetribusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiRetribusi $transaksiRetribusi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiRetribusi $transaksiRetribusi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiRetribusi $transaksiRetribusi)
    {
        //
    }
}
