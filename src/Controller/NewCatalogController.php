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
        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();
            $system=$data->getSystem();
            $producer=$data->getProducer();
            $path=$form->get('file')->getData()->;

            $dateAdded=date();
            //this part of code clears the user's roles
            $user->setRoles([]);
            //it is necessary to revoke permissions from some users
            $user->setRoles($roles);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_all_users');
        }
        return $this->render('new_catalog/index.html.twig', [
            'controller_name' => 'NewCatalogController',
            'form'=>$form,
        ]);
    }
    public function addNewCatalog(Request $requeest)
    {

    }
}
