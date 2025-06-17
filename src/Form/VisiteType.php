<?php

namespace App\Form;

use App\Entity\Visite;
use App\Entity\Environnement;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ville')
            ->add('pays')
            /**->add('datecreation', null, [
                'widget' => 'single_text',
                'label' => 'date'
            ])**/
            ->add('datecreation', DateType::class, [
                'widget' => 'single_text',
                'data' => isset($options['data']) && 
                            $options['data']->getDateCreation() != null ? $options['data']->getDateCreation() : new DateTime('now'),
                'label' => 'Date'
            ])

            ->add('note')
            ->add('avis')
            ->add('tempmin', null, [
                'label' => 't° min'
            ])
            ->add('tempmax', null, [
                'label' => 't° max'
            ])
            ->add('environnements', EntityType::class, [
                'class' => Environnement::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'required' => false,
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer'
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}