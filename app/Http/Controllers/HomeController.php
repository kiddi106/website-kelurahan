<?php

namespace App\Http\Controllers;

use App\Models\JawabanUser;
use App\Models\TipeSoal;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\PseudoTypes\False_;
use phpDocumentor\Reflection\PseudoTypes\True_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $jawabanuser = DB::table('Jawaban_Users')->where('user_id', '=',3)->get();
        $jawabanuser = DB::table('Jawaban_Users')->where('user_id', '=',Auth::user()->id)->get();
        $jawab = true;
        

        if (count($jawabanuser) === 0) {
            $jawab = false;
        
        
        }
        return view('home',[
            'model' => TipeSoal::all(),
            'jawab' => $jawab
        
        ]);
        

        
    }
}
