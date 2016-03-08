<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/3/1
 * Time: 下午7:08
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @var string
     * @ORM\Column(name="qq_id",type="string",length=50)
     */
    protected $qqId;
    public function setQqId($qqId)
    {
        $this->qqId=$qqId;
    }
    public function getQqId()
    {
        return $this->qqId;
    }
}