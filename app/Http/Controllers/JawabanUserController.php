<?php

namespace App\Http\Controllers;

use App\Models\JawabanUser;
use App\Http\Requests\StoreJawabanUserRequest;
use App\Http\Requests\UpdateJawabanUserRequest;

class JawabanUserController extends Controller
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
     * @param  \App\Http\Requests\StoreJawabanUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJawabanUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function show(JawabanUser $jawabanUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function edit(JawabanUser $jawabanUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJawabanUserRequest  $request
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJawabanUserRequest $request, JawabanUser $jawabanUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(JawabanUser $jawabanUser)
    {
        //
    }
}
