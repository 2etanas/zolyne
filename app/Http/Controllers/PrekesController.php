<?php

namespace App\Http\Controllers;

use App\Models\Prekes;
use App\Http\Requests\StorePrekesRequest;
use App\Http\Requests\UpdatePrekesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\IkelkPrekeController;
use App\Models\IkelkPreke;

use Illuminate\Support\Facades\Storage;

class PrekesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prekes = IkelkPreke::all();
            return view('zolyne', ['ikelk_prekes' => $prekes]);
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
     * @param  \App\Http\Requests\StorePrekesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idprekes = $request->idprekes;
        $vardasPrekes = $request->vardasPrekes;
        $aprasymasPrekes = $request->aprasymasPrekes;
        $kainaPrekes = $request->kainaPrekes;
        
        // $nuotraukaPrekes1 = $request->nuotraukaPrekes1;
        // $nuotraukaPrekes2 = $request->nuotraukaPrekes2;
        //  $nuotraukaPrekes3 = $request->nuotraukaPrekes3;
        //  $nuotraukaPrekes4 = $request->nuotraukaPrekes4;

        
        $ik = new \App\Models\Preke;

        $ik->prekes_id = $idprekes;
        $ik->pavadinimas = $vardasPrekes;
        $ik->aprasymas = $aprasymasPrekes;
        $ik->preke_kaina = $kainaPrekes;

         $ik->foto1 = "labas"; //reikia sutvarkyti ikelima su atskiru folderiu ir pavadinimu. tada perduoti linka gal
         $ik->foto2 = "labas";
         $ik->foto3 = "labas";
         $ik->foto4 = "labas";


        $ik->save();
        return "sekme?";





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prekes  $prekes
     * @return \Illuminate\Http\Response
     */
    public function show(Prekes $prekes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prekes  $prekes
     * @return \Illuminate\Http\Response
     */
    public function edit(Prekes $prekes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrekesRequest  $request
     * @param  \App\Models\Prekes  $prekes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrekesRequest $request, Prekes $prekes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prekes  $prekes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prekes $prekes)
    {
        //
    }


    public function skaityk(Request $request)
    {
        $tekstas = $request->input('tekstas');

        $ats = $tekstas + $tekstas;

        $un = $tekstas++;

        return redirect('/poras')->with('info',"dalykas $tekstas, $ats  $un");

    }
}
