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
    public function index()
    {
        $kliento_id= Auth::user()->id;
         
        $vartotojai = DB::table('vartotojais')
        ->leftJoin('users', 'vartotojais.user_id', '=', 'users.id')
        ->where('user_id', '=', "$kliento_id")
        ->get();
        return view('/vartotojai/vartotojai', ['vartotojai' => $vartotojai]);
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
     * @param  \App\Http\Requests\StorevartotojaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevartotojaiRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevartotojaiRequest  $request
     * @param  \App\Models\vartotojai  $vartotojai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevartotojaiRequest $request, vartotojai $vartotojai)
    {
        //
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
