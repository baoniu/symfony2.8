<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/3/13
 * Time: 下午12:18
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType;

class RegType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        parent::buildForm($builder,$options);
        $builder->add('captcha','captcha',[
            'mapped' => false,
        ]);
    }
    public function getName()
    {
        return 'app_reg';
    }
}