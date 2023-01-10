<?php

namespace App\Http\Controllers;

use App\Models\susisiekite;
use App\Http\Requests\StoresusisiekiteRequest;
use App\Http\Requests\UpdatesusisiekiteRequest;
use Illuminate\Http\Request;
class SusisiekiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     *                                                                      StoresusisiekiteRequest $request
     * @param  \App\Http\Requests\StoresusisiekiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $name = $request->vardas;
        $epastas = $request->epastas;
        $zinute = $request->zinute;
        $replied = 0;
        $su = new \App\Models\Susisiekite;

        $su->vardas = $name;
        $su->epastas = $epastas;
        $su->zinute = $zinute;
        $su->replied = $replied;

        $su->save();
        return "sekme?";
    }
    // public function store(susisiekite $request)
    // {
    //     Post::store([

    //         'vardas' => $request->vardas,
    //         'epastas' => $request->epastas,
    //         'zinute' => $request->zinute,
    //         'replied' => '0'
    //     ]);

    //     return view('/susisiekite');
    // }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\susisiekite  $susisiekite
     * @return \Illuminate\Http\Response
     */
    public function show(susisiekite $susisiekite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\susisiekite  $susisiekite
     * @return \Illuminate\Http\Response
     */
    public function edit(susisiekite $susisiekite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesusisiekiteRequest  $request
     * @param  \App\Models\susisiekite  $susisiekite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesusisiekiteRequest $request, susisiekite $susisiekite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\susisiekite  $susisiekite
     * @return \Illuminate\Http\Response
     */
    public function destroy(susisiekite $susisiekite)
    {
        //
    }
}
