<?php

namespace App\Controller;

use App\Repository\CatalogIndexRepository;
use App\Repository\CatalogsRepository;
use App\Repository\ProducerRepository;
use App\Repository\SystemsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPanelController extends AbstractController
{
    #[Route('/admin/panel', name: 'app_admin_panel')]
    public function index(): Response
    {
        return $this->render('admin_panel/index.html.twig', [

        ]);
    }
}
