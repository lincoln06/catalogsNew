<?php

namespace App\Controller;

use App\Entity\Catalogs;
use App\Form\AddCatalogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

class CatalogController extends AbstractController
{
    #[Route('/new/catalog', name: 'app_new_catalog')]
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $catalog=new Catalogs();
        $form=$this->createForm(AddCatalogType::class);
        if ($form->isSubmitted() && $form->isValid()) {
            $catalog=$form->getData();
            $catalogFile = $form->get('catalog')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($catalogFile) {
                $originalFilename = pathinfo($catalogFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$catalogFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $catalogFile->move(
                        $this->getParameter('catalogs_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                   var_dump($catalog);
                   die();
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $catalog->setCatalogFilename($newFilename);
            }


            return $this->redirectToRoute('/catalogs');
        }
        return $this->render('new_catalog/index.html.twig', [
            'controller_name' => 'CatalogController',
            'form'=>$form,
        ]);
    }
    public function addNewCatalog(Request $requeest)
    {

    }
}
