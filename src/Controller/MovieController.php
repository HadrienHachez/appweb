<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/movies/", name="movie.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('movie/index.html.twig');
    }
}