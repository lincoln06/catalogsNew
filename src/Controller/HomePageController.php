<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        if($authenticationUtils->getLastUsername()===null)
        {
            return $this->redirectToRoute('app_login');
        }
        return $this->redirectToRoute('app_catalogs_home');
    }
}
