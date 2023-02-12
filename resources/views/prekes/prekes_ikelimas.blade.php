@extends('layouts.app')

            @section('content')
            <div class="login-container left-container">
            <div class="susisiekite">
                @can ('ikelti-preke')
            <form action="/prekes/ikelimas" method ="POST" class="login-form" name="ikelkPreke" id="ikelkPreke" enctype = "multipart/form-data">
            @csrf    
            <h1>Įkelk naują prekę</h1>
            <h3><a href="/prekes/sarasas" class = "btn btn-info active" style="width:100%">Esamos prekės</a></h3>
                <br>
                <div class="susisiekite-forma">
                <label for="name">Prekės ID</label>
                <input class="@error('PrekesID') is-invalid @enderror" type="number" placeholder="Prekės ID (matomas klientui)" id="idprekes" name = "idprekes" required 
                value="{{ old('idprekes') }}"
                >
                        @error('PrekesID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
                <label for="name">Prekės pavadinimas</label>
                <input class="@error('Pavadinimas') is-invalid @enderror" type="text" placeholder="Prekės pavadinimas" id="vardasPrekes" name = "vardasPrekes" required 
                value="{{ old('vardasPrekes') }}"
                >
                @error('Pavadinimas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
                <label for="name">Prekės Aprašymas</label>
                <textarea class="@error('Aprasymas') is-invalid @enderror" placeholder="Prekės Aprašymas" value="{{ old('aprasymasPrekes') }}" id="aprasymasPrekes" name="aprasymasPrekes" class = "textarea-susisiekite textarea-prekes-aprasymas" required> </textarea>
                @error('Aprasymas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
                <label for="number">Prekės Kaina</label>
                <input class="@error('Kaina') is-invalid @enderror" type="number" placeholder="Prekės kaina"  value="{{ old('kainaPrekes') }}" id="kainaPrekes" name = "kainaPrekes" required>
                <!-- reikia sutvarkyti ikelima su atskiru folderiu ir pavadinimu. tada perduoti linka gal -->
                @error('Kaina')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
                <label for="name">Prekės nuotrauka 1</label>
                <input class="@error('Foto') is-invalid @enderror" type="file" id="preke_foto1" name = "preke_foto1" accept="image/*" onchange="loadFile(event)" style="color:green" required>
                    
                <p><img id="output" width="200"/></p>
                @error('Foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
                <label for="name">Prekės nuotrauka 2</label>
                <input class="@error('Foto') is-invalid @enderror" type="file" id="preke_foto2" name = "preke_foto2" accept="image/*" onchange="loadFile2(event)" required>
                <p><img id="output2" width="200"/></p>
                @error('Foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
                <label for="name">Prekės nuotrauka 3</label>
                <input class="@error('Foto') is-invalid @enderror" type="file" id="preke_foto3" name = "preke_foto3" accept="image/*" onchange="loadFile3(event)" required>
                <p><img id="output3" width="200"/></p>
                @error('Foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
            
                <label for="name">Prekės nuotrauka 4</label>
                <input class="@error('Foto') is-invalid @enderror" type="file" id="preke_foto4" name = "preke_foto4" accept="image/*" onchange="loadFile4(event)" required>
                <p><img id="output4" width="200"/></p>
                @error('Foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <br><br>
                
                <button class="btn btn-success" type="submit" name="Upload" value="prideti">Pridėti produktą!</button>
                </div>

            </form>
            @endcan
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