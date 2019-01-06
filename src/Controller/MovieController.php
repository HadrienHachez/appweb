<?php
namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @var MovieRepository
     */
    private $repository;

    public function __construct(MovieRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/movies/", name="movie.index")
     * @return Response
     */
    public function index(): Response
    {
        $movies = $this->repository->findAll();
        return $this->render('movie/index.html.twig',compact('movies'));
    }

    /**
     * @Route("/movies/{id}", name="movie.show"))
     * @param Movie $movie
     * @return Response
     */
    public function show(Movie $movie): Response
    {
        return $this->render('movie/show.html.twig',[
            'movie' => $movie
        ]);
    }

    /**
     * @Route("/movies/edit/{id}", name="movie.edit"))
     * @param Movie $movie
     */
    public function edit(Movie $movie)
    {
        $form = $this->createForm(MovieType::class,$movie);
        return $this->render('movie/edit.html.twig',[
            'movie' => $movie,
            'form' => $form->createView()]);
    }
}