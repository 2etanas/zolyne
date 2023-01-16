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
                    
                    var tbody = $('.prekes-lentute');
                    tbody.html(''); // isvalo lentute
                    var generatedHtml = ''; //tuscias naujo html kintamasis
                    
                    var assetLink0 = '<img src="';
                    var assetLink1 = window.location.origin;
                    var assetLink2 = "/storage/images/produktai/";
                    var assetLink3 = "/";
                    var assetLink4 = '" alt="foto1"  style="max-height:200px;width:125px;"></td>';
                    //sukuria lentele kiekvienam
                    for (var i = 0; i < response.length; i++){
                        generatedHtml += '<tr>';
                        generatedHtml += '<td>'+response[i].id+'</td>';
                        generatedHtml += '<td>'+response[i].preke_id+'</td>';
                        generatedHtml += '<td>'+response[i].preke_pavadinimas+'</td>';
                        generatedHtml += '<td>'+response[i].preke_aprasymas+'</td>';
                        generatedHtml += '<td>'+response[i].preke_kaina+'</td>';
                

                        generatedHtml += '<div><td class="basket-nuotraukas">'+assetLink0+assetLink1+assetLink2+response[i].preke_id+assetLink3+response[i].preke_foto1+assetLink4;
                        generatedHtml += '<td class="basket-nuotraukas">'+assetLink0+assetLink1+assetLink2+response[i].preke_id+assetLink3+response[i].preke_foto2+assetLink4;
                        generatedHtml += '</div><div><td class="basket-nuotraukas">'+assetLink0+assetLink1+assetLink2+response[i].preke_id+assetLink3+response[i].preke_foto3+assetLink4;
                        generatedHtml += '<td class="basket-nuotraukas">'+assetLink0+assetLink1+assetLink2+response[i].preke_id+assetLink3+response[i].preke_foto4+assetLink4;
                        generatedHtml += '</div>'
                        console.log(assetLink0+assetLink1+assetLink2+response[i].preke_id+assetLink3+response[i].preke_foto1+assetLink4);

                    }
                    tbody.append(generatedHtml);
                    tbody.append('<tr><td>Labas</td></tr>');
                },
                error:function(response) {
                    console.log(response); // 404 puslapis nerastas
                },
            })

            console.log(route);
                
    });
       //kažką bandom įrodyti su delete alertu. turbūt neverta.     
    // var $istrintas = $(document).attr('istrintas-attr').val()
    // if($istrintas !== undefined){
    //     console.log('istrintas ');
    // }else{
    //         console.log('neistrintas ');
    //     };
    

});
