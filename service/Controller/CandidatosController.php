<?php
/**
 * Created by @opedro Date: 25/10/2015 Time: 21:34
 */

class CandidatosController{
    public $model;
    public function __construct($action){
        $this->model = new CandidatosModel();
        $this->acao = $action;
    }

    public function getCandidatos($nome){
        $result = $this->model->getCandidatos($nome);
        if ($result) {
            $view = new CandidatosDTO();
            // Montagem do json dentro de data
            $json['data'] = array();

            // Captura os dados da consulta e insere no json
            while ($linha = mysqli_fetch_array($result)) {
                $json['data'][0] = $view->getJson($linha);
            }
            $json['success'] = true;
            echo json_encode($json);
        } else {
            echo json_encode(new DefaultReturn(true, null, false));
        }
    }

    public function defaultRequest()
    {
        $acao = $this->acao;
        switch ($acao) {
            case 1:
                $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
                $this->getCandidatos($nome);

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
