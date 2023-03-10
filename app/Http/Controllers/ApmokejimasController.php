<?php

namespace App\Http\Controllers;

use App\Models\apmokejimas;
use App\Http\Requests\StoreapmokejimasRequest;
use App\Http\Requests\UpdateapmokejimasRequest;
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
use Barryvdh\DomPDF\Facade\Pdf;

class ApmokejimasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kliento_id = Auth::user()->id;

        $vartotojai2 = DB::table('vartotojais')
        ->where('user_id', '=', "$kliento_id")
        ->get();

        if (Auth::user() && isset($vartotojai2[0])) {   // Check is user logged in
            $kliento_id= Auth::user()->id;

            $userBasket = DB::table('krepselis')
            ->select(DB::raw('krepselis.id as krepselis_id, vartotojas_id, krepselis.preke_id, preke_vienetai, ar_apmoketa, ikelk_prekes.id as preke_ikelk_id, ikelk_prekes.preke_pavadinimas, preke_vienetai, preke_total, ikelk_prekes.preke_aprasymas, ikelk_prekes.preke_kaina as tikra_preke_kaina, ikelk_prekes.preke_foto1, ikelk_prekes.preke_foto2, ikelk_prekes.preke_foto3, ikelk_prekes.preke_foto4'))
            ->leftJoin('ikelk_prekes', 'krepselis.preke_id', '=', 'ikelk_prekes.id')
            ->where('vartotojas_id', '=', "$kliento_id")
            ->where('ar_apmoketa', '=', '2')
            ->get();
            $grandTotal = DB::table('krepselis')
            ->where('vartotojas_id', '=', "$kliento_id")
            ->where('ar_apmoketa', '=', '2')
            ->sum('preke_total');

            $vartotojai1 = DB::table('users')
            ->where('id', '=', "$kliento_id")
            ->get();
            $vartotojas1 = $vartotojai1[0];

            $vartotojai2 = DB::table('vartotojais')
            ->where('user_id', '=', "$kliento_id")
            ->get();
            $vartotojas2 = $vartotojai2[0];
            




        return view('apmokejimas', ['krepselis'=>$userBasket, 'kliento_id' =>$kliento_id, 'grand_total' => $grandTotal, 'vartotojas1' =>$vartotojas1, 'vartotojas2' => $vartotojas2, 'vartotojas' =>$vartotojas2]);
        }else {
            return redirect()->route('vartotojai.papildyti');
        }
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
     * @param  \App\Http\Requests\StoreapmokejimasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pirkimo_numeris = rand(11111111,99999999);
        $kliento_id= Auth::user()->id;
        $pirkimo_id = strval($kliento_id).'_'.strval($pirkimo_numeris);
        $userBasket[] = DB::table('krepselis')
        ->select(DB::raw('krepselis.id as krepselis_id, vartotojas_id, krepselis.preke_id as kpreke_id, preke_vienetai, ar_apmoketa, ikelk_prekes.id as preke_ikelk_id, ikelk_prekes.preke_pavadinimas, preke_vienetai, preke_total, ikelk_prekes.preke_aprasymas, ikelk_prekes.preke_kaina as tikra_preke_kaina, ikelk_prekes.preke_foto1, ikelk_prekes.preke_foto2, ikelk_prekes.preke_foto3, ikelk_prekes.preke_foto4'))
        ->leftJoin('ikelk_prekes', 'krepselis.preke_id', '=', 'ikelk_prekes.id')
        ->where('vartotojas_id', '=', "$kliento_id")
        ->where('ar_apmoketa', '=', '2')
        ->get();
        // dd($userBasket);
        $grandTotal = DB::table('krepselis')
            ->where('vartotojas_id', '=', "$kliento_id")
            ->where('ar_apmoketa', '=', '2')
            ->sum('preke_total');

        $visoMoketi = $grandTotal + $request->pristatymas;
        $nrs = 0;
        $prekeidsaskaitai = $request->prekes_id_saskaitai;

        foreach($prekeidsaskaitai as $apmok??jimas):

            $apmokejimas = new Apmokejimas();
        $apmokejimas->saskaitos_numeris = $pirkimo_numeris;
        $apmokejimas->pirkimo_id_saskaitai = $pirkimo_id;
        $apmokejimas->krepselio_id_saskaitai = $request->krepselio_id_saskaitai[$nrs];
        $apmokejimas->preke_id_saskaitai = $request->prekes_id_saskaitai[$nrs];
        $apmokejimas->preke_pavadinimas_saskaitai = $request->prekes_pavadinimas_saskaitai[$nrs];
        $apmokejimas->preke_kaina_saskaitai = $request->prekes_kaina_saskaitai[$nrs];
        $apmokejimas->preke_vienetai_saskaitai = $request->prekes_vienetai_1saskaitai[$nrs];
        $apmokejimas->preke_total_saskaitai = $request->preke_total_saskaitai[$nrs];
        $apmokejimas->grandtotal_total_saskaitai = $request->grandtotal_total_saskaitai;

        $apmokejimas->mokejimo_tipas = $request->mokejimas;

        $apmokejimas->pristatymo_tipas_saskaitai = $request->pristatymas;
        $apmokejimas->galutine_suma = $visoMoketi;
        $apmokejimas->pirkejo_vardas = $request->v_vardas;
        $apmokejimas->pirkejo_id = $kliento_id;

        $apmokejimas->save();
        $nrs++;
    endforeach;
        return redirect()->route('krepselio.keitimas', ['apmokejimas' => $apmokejimas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apmokejimas  $apmokejimas
     * @return \Illuminate\Http\Response
     */
    public function show(apmokejimas $apmokejimas)
    {
        $kliento_id= Auth::user()->id;
        // $visos_saskaitos = apmokejimas::select(DB::raw('DISTINCT(saskaitos_numeris)'))->where(DB::raw("pirkejo_id = $kliento_id"))->get();

        $visos_saskaitos = apmokejimas::distinct('saskaitos_numeris')->get(['saskaitos_numeris']);

        foreach($visos_saskaitos as $saskaitele):
            $saskNumeris[] =$saskaitele->saskaitos_numeris;

        endforeach;
        $saskaita = apmokejimas::all();

        $vartotojas = DB::table('vartotojais')
        ->where('user_id', '=', "$kliento_id")
        ->get();

        $vartotojas1 = $vartotojas[0];
        $emailas = Auth::user('email');
        $paskutineSaskNr = DB::table('apmokejimas')->where('pirkejo_id', '=', "$kliento_id")->latest()->first('saskaitos_numeris');
        $paskutineSask = DB::table('apmokejimas')->where('saskaitos_numeris', '=', "$paskutineSaskNr->saskaitos_numeris")->get();

        return view('saskaita', ['vartotojas1' => $vartotojas1, 'paskutineSaskNr' => $paskutineSaskNr, 'visos_saskaitos' => $visos_saskaitos, 'saskNumeris' => $saskNumeris, 'emailas'=> $emailas, 'paskutineSask' => $paskutineSask]);
    }
    // public function show1(apmokejimas $apmokejimas)
    // {
    //     $kliento_id= Auth::user()->id;
    //     // $visos_saskaitos = apmokejimas::select(DB::raw('DISTINCT(saskaitos_numeris)'))->where(DB::raw("pirkejo_id = $kliento_id"))->get();

    //     $visos_saskaitos = apmokejimas::distinct('saskaitos_numeris')->get(['saskaitos_numeris']);
    //     foreach($visos_saskaitos as $saskaitele):
    //         $saskNumeris[] =$saskaitele->saskaitos_numeris;

    //     endforeach;
    //     $saskaita = apmokejimas::all();

    //     $vartotojas = DB::table('vartotojais')
    //     ->where('id', '=', "$kliento_id")
    //     ->get();
    //     $vartotojas1 = $vartotojas[0];
    //     $emailas = Auth::user('email');
    //     $tyras = (isset($request->selektorius) ? $request->selektorius : "1") ;
    //     // $pagalSask = apmokejimas::all()->where('saskaitos_numeris', '=', "$tyras")->get();
    //     dd($tyras);
    //     return view('saskaita', ['vartotojas1' => $vartotojas1, 'saskaita' => $saskaita, 'visos_saskaitos' => $visos_saskaitos, 'saskNumeris' => $saskNumeris, 'emailas'=> $emailas]);

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apmokejimas  $apmokejimas
     * @return \Illuminate\Http\Response
     */
    public function edit(apmokejimas $apmokejimas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapmokejimasRequest  $request
     * @param  \App\Models\apmokejimas  $apmokejimas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapmokejimasRequest $request, apmokejimas $apmokejimas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apmokejimas  $apmokejimas
     * @return \Illuminate\Http\Response
     */
    public function destroy(apmokejimas $apmokejimas)
    {
        //
    }

    public function createPDF () {
        // Retrieve all products from the db
        $kliento_id= Auth::user()->id;
        // $visos_saskaitos = apmokejimas::select(DB::raw('DISTINCT(saskaitos_numeris)'))->where(DB::raw("pirkejo_id = $kliento_id"))->get();

        $visos_saskaitos = apmokejimas::distinct('saskaitos_numeris')->get(['saskaitos_numeris']);
        foreach($visos_saskaitos as $saskaitele):
            $saskNumeris[] =$saskaitele->saskaitos_numeris;

        endforeach;
        $saskaita = apmokejimas::all();

        $vartotojas = DB::table('vartotojais')
        ->where('id', '=', "$kliento_id")
        ->get();
        $vartotojas1 = $vartotojas[0];
        $emailas = Auth::user('email');
        $paskutineSaskNr = DB::table('apmokejimas')->where('pirkejo_id', '=', "$kliento_id")->latest()->first('saskaitos_numeris');

        $paskutineSask = DB::table('apmokejimas')->where('saskaitos_numeris', '=', "$paskutineSaskNr->saskaitos_numeris")->get();

        $data = array('vartotojas1' => $vartotojas1, 'paskutineSaskNr' => $paskutineSaskNr, 'visos_saskaitos' => $visos_saskaitos, 'saskNumeris' => $saskNumeris, 'emailas'=> $emailas, 'paskutineSask' => $paskutineSask);
$pdf = Pdf::loadView('saskaita', $data);
return $pdf->download('invoice.pdf');
    }
    // public function createPDF () {

    //     $pdf = Pdf::loadView('saskaita', $data );
    //     return $pdf->download('invoice.pdf');


    // }
}
