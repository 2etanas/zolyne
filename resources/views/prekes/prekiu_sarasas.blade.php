@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
    <div class="susisiekite">
    <div class="prekiu-containter">
        <h4><a href="{{ route('prekes.ikelimas') }}" class ="btn btn-info" style="width:100%">Įkelti naują prekę</a></h4>
            @if(isset($search))
                <h3>Prekės pagal paiešką "{{ $search }}" 
                    <a href="{{ route('prekes.prekiu_sarasas') }}" class="btn btn-danger">Grįžti į visą sąrašą</a>
                </h3>
            @else
                <h3>Prekių sąrašas, viso prekių: {{ count($ikelk_prekes) }}</h3>
            @endif
            @if(isset($istrintas))
                <h3>Produktas ID "{{ $istrintas }} ištrintas!" 
                    <a href="{{ route('prekes.prekiu_sarasas') }}" class="btn btn-danger" id="testDelete" istrintas-attr="{{ $istrintas }}">Grįžti į visą sąrašą</a>
                </h3>
            @endif
            
        <div class="row">
        <div class="col-md-7">
        <form action="{{ route('prekes.sarasas.search') }}" method = "get">
        @csrf 
        <input type="text" name="search" class="form-control" placeholder="Paieška">
        <button class="btn btn-success" type="submit">Paieška</button>

        </form>
        </div>
        <div class="col-md-4">
        <form id="ajaxSearch" data-ajax-form-url = "{{ route('prekes.sarasas.searchAjax') }}">
        @csrf 
        <input id="search" type="text" name="search" class="form-control" placeholder="Paieška">
        <button id="searchBTN" class="btn btn-success" type="submit">Paieška neperkraunant puslapio</button>

        </form>
        </div>
        </div> 
        <?php //include "../functions/mainFunctions.php"; ?>
        <table class="table">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Prekes_ID</th>

                <th scope="col">Pavadinimas</th>
                <th scope="col">Aprasymas</th>
                <th scope="col">Kaina</th>

                <th scope="col" class="basket-nuotrauka">Foto</th>
                <!-- <th scope="col" class="basket-nuotrauka">Foto</th>
                <th scope="col" class="basket-nuotrauka">Foto</th>
                <th scope="col" class="basket-nuotrauka">Foto</th> -->

                
                
                
                <th scope="col">Pašalinti</th>
            </tr>
            <tbody class="prekes-lentute">
        @foreach ($ikelk_prekes as $preke)
            <tr >

                <td class="student_id">{{ $preke->id }}</td>
                <td class="student_id">{{ $preke->preke_id }}</td>

                <td class="student_name">{{ $preke->preke_pavadinimas }}</td>
                <td class="student_surname">{{ $preke->preke_aprasymas }}</td>
                <td class="student_email" >{{ $preke->preke_kaina }}</td>
                <td class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai' . '/' . $preke->id . '/' . $preke->preke_foto1) }}" alt="foto1"  style="max-height:200px;width:125px;"></td>
                <td class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai'. '/' . $preke->id . '/' . $preke->preke_foto2) }}" alt="foto2" style="max-height:200px;width:125px;"></td>
                <td class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai'. '/' . $preke->id . '/' . $preke->preke_foto3) }}" alt="foto3" style="max-height:200px;max-width:125px;"></td>
                <td class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai'. '/' . $preke->id . '/' . $preke->preke_foto4) }}" alt="foto4" style="max-height:200px;max-width:125px;"></td>
                <td class="student_email" >
                     <form action="{{ route('prekes.sarasas.display') }}" method = "get">
                    @csrf 
                    <input type="hidden" name="display" class="form-control" value="{{ $preke->id }}">
                    <button class="btn btn-success" type="submit">Rodyti</button>

                    </form><br>
                    <form action="{{ route('prekes.sarasas.prekeShowEdit') }}" method = "get">
                    @csrf 
                    <input type="hidden" name="preke-edit" class="form-control" value="{{ $preke->id }}">
                    <button class="btn btn-warning" type="submit">Redaguoti</button>

                    </form>
                    <br>
                    <form action="{{ route('prekes.sarasas.prekeDelete') }}" method = "get">
                    @csrf 
                    <input type="hidden" name="preke-delete" class="form-control" value="{{ $preke->id }}">
                    <button class="btn btn-danger" type="submit" >Ištrinti</button>

                    </form></td>
                <td></td>
                    

                    
                    
                    

                
            </tr>
        @endforeach
    </tbody>
            </table>
        </div>
        
        

</div>
</div>

    @endsection


    <!-- <form action="  //route('/prekes/delete', $preke); }} " method="POST"> -->
                        <!-- @csrf -->
                        <!-- <button class="btn btn-danger" type="submit">Delete</button> -->
                    <!-- </form>  -->