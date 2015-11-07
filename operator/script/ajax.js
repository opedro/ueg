/**
 * Created by Pedro on 25/10/2015.
 */

function getDados(params, callback) {
    $.ajax({
        url: '../service/controller/service.php',
        dataType: 'json',
        type: 'post',
        data: params,
        success: function(data){
            if(data.success) {
                callback(data);
            }
            else
            {
                alert('Alguma coisa não deu certo cara!');
            }
        }

    });

}
