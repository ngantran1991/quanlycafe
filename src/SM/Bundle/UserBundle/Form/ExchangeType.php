<?php
namespace SM\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ExchangeType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateActive', TextType::class, array(
                    'required' => true,
                    'label' => '',
                    'attr' => array(
                        'class' => 'form-control',
                        'readonly' => true,
                        'size' => '16')))
            ->add('idTypeExchange', EntityType::class, array(
                    'class' => 'UserBundle:TypeExchange',
                    'required' => true,
                    'choice_label' => 'name',
                    'attr' => array(
                        'class' => 'form-control')))
            ->add('valueIn', TextType::class, array(
                    'required' => true,
                    'label' => '',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('valueOut', TextType::class, array(
                    'required' => true,
                    'label' => '',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('save', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-success'
                )
            ))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SM\Bundle\UserBundle\Entity\Exchange',
        ));
    }
//    
//    public function getName()
//    {
//        return 'Exchange_Type';
//    }
}

