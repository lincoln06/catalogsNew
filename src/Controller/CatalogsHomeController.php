<?php

namespace App\Controller;


use App\Repository\ProducerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CatalogsHomeController extends AbstractController
{
    #[Route('/catalogs', name: 'app_catalogs_home')]

    public function index(ProducerRepository $producerRepository): Response
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
