<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register', methods: ['POST'])]
    public function register(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $email = $data['email'] ?? null;
        $name = $data['name'] ?? null;
        $password = $data['password'] ?? null;

        if (!$email || !$name || !$password) {
            return new JsonResponse(['error' => 'Missing fields'], 400);
        }
        return $this->json([
            'email' => $email,
            'name' => $name,
            'password' => $password,
        ]);

    }
}
