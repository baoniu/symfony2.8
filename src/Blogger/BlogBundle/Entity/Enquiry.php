<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/22
 * Time: 下午9:37
 */
namespace Blogger\BlogBundle\Entity;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Enquiry{
    protected $name;
    protected $email;
    protected $subject;
    protected $body;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name=$name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email=$email;
    }
    public function getSubject()
    {
        return $this->subject;
    }
    public function setSubject($subject)
    {
        $this->subject=$subject;
    }
    public function getBody()
    {
        return $this->body;
    }
    public function setBody($body)
    {
        return $this->body;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name',new NotBlank());
        $metadata->addPropertyConstraint('email',new Email(array(
            'message'=>'symblog does not like invalid email. Give me a real one!'
        )));
        $metadata->addPropertyConstraint('subject',new NotBlank());
        $metadata->addPropertyConstraint('subject',new Length(array(
            'min'=>0,
            'max'=>50
        )));
        $metadata->addPropertyConstraint('body',new Length(array(
            'min'=>0,
            'max'=>100
        )));
    }
}