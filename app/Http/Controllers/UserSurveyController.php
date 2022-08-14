<?php

namespace App\Http\Controllers;

use App\Models\CategoryPenilaian;
use App\Models\JawabanUser;
use App\Models\Kinerja;
use App\Models\SoalKinerja;
use App\Models\TipeSoal;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('dashboard.user.index', [
            'user'=>User::all()
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
        
        $id_user = $request->id_user;
        $jawab = $request->soal;
        // dd($request);
            for ($i=1; $i <= count($jawab); $i++) { 
                $kinerja = new Kinerja();
                if ($jawab[$i] === "baik") {
                    $kinerja->category_penilaian_id = 1;
                    $kinerja->nilai = 90;
                } else {
                    $kinerja->category_penilaian_id = 2;
                    $kinerja->nilai = 70;
                }
                $kinerja->user_id = $id_user;
                $kinerja->soal_kinerja_id = $i;
                
                $kinerja->save();
            }
        
        return view('dashboard.user.index', [
            'user'=>User::all()
        ]);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);
        $soal = SoalKinerja::all();
        

        // 
        return view('dashboard.user.show', [
            'user'=>$user,
            'soals' =>$soal,
            
            
            
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JawabanUser $jawabanUser)
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

    public function show2($id)
    {
        // $tipesoal = TipeSoal::find($id);
        $user = User::find($id);
        $jawabanUser = JawabanUser::where('user_id', $id)->get();
        
        
        return view('dashboard.user.report', [
            // 'tipesoal'=>$tipesoal,
            'user'=> $user,
            'jawaban'=> $jawabanUser,
            
            
           
        ]);
    }

    public function dashboard()
    {
        $kinerja = Kinerja::where('user_id', auth()->user()->id)->get();
        
        return view('user.contohchart', [
            'user' => $kinerja,
            'soal' => SoalKinerja::get()
        ]);
    }
    public function print($id)
    {
        $user = User::find($id);
        $kerja = DB::table('kinerjas as a')
                ->join('category_penilaians as b', 'a.category_penilaian_id', '=', 'b.id')
                ->join('soal_kinerjas as c', 'a.soal_kinerja_id', '=', 'c.id')
                ->where('a.user_id', '=', $id)
                ->select('*')
                ->get();
               

        $any = false;
        
            if (count($kerja)) {
                $any = true;
            }
          ;
   
        return view('dashboard.user.printfile', [
            'user' => $user,
            'kinerja' => $kerja,
            'any' => $any
        ]);
    }

}

