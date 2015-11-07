<?php
/**
 * Created by @opedro Date: 26/10/2015 Time: 20:42
 */

class Connection {
 public function __construct(){
     //$conexao = mysqli_connect("mysql.hostinger.com.br","u182545652_admin","pauloviado", "u182545652_ueg");
     $this->conexao = mysqli_connect("localhost","root","", "ueg");

     if (! $this->conexao) {
         die("Erro na conexão!");
     }else{
         //return $conexao;
     }
 }
}