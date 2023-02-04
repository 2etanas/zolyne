@extends('layouts.app')



@section('content')

<div class="left-container basket-container morzesBlock">
 <div class ="vartotojo-duomenys-vaizdas">
 <table >
 <tr>
    <th><h3>Vartojo duomenys:</h3></th>
 </tr> 
 <tr>
    <th>Vardas Pavardė</th>
    <td>{{ $vartotojas->vardas }} {{ $vartotojas->pavarde }}</td>
 </tr> 
 <tr>
    <th>Adresas</th>
    <td>{{ $vartotojas->gatve }} {{ $vartotojas->namo_nr }} {{ ($vartotojas->buto_nr == 0 ? "" : $vartotojas->buto_nr) }}</td>
 </tr> 
 <tr>
    <th>Miestas</th>
    <td>{{ $vartotojas->miestas }} {{ $vartotojas->namo_nr }} {{ ($vartotojas->buto_nr == 0 ? "" : $vartotojas->buto_nr) }}</td>
 </tr> 
 <tr>
    <th>Šalis</th>
    <td>{{ $vartotojas->salis }} {{ $vartotojas->namo_nr }} {{ ($vartotojas->buto_nr == 0 ? "" : $vartotojas->buto_nr) }}</td>
 </tr> 
 <tr>
    <th>Komentaras</th>
    <td>{{ $vartotojas->komentaras }}</td>
 </tr> 
 </table>

 </div>
<div class = "container">
<a href="/vartotojas/sukurti" class="btn btn-danger">Papildyti</a>
</div>



</div>

@endsection