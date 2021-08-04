function SelectVilles(pays_id,ville_id){
    if(pays_id=="0"){
        $('#ville').children().remove().end();
        $('#ville').append('<option data-display="All Villes" value="0">All Villes</option>')
        $("#ville").niceSelect("update")
    }

    var request = $.ajax({
                            url: window.url+pays_id,
                            method: "GET",
                            success: function(result){
                                $('#ville').children().remove().end();
                                $('#ville').append('<option data-display="All Villes" value="0">All Villes</option>')
                                for(var i in result){
                                    if(result[i].id==ville_id){
                                        $('#ville').append("<option value='"+result[i].id+"' selected>"+result[i].nom +"</option>")
                                    }else{
                                        $('#ville').append("<option value='"+result[i].id+"'>"+result[i].nom +"</option>")
                                    }
                                }
                                $("#ville").niceSelect("update")
                            }
                         });
}

function GetVilleArriveeJson(ville){

    var request = $.ajax({
                        url: window.url_GetVilleArriveeJson,
                        method: "GET",
                        data:{ ville_depart_id : ville},
                        success: function(result){
                            console.log(result)
                            $('#ville_to_avion').children().remove().end();
                            $('#ville_to_avion').append('<option data-display="All Villes" value="0">All Villes</option>')
                            for(var i in result){
                                 $('#ville_to_avion').append("<option value='"+result[i].id+"' >"+result[i].nom +"</option>")

                            }
                            $("#ville_to_avion").niceSelect("update")
                        }
                     });
}
