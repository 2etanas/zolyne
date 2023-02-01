@extends('layouts.app')



@section('content')

<div class="left-container basket-container morzesBlock">
                <div class="basket-table">
                <h3>Prekių krepšelis</h3>
                               
                <table class="table table-bordered table-hover table-responsive">
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">ID</th>

                        <th scope="col">Pavadinimas</th>
                        <th scope="col" class="basket-nuotrauka">Foto</th>
                        <th scope="col">Kaina</th>
                        <th scope="col">Kiekis</th>
                        <th scope="col">Pakeisti</th>
                        <th scope="col">Suma, Eur</th>
                        <th scope="col">Pašalinti</th>
                    </tr>
                    <tr>
                        <td scope="row">1.</td> 
                        <td scope="row">AL001</td>

                        <td scope="row">Kanapių aliejus 250ml</td>
                        <td scope="row" class="basket-nuotrauka"><img src="../storephoto\hempseedoil250.JPG" alt="prekesphoto" width="60px" height="60px" ></td>
                        <td scope="row">12</td>
                        <td scope="row">11</td>
                        <td scope="row">
                            <button name="aukstyn">+</button>
                            <button name="zemyn">-</button>
                        </td>
                        <td scope="row">15.00</td>
                        <td scope="row"><button>Pašalinti</button></td>
                    </tr>
                    <tr>
                        <td scope="row">1.</td>
                        <td scope="row">AL001</td>

                        <td scope="row">Kanapių aliejus 250ml</td>
                        <td scope="row" class="basket-nuotrauka"><img src="../storephoto\hempseedoil250.JPG" alt="prekesphoto" width="60px" height="60px" ></td>
                        <td scope="row">12</td>
                        <td scope="row">11</td>
                        <td scope="row">
                            <button name="aukstyn">+</button>
                            <button name="zemyn">-</button>
                        </td>
                        <td scope="row">15.00</td>
                        <td scope="row"><button>Pašalinti</button></td>
                    </tr>
                    </table>
                </div>
                <div class="pristatymo-container">
                    <h3>Pristatymo būdai:</h3>
                    <div class="pristatymo-container-mygtukai">
                    <button class="pristatymo-button pr-bt-1">Paštomatas</button>
                    <button class="pristatymo-button pr-bt-2">Atsiėmimas</button>
                    <button class="pristatymo-button pr-bt-3">Kurjeris</button>
                    </div>
                </div>
                <div>
                    <div class="apmokejimo-container">
                    <h3>Apmokejimo būdai:</h3>
                    <button class="apmokejimo-button1">Bankiniu pavedimu</button>
                    <br>
                    <button class="apmokejimo-button2">Grynais atsiemant</button>
                    <button class="apmokejimo-button3">Paysera</button>
                    </div>
                    <div class="apmokejimo-suma">
                        <h4>Pristatymo išlaidos:  Eur</h4>
                
                    <h1>Galutinė suma: Eur</h1>
                    </div>
                </div>
                <div class="apmokejimo-formos-adresas">
                <form action="login.php" method ="POST" class="apmokejimo-formos-adresas-forma">
                <label for="name">El.paštas</label>
                <input type="text" placeholder="El.pašto adresas">
                <label for="address" >Tel. numeris:</label>
                <input type="text" placeholder="Tel. numeris">
                <br>
                <label for="address" >Adresas:</label>
                <br>
                <input type="text" placeholder="Gatve">
                <input type="text" placeholder="Namo numeris">
                <input type="text" placeholder="Buto numers">
                <input type="text" placeholder="Miestas">
                <input type="text" placeholder="Šalis">
                <br>
                <button type="submit" name="registruokis">Apmokėti!</button>
            </form>

                </div>

<!-- //////////////////////////////////////// -->
                <div class="basket-table">
                <div class = "krepselis-just">
                    <h2>Prekių krepšelis</h2>
                    <a href="/krepselis" class="btn btn-success apmoketi-bottom">Apmokėti</a>
                </div>
                               
                <table class="table table-bordered table-hover table-responsive">
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">ID</th>

                        <th scope="col">Pavadinimas</th>
                        <th scope="col" class="basket-nuotrauka">Foto</th>
                        <th scope="col">Kaina</th>
                        <th scope="col">Kiekis</th>
                        <th scope="col">Pakeisti</th>
                        <th scope="col">Suma, Eur</th>
                        <th scope="col">Pašalinti</th>
                    </tr>
                    @foreach ($krepselis as $preke)
                    <tr>
                        <td scope="row">{{$loop->iteration }} , {{$preke->krepselis_id}}
                            <input type="hidden" value ="{{$preke->krepselis_id}}">
                        </td> 
                        <td scope="row">{{$preke->krepselis_id}}</td>

                        <td scope="row">{{$preke->preke_pavadinimas}}</td>
                        <td scope="row" class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai' . '/' . $preke->preke_ikelk_id . '/' . $preke->preke_foto1) }}" alt="prekesphoto" width="60px" height="60px" ></td>
                <td scope="row">{{$preke->tikra_preke_kaina}}</td>
                        <td scope="row">{{$preke->preke_vienetai}}</td>
                        <td scope="row">
                        <form action="{{route('krepselis.update', $preke->krepselis_id)}}" method="post">
                        @csrf 
                        <button class="btn btn-success" name="aukstyn" value="1">+</button>
                        <button class="btn btn-danger" name="zemyn" value="-1">-</button>
                        </form>   
                        </td>
                        <td scope="row">{{$preke->preke_total}}</td>
                        <td scope="row">
                        <form action="{{route('krepselis.destroy', $preke->krepselis_id)}}" method="post">
                        @csrf 
                <button type="submit" class="btn btn-danger" >Pašalinti</button>
                        </form>
                    </tr>
                  @endforeach
                    </table>
                    <div class="apmoketi-bottom"> <h2>Viso krepšelio vertė: {{ $grand_total }} Eur</h2></div>
                    <a href="/krepselis" class="btn btn-success apmoketi-bottom">Apmokėti</a>
                </div>
</div>
                
@endsection

@section('morze')
    <?php echo "morze-klase"; ?>
@endsection


@section('morzeRightBlock')
    <?php echo "morzesBlock"; ?>
@endsection