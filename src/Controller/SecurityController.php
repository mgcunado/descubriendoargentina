<?php
// src/Controller/SecurityController.php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/extranet")
 */
class SecurityController extends Controller
{
   /**
    * @Route("/login", name="login")
    */
   public function login(Request $request, AuthenticationUtils $authUtils)
   {
      // get the login error if there is one
      $error = $authUtils->getLastAuthenticationError();

      // last username entered by the user
      $lastUsername = $authUtils->getLastUsername();

      return $this->render('extranet/login.html.twig', array(
         'last_username' => $lastUsername,
         'error'         => $error,
         'id' => 1,
      ));
   } 


   /**
    * @Route("/tarifas/nueva", name="extranet_tarifas_nueva")
    */
   public function ofertaNuevaAction() 
   {
      return $this->render('extranet/extranet.html.twig');
   }

   /**
    * @Route("/tarifas/editar/{id}", name="extranet_tarifas_editar")
    */
   public function ofertaEditarAction()
   {
      return $this->render('extranet/extranet.html.twig');
   }

   /**
    * @Route("/perfil", name="extranet_perfil")
    */
   public function perfilAction() { }
}
