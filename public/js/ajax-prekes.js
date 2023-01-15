$(document).ready(function(){

    // document.querySelector("#ajaxSearch")
    // document.getElementById('ajaxSearch')

    // document.querySelector("#ajaxSearch").addEventListener('submit', function(e){
    //     atitinka apacioj, bet reikia bibliotekos,
    // })


    $('#ajaxSearch').on('submit', function(e){
                e.preventDefault();
            var route = $(this).attr('data-ajax-form-url')+'?search='+$('#search').val(); // GET metodu reikia duomenis perduoti per nuoroda
            var method = "GET";

            // FormData - perkelia visus duomenis is formos i JSON objekta
            // visi duomenys kurie yra imputuose pavirsta i JSON objekta

            $.ajax({
                url: route, // kaip kad formoje nurodome action
                method: method, // metodas bus get
                // data: new FormData(this), // perduoti tik tada kai naudojam POST metoda!
                dataType: 'json',  // numatytasis nustatymas yra json, bet gali neveikt
                processData: false, // be sito neveikia
                success:function(response) {
                    console.log(response);
                },
                error:function(response) {
                    console.log(response); // 404 puslapis nerastas
                },
            })

            console.log(route);
                
    });

});