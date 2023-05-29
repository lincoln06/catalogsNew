<?php

namespace App\Form;

use App\Entity\Catalogs;
use App\Entity\Producer;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class CatalogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ...
            ->add('System')
            ->add('Producer', EntityType::class,[
                'class' => Producer::class,
                'choice_label' => function($producer) {
                    return $producer->getName();
                }
            ])
            ->add('DateAdded')
            ->add('catalog', FileType::class, [
                'label' => 'Przeglądaj...',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Załadownany plik nie jest prawidłowym plikiem PDF',
                    ])
                ],
            ])
            // ...
        ;
//        $builder
//            ->add('System')
//            ->add('Path')
//            ->add('DateAdded')
//            ->add('Producer')
//        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Catalogs::class,
        ]);
    }
}
