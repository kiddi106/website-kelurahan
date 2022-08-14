<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\JawabanUser;
use Illuminate\Http\Request;
use App\Models\TipeSoal;
use App\Models\Kuis;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SurveyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.report.surveylist', [
            'model'=> TipeSoal::all()
        ]);
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
        $model = TipeSoal::findOrFail($id);
        $allKuis = Kuis::where('tipe_soal_id', $id)->get();
        $jawaban = Jawaban::where('kuis_id', $id)->get();
        $jawabanuser = JawabanUser::where('jawaban_id', $id)->get();
        $jwbuser = DB::table('jawaban_users')->distinct('user_id')->count('user_id');
       
        return view('dashboard.report.surveyreport',[
            'model'=>$model,
            'kuis'=>$allKuis,
            'jawaban'=> $jawaban,
            'jawabanuser'=> $jawabanuser,
            'jwbuser'=>$jwbuser

            
        ]);
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
