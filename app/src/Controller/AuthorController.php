<?php

namespace App\Controller;

use App\Entity\Author;
use App\Service\AuthorServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/author')]
class AuthorController extends AbstractController
{
    private AuthorServiceInterface $authorService;

    public function __construct(AuthorServiceInterface $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Index action.
     *
     * @return Response HTTP response
     */
    #[Route(
        name: 'author_index',
        methods: 'GET'
    )]
    public function index(): Response
    {
        $author = $this->authorService->getAllAuthors();

        return $this->render(
            'author/index.html.twig',
            ['author' => $author]
        );
    }

    /**
     * Show action.
     *
     * @param Author $author Author entity
     *
     * @return Response HTTP response
     */
    #[Route(
        '/{id}',
        name: 'author_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: 'GET',
    )]
    public function show(Author $author): Response
    {
        return $this->render(
            'author/show.html.twig',
            ['author' => $author]
        );
    }
}
