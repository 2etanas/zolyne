<?php

namespace App\Http\Controllers;

use App\Models\krepselis;
use App\Http\Requests\StorekrepselisRequest;
use App\Http\Requests\UpdatekrepselisRequest;

class KrepselisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labas = 12;
        return view('krepselis', ['labukas'=>$labas]);
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
     * @param  \App\Http\Requests\StorekrepselisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekrepselisRequest $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\krepselis  $krepselis
     * @return \Illuminate\Http\Response
     */
    public function destroy(krepselis $krepselis)
    {
        //
    }
}
