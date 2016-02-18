<?php
// src/AppBundle/Entity/User.php

namespace CoreBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Wall", mappedBy="user", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $wall;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_id", type="string", nullable=true)
     */
    protected $twitter_id;

    /** @ORM\Column(name="twitter_access_token", type="string", length=255, nullable=true) */

    protected $twitter_access_token;

    /** @ORM\Column(name="twitter_access_secret_token", type="string", length=255, nullable=true) */

    protected $twitter_access_secret_token;


    public function __construct()
    {
        parent::__construct();
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set twitter_id
     *
     * @param string $twitterId
     * @return User
     */
    public function setTwitterId($twitterId)
    {
        $this->twitter_id = $twitterId;

        return $this;
    }

    /**
     * Get twitter_id
     *
     * @return string 
     */
    public function getTwitterId()
    {
        return $this->twitter_id;
    }

    /**
     * Set twitter_access_token
     *
     * @param string $twitterAccessToken
     * @return User
     */
    public function setTwitterAccessToken($twitterAccessToken)
    {
        $this->twitter_access_token = $twitterAccessToken;

        return $this;
    }

    /**
     * Get twitter_access_token
     *
     * @return string
     */
    public function getTwitterAccessToken()
    {
        return $this->twitter_access_token;
    }

    /**
     * Set twitter_access_secret_token
     *
     * @param string $twitterAccessSecretToken
     * @return User
     */
    public function setTwitterAccessSecretToken($twitterAccessSecretToken)
    {
        $this->twitter_access_secret_token = $twitterAccessSecretToken;

        return $this;
    }

    /**
     * Get twitter_access_secret_token
     *
     * @return string 
     */
    public function getTwitterAccessSecretToken()
    {
        return $this->twitter_access_secret_token;
    }

    /**
     * Add wall
     *
     * @param \CoreBundle\Entity\Wall $wall
     *
     * @return User
     */
    public function addWall(\CoreBundle\Entity\Wall $wall)
    {
        $this->wall[] = $wall;

        return $this;
    }

    /**
     * Remove wall
     *
     * @param \CoreBundle\Entity\Wall $wall
     */
    public function removeWall(\CoreBundle\Entity\Wall $wall)
    {
        $this->wall->removeElement($wall);
    }

    /**
     * Get wall
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWall()
    {
        return $this->wall;
    }
}
