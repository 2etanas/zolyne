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


class KrepselisController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
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
        



        return view('krepselis', ['krepselis'=>$userBasket, 'kliento_id' =>$kliento_id, 'grand_total' => $grandTotal]);
        } else {
            $userBasket = 12;
        return view('krepselis', ['krepselis'=>$userBasket]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $krepselis = krepselis::all();
        $prekes = IkelkPreke::all();
        return view('/', ['krepselis' => $krepselis, 'ikelk_prekes' => $prekes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekrepselisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $prekes = IkelkPreke::all();
        $kliento_id = 1;
        $preke_id = $request->preke_id;
        $pirkimo_id = rand(11111,99999);
        $apmoketa = 2;
        $prekes_kaina = $request->prekes_kaina;
        $preke_vnt = 1;
        $semi_total = $prekes_kaina * $preke_vnt;

        $krepselis = new krepselis();

        $krepselis->pirkimo_id = $pirkimo_id;
        $krepselis->preke_id = $preke_id;
        $krepselis->preke_kaina = $prekes_kaina;
        $krepselis->preke_vienetai = $preke_vnt;
        $krepselis->preke_total = $semi_total;
        $krepselis->ar_apmoketa = $apmoketa;

        if (Auth::user()) {   // Check is user logged in
            $kliento_id= Auth::user()->id;    
            $krepselis->vartotojas_id = $kliento_id;
            $krepselis->save();
        return view('zolyne', ['ikelk_prekes' => $prekes]);
        } else {
            $kliento_id = 999;   
            $krepselis->vartotojas_id = $kliento_id;
            $krepselis->save();

            return view('zolyne', ['ikelk_prekes' => $prekes]);
        } 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\krepselis  $krepselis
     * @return \Illuminate\Http\Response
     */
    public function show(krepselis $krepselis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\krepselis  $krepselis
     * @return \Illuminate\Http\Response
     */
    public function edit(krepselis $krepselis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekrepselisRequest  $request
     * @param  \App\Models\krepselis  $krepselis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekrepselisRequest $request, krepselis $krepselis)
    {
        $prideti =0;
        $atimti = 0;
        $krepselis = krepselis::find($request->id);

        $prideti = $request->aukstyn;
        $atimti = $request->zemyn;
        $krepselis->preke_vienetai = $krepselis->preke_vienetai+$prideti +$atimti;
        $krepselis->preke_total = $krepselis->preke_kaina * $krepselis->preke_vienetai;
        $krepselis->save();
        if ($krepselis->preke_vienetai == 0)
        {
            $krepselis->delete();
            return redirect('krepselis'); 
        }
        else
        {
            return redirect('krepselis'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\krepselis  $krepselis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $krepselioPreke = krepselis::find($id);
        $krepselioPreke->delete();
        return redirect()->route('krepselis');
    }

    public function payBasket(Request $request, krepselis $krepselis)
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
        
            

        



        return view('apmokejimas', ['krepselis'=>$userBasket, 'kliento_id' =>$kliento_id, 'grand_total' => $grandTotal]);
        }

    }
}
