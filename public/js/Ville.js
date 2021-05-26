function SelectVilles(pays_id){
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
                                    $('#ville').append("<option value='"+result[i].id+"'>"+result[i].nom +"</option>")
                                }
                                $("#ville").niceSelect("update")
                            }
                         });
}