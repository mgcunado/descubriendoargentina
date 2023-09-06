<?php

namespace App\Service;

class GlobalDirection
{
    /**
     * @param int $dirGLOBAL
     * @param int $dirEO
     * @param int $dirNS
     */
    public function getDirection($dirGLOBAL, $dirEO, $dirNS): String
    {
        if ($dirGLOBAL <= tan(22.5 * 0.01745329252) && $dirGLOBAL >= tan(-22.5 * 0.01745329252) && $dirEO > 0) {
            $direccion = "Este";
        } elseif ($dirGLOBAL > tan(22.5 * 0.01745329252) && $dirGLOBAL < tan(67.5 * 0.01745329252) && $dirNS > 0 && $dirEO > 0) {
            $direccion = "Noreste";
        } elseif (($dirGLOBAL >= tan(67.5 * 0.01745329252) || $dirGLOBAL <= tan(112.5 * 0.01745329252)) && $dirNS > 0) {
            $direccion = "Norte";
        } elseif ($dirGLOBAL > tan(112.5 * 0.01745329252) && $dirGLOBAL < tan(157.5 * 0.01745329252) && $dirNS > 0) {
            $direccion = "Noroeste";
        } elseif ($dirGLOBAL >= tan(157.5 * 0.01745329252) && $dirGLOBAL <= tan(202.5 * 0.01745329252) && $dirEO < 0) {
            $direccion = "Oeste";
        } elseif ($dirGLOBAL > tan(202.5 * 0.01745329252) && $dirGLOBAL < tan(247.5 * 0.01745329252) && $dirNS < 0 && $dirEO < 0) {
            $direccion = "Suroeste";
        } elseif (($dirGLOBAL >= tan(247.5 * 0.01745329252) || $dirGLOBAL <= tan(292.5 * 0.01745329252)) && $dirNS < 0) {
            $direccion = "Sur";
        } elseif ($dirGLOBAL > tan(292.5 * 0.01745329252) && $dirGLOBAL < tan(-22.5 * 0.01745329252) && $dirNS < 0) {
            $direccion = "Sureste";
        }
        return $direccion;
    }
}
