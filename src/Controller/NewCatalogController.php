<?php

namespace App\Controller;

use App\Form\AddCatalogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewCatalogController extends AbstractController
{
    #[Route('/new/catalog', name: 'app_new_catalog')]
    public function index(Request $request): Response
    {
        $form=$this->createForm(AddCatalogType::class);
        return $this->render('new_catalog/index.html.twig', [
            'controller_name' => 'NewCatalogController',
            'form'=>$form,
        ]);
    }
    public function addNewCatalog(Request $requeest)
    {

    }
}
