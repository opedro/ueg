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

        $nome = isset($_GET["txtnome"]) ?  $_GET["txtnome"] : '';

        // Conexao com o banco de dados

        $conexao = connect();

        // Verifica se a variável está vazia

        if (empty($nome)) {

            $sql = "SELECT * FROM candidato";

        } else {

            $nome .= "%";
            $sql = "SELECT * FROM candidato WHERE nome like '%$nome%'";

        } sleep(1);

        $result = mysqli_query($conexao, $sql);

        $cont = mysqli_affected_rows($conexao);

        // Verifica se a consulta retornou linhas

        if ($cont > 0) {

            // Montagem do json dentro de data
            $json['data'] = array();

            // Captura os dados da consulta e insere no json
            $i = 0;
            while ($linha = mysqli_fetch_array($result)) {
                $json['data'][$i] = array(
                    "nome" => utf8_encode($linha["nome"]),

                    "id_cargo" =>utf8_encode($linha["id_cargo"]),

                    "apelido" => utf8_encode($linha["apelido"]),

                   "id_candidato"=>utf8_encode($linha["id_candidato"]),
                   
                   "foto"=>utf8_encode($linha["foto"])
                );
            }
            $json['success'] = true;
            echo json_encode($json);

        } else {

            // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
            $json['success'] = true;
            $json['result'] = "Sem registros";
            echo json_encode($json);

        }

        break;



    default:
        $json['success'] = true;
        $json['result'] = "Acao nao encontrada";
        echo json_encode($json);

        break;

}

?>
