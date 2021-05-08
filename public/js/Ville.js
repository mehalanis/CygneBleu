function SelectVilles(pays_id){
    var url="{{route('PaysController.GetVillesJsonURL')}}/"+pays_id
    var request = $.ajax({
                            url: url,
                            method: "GET",
                            success: function(result){
                                $('#ville').children().remove().end();
                                for(var i in result){
                                    $('#ville').append("<option value='"+result[i].id+"'>"+result[i].nom +"</option>")
                                }
                            }
                         });
}