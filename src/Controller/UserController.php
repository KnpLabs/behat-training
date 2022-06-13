<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function list(): Response
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();

        return new Response(
            implode(', ', array_map(static function(User $user) { return $user->getEmail(); }, $users))
        );
    }
}