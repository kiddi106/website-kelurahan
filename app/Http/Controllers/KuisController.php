<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Http\Requests\StoreKuisRequest;
use App\Http\Requests\UpdateKuisRequest;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreKuisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKuisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuis  $kuis
     * @return \Illuminate\Http\Response
     */
    public function show(Kuis $kuis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuis  $kuis
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuis $kuis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKuisRequest  $request
     * @param  \App\Models\Kuis  $kuis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKuisRequest $request, Kuis $kuis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuis  $kuis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuis $kuis)
    {
        //
    }
}
