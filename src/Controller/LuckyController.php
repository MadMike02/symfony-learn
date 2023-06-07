<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class LuckyController extends AbstractController
{
    

    #[Route('/number')]
    public function number(UserRepository $userRepository): Response
    {
        $number = random_int(0, 100);
        $users = $userRepository->findAll();
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}