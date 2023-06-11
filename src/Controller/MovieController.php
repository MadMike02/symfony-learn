<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MovieRepository;

class MovieController extends AbstractController
{
    private $movieRepository;

    public function __construct(MovieRepository $MovieRepository){
        $this->movieRepository = $MovieRepository;
    }

    #[Route('/movie', name: 'app_movie')]
    public function index(): Response
    {
        $movies = $this->movieRepository->findAll();
        // dd($movies);
        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/movie/{id}', name: 'app_movie_view')]
    public function show($id): Response
    {
        $movie = $this->movieRepository->find($id);
        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
        ]);
    }
}
