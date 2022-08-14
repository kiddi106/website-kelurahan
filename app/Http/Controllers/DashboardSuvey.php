<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\JawabanUser;
use App\Models\Kuis;
use App\Models\TipeJawaban;
use App\Models\TipeSoal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSuvey extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jawabanuser = DB::table('Jawaban_Users')->where('user_id', '=',Auth::user()->id)->get();
        $total = DB::table('Jawaban_Users')->distinct()->get('user_id');
        
        $this->authorize('admin');
        return view('dashboard.index',[
            'model'=>TipeSoal::all(),
            'user'=>User::all(),
            'kuis'=>Kuis::all(),
            'jawaban'=>JawabanUser::all(),
            'total'=>$total
            
        ]);
        
    }
    public function index2()
    {
        return view('dashboard.survey.index',[
            'model'=>TipeSoal::all(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model=new TipeSoal();
        return view('dashboard.survey.form',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $model= $request->validate([
            'title'=> 'required|string|max:255',
            'slug'=> 'unique:tipe_soals',
            'description'=> 'required|string|max:255',
            'start'=> 'required|date',
            'end'=> 'required|date',
        ]);
        $model['user_id'] = auth()->user()->id;
        TipeSoal::create($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = TipeSoal::find($id);
        $allKuis = Kuis::where('tipe_soal_id', $id)->get();
        // $model1 = Kuis::all();
        // $jawab = [];
        // $kuis = [];
        // $jawab = [];
        // foreach ($model as $key => $value) {
        //     $currentKuis = Kuis::where('tipe_soal_id',$value)->get();
        //     $kuis[$value] = $currentKuis;
            
        // }
        // for ($i=0; $i < count($allKuis) ; $i++) {
        //     $currentJawaban = DB::table("jawabans")->where('kuis_id', $allKuis[$i]->id)->get();
        //     $jawab[$allKuis[$i]->id] = $currentJawaban->toArray();
        // }   
        // foreach ($model1 as $key => $item) {
        //     $curentJawab = Jawaban::where('kuis_id',$item->id)->get();
        //     $jawab[$item] = $curentJawab;   
        // }
        
        // dd($jawab->toArray());
        return view('dashboard.survey.show',[
            "model"=> $model,
            "kuis"=> $allKuis,]
            );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = TipeSoal::findOrFail($id);
        return view('dashboard.survey.form', [
            'model'=> $model
        ]);
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

        $rules= [
            'title'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'start'=> 'required',
            'end'=> 'required'
        ];
        if($request->slug != $request->slug){
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $model= TipeSoal::findOrFail($id)->update($validatedData);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = TipeSoal::findOrFail($id);
        $model->delete();
    }

    public function dataTable(){
        $model = TipeSoal::query();
        return DataTables::of($model) 
        ->addColumn('action', function($model){
            return view('dashboard.layouts._action', [
                'model' => $model,
                'url_show'=> route('suvey.show', $model->id),
                'url_edit'=> route('suvey.edit', $model->id),
                'url_destroy'=> route('suvey.destroy', $model->id)

            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
    public function check_slug(Request $request)
{
    $slug = SlugService::createSlug(TipeSoal::class, 'slug', $request->title);
    return response()->json(['slug' => $slug]);
}




}
