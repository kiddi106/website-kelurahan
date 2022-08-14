<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuis;
use App\Models\TipeJawaban;
use Illuminate\Http\Request;
use App\Models\TipeSoal;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class ManageQuestionController extends Controller
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
        $model = new Kuis();
        return view('dashboard.survey.manage_question',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        $quiz = new Kuis();
        $files=$req->file_upload;
        if ($files != null) {
            $nama_file = time()."_".$files->getClientOriginalName();
            $tujuan_upload = 'files';
            $format = pathinfo($nama_file, PATHINFO_EXTENSION);
            $files->move($tujuan_upload, $nama_file);
            $quiz->name_file = $nama_file;
            $quiz->format = $format;
        }

        $tipesoal[0] = new TipeSoal();
        $tipe = $req->type == "radio_opt" ? 1 : 2;
        $label = $req->label;
        $benar = $req->benar;
        $quiz->soal = $req->soal;
        
        $quiz->user_id = auth()->user()->id;
        $quiz->tipe_soal_id = $req->id_type;
        $quiz->tipe_jawaban_id = $tipe;
        
        
        if($quiz->save()){
            
            
            for($i = 0; $i < count($label); $i++) {
                $jawaban = new Jawaban();
                $jawaban->jawaban = $label[$i];
                for($j = 0; $j<count($benar);$j++){
                    if (intval($benar[$j]-1) == $i) {
                        
                        $jawaban->benar = true;
                        break;
              
                    }
                    else{
                        $jawaban->benar = false;
                    }
                }
                
            $jawaban->kuis_id = $quiz->id;
            $jawaban->tipe_jawaban_id= $tipe;
            $jawaban->save();

            
            
            }
  
        }
    
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $model = Kuis::findOrFail($id);
        // dd($model);
        return view('dashboard.survey.editsurvey', [
            'model'=>$model,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       dd($request);
        
        // $kuis= $request->validate([
        //     'soal'=> 'required|string|max:255',
        //     'file_upload' => 'required',
            
        // ]);
        // $jawaban = $request->validate([
        //     'type'=>'required',
        //     'label'=>'required'
        // ]);
        // $kuis->tipe_soal_id = $request->id_type;
        // $kuis= Kuis::findOrFail($id);
        // $jawaban = Jawaban::findOrFail($kuis);
        // $kuis->update($request->all());
        // $jawaban->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $kuis = Kuis::findOrFail($id);
        // $jawabans = Jawaban::where('kuis_id', $id)->get();
        // $kuis->jawabans()->delete();
        $kuis->delete();
    }

    public function deleteJawaban($id){
        $jawaban = Jawaban::findOrFail($id);
        $jawaban->delete();
        return back();
        
    }

    public function addJawaban(Request $req){
        $jawaban = new Jawaban();
        $kuis = Kuis::findOrFail($req->kuis_id);
        $jawaban->tipe_jawaban_id = $kuis->tipe_jawaban_id;
        $jawaban->kuis_id = $req->kuis_id;
        $jawaban->jawaban = $req->newJawaban;
        // $jawaban->benar = $req->benar == 1 ? 1:0 ;
        $jawaban->save();
        return back();
    }

    public function editSoal(Request $req){
        $kuis = Kuis::findOrFail($req->kuis_id);
        $jawaban = Jawaban::where('kuis_id',$req->kuis_id)->get();
        $kuis->soal = $req->soal;
        $kuis->tipe_jawaban_id = $req->tipe_jwb;
        if ($kuis->save()) {
            foreach ($jawaban as $jwb ) {
                $jwb->tipe_jawaban_id = $req->tipe_jwb;
                $jwb->save();
            }
        }
        return view('dashboard.survey.index');
    }
}
