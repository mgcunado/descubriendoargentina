<?php

namespace App\Service;

class TransformName
{
    public function doTransform($ppp, $ruta = null): array
    {
        $filas = count($ppp);
        $fotos = array();
        $i = 0;
        while ($i < $filas) {

            /* Transformamos nombre en archivo de imagen  */

            if ($ruta == 'trenes') {
                $nombre = $ppp[$i]['provincia'];
            } else {
                $nombre = $ppp[$i]['nombre'];
            }
            $nombre2 = str_replace(" ", "_", $nombre);
            $nombre2 = str_replace("á", "a", $nombre2);
            $nombre2 = str_replace("é", "e", $nombre2);
            $nombre2 = str_replace("í", "i", $nombre2);
            $nombre2 = str_replace("ó", "o", $nombre2);
            $nombre2 = str_replace("ú", "u", $nombre2);
            $nombre2 = str_replace("Ñ", "N", $nombre2);
            $nombre2 = str_replace("ñ", "n", $nombre2);
            $nombre2 = str_replace("ü", "u", $nombre2);
            $nombre2 = str_replace("Á", "A", $nombre2);
            $nombre2 = str_replace("Ó", "O", $nombre2);
            $nombre2 = str_replace("“", "", $nombre2);
            $nombre2 = str_replace("”", "", $nombre2);
            $nombre2 = str_replace(",", "", $nombre2);
            $nombre2 = str_replace(".", "", $nombre2);
            /* fin de transformación */

            if ($ruta == 'casinos') {
                $nombreimg = 'images/nuevas/casinos/' . $nombre2 . '.jpg';
                if (file_exists($nombreimg)) {
                    $nombre2 = $nombre2;
                } else {
                    $nombre2 = 'sinfoto/' . $nombre2;
                }
            }

            $fotonew = array($nombre2);
            $fotos = array_merge($fotos, $fotonew);
            $i = $i + 1;
        }

        return $fotos;
    }
}
