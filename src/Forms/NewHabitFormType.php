<?php


namespace App\Forms;

use App\Entity\Habit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewHabitFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name')
            ->add('habitInterval');
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(
            ['data_class'=> Habit::class]
        );
    }
}