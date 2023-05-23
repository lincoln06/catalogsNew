<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditorPanelController extends AbstractController
{
    #[Route('/editor/panel', name: 'app_editor_panel')]
    public function index(): Response
    {
        return $this->render('editor_panel/index.html.twig', [
            'controller_name' => 'EditorPanelController',
        ]);
    }
}
