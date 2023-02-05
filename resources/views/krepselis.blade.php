@extends('layouts.app')



@section('content')

<div class="left-container basket-container morzesBlock">
<div class="basket-table">
                <div class = "krepselis-just apmoketi-bottom">
                    <div>
                    <h1>Prekių krepšelis</h1>
                    </div>
                    <div>
                        <form action=" {{ route('krepselis.apmokejimas') }}" method="post">
                            @csrf
                            <button class="btn btn-success apmoketi-bottom">Į apmokėjimą</button>
                        </form>
                    </div>
        
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
                        <td scope="row">{{$loop->iteration }}
                            <input type="hidden" value ="{{$preke->krepselis_id}}">
                        </td> 
                        <td scope="row">{{$preke->preke_id}}</td>

                        <td scope="row">{{$preke->preke_pavadinimas}}</td>
                        <td scope="row" class="basket-nuotrauka"><img src="{{ asset('storage/images/produktai' . '/' . $preke->preke_ikelk_id . '/' . $preke->preke_foto1) }}" alt="prekesphoto" width="60px" height="60px" ></td>
                <td scope="row">{{$preke->tikra_preke_kaina}}</td>
                        <td scope="row">{{$preke->preke_vienetai}}</td>
                        <td scope="row">
                        <form action="{{route('krepselis.update', $preke->krepselis_id)}}" method="post">
                        @csrf 
                        <button class="btn btn-success btn-sm" name="aukstyn" value="1">+</button>
                        <button class="btn btn-danger btn-sm" name="zemyn" value="-1">-</button>
                        </form>   
                        </td>
                        <td scope="row">{{$preke->preke_total}}</td>
                        <td scope="row">
                        <form action="{{route('krepselis.destroy', $preke->krepselis_id)}}" method="post">
                        @csrf 
                <button type="submit" class="btn btn-danger btn-sm" >Pašalinti</button>
                        </form>
                    </tr>
                  @endforeach
                    </table>
                    <div class="apmoketi-bottom"> 
                    <div><h2>Viso krepšelio vertė: {{ $grand_total }} Eur</h2></div>
                    <br>
                        <div>
                        <form action=" {{ route('krepselis.apmokejimas') }}" method="post">
                            @csrf
                            <button class="btn btn-success">Į apmokėjimą</button>
                        </form>
                        </div>
                    </div>
                </div>
</div>
                
@endsection

@section('morze')
    <?php echo "morze-klase"; ?>
@endsection


@section('morzeRightBlock')
    <?php echo "morzesBlock"; ?>
@endsection