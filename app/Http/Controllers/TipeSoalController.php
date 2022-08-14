<?php

namespace App\Http\Controllers;

use App\Models\TipeSoal;
use App\Http\Requests\StoreTipe_SoalRequest;
use App\Http\Requests\UpdateTipe_SoalRequest;

class TipeSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Http\Requests\StoreTipe_SoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipe_SoalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipe_Soal  $tipe_Soal
     * @return \Illuminate\Http\Response
     */
    public function show(TipeSoal $tipe_Soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipe_Soal  $tipe_Soal
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeSoal $tipe_Soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipe_SoalRequest  $request
     * @param  \App\Models\Tipe_Soal  $tipe_Soal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipe_SoalRequest $request, TipeSoal $tipe_Soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipe_Soal  $tipe_Soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeSoal $tipe_Soal)
    {
        //
    }
}
