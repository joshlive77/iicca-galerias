<?php

// =============================================================================
// HERRAMIENTAS
// =============================================================================



/**
 * Objeto de metodos estaticos con funciones utiles para el plugin
 */
class IiccaGaleriaTools
{
    /**
     * Limita un texto a un conjunto de palabras
     *
     * @param string $texto
     * @param integer $limite
     * @return string $texto
     */
    public static function limitarTexto($texto = '', $limite = 0)
    {
        /**
         * separa el texto por espacios y compone un array con las cadenas
         */
        $articulo = explode(' ', $texto);
        if (count($articulo) > $limite)
        {
            /**
             * si la longitud del array de cadenas es mayor al limite de palabras
             * devuelve un string compuesto por el numero de cadenas del limite
             */
            return implode(' ', array_slice($articulo, 0, $limite)) . '....';
        }
        else
        {
            /**
             * si la longitud del array es inferior al limite
             * devulve el mismo texto
             */
            return $texto;
        }
    
    }

    public static function fechaActual(){
        $timezone = "America/La_paz";
        $datetime = new datetime("now", new datetimezone($timezone));
        $actualdate = strtotime(gmdate("d-m-Y", (time() + $datetime->getOffset())));

        return $actualdate;
    }

    public static function traducirFecha($fecha)
    {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('j', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        // return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
        // $date_requested = array($numeroDia, $nombreMes, $anio);
        $date_requested['dia'] = $numeroDia;
        $date_requested['mes'] = $nombreMes;
        $date_requested['anio'] = $anio;
        return $date_requested;
    }
}
