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
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ThucDonType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                    'required' => true,
                    'label' => 'Tên',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('gia', IntegerType::class, array(
                    'required' => true,
                    'label' => '',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('idCategory', EntityType::class, array(
                    'class' => 'UserBundle:Category',
                    'label' => 'Loại',
                    'required' => false,
                    'choice_label' => 'name',
                    'attr' => array(
                        'class' => 'form-control')))
            ->add('detail', TextType::class, array(
                    'required' => false,
                    'label' => 'Chi Tiếc',
                    'attr' => array(
                        'class' => 'form-control',)))
            ->add('note', TextareaType::class, array(
                    'required' => false,
                    'label' => 'Ghi Chú',
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
            'data_class' => 'SM\Bundle\UserBundle\Entity\ThucDon',
        ));
    }
//    
//    public function getName()
//    {
//        return 'Exchange_Type';
//    }
}



