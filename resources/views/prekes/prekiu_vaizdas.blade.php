@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
    <div class="susisiekite">
    <div class="prekiu-containter">
            
                <h3>Prekė</h3>
        <!-- <div class="row">
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
        </div>  -->
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

                
                
                
                <th scope="col" ></th>
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
                <td>
                <td class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai'. '/' . $preke->id . '/' . $preke->preke_foto3) }}" alt="foto3" style="max-height:200px;max-width:125px;"></td>
                <td class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai'. '/' . $preke->id . '/' . $preke->preke_foto4) }}" alt="foto4" style="max-height:200px;max-width:125px;"></td>
                </td>
            </tr>
        @endforeach
    </tbody>
            </table>
        </div>
        
        

</div>
</div>

    @endsection


  