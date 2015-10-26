<?php
/**
 * Created by @opedro Date: 25/10/2015 Time: 21:51
 */

function connect(){

    $conexao = mysqli_connect("mysql.hostinger.com.br","u182545652_admin","pauloviado", "u182545652_ueg");
    //$conexao = mysqli_connect("localhost","root","", "ueg");

    if (!$conexao) {
        die("Erro na conexão!");
    }else{
        return $conexao;
    }

}