<?php


namespace App\Form;


use App\Entity\OrderItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChooseProductTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder->add('size', ChoiceType::class, [
            'choices'  => [
                'small' => 'Small',
                'medium' => 'Medium',
                'big' => 'Big'
            ],
        ])*/
           $builder->add('choose', SubmitType::class);
    }

   /*public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderItem::class
        ]);
    }*/


}
