<?php
/**
 * Created by @opedro Date: 25/10/2015 Time: 21:34
 */

class CargosController{
    public $model;
    public function __construct($action){
        $this->model = new CargosModel();
        $this->acao = $action;
    }

    public function getCargos($nome){
        $result = $this->model->getCargos($nome);
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

    public function defaultRequest($data)
    {
        $acao = $this->acao;
        switch ($acao) {
            case 2:
                $nome = isset($data["nome"]) ? $data["nome"] : '';
                $this->getCargos($nome);

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
