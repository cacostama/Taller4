<?php
class Conectar
{
    public static function con()
    {
        $cadena = "host=localhost port=5432 dbname=farmafram user=postgres password=1234";
        $con = pg_connect($cadena) or die("Error de conexión: " . pg_last_error());
        return $con;
    }
}

class consultas extends Conectar
{
    public static function get_datos($sql)
    {
        $res = pg_query(parent::con(), $sql) or die($sql . '<br>' . pg_last_error());

        if ($res) {
            $t = array();
            while ($reg = pg_fetch_assoc($res)) {
                $t[] = $reg;
            }

            if (!empty($t)) {
                return $t;
            } else {
                return null;
            }
        }
    }

    public static function ejecutar_sql($sql)
    {
        $con = parent::con();
        if (pg_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
}
?>

