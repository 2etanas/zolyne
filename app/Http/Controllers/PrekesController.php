<?php

namespace App\Http\Controllers;

use App\Models\Prekes;
use App\Http\Requests\StorePrekesRequest;
use App\Http\Requests\UpdatePrekesRequest;
use Illuminate\Http\Request;

class PrekesController extends Controller
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
     *
     * @param  \App\Http\Requests\StorePrekesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrekesRequest $request)
    {
        //
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
