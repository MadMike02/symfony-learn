<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParameterController extends AbstractController
{
    #[Route('/parameter/{name}', methods:['GET','HEAD'], defaults:['name' => 'John'])]
    public function number($name): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.' and parameter written:.'.$name.'</body></html>'
        );
    }

    #[Route('/frontLoad', methods:['GET'])]
    public function frontEnd(): Response
    {
        $data = ["movie1", "movie2", "movie3"];

       return $this->render('index.html.twig',array("movies" => []));
    }
}