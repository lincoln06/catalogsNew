<?php

namespace App\Controller;

use App\Repository\CatalogIndexRepository;
use App\Repository\SystemsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPanelController extends AbstractController
{
    #[Route('/admin/panel', name: 'app_admin_panel')]
    public function index(SystemsRepository $systemsRepository, CatalogIndexRepository $catalogIndexRepository): Response
    {
        $types=$systemsRepository->findAll();
        $catalogs=$catalogIndexRepository->findAll();
        $typeNames=[];

        foreach($types as $type) {
            array_push($typeNames,$type->getName());
        }

        return $this->render('admin_panel/index.html.twig', [
            'controller_name' => 'AdminPanelController',
            'system_types'=>$typeNames,
            'catalogs'=>$catalogs
        ]);
    }
}
