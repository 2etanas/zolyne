@extends('layouts.app')

            @section('content')
            @foreach($ikelk_prekes as $preke)
            <div class="login-container left-container">
            <div class="susisiekite">
            <form action="{{ route('prekes.sarasas.prekeEdit', $preke) }}" method ="POST" class="login-form" name="ikelkPreke" id="ikelkPreke" enctype = "multipart/form-data">
            @csrf    
            <h1>Redaguoti prekę ID: {{ $preke->preke_id }}</h1>
            <h6>DB ID:{{ $preke->id }}</h6>  
            <h3><a href="/prekes/sarasas">Esamos prekės</a></h3>
                <br>
                <div class="susisiekite-forma">
                <label for="name">Prekės ID</label>
                <input type="number" value="{{ $preke->preke_id }}" id="idprekes" name = "idprekes">
                <br><br>
                <label for="name">Prekės pavadinimas</label>
                <input type="text" value="{{ $preke->preke_pavadinimas }}" id="vardasPrekes" name = "vardasPrekes">
                <br><br>
                <div class ="d-flex justify-content-around">
                <div class= "d-inline p-2"><label for="name" class="">Naujas prekės aprašymas</label>
                <textarea value="{{ $preke->preke_aprasymas }}" id="aprasymasPrekes" name="aprasymasPrekes" rows="4" cols="45" class = "textarea-susisiekite textarea-prekes-aprasymas textarea-prekes-edit mh-100"> {{ $preke->preke_aprasymas }} </textarea>
                </div>
                <br>
                <div class = "d-inline p-2 panel">Esamas aprašymas: <p class = "bg-manozalia">{{ $preke->preke_aprasymas }}</p></div>
                <br>
                </div>
                
                <br><br>
                
                <label for="number">Prekės Kaina</label>
                <input type="number" placeholder="{{ $preke->preke_kaina }}" id="kainaPrekes" name = "kainaPrekes" value="{{ $preke->preke_kaina }}">
                <!-- reikia sutvarkyti ikelima su atskiru folderiu ir pavadinimu. tada perduoti linka gal -->
                 <br><br>
                 <div class ="d-flex justify-content-around">
                        <div>
                            <label for="name">Prekės nuotrauka 1</label>
                            <input type="file" id="preke_foto1" name = "preke_foto1" value="{{ $preke->preke_foto1 }}">
                        </div>
                    <div><img src="{{ asset('storage/images/produktai' . '/' . $preke->preke_id . '/' . $preke->preke_foto1) }}" alt="foto1"  style="max-height:200px;width:125px;"></div>
                </div>
                <br><br>
                <div class ="d-flex justify-content-around">
                        <div>
                            <label for="name">Prekės nuotrauka 2</label>
                            <input type="file" id="preke_foto2" name = "preke_foto2" value="{{ $preke->preke_foto2 }}">
                        </div>
                    <div><img src="{{ asset('storage/images/produktai'. '/' . $preke->preke_id . '/' . $preke->preke_foto2) }}" alt="foto2" style="max-height:200px;width:125px;"></div>
                </div>
                <br><br>
                <div class ="d-flex justify-content-around">
                        <div>
                            <label for="name">Prekės nuotrauka 3</label>
                            <input type="file" id="preke_foto3" name = "preke_foto3" value="{{ $preke->preke_foto3 }}">
                        </div>
                    <div><img src="{{ asset('storage/images/produktai'. '/' . $preke->preke_id . '/' . $preke->preke_foto3) }}" alt="foto3" style="max-height:200px;max-width:125px;"></div>
                </div>
                <br><br>

                <div class ="d-flex justify-content-around">
                        <div>
                            <label for="name">Prekės nuotrauka 4</label>
                            <input type="file" id="preke_foto4" name = "preke_foto4" value="{{ $preke->preke_foto4 }}">
                        </div>
                    <div><img src="{{ asset('storage/images/produktai'. '/' . $preke->preke_id . '/' . $preke->preke_foto4) }}" alt="foto4" style="max-height:200px;max-width:125px;"></div>
                </div>
                <br><br>
                
                <button type="submit" name="UploadEdit" value="atnaujinti">Atnaujinti!</button>
                </div>

            </form>
            </div>
            </div>

            @endforeach
            @endsection