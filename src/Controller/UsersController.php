<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    #[Route('/all_users', name: 'app_all_users')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        if (!$users) {
            throw $this->createNotFoundException(
                'Brak użytkowników '
            );
        }
         return $this->render('users/index.html.twig', ['users' => $users]);
    }
    #[Route('/delete_user/{id}', name: 'app_delete_user')]
    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        $user=$entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirectToRoute('app_all_users');
    }
}
