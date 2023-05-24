<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ManageUsersFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('roles', ChoiceType::class, [
                'choices' =>
                array
                (
                    'ROLE_USER' => array('Yes' => 'ROLE_USER',),
                    'ROLE_EDITOR' => array('Yes' => 'ROLE_EDITOR',),
                    'ROLE_ADMIN' => array('Yes' => 'ROLE_ADMIN',)
                ),
                'multiple' => true,
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
