@extends('layouts.app')



@section('content')

<div class="left-container basket-container morzesBlock">
<a href="/vartotojas/sukurti">papildyti</a>
 <div class ="vartotojo-duomenys-vaizdas">
 <table >
 <tr>
    <th>Vartojo duomenys:</th>
    <th></th>
    <th> </th>
    <th></th>
 </tr> 
 <tr>
    <td>Vardas Pavardė</td>
    <td>{{ $vartotojas->vardas }} {{ $vartotojas->pavarde }}</td>
 </tr> 
 <tr>
    <td>Adresas</td>
    <td>{{ $vartotojas->gatve }} {{ $vartotojas->namo_nr }} {{ ($vartotojas->buto_nr == 0 ? "" : $vartotojas->buto_nr) }}</td>
 </tr> 
 <tr>
    <td>Miestas</td>
    <td>{{ $vartotojas->miestas }} {{ $vartotojas->namo_nr }} {{ ($vartotojas->buto_nr == 0 ? "" : $vartotojas->buto_nr) }}</td>
 </tr> 
 <tr>
    <td>Šalis</td>
    <td>{{ $vartotojas->salis }} {{ $vartotojas->namo_nr }} {{ ($vartotojas->buto_nr == 0 ? "" : $vartotojas->buto_nr) }}</td>
 </tr> 
 </table>

 </div>
<div>{{ $vartotojas->vardas }}</div>



</div>

@endsection