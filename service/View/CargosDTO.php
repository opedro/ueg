    <?php
/**
 * Created by @opedro Date: 26/10/2015 Time: 20:31
 */
class CargosDTO
{
    public function __construct()
    {

    }

    public function getJson($linha)
    {
        $ret = array(
            "desc_cargo" => utf8_encode($linha["desc_cargo"]),

            "id_cargo" => utf8_encode($linha["id_cargo"])
        );
        return $ret;
    }
}
    ?>