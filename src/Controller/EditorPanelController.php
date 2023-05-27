<?php

namespace App\Controller;

use App\Entity\Catalogs;
use App\Repository\CatalogsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditorPanelController extends AbstractController
{
    #[Route('/editor/panel', name: 'app_editor_panel')]
    public function index(CatalogsRepository $catalogsRepository): Response
    {
        $catalogs=$catalogsRepository->findAll();
        if (!$catalogs) {
            throw $this->createNotFoundException(
                'Brak danych '
            );
        }
        var_dump($catalogs);
        die();
        return $this->render('editor_panel/index.html.twig', [
            'catalogs' => $catalogs
        ]);
    }
}
