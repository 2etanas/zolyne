<?php

namespace App\Http\Controllers;

use App\Models\IkelkPreke;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


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
            $users = User::all();
            return view('prekes/prekiu_sarasas', ['ikelk_prekes' => $prekes, 'users' => $users]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        // $request->validate([
        //     'idprekes' => 'required',
        //     'vardasPrekes' => 'required|max:30|min:3',
        //     'aprasymasPrekes' => 'required|max:150|min:3',
        //     'kainaPrekes' => 'required|integer',
        //     'file("preke_foto1")' => 'required',
        //     'file("preke_foto2")' => 'required',
        //     'file("preke_foto3")' => 'required',
        //     'file("preke_foto4")' => 'required'

        // ]);
        
        $preke_id = $request->idprekes;
        $preke_pavadinimas = $request->vardasPrekes;
        $preke_aprasymas = $request->aprasymasPrekes;
        $preke_kaina = $request->kainaPrekes;


        $preke_foto1 = 'pirmafoto'.".".$request->file('preke_foto1')->getClientOriginalExtension();
        $preke_foto2 = 'antrafoto'.".".$request->file('preke_foto2')->getClientOriginalExtension();
        $preke_foto3 = 'treciafoto'.".".$request->file('preke_foto3')->getClientOriginalExtension();
        $preke_foto4 = 'ketvirtafoto'.".".$request->file('preke_foto4')->getClientOriginalExtension();
        
        $temp1 = $request->file('preke_foto1');
        $temp2 = $request->file('preke_foto2');
        $temp3 = $request->file('preke_foto3');
        $temp4 = $request->file('preke_foto4');



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

        $temp1->storeAs("public/images/produktai/$preke->id/", $preke_foto1);
        $temp2->storeAs("public/images/produktai/$preke->id/", $preke_foto2);
        $temp3->storeAs("public/images/produktai/$preke->id/", $preke_foto3);
        $temp4->storeAs("public/images/produktai/$preke->id/", $preke_foto4);


        return redirect('prekes/ikelimas')->with('success', "Prek?? ??kelta s??kmingai!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
    public function show(IkelkPreke $ikelkPreke)
    {
        $show = request()->query('preke-edit');

        $prekes = IkelkPreke::where('id', '=', "$show")->get();

        return view('/prekes/prekes_redagavimas', 
        ['ikelk_prekes' => $prekes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
    public function edit(IkelkPreke $ikelkPreke)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIkelkPrekeRequest  $request
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, IkelkPreke $preke)
    {
        $preke->id = $request->db_id;
        $preke->preke_id = $request->idprekes;
        $preke->preke_pavadinimas = $request->vardasPrekes;
        $preke->preke_aprasymas = $request->aprasymasPrekes;
        $preke->preke_kaina = $request->kainaPrekes;
        // $preke->updated_at = curentTime();
        // $preke->preke_foto1 = $request->hasFile('preke_foto1') ? $image_name : $preke->preke_foto1;
        if($request->hasFile('preke_foto1'))
        {
            $request->file('preke_foto1')->storeAs("public/images/produktai/$preke->id", 'pirmafoto'.".".$request->file('preke_foto1')->getClientOriginalExtension());    
            $preke->preke_foto1 = 'pirmafoto'.".".$request->file('preke_foto1')->getClientOriginalExtension();
        }else{ $preke->preke_foto1 = "$preke->preke_foto1";
        };
        if($request->hasFile('preke_foto2'))
        {
            $request->file('preke_foto2')->storeAs("public/images/produktai/$preke->id", 'antrafoto'.".".$request->file('preke_foto2')->getClientOriginalExtension());

            $preke->preke_foto2 = 'antrafoto'.".".$request->file('preke_foto2')->getClientOriginalExtension();
        }else{ $preke->preke_foto2 = "$preke->preke_foto2";
        };
        if($request->hasFile('preke_foto3'))
        {
            $preke->preke_foto3 = 'treciafoto'.".".$request->file('preke_foto3')->getClientOriginalExtension();
            $request->file('preke_foto3')->storeAs("public/images/produktai/$preke->id", 'treciafoto'.".".$request->file('preke_foto3')->getClientOriginalExtension());
        }else{ $preke->preke_foto3 = "$preke->preke_foto3";
        };
        if($request->hasFile('preke_foto4'))
        {
            $preke->preke_foto4 = 'ketvirtafoto'.".".$request->file('preke_foto4')->getClientOriginalExtension();
            $request->file('preke_foto4')->storeAs("public/images/produktai/$preke->id", 'ketvirtafoto'.".".$request->file('preke_foto4')->getClientOriginalExtension());
        }else{ $preke->preke_foto4 = "$preke->preke_foto4";
        };
      

        $preke->save();
        return redirect('prekes/sarasas');


        // return redirect('prekes/sarasas');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IkelkPreke  $ikelkPreke
     * @return \Illuminate\Http\Response
     */
    public function destroy(IkelkPreke $ikelkPreke)
    {
        $delete = request()->query('preke-delete');

    // $prekes = IkelkPreke::all();
    $prekes = IkelkPreke::where('id', '=', "$delete")->delete();
    $prekes = IkelkPreke::all();
    route('prekes.prekiu_sarasas');
    return view('prekes/prekiu_sarasas', ['ikelk_prekes' => $prekes, 'istrintas' => $delete]);
        
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
public function searchAjax1(){
    //reikia kad grazintu JSON i JS 
    //reikia sutvarkyt ROUTE web'e
    $search = request()->query('search1');

    // $prekes = IkelkPreke::all();
    $prekes = IkelkPreke::where('preke_pavadinimas', 'LIKE', "%$search%")
    ->orWhere('preke_aprasymas', 'LIKE', "%$search%")            
    ->get();
    return response()->json($prekes);

}
public function display(){

    $display = request()->query('display');

    // $prekes = IkelkPreke::all();
    $prekes = IkelkPreke::where('id', '=', "$display")->get();
    return view('prekes/prekiu_vaizdas', ['ikelk_prekes' => $prekes, 'display'=>$display]);

}
}
