<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuis;
use Illuminate\Http\Request;
use App\Models\TipeSoal;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $tipesoal = TipeSoal::all();
        $allKuis = Kuis::all();
        $kuis = [];
        $jawab = [];
        $jwb = Jawaban::where('kuis_id', $allKuis[0]->id)->get();
        foreach ($tipesoal as $key => $value) {
            $currentKuis = Kuis::where('tipe_soal_id',$value->id)->get();
            $kuis[$value->id] = $currentKuis;
            # code...
        }
        for ($i=0; $i < count($allKuis) ; $i++) {
            $currentJawaban = DB::table("jawabans")->where('kuis_id', $allKuis[$i]->id)->get();
            $jawab[$allKuis[$i]->id] = $currentJawaban->toArray();
        }
        // for ($i=0; $i < count($tipesoal); $i++) { 

        // }
       
        return view('dashboard.survey.contoh', [
            "tipesoal"=>$tipesoal,
            "kuis"=>$kuis,
            "jawab"=>$jawab]);
        
    }
}
