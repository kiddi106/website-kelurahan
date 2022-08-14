<?php

namespace App\Http\Controllers;

use App\Models\TipeSoal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    public function store(Request $req){
      
        if ($req->file('fileupload') == null) {
            $file = "";
        }else{
           $file = $req->file('file')->store('images');  
        }
        ddd($req);
    }
}
