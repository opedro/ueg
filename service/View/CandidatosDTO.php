<?php
/**
 * Created by @opedro Date: 26/10/2015 Time: 20:31
 */
class CandidatosDTO
{
    public function __construct()
    {

    }

    public function getJson($linha)
    {
        $ret = array(
            "nome" => utf8_encode($linha["nome"]),

            "id_cargo" => utf8_encode($linha["id_cargo"]),

            "apelido" => utf8_encode($linha["apelido"]),

            "id_candidato" => utf8_encode($linha["id_candidato"]),

            "foto" => utf8_encode($linha["foto"])
        );
        return $ret;
    }
}
    ?>