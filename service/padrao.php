<?php
/**
 * Created by @opedro Date: 25/10/2015 Time: 21:34
 */
require_once("conn.php");

$json  = array(
    'success' => false
);

$acao = $_POST["acao"] or "";

switch ($_POST["acao"]) {

    case 1:
        
        // Verifica se a consulta retornou linhas
         $data = array();
        if ($data.length > 0) {

            // Montagem do json dentro de data
           
            $json = array();
            
            // Captura os dados da consulta e insere no json
            $i = 0;
            for($i=0; $i< $data.length ; $i++){
                $json.put(new CarroDTO($data[$i]));
            }
            $json['success'] = true;
            echo json_encode(new DefaultReturn(true, $json));

        } else {

            // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário

            echo json_encode(new DefaultReturn(true, null, "Sem registros"));

        }

        break;



    default:
        $json['success'] = true;
        $json['result'] = "Acao nao encontrada";
        echo json_encode($json);

        break;

}

public class DefaultReturn(){
    function __construct($success,$item, $message){
        $this=>success = $success;
         $this=>data = $item;
        if(!$message){
            $this=>message = "Sucesso";
        }else{
            $this=>message =$message;
        }
    }
}


public class CarroDTO(){
    function __construct($item){
        
    }
}
?>
