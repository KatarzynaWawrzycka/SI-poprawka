<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BookFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    protected function loadData(): void
    {
        $this->createMany(50, 'books', function ($i) {
            $book = new Book();
            $book->setTitle(preg_replace('/\./', '', $this->faker->sentence($this->faker->numberBetween(1, 5))));
            $book->setTotalPages($this->faker->numberBetween(20, 1200));
            $book->setRating($this->faker->randomFloat(1, 0, 5));
            $book->setIsbn($this->faker->ean13());
            $book->setPublishedDate($this->faker->numberBetween(1950, 2024));
            $book->setGenre($this->getRandomReference('genres'));

            $authors = $this->getRandomReferences(
                'authors',
                $this->faker->numberBetween(1, 5)
            );
            foreach ($authors as $author) {
                $book->addAuthor($author);
            }

            return $book;
        });

        $this->manager->flush();
    }

    public function getDependencies(): array
    {
        return [AuthorFixtures::class, GenreFixtures::class];
    }
}