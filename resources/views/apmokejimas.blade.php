@extends('layouts.app')



@section('content')

<div class="left-container basket-container morzesBlock">
<div class="basket-table" style="padding:1rem">
                <form action="{{ route('apmokejimas.saskaita') }}" method="post">
                @csrf

                <div class = "krepselis-just">
                    <h2>Galutinis prekių krepšelis</h2>
                    <a href="/krepselis" class="btn btn-warning apmoketi-bottom">Grįžti į krepšelį</a>
                </div>
                               
                <table class="table table-bordered table-hover table-responsive">
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">ID</th>

                        <th scope="col">Pavadinimas</th>
                        <th scope="col" class="basket-nuotrauka">Foto</th>
                        <th scope="col">Kaina</th>
                        <th scope="col">Kiekis</th>
                        <th scope="col">Suma, Eur</th>
                    </tr>
                    @foreach ($krepselis as $preke)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}
                            <input type="hidden" name="krepselio_id_saskaitai[]" value ="{{ $preke->krepselis_id }}">
                        </td> 
                        <td scope="row">{{$preke->preke_id}}</td>
                        <input type="hidden"  name="prekes_id_saskaitai[]" value ="{{ $preke->preke_id }}">
                        <td scope="row">{{$preke->preke_pavadinimas}}</td>
                        <input type="hidden"  name="prekes_pavadinimas_saskaitai[]" value ="{{$preke->preke_pavadinimas}}">

                        <td scope="row" class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai' . '/' . $preke->preke_ikelk_id . '/' . $preke->preke_foto1) }}" alt="prekesphoto" width="60px" height="60px" ></td>
                <td scope="row">{{$preke->tikra_preke_kaina}}</td>
                <input type="hidden"  name="prekes_kaina_saskaitai[]" value ="{{$preke->tikra_preke_kaina}}">

                        <td scope="row">{{$preke->preke_vienetai}}</td>
                <input type="hidden"  name="prekes_vienetai_1saskaitai[]" value ="{{ $preke->preke_vienetai }}">
                        
                        <td scope="row">{{$preke->preke_total}}</td>
                <input type="hidden"  name="preke_total_saskaitai[]" value ="{{$preke->preke_total}}">
                        
                    </tr>
                  @endforeach
                    </table>
                    <div class="apmoketi-bottom"> <h2>Viso krepšelio vertė: {{ $grand_total }} Eur</h2>
                    <input type="hidden"  name="grandtotal_total_saskaitai" value ="{{ $grand_total }}">
                </div>
                </div>
                
                <div class="pristatymo-container" style="padding:1rem">
                    <div  class="input-group mb-3">
                    
                            <input type="hidden" value ="{{ $grand_total }}" id="tarpine_grand_suma">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><h3>Pristatymo būdai:</h3></label>
                            </div>
                            <select onchange="perskaiciuok()" class="custom-select" id="pristatymas" name="pristatymas" style="background:lightgreen">
                                <option onchange="perskaiciuok()" value="3" selected >Paštomatas</option>
                                <option onchange="perskaiciuok()" value="5" >Kurjeris</option>
                                <option  onchange="perskaiciuok()" value="0" >Atsiėmimas</option>
                            </select>
                        
                            </div> 
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><h3>Apmokejimo būdai:</h3></label>
                            </div>
                            <select  class="custom-select" id="mokejimas" name="mokejimas" style="background:lightsalmon" >
                                <option  value="1" selected >Bankiniu pavedimu</option>
                                <option  value="2" >Paysera</option>
                                <option  value="3" >Grynaisiais atsiimant</option>
                            </select>
                            
                            
                            </div>       
                        </div>
                    <div class ="vartotojo-duomenys-vaizdas">
                            <table >
                            <tr>
                                <th>
                                    <div class = "container-duomenys-apmokejimo">
                                    <div><h3>Vartojo duomenys:</h3> </div>
                                    <div>
                                        <a href="/vartotojas/sukurti" class="btn btn-warning">Papildyti</a>
                                    </div>                 
                                    </div>
                                </th>
                            </tr> 
                            <tr>
                                <th>Vardas Pavardė</th>
                                <td>{{ $vartotojas->vardas }} {{ $vartotojas->pavarde }}</td>
                                <input type="hidden" name="v_vardas" value=" {{ $vartotojas->vardas }} ">
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
                                <th>Pašto kodas</th>
                                <td>{{ $vartotojas->pasto_kodas }}</td>
                            </tr> 
                            <tr>
                                <th>Telefonas</th>
                                <td>{{ $vartotojas->tel_numeris }}</td>
                            </tr> 

                            <tr>
                                <th>Komentaras</th>
                                <td>{{ $vartotojas->komentaras }}</td>
                            </tr> 
                            </table>

                            </div>
                            
                </div>


                <div>
                    <div class="apmokejimo-container" style="padding:1rem">
                    
                    <div class="apmokejimo-suma">
                        <h4 id="pristatymo_kaina">Pristatymo išlaidos: 3 Eur</h4>
                
                    <h1 id="galutine_suma_su_pristatymu">Galutinė suma: {{ $grand_total }} Eur </h1>
                    </div>
                </div>
               
                <button type="submit" name="generuoti_sask" id = "generuoti_sask">Apmokėti!</button>
            </form>

               

</div>
</div>
<script> 

perskaiciuok();

function perskaiciuok(){
let grandtotal = parseInt(document.getElementById('tarpine_grand_suma').value);
let pristatymas = parseInt(document.getElementById('pristatymas').value);
let galutine = grandtotal + pristatymas;
console.log(galutine);
document.getElementById('pristatymo_kaina').innerHTML = 'Pristatymo s išlaidos: ' + pristatymas +" Eur";

document.getElementById('galutine_suma_su_pristatymu').innerHTML = 'Suma su pristatymu: ' + galutine +" Eur";
}
</script>
                
@endsection

@section('morze')
    <?php echo "morze-klase"; ?>
@endsection


@section('morzeRightBlock')
    <?php echo "morzesBlock"; ?>
@endsection