<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\JawabanUser;
use Illuminate\Http\Request;
use App\Models\TipeSoal;
use App\Models\Kuis;
use App\Models\User;
use PhpParser\Node\Expr\New_;
use Yajra\DataTables\DataTables;
class ReviewSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landingpage', [
            'model'=> TipeSoal::all(),
            'user'=> User::all(),
            'jawabanuser'=>JawabanUser::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TipeSoal $item)
    {
        $allKuis = Kuis::where('tipe_soal_id', $item->id)->get();
        $jawabanuser = new JawabanUser();
        return view('takesurvey', [
            'model'=> $item,
            'kuis'=> $allKuis,
            'jawabanuser' => $jawabanuser
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // ddd($req);
        $tipe_soal_id= $req->tipe_soal_id;
        $kuis_id = $req->kuis_id;
        $jawaban = $req->answer;
        foreach ($jawaban as $k => $value) {
            // dd($k, $value);
            $newjawaban = new JawabanUser();
            $newjawaban->tipe_soal_id = $tipe_soal_id;
            $newjawaban->kuis_id = $k;
            $newjawaban->jawaban_id = $value;
            $newjawaban->user_id = auth()->user()->id;
            $newjawaban->save();
        }
        return redirect('/');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipeSoal $item)
    {
        
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
