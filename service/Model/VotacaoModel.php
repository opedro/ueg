<?php
/**
 * Created by @opedro Date: 26/10/2015 Time: 20:33
 */

class VotacaoModel extends Connection{
    //private $conn;
    public function __construct(){
        $this->conn = new Connection();
    }
    public function checkUev($id, $senha){
        $conexao = $this->conn;

        // Verifica se a variável está vazia

        $sql = "SELECT * FROM uev WHERE id_uev = '$id' and senha = '$senha'";

        $result = mysqli_query($conexao->conexao, $sql);

        $cont = mysqli_affected_rows($conexao->conexao);

        if($cont > 0){
            return true;
        }else{
            return false;
        }
    }
    public function addVote($id_candidato, $id_uev, $quant_votos){
        $conexao = $this->conn;

        $sql = "INSERT INTO eleicao(id_uev, id_candidato, quant_votos) VALUES ($id_uev, $id_candidato, $quant_votos)";
        $result = mysqli_query($conexao->conexao, $sql);

        $cont = mysqli_affected_rows($conexao->conexao);

        if($cont > 0){
            return true;
        }else{
            return false;
        }
    }

}