@extends('layouts.app')

            @section('content')
            <div class="login-container left-container">
            <div class="susisiekite">
            <form action="/prekes/store" method ="POST" class="login-form" name="ikelkPreke" id="ikelkPreke">
            @csrf    
            <h1>Susisiekite</h1>
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
                <!-- //reikia sutvarkyti ikelima su atskiru folderiu ir pavadinimu. tada perduoti linka gal -->
                <!-- <br><br>
                <label for="name">Prekės nuotrauka 1</label>
                <input type="file" id="nuotraukaPrekes1" name = "nuotraukaPrekes1">
                <br><br>
                <label for="name">Prekės nuotrauka 2</label>
                <input type="file" id="nuotraukaPrekes2" name = "nuotraukaPrekes2">
                <br><br>
                <label for="name">Prekės nuotrauka 3</label>
                <input type="file" id="nuotraukaPrekes3" name = "nuotraukaPrekes3">
                <br><br>
            
                <label for="name">Prekės nuotrauka 4</label>
                <input type="file" id="nuotraukaPrekes4" name = "nuotraukaPrekes4"> -->
                <br><br>
                
                <button type="submit" name="prideti" value="prideti">Pridėti produktą!</button>
                </div>

            </form>
            </div>
            </div>

            @endsection