<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wall
 *
 * @ORM\Table(name="wall")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\WallRepository")
 */
class Wall
{
    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Tweet", mappedBy="wall", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $tweet;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Type")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;
    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\User", inversedBy="wall")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="accepted", type="boolean", nullable=true)
     */
    private $accepted;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Wall
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Wall
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set accepted
     *
     * @param boolean $accepted
     *
     * @return Wall
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return bool
     */
    public function getAccepted()
    {
        return $this->accepted;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tweet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tweet
     *
     * @param \CoreBundle\Entity\Tweet $tweet
     *
     * @return Wall
     */
    public function addTweet(\CoreBundle\Entity\Tweet $tweet)
    {
        $this->tweet[] = $tweet;

        return $this;
    }

    /**
     * Remove tweet
     *
     * @param \CoreBundle\Entity\Tweet $tweet
     */
    public function removeTweet(\CoreBundle\Entity\Tweet $tweet)
    {
        $this->tweet->removeElement($tweet);
    }

    /**
     * Get tweet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTweet()
    {
        return $this->tweet;
    }

    /**
     * Set type
     *
     * @param \CoreBundle\Entity\Type $type
     *
     * @return Wall
     */
    public function setType(\CoreBundle\Entity\Type $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \CoreBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param \CoreBundle\Entity\User $user
     *
     * @return Wall
     */
    public function setUser(\CoreBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CoreBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
