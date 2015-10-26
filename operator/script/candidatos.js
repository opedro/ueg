/**
 * Created by Pedro on 25/10/2015.
 */
$(document).ready(function(){

    var url = 'script/ajax.js';

    $.getScript(url,function(){
        var params = {
            nome: '',
            acao: 1
        }
        getDados(params, function(data){
            data = data.data;
            var i = 0;
            for(i = 0; i < data.length; i++){
                $('tbody').append(
                    '<tr>' +
                    '<td>'+ data[i].id_candidato+'</td>' +
                    '<td>'+ data[i].nome + '</td>' +
                    '<td>'+ data[i].id_cargo + '</td>'+
                    '<td>'+ data[i].apelido + '</td>' +
                    '<td><img src="'+ data[i].foto + '"></td>' +
                    
                    '</tr>'
                );
            }
        });



    })

});



