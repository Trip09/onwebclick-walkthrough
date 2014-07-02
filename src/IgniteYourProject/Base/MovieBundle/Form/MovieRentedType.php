<?php

namespace IgniteYourProject\Base\MovieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovieRentedTypeAdmin extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('movie')
            ->add('movie_id')
            ->add('renter_name')
            ->add('renter_mobile')
            ->add('rented_at')
            ->add('delivered_at');

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IgniteYourProject\Base\MovieBundle\Entity\MovieRented'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'igniteyourproject_base_moviebundle_movierented';
    }
}
