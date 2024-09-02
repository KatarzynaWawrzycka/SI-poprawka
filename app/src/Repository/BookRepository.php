<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * Save entity.
     *
     * @param Book $book Category entity
     */
    public function save(Book $book): void
    {
        //assert($this->_em instanceof EntityManager);
        $this->_em->persist($book);
        $this->_em->flush();
    }
}
