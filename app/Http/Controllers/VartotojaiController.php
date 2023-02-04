<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Closure;
use App\User;
use App\Usergroups;
use Illuminate\Support\Facades\Auth;

use App\Models\krepselis;
use App\Http\Requests\StorekrepselisRequest;
use App\Http\Requests\UpdatekrepselisRequest;
use App\Http\Controllers\IkelkPrekeController;
use App\Models\IkelkPreke;

use App\Models\vartotojai;
use App\Http\Requests\StorevartotojaiRequest;
use App\Http\Requests\UpdatevartotojaiRequest;

class VartotojaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // In addition to retrieving all of the records matching a given query,
    //  you may also retrieve single records using the find, first, or firstWhere methods.
    //  Instead of returning a collection of models, these methods return a single model instance:
    public function index()
    {
        
        $kliento_id= Auth::user()->id;
        $kliento_vardas= Auth::user()->name;
        $vartotojai = DB::table('vartotojais')
        ->leftJoin('users', 'vartotojais.user_id', '=', 'users.id')
        ->where('user_id', '=', "$kliento_id")
        ->get();
        
        if (isset($vartotojai[0]) && $vartotojai[0]->user_id == Auth::user()->id){

        $vartotojas = $vartotojai[0];

        return view('vartotojai.vartotojai', ['vartotojai' => $vartotojai, 'vartotojas'=> $vartotojas]);
        }else {
            
            $vartotojas = new vartotojai();
            $vartotojas->user_id = '';
            $vartotojas->vardas = $kliento_vardas;
            $vartotojas->pavarde = '';
            $vartotojas->gatve = '';
            $vartotojas->namo_nr = '';
            $vartotojas->miestas = '';
            $vartotojas->salis = '';
            $vartotojas->pasto_kodas = '';
            $vartotojas->tel_numeris = '';
            $vartotojas->komentaras = '';              
            $vartotojas->alert = 1;              

            
             return view('/vartotojai/vartotojai', ['vartotojas'=> $vartotojas, 'vartotojai' => $vartotojai ]);
            // return redirect()->route('vartotojai.papildyti');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kliento_id= Auth::user()->id;
        $kliento_vardas = Auth::user()->name;
         
        $vartotojai = vartotojai::all()
        ->where('user_id', '=', "$kliento_id");
        if (isset($vartotojai[0]) && $vartotojai[0]->user_id == Auth::user()->id){
            $vartotojas = $vartotojai[0];
            return redirect()->route('vartotojai.edit', ['vartotojai' => $vartotojai,'vartotojas'=> $vartotojas, 'kliento_vardas' => $kliento_vardas]);
        }else{
        $vartotojas = new vartotojai();
        $vartotojas->user_id = '';
        $vartotojas->vardas = $kliento_vardas;
        $vartotojas->pavarde = '';
        $vartotojas->gatve = '';
        $vartotojas->namo_nr = '';
        $vartotojas->miestas = '';
        $vartotojas->salis = '';
        $vartotojas->pasto_kodas = '';
        $vartotojas->tel_numeris = '';
        $vartotojas->komentaras = '';              
        return view('vartotojai/create', ['vartotojai' => $vartotojai,'vartotojas'=> $vartotojas, 'kliento_vardas' => $kliento_vardas]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorevartotojaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevartotojaiRequest $request)
    {

        $kliento_id = Auth::user()->id;
        $kliento_vardas = Auth::user()->name;
        $vartotojai = vartotojai::all()
        ->where('user_id', '=', "$kliento_id");
        
        
        if (isset($vartotojai[0]) && $vartotojai[0]->user_id == Auth::user()->id){
            $vartotojas = $vartotojai[0];
            $vartotojas->user_id = $kliento_id;
            $vartotojas->vardas = $request->upVardas;
            $vartotojas->pavarde = $request->upPavarde;
            $vartotojas->gatve = $request->upGatve;
            $vartotojas->namo_nr = $request->upNamoNumeris;
            $vartotojas->buto_nr = $request->upButoNumeris;
            $vartotojas->miestas = $request->upMiestas;
            $vartotojas->salis = $request->upSalis;
            $vartotojas->pasto_kodas = $request->upPastoKodas;
            $vartotojas->tel_numeris = $request->upTelNr;
            $vartotojas->komentaras = ($request->upKomentaras ==null ? "NT": $request->upKomentaras);              
            $vartotojas->save();
            return view('vartotojai.create', ['vartotojai' => $vartotojai, 'vartotojas'=> $vartotojas]);
        }else{
        $vartotojas = new vartotojai();

            $vartotojas->user_id = $kliento_id;
            $vartotojas->vardas = $request->upVardas;
            $vartotojas->pavarde = $request->upPavarde;
            $vartotojas->gatve = $request->upGatve;
            $vartotojas->namo_nr = $request->upNamoNumeris;
            $vartotojas->buto_nr = $request->upButoNumeris;
            $vartotojas->miestas = $request->upMiestas;
            $vartotojas->salis = $request->upSalis;
            $vartotojas->pasto_kodas = $request->upPastoKodas;
            $vartotojas->tel_numeris = $request->upTelNr;
            $vartotojas->komentaras = ($request->upKomentaras ==null ? "NT": $request->upKomentaras);              
            $vartotojas->save();
            return view('vartotojai.create', ['vartotojai' => $vartotojai, 'vartotojas'=> $vartotojas]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vartotojai  $vartotojai
     * @return \Illuminate\Http\Response
     */
    public function show(vartotojai $vartotojai)
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vartotojai  $vartotojai
     * @return \Illuminate\Http\Response
     */
    public function edit(vartotojai $vartotojai)
    {
        $kliento_id= Auth::user()->id;
         
        $vartotojai = DB::table('vartotojais')
        ->where('user_id', '=', "$kliento_id")
        ->get();
        $vartotojas = $vartotojai[0];
        return view('vartotojai/edit', ['vartotojai' => $vartotojai, 'vartotojas' => $vartotojas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevartotojaiRequest  $request
     * @param  \App\Models\vartotojai  $vartotojai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vartotojai $vartotojai)
    {
        $kliento_id= Auth::user()->id;
        $kliento_vardas = Auth::user()->name;
        $klientas = Auth::find($kliento_id);
        $vartotojai = vartotojai::All();
            $vartotojas = $vartotojai[0];
            
            $vartotojas->user_id = $kliento_id;
            $vartotojas->vardas = $request->upVardas;
            $vartotojas->pavarde = $request->upPavarde;
            $vartotojas->gatve = $request->upGatve;
            $vartotojas->namo_nr = $request->upNamoNumeris;
            $vartotojas->buto_nr = $request->upButoNumeris;
            $vartotojas->miestas = $request->upMiestas;
            $vartotojas->salis = $request->upSalis;
            $vartotojas->pasto_kodas = $request->upPastoKodas;
            $vartotojas->tel_numeris = $request->upTelNr;
            $vartotojas->komentaras = ($request->upKomentaras ==null ? "NT": $request->upKomentaras);

            $vartotojas->save();
            $klientas->name = $vartotojas->vardas;
            $klientas->save();
            return redirect('/vartotojas');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vartotojai  $vartotojai
     * @return \Illuminate\Http\Response
     */
    public function destroy(vartotojai $vartotojai)
    {
        //
    }
}
