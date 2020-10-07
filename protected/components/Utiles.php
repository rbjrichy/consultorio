<?php
class utiles extends CApplicationComponent
{
    public function init()
    {
        // init es llamado por Yii, debido a que es un componente.
    }
    public function getRealIP()
    {
//    foreach($_SERVER as $nombre_campo => $valor){
        //
        //    $asignacion = "$" . $nombre_campo . "= . $valor . ";
        //
        //    echo "<br>" . $asignacion;
        //
        //}

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
//      if ( $_SERVER['HTTP_X_FORWARDED_FOR'] )
        // if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
        {
            $client_ip =
            (!empty($_SERVER['REMOTE_ADDR'])) ?
            $_SERVER['REMOTE_ADDR']
            :
            ((!empty($_ENV['REMOTE_ADDR'])) ?
                $_ENV['REMOTE_ADDR']
                :
                "unknown");
            //echo "entro";
            // los proxys van añadiendo al final de esta cabecera
            // las direcciones ip que van "ocultando". Para localizar la ip real
            // del usuario se comienza a mirar por el principio hasta encontrar
            // una dirección ip que no sea del rango privado. En caso de no
            // encontrarse ninguna se toma como valor el REMOTE_ADDR

            $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);

            reset($entries);
            while (list(, $entry) = each($entries)) {
                $entry = trim($entry);
                if (preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list)) {
                    // http://www.faqs.org/rfcs/rfc1918.html
                    $private_ip = array(
                        '/^0\./',
                        '/^127\.0\.0\.1/',
                        '/^192\.168\..*/',
                        '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                        '/^10\..*/');

                    $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

                    if ($client_ip != $found_ip) {
                        $client_ip = $found_ip;
                        break;
                    }
                }
            }
        } else {

            $client_ip = $_SERVER['REMOTE_ADDR'];
            //  echo $client_ip;
        }

        return $client_ip;

    }
    public function getLlave($codigo)
    {
        $llave  = 'C8aV$atuhACV65$';
        $uno    = date('Y');
        $tres   = date('jn');
        $dos    = date('G');
        $dos    = $dos - 6;
        $param2 = $codigo . $uno . $dos . $tres . $llave;
        $parama = sha1($param2);
        return $parama;
    }
    public function getLlaveFechas($codigo, $fechainicial, $fechafinal)
    {
        $llave  = 'C8aV$atuhACV65$';
        $uno    = date('Y');
        $tres   = date('jn');
        $dos    = date('G');
        $dos    = $dos - 6;
        $param2 = $fechainicial . $codigo . $uno . $dos . $tres . $llave . $fechafinal;
        $parama = sha1($param2);
        return $parama;
    }
    public function formatearFecha($fecha)
    {
        $aux  = substr($fecha, 0, 10);
        $anio = substr($aux, 0, 4);
        $mes  = substr($aux, 5, 2);
        $dia  = substr($aux, 8, 2);
        return $dia . '/' . $mes . '/' . $anio;
    }
    public function formatearFechaHora($fecha)
    {
        //2015-12-22 10:00:00
        $aux  = substr($fecha, 0, 10);
        $anio = substr($aux, 0, 4);
        $mes  = substr($aux, 5, 2);
        $dia  = substr($aux, 8, 2);
        $hora = substr($fecha, 11, 5);
        return $dia . '/' . $mes . '/' . $anio . ' ' . $hora;
    }

//funciones auxiliares
    public function completarinformacion($resultado)
    {
        $respuesta = array
            (
            array("Beni", 0),
            array("Chuquisaca", 0),
            array("Cochabamba", 0),
            array("La Paz", 0),
            array("Oruro", 0),
            array("Pando", 0),
            array("Potosi", 0),
            array("Santa Cruz", 0),
            array("Tarija", 0),
        );

        for ($j = 0; $j < 9; $j++) {
            for ($i = 0; $i < count($resultado); $i++) {
                if (strcmp($respuesta[$j][0], $resultado[$i]['distrito']) == 0) {
                    $respuesta[$j][1] = $resultado[$i]['cantidad'];
                }
            }
        }

        return $respuesta;
    }

    public function sendEmail($email, $subject, $message)
    {
        $adminEmail = Yii::app()->params['adminEmail'];
        $headers    = "MIME-Version: 1.0\r\nFrom: $adminEmail\r\nReply-To: $adminEmail\r\nContent-Type: text/html; charset=utf-8";
        //$headers = "MIME-Version: 1.0\r\nFrom: $adminEmail\r\nReply-To: $adminEmail\r\nContent-Type: text/html; charset=iso-8859-1";
        $message = wordwrap($message, 70);
        $message = str_replace("\n.", "\n..", $message);
        return mail($email, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
    }

    public function formatNombre($nombre, $apellidoUno = '', $apellidoDos = '')
    {
        return $nombre . ' ' . $apellidoUno . ' ' . $apellidoDos;
    }
    public function now()
    {
        /**fecha para comparar en eun gridview atributo visible*/
        return date("d/m/Y");
    }

}
