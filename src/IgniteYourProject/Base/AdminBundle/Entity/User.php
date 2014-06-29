<?php

namespace IgniteYourProject\Base\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    private $current_balence;

    /**
     * Set current_balence
     *
     * @param string $currentBalence
     * @return User
     */
    public function setCurrentBalence($currentBalence)
    {
        $this->current_balence = $currentBalence;

        return $this;
    }

    /**
     * Get current_balence
     *
     * @return string 
     */
    public function getCurrentBalence()
    {
        return $this->current_balence;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
