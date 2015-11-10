<?php
/**
 * Created by @opedro Date: 25/10/2015 Time: 21:34
 */

class VotacaoController{
    public $model;
    public function __construct($action){
        $this->votacaoModel = new VotacaoModel();
        $this->CandidatosModel = new CandidatosModel();
        $this->CargosModel = new CargosModel();
        $this->EleitoresModel = new EleitoresModel();
        $this->acao = $action;
    }

    public function getVotacao($id_uev, $senha){

        $isValid = $this->votacaoModel->checkUev($id_uev, $senha);

        if ($isValid) {
            $cargosView = new CargosDTO();
            $candidatosView = new CandidatosDTO();
            $eleitoresView = new EleitoresDTO();
            $votacaoView = new VotacaoDTO();
            $i = 0;
            $j = 0;

            $cargos = $this->CargosModel->getCargos('');
            if($cargos){
                $json['data'] = array();
                while($cargo = mysqli_fetch_array($cargos)){
                    $json['data']['cargo'][$i]=$cargosView->getJson($cargo);
                    $candidatos = $this->CandidatosModel->getCandidatosFromCargo($cargo['id_cargo']);

                    if ($candidatos){
                        while($candidato = mysqli_fetch_array($candidatos)){
                            $json['data']['cargo'][$i]['candidatos'][$j] = $candidatosView->getJson($candidato);
                            $j++;
                        }
                    }
                    $i++;
                    $j=0;
                }
            }
            $eleitores = $this->EleitoresModel->getEleitoresByUEV($id_uev);
            if($eleitores){
                $i = 0;
                while($eleitor = mysqli_fetch_array($eleitores)){
                    $json['data']['eleitor'][$i] = $eleitoresView->getJsonVotacao($eleitor);
                    $i ++;
                }
            }
            $json['success'] = true;

            echo json_encode($json);
        } else {
            $error = "ID ou Senha da UEV inválida";
            echo json_encode(new DefaultReturn(true, null, $error));
        }
    }

    public function recebeVotos($data){
        $id_uev = $data["id_uev"] || '';
        $senha = $data["senha"] || '';

        $isValid = $this->votacaoModel->checkUev($id_uev, $senha);

        if ($isValid) {
            $cargos = $data["cargo"];
            foreach($cargos as $cargo){
                foreach($cargo['candidatos'] as $candidato) {
                    $vot = $this->votacaoModel->addVote($id_uev, $candidato['id_candidato'], $candidato['qtd_votos']);
                }
            }
            $message = "Foram contabilizados ".$vot." votos válidos";
            echo json_encode(new DefaultReturn(true, null, $message));
        } else {
            $error = "ID ou Senha da UEV inválida";
            echo json_encode(new DefaultReturn(true, null, $error));
        }
    }


    public function defaultRequest($data)
    {
        $acao = $this->acao;
        switch ($acao) {
            case 3:
                $id_uev = isset($data["id_uev"]) ? $data["id_uev"] : '';
                $senha = isset($data["senha"]) ? $data["senha"] : '';

                $this->getVotacao($id_uev, $senha);

                break;
            case 4:
                $this->recebeVotos($data);
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
