<?php
/**
 * Created by @opedro Date: 26/10/2015 Time: 20:31
 */
class EleitoresDTO
{
    public function __construct()
    {

    }

    public function getJson($linha)
    {
        $ret = array(
            "id_eleitor" => utf8_encode($linha["id_eleitor"]),

            "nome" => utf8_encode($linha["nome"]),

            "sobrenome" => utf8_encode($linha["sobrenome"]),

            "documento" => utf8_encode($linha["documento"]),

            "apelido" => utf8_encode($linha["apelido"]),

            "id_uev" => utf8_encode($linha["id_uev"]),

            "foto" => utf8_encode($linha["foto"])

        );
        return $ret;
    }

    public function getJsonVotacao($linha)
    {
        $ret = array(
            "id_eleitor" => utf8_encode($linha["id_eleitor"]),

            "nome" => utf8_encode($linha["nome"]),

            "sobrenome" => utf8_encode($linha["sobrenome"]),

            "documento" => utf8_encode($linha["documento"])

        );
        return $ret;
    }
}
    ?>