<?php

namespace App\Http\Controllers;

use App\Models\IkelkPreke;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class IkelkPrekeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $prekes = IkelkPreke::all();
            return view('prekes/prekiu_sarasas', ['ikelk_prekes' => $prekes]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return Storage::disk('local')->put('example2221.txt', 'Labulis gulugis');
    }

    public function uploadFile(Request $request) {
        // $file = $request->file('image');
        // echo $path = $request->file('image')->store('images');
        // $rodyk_prekes = IkelkPreke::all();
        // return view('prekes_ikelimas', compact('photos'));

        return view('/prekes/prekes_ikelimas');
     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIkelkPrekeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $table->unsignedBigInteger('preke_id');
        // $table->string('preke_pavadinimas');
        // $table->string('preke_aprasymas');
        // $table->unsignedBigInteger('preke_kaina');
        // $table->string('preke_foto1');
        // $table->string('preke_foto2');
        // $table->string('preke_foto3');
        // $table->string('preke_foto4');

        $preke_id = $request->idprekes;
        $preke_pavadinimas = $request->vardasPrekes;
        $preke_aprasymas = $request->aprasymasPrekes;
        $preke_kaina = $request->kainaPrekes;

        // $preke_foto1 = "$preke_id.$preke_pavadinimas.$request->file('preke_foto1')->getExtension()";
        // $preke_foto2 = "$preke_id.$preke_pavadinimas.$request->file('preke_foto1')->getExtension()";
        // $preke_foto3 = "$preke_id.$preke_pavadinimas.$request->file('preke_foto1')->getExtension()";
        // $preke_foto4 = "$preke_id.$preke_pavadinimas.$request->file('preke_foto1')->getExtension()";


        $preke_foto1 = 'pirmafoto'.".".$request->file('preke_foto1')->getClientOriginalExtension();
        $preke_foto2 = 'antrafoto'.".".$request->file('preke_foto2')->getClientOriginalExtension();
        $preke_foto3 = 'treciafoto'.".".$request->file('preke_foto3')->getClientOriginalExtension();
        $preke_foto4 = 'ketvirtafoto'.".".$request->file('preke_foto4')->getClientOriginalExtension();
        // $preke_mod = 'pirmafoto'.".".$request->file('preke_foto1')->getClientOriginalExtension();
        
        $request->file('preke_foto1')->storeAs("public/images/produktai/$preke_id", $preke_foto1);
        $request->file('preke_foto2')->storeAs("public/images/produktai/$preke_id", $preke_foto2);
        $request->file('preke_foto3')->storeAs("public/images/produktai/$preke_id", $preke_foto3);
        $request->file('preke_foto4')->storeAs("public/images/produktai/$preke_id", $preke_foto4);

        // $preke_pavadinimas = $request->vardasPrekes;


        //  $name = $request->file('TestPhotoSita')->getClientOriginalName();
        //  $size = $request->file('TestPhotoSita')->getSize();

        // $request->file('TestPhotoSita')->storeAs('public/images/', $name);

        $preke = new IkelkPreke();
        $preke->preke_id = $preke_id;
        $preke->preke_pavadinimas = $preke_pavadinimas;
        $preke->preke_aprasymas = $preke_aprasymas;
        $preke->preke_kaina = $preke_kaina;

        $preke->preke_foto1 = $preke_foto1;
        $preke->preke_foto2 = $preke_foto2;
        $preke->preke_foto3 = $preke_foto3;
        $preke->preke_foto4 = $preke_foto4;

        $preke->save();
        


        return redirect('prekes/ikelimas');
        // dd($request->file()->getClientOriginalName());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
    public function show(IkelkPreke $ikelkPreke)
    {
        return view('/prekes/prekes_ikelimas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
    public function edit(IkelkPreke $ikelkPreke)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIkelkPrekeRequest  $request
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIkelkPrekeRequest $request, IkelkPreke $ikelkPreke)
    {
       // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
    public function destroy(IkelkPreke $ikelkPreke)
    {
        $preke->delete();
    }

    // public function __invoke() {

    // }


    public function search(){

            $search = request()->query('search');

            // $prekes = IkelkPreke::all();
            $prekes = IkelkPreke::where('preke_pavadinimas', 'LIKE', "%$search%")
            ->orWhere('preke_aprasymas', 'LIKE', "%$search%")            
            ->get();
            return view('prekes/prekiu_sarasas', ['ikelk_prekes' => $prekes, 'search'=>$search]);

    }

    public function searchAjax(){
        //reikia kad grazintu JSON i JS 
        //reikia sutvarkyt ROUTE web'e
        $search = request()->query('search');

        // $prekes = IkelkPreke::all();
        $prekes = IkelkPreke::where('preke_pavadinimas', 'LIKE', "%$search%")
        ->orWhere('preke_aprasymas', 'LIKE', "%$search%")            
        ->get();
        return response()->json($prekes);

}
}
