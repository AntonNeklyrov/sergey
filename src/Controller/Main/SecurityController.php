<?php

namespace App\Controller\Main;

class SecurityController extends AbstractController
{

    /**
     * @Route(path: '/login', name: 'app_login')
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_main');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * Route(path: '/logout', name: 'app_logout')
     */
    public function logout(): void
    {
        $session = $this->container->get('session');
        $session->clear();
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}