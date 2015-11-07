<?php
/**
 * Created by @opedro Date: 25/10/2015 Time: 21:34
 */

class EleitoresController{
    public $model;
    public function __construct($action){
        $this->model = new EleitoresModel();
        $this->acao = $action;
    }

    public function getEleitores($nome){
        $result = $this->model->getEleitores($nome);
        if ($result) {
            $view = new CargosDTO();
            // Montagem do json dentro de data
            $json['data'] = array();

            // Captura os dados da consulta e insere no json
            while ($linha = mysqli_fetch_array($result)) {
                $json['data'][0] = $view->getJson($linha);
            }
            $json['success'] = true;
            echo json_encode($json);
        } else {
            echo json_encode(new DefaultReturn(true, null, "Sem retorno"));
        }
    }

    public function defaultRequest()
    {
        $acao = $this->acao;
        switch ($acao) {
            case 2:
                $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
                $this->getEleitores($nome);

                break;

            default:
                $json['success'] = true;
                $json['result'] = "Acao nao encontrada";
                echo json_encode($json);

                break;

        }
    }
}



?>
