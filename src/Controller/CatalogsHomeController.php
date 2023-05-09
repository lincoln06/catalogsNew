<?php

namespace App\Controller;

use App\Entity\Systems;
use App\Repository\CatalogIndexRepository;
use App\Repository\SystemsRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CatalogsHomeController extends AbstractController
{
    #[Route('/catalogs', name: 'app_catalogs_home')]

    public function index(SystemsRepository $systemsRepository, CatalogIndexRepository $catalogIndexRepository): Response
    {
        $types=$systemsRepository->findAll();
        $catalogs=$catalogIndexRepository->findAll();

        $typeNames=[];
        foreach($types as $type) {
            array_push($typeNames,$type->getName());
        }
        return $this->render('catalogs_home/index.html.twig', [
                'system_types'=>$typeNames,
                'catalogs'=>$catalogs
            ]
        );
    }

}
