<?php
/*
 * Created by @opedro Date: 26/10/2015 Time: 20:33
 */

class CargosModel extends Connection{
    //private $conn;
    public function __construct(){
        $this->conn = new Connection();
    }
    public function getCargos($nome){
        $conexao = $this->conn;

        // Verifica se a variável está vazia

        $sql = "SELECT * FROM cargo";

        $result = mysqli_query($conexao->conexao, $sql);

        $cont = mysqli_affected_rows($conexao->conexao);

        if($cont > 0){
            return $result;
        }else{
            return false;
        }

    }

}