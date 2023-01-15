@extends('layouts.app')

            @section('content')
            <div class="login-container left-container">
            <div class="susisiekite">
            <form action="/prekes/ikelimas" method ="POST" class="login-form" name="ikelkPreke" id="ikelkPreke" enctype = "multipart/form-data">
            @csrf    
            <h1>Ikelk naują prekę</h1>
            <h3><a href="/prekes/sarasas">Esamos prekės</a></h3>
                <br>
                <div class="susisiekite-forma">
                <label for="name">Prekės ID</label>
                <input type="text" placeholder="Prekės ID" id="idprekes" name = "idprekes">
                <br><br>
                <label for="name">Prekės pavadinimas</label>
                <input type="text" placeholder="Prekės pavadinimas" id="vardasPrekes" name = "vardasPrekes">
                <br><br>
                <label for="name">Prekės Aprašymas</label>
                <textarea placeholder="Prekės Aprašymas" id="aprasymasPrekes" name="aprasymasPrekes" class = "textarea-susisiekite textarea-prekes-aprasymas"> </textarea>
                <br><br>
                <label for="number">Prekės Kaina</label>
                <input type="text" placeholder="Prekės kaina" id="kainaPrekes" name = "kainaPrekes">
                <!-- reikia sutvarkyti ikelima su atskiru folderiu ir pavadinimu. tada perduoti linka gal -->
                 <br><br>
                <label for="name">Prekės nuotrauka 1</label>
                <input type="file" id="preke_foto1" name = "preke_foto1">
                <br><br>
                <label for="name">Prekės nuotrauka 2</label>
                <input type="file" id="preke_foto2" name = "preke_foto2">
                <br><br>
                <label for="name">Prekės nuotrauka 3</label>
                <input type="file" id="preke_foto3" name = "preke_foto3">
                <br><br>
            
                <label for="name">Prekės nuotrauka 4</label>
                <input type="file" id="preke_foto4" name = "preke_foto4">
                <br><br>
                
                <button type="submit" name="Upload" value="prideti">Pridėti produktą!</button>
                </div>

            </form>
            </div>
            </div>


            @endsection