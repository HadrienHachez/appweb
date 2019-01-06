<?php
namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * @param MovieRepository $repository
     * @return Response
     */
    public function index(MovieRepository $repository):Response
    {
        $movies = $repository->findGoodOnes();
        return $this->render('pages/home.html.twig',[
            'movies' => $movies
        ]);
    }
}