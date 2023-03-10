@extends('layouts.app')



@section('content')

<div class="left-container basket-container morzesBlock">

 <div class ="vartotojo-duomenys-vaizdas">
)
    <form action="{{ route('vartotojai.atnaujinti') }}" method="post" class="form-group">
    @csrf

    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text" id="">Vardas ir pavardė</span>
    </div>
    <input type="text" class="form-control" placeholder="Vardas" id ="upVardas" name ="upVardas" value = "{{ $vartotojas->vardas }}">
    <input type="text" class="form-control" placeholder="Pavardė" id ="upPavarde" name ="upPavarde" value = "{{ $vartotojas->pavarde }}">
    </div>
    <br>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text" id="">Adresas</span>
    </div>
    <input type="text" class="form-control" placeholder="Gatvė" id ="upGatve" name ="upGatve" value = "{{ $vartotojas->gatve }}">
    <input type="text" class="form-control" placeholder="Namo numeris" id ="upNamoNumeris" name ="upNamoNumeris" value = "{{ $vartotojas->namo_nr }}">
    <input type="text" class="form-control" placeholder="Buto numeris (0 jei nėra)" id ="upButoNumeris" name ="upButoNumeris"  value = "{{ $vartotojas->buto_nr }}">
    </div>
    <br>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text" id="">Adresas</span>
    </div>
    <input type="text" class="form-control" placeholder="Miestas" id ="upMiestas" name ="upMiestas"  value = "{{ $vartotojas->miestas }}">
    <input type="text" class="form-control" placeholder="Šalis" id ="upSalis" name ="upSalis"  value = "{{ $vartotojas->salis }}">
    <input type="text" class="form-control" placeholder="Pašto kodas" id ="upPastoKodas" name ="upPastoKodas"  value = "{{ $vartotojas->pasto_kodas }}"> 
    <input type="text" class="form-control" placeholder="Telefono Numeris" id ="upTelNr" name ="upTelNr"  value = "{{ $vartotojas->tel_numeris }}"> 
    </div>
    <br>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text">Komentaras</span>
    </div>
    <textarea class="form-control" aria-label="With textarea"id ="upKomentaras" name ="upKomentaras"  value = "{{ $vartotojas->komentaras }}" ></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Sukurti</button>
    </form>

    
</div>
</div>
 @endsection