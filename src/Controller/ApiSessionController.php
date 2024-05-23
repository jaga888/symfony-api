<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserTokenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class ApiSessionController extends AbstractController
{
    #[Route('/api/session', name: 'api_session', methods: ['GET'])]
    public function index(#[CurrentUser] ?User $user, UserTokenRepository $repository): JsonResponse
    {
        return $this->json([
            'user'  => $user,
        ]);
    }
}
