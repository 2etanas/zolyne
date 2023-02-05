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
class ApmokejimasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kliento_id= Auth::user()->id;

        if (Auth::user()) {   // Check is user logged in
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
     
        $preke1 = $request->krepselio_id_saskaitai[0];
        $apmokejimas = new Apmokejimas();
        $apmokejimas->krepselio_id_saskaitai = $preke1;




        return view('saskaita', ['apmokejimas' => $apmokejimas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apmokejimas  $apmokejimas
     * @return \Illuminate\Http\Response
     */
    public function show(apmokejimas $apmokejimas)
    {
        //
    }

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
}
