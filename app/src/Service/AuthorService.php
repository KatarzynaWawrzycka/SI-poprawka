<?php

namespace App\Service;

use App\Repository\AuthorRepository;

/**
 * Class BookService.
 */
class AuthorService implements AuthorServiceInterface
{
    private AuthorRepository $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Get all authors.
     *
     * @return array List of authors
     */
    public function getAllAuthors(): array
    {
        return $this->authorRepository->findAll();
    }
}
