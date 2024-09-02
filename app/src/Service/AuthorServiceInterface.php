<?php


namespace App\Service;

/**
 * Interface BookServiceInterface.
 */
interface AuthorServiceInterface
{
    /**
     * Get all books.
     *
     * @return array List of books
     */
    public function getAllAuthors(): array;
}
