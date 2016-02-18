<?php

namespace CoreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Security\Core\SecurityContext;

class WallType extends AbstractType
{

    private $user;

    public function __construct($user = null)
    {
        $this->user = $user;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       // if ($this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED'))
          //  $user = $this->securityContext->getToken()->getUser();
     // die(var_dump($this->user));

        $builder
            ->add('name')
            ->add('active', CheckboxType::class, array(
                'label'    => 'Show this entry publicly?',
                'required' => false,
            ))
            ->add('type', EntityType::class, array(
                'class' => 'CoreBundle\Entity\Type',
                'choice_label' => 'name',
                'label' => 'Choix'
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Wall'
        ));
    }
}
