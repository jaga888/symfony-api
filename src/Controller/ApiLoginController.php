<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserTokenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;


class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function index(Security $security,#[CurrentUser] ?User $user, UserTokenRepository $repository): JsonResponse
    {
        if (null === $user) {
           return $this->json([
               'message' => 'missing credentials',
                 ], Response::HTTP_UNAUTHORIZED);
        }


        return $this->json([
            'user'  => $user->getUserIdentifier(),
            'token' => 159,
        ]);
    }
}
