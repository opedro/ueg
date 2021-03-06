<?php
/**
 * Created by @opedro Date: 05/11/2015 Time: 19:42
 */

//config
require_once("../config.php");

//Controllers
require_once('CandidatosController.php');
require_once('CargosController.php');
require_once('VotacaoController.php');
require_once('EleitoresController.php');
require_once('DefaultReturn.php');


//Models
require_once("../Model/Connection.php");
require_once("../Model/VotacaoModel.php");
require_once("../Model/EleitoresModel.php");
require_once("../Model/CandidatosModel.php");
require_once("../Model/CargosModel.php");


//Views
require_once("../View/VotacaoDTO.php");
require_once("../View/EleitoresDTO.php");
require_once("../View/CandidatosDTO.php");
require_once("../View/CargosDTO.php");



//$nome = $_GET['nome'];
$data = file_get_contents('php://input');
$data = json_decode($data, true);
$action = $data['acao'];

if($action){
    switch($action){
        case '1':
            $candidato = new CandidatosController($action);
            $candidato->defaultRequest($data);
            break;
        case '2':
            $cargo = new CargosController($action);
            $cargo->defaultRequest($data);
            break;
        case '3':
            $votacao = new VotacaoController($action);
            $votacao->defaultRequest($data);
            break;
        case '4':
            $votacao = new VotacaoController($action);
            $votacao->defaultRequest($data);
            break;


    }
}else{
   echo new DefaultReturn(false, null, "Nenhuma ação encontrada");
}


