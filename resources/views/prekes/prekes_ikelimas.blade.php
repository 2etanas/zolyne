@extends('layouts.app')

            @section('content')
            <div class="login-container left-container">
            <div class="susisiekite">
            <form action="/prekes/ikelimas" method ="POST" class="login-form" name="ikelkPreke" id="ikelkPreke" enctype = "multipart/form-data">
            @csrf    
            <h1>Įkelk naują prekę</h1>
            <h3><a href="/prekes/sarasas" class = "btn btn-info active" style="width:100%">Esamos prekės</a></h3>
                <br>
                <div class="susisiekite-forma">
                <label for="name">Prekės ID</label>
                <input type="text" placeholder="Prekės ID (matomas klientui)" id="idprekes" name = "idprekes">
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
                <input type="file" id="preke_foto1" name = "preke_foto1" accept="image/*" onchange="loadFile(event)" style="color:green">
                    
                <p><img id="output" width="200"/></p>
                <br><br>
                <label for="name">Prekės nuotrauka 2</label>
                <input type="file" id="preke_foto2" name = "preke_foto2" accept="image/*" onchange="loadFile2(event)">
                <p><img id="output2" width="200"/></p>
                <br><br>
                <label for="name">Prekės nuotrauka 3</label>
                <input type="file" id="preke_foto3" name = "preke_foto3" accept="image/*" onchange="loadFile3(event)">
                <p><img id="output3" width="200"/></p>
                <br><br>
            
                <label for="name">Prekės nuotrauka 4</label>
                <input type="file" id="preke_foto4" name = "preke_foto4" accept="image/*" onchange="loadFile4(event)">
                <p><img id="output4" width="200"/></p>
                <br><br>
                
                <button class="btn btn-success" type="submit" name="Upload" value="prideti">Pridėti produktą!</button>
                </div>

            </form>
            </div>
            </div>
    <script>
            var loadFile = function(event) {
                var image = document.getElementById('output');
                image.src=URL.createObjectURL(event.target.files[0]);
                };
            var loadFile2 = function(event) {
                var image = document.getElementById('output2');
                image.src=URL.createObjectURL(event.target.files[0]);
                };
            var loadFile3 = function(event) {
                var image = document.getElementById('output3');
                image.src=URL.createObjectURL(event.target.files[0]);
                };
            var loadFile4 = function(event) {
                var image = document.getElementById('output4');
                image.src=URL.createObjectURL(event.target.files[0]);
                };
    </script>

            @endsection