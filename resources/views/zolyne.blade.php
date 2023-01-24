<a href="/login" class = "indikatorius1 indikatorius-platus"><h6>Sveikas prisijungęs {{'Svečias'}}</h6></a> <a href="{{ route('prekes.ikelimas') }}">Ikelti preke</a>
@extends('layouts.app')

@section('content')



<div class="login-container left-container">
        
<div class="prekiuContainer">

@foreach ($ikelk_prekes as $preke)
            <div class="preke" id="preke{{ $preke->id }}" style="max-height:600px;overflow:auto">
                <img src="{{ asset('storage/images/produktai' . '/' . $preke->id . '/' . $preke->preke_foto1) }}" alt="prekesphoto" style="max-height:400px;width:205px;clip-path:inherit;">
                <div>
                
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">
                
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">{{$preke->preke_pavadinimas}}
                </div>
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: {{$preke->preke_id}}
                </div>  

                
                </div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: {{$preke->preke_kaina}} Eur <?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX" style="max-height:250px;overflow:auto">
                {{$preke->preke_aprasymas}}
                </div><br>
                <div class="prekes-veiksmai-btn">
                <form action="{{ route('prekes.sarasas.display') }}" method = "get">
                    @csrf 
                    <input type="hidden" name="display" class="form-control" value="{{ $preke->id }}">
                    <button class="btn btn-success" type="submit">Rodyti</button>

                    </form>
                    <form action="{{ route('prekes.sarasas.display') }}" method = "get">
                    @csrf 
                    <input type="hidden" name="display" class="form-control" value="{{ $preke->id }}">
                    <button class="btn btn-warning" type="submit">Pridėti į užsakymą</button>

                    </form>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div> 
    @endforeach

        </div>
</div>
            <!-- <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                    Šalto spaudimo kanappių aliejus
                    <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>            
            <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                    Šalto spaudimo kanappių aliejus
                    <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>    

             <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                    Šalto spaudimo kanappių aliejus
                    <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>           
            
            <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                Šalto spaudimo kanappių aliejus
                   <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>           
             <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX" height="50px">
                 Šalto spaudimo kanappių aliejus 
                   <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>            
            <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                    Šalto spaudimo kanappių aliejus
                    <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>             
            <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                    Šalto spaudimo kanappių aliejus
                    <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>             
            <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                    Šalto spaudimo kanappių aliejus
                    <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>            -->
            <!-- <div class="preke">
                <img src="storephoto\hempseedoil250.JPG" alt="prekesphoto" width="fit-content" height="fit-content">
                <div >
                <div class="prekesID prekesAprasymas" name="prekeNRX">ID: AL01</div>
                <div class="prekesPavadinimas prekesAprasymas" name="prekeNRX">Kanapiu aliejus 250ml</div>
                <div class="prekesKaina prekesAprasymas" name="prekeNRX">Kaina: x Eur<?php ?></div>
                <div class="prekesAprasymas" name="prekeNRX">
                    Šalto spaudimo kanappių aliejus
                    <a href="#">Platesnis aprašymas</a>
                </div>
                <div class="pridetiUzsakyma prekesAprasymas"><a href="#">Pridėti į užsakymą</a></div>
            </div>
            </div>  -->

 
       
    
<!-- <script>
    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
} 
</script> -->

@endsection