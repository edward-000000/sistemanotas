<?php

namespace app\models;

class MainModel
{
    /*----------  Funcion limpiar cadenas  ----------*/
    public function limpiarCadena($cadena){

        $palabras=["<script>","</script>","<script src","<script type=","SELECT * FROM","SELECT ","FROM"," SELECT ","DELETE FROM","INSERT INTO","DROP TABLE","DROP DATABASE","TRUNCATE TABLE","SHOW TABLES","SHOW DATABASES","<?php","?>","--","^","<",">","==","=",";","::"];
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);

        foreach($palabras as $palabra){
            $cadena=str_ireplace($palabra, "", $cadena);
        }

        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);

        return $cadena;
    }


    /*---------- Función verificarDatos (expresión regular) ----------*/
    protected function verificarDatos($filtro, $cadena) {
        if(preg_match("/^".$filtro."$/", $cadena)){
            return false; // La cadena coincide con la expresión regular
        } else {
            return true; // La cadena no coincide con la expresión regular
        }
    }
}