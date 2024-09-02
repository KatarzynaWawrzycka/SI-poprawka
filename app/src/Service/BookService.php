<?php

namespace App\Service;

use App\Entity\Book;
use App\Repository\BookRepository;

/**
 * Class BookService.
 */
class BookService implements BookServiceInterface
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Get all books.
     *
     * @return array List of books
     */
    public function getAllBooks(): array
    {
        return $this->bookRepository->findAll();
    }

    /**
     * Save entity.
     *
     * @param Category $category Category entity
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Book|\App\Service\Book $book): void
    {
        $this->bookRepository->save($book);
    }
}
