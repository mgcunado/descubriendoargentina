<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class SendEmails
{
    public function sendMultiple($formulario): object
    {
        $message = (new TemplatedEmail())
            ->from('mikel@descubriendoargentina.com')
            ->to('mikel@descubriendoargentina.com')
            ->subject('Reserva de alojamiento desde www.DescubriendoArgentina.com')
            ->htmlTemplate('emails/envioemailmultiple.html.twig')
            ->context([
                'nombre' => $formulario['nombre']->getData(),
                'telefono' => $formulario['telefono']->getData(),
                'direccionemail' => $formulario['email']->getData(),
                'fechallegada' => $formulario['fechallegada']->getData()->format('d/m/Y'),
                'fechasalida' => $formulario['fechasalida']->getData()->format('d/m/Y'),
                'pasajeros' => $formulario['pasajeros']->getData(),
                'consulta' => $formulario['consulta']->getData(),
            ]);

        return $message;
    }
}
