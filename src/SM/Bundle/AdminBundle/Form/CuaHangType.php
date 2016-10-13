<?php
namespace SM\Bundle\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CuaHangType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                    'required' => true,
                    'label' => 'Name',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('address', TextType::class, array(
                    'required' => false,
                    'label' => '',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('note', TextareaType::class, array(
                    'required' => false,
                    'label' => '',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('image', FileType::class, array(
                'required' => false,
                'label' => 'Image (Image file)'))
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
            'data_class' => 'SM\Bundle\UserBundle\Entity\CuaHang',
        ));
    }
//    
//    public function getName()
//    {
//        return 'Exchange_Type';
//    }
}



