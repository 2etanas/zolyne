<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Pirkimo sąskaita</title>
</head>
<body style="background:none;">
    

<h1>Pirkimo sąskaita Nr. {{ $paskutineSaskNr->saskaitos_numeris}} </h1>
<div class = "rekvizitai">
        <div class = "rekvizitas">
        <h1>Pardavėjo rekvizitai</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, ut consectetur. Sapiente, ducimus impedit aliquid quasi dolore expedita repellat qui at eligendi eveniet quibusdam nisi velit facilis reprehenderit obcaecati aut!</p>
        </div>
        <div class = "rekvizitas">
        <h1>Pirkėjo rekvizitai</h1>
        <label for="namesurname">{{ $vartotojas1->vardas.' '.$vartotojas1->pavarde }}</label>
        <br>
        <label for="adresas">
            {{ $vartotojas1->gatve.' '.$vartotojas1->namo_nr.' '.$vartotojas1->buto_nr }}
        </label>
        <br>

        <label for="">{{ $vartotojas1->miestas }}</label>
        <br>

        <label for="">{{ $vartotojas1->salis }}</label>
        <br>
        <label for="">Pašto kodas: {{ $vartotojas1->pasto_kodas }}</label><br>
        <label for="">Tel. nr.: {{ $vartotojas1->tel_numeris }}</label><br>
        <label for="">El. paštas: {{ $emailas->email }}</label><br>
        </div>
</div>
<h1>Krepšelis</h1>

<div style="width:80%;">
<table class="table" >
    <thead>
    <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Prekės ID</th>
        <th scope="col">Prekės pavadinimas</th>
        <th scope="col">Prekės vienetai</th>
        <th scope="col">Prekės kaina, Eur</th>
        <th scope="col">Tarpinė suma</th>
    </tr>
    </thead>
    <tbody>
@foreach ($paskutineSask as $item)
    <tr>
        <th scope="col">{{ $loop->iteration }}</th>
        <td>{{ $item->preke_id_saskaitai }}</td>
        <td>{{ $item->preke_pavadinimas_saskaitai }}</td>
        <td>{{ $item->preke_vienetai_saskaitai }}</td>
        <td>{{ $item->preke_kaina_saskaitai }}</td>
        <td>{{ $item->preke_total_saskaitai }}</td>
        
    </tr>

@endforeach
</tbody>
</table>
<h3 class= "iDesne">Siutimo kaina: {{ $item->pristatymo_tipas_saskaitai }} Eur</h3>
<h2 class= "iDesne">Visa pirkinio kaina: {{ $item->galutine_suma }} Eur</h2>

</div>
<!-- neveikia pdf -->
<!-- <a href="{{ route('saskaitos.pdf') }}">PDF</a> -->
<a href="javascript:if(window.print)window.print()" class="btn btn-warning">Print</a>

</body>
</html>