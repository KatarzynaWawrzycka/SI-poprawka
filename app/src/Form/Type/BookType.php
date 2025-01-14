<?php
/**
 * Category type.
 */

namespace App\Form\Type;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Genre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CategoryType.
 */
class BookType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array<string, mixed> $options Form options
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'label' => 'label.title',
                    'required' => true,
                    'attr' => ['max_length' => 255],
                ]
            )
            ->add(
                'totalPages',
                IntegerType::class,
                [
                    'label' => 'label.total_pages',
                    'required' => true,
                ]
            )
            ->add(
                'rating',
                NumberType::class,
                [
                    'label' => 'label.rating',
                    'required' => true,
                    'scale' => 1,
                ]
            )
            ->add(
                'isbn',
                TextType::class,
                [
                    'label' => 'label.isbn',
                    'required' => true,
                    'attr' => ['max_length' => 13],
                ]
            )
            ->add(
                'publishedDate',
                IntegerType::class,
                [
                    'label' => 'label.published_date',
                    'required' => true,
                ]
            )
            ->add(
                'authors',
                EntityType::class,
                [
                    'class' => Author::class,
                    'choice_label' => 'lastName',
                    'multiple' => true,
                    'expanded' => false,
                    'label' => 'label.authors',
                ]
            )
            ->add(
                'genre',
                EntityType::class,
                [
                    'class' => Genre::class,
                    'choice_label' => 'id',
                    'label' => 'label.genre',
                ]
            );
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Book::class]);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix(): string
    {
        return 'book';
    }
}
