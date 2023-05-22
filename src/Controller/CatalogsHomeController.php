<?php

namespace App\Controller;


use App\Repository\CatalogsRepository;
use App\Repository\ProducerRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CatalogsHomeController extends AbstractController
{
    #[Route('/catalogs', name: 'app_catalogs_home')]

    public function index(ProducerRepository $producerRepository, CatalogsRepository $catalogIndexRepository): Response
    {


        $producers=$producerRepository->findAll();
        $catalogs=[];
        foreach($producers as $producer) {
            $catalogs[$producer->getName()]=$producer->getCatalogs();
        }


        return $this->render('catalogs_home/index.html.twig', [

                'producers'=>$producers,
                'catalogs'=>$catalogs
            ]
        );
    }

}
