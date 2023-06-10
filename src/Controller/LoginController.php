<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if (!$this->getUser() or $this->getUser()) {
             return $this->redirectToRoute('home');
        }

        $error_message = null;

        if(isset($_GET["error"])) {
            $error = trim($_GET['error']);
            if($error == "not_connected") {
                $error_message = "Vous devez être connecté pour accéder à cette page.";
            }
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'error_message' => $error_message]);
    }


}
