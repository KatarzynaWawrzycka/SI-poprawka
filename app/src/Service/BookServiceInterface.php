<?php


namespace App\Service;

/**
 * Interface BookServiceInterface.
 */
interface BookServiceInterface
{
    /**
     * Get all books.
     *
     * @return array List of books
     */
    public function getAllBooks(): array;

    /**
     * Save entity.
     *
     * @param Category $category Category entity
     */
    public function save(Book $book): void;
}
