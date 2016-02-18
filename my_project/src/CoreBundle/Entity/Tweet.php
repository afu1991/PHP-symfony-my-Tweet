<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tweet
 *
 * @ORM\Table(name="tweet")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\TweetRepository")
 */
class Tweet
{
    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Wall", inversedBy="tweet", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $wall;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\Column(name="twitterId", type="string", length=70, nullable=true) */

    protected $twitterId;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="following_profil_image", type="text", nullable=true)
     */

    private $following_profil_image;
    /**
     * @var string
     *
     * @ORM\Column(name="following_profil_username", type="text")
     */

    private $following_profil_username;

    /**
     * @var bool
     *
     * @ORM\Column(name="accepted", type="boolean")
     */

    private $accepted = false;

    /**
     * @var string
     *
     * @ORM\Column(name="profil_background_image", type="text", nullable=true)
     */
    private $profil_background_image;

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
     * Set content
     *
     * @param string $content
     *
     * @return Tweet
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set wall
     *
     * @param \CoreBundle\Entity\Wall $wall
     *
     * @return Tweet
     */
    public function setWall(\CoreBundle\Entity\Wall $wall)
    {
        $this->wall = $wall;

        return $this;
    }

    /**
     * Get wall
     *
     * @return \CoreBundle\Entity\Wall
     */
    public function getWall()
    {
        return $this->wall;
    }

    /**
     * Set followingProfilImage
     *
     * @param string $followingProfilImage
     *
     * @return Tweet
     */
    public function setFollowingProfilImage($followingProfilImage)
    {
        $this->following_profil_image = $followingProfilImage;

        return $this;
    }

    /**
     * Get followingProfilImage
     *
     * @return string
     */
    public function getFollowingProfilImage()
    {
        return $this->following_profil_image;
    }



    /**
     * Set followingProfilUsername
     *
     * @param string $followingProfilUsername
     *
     * @return Tweet
     */
    public function setFollowingProfilUsername($followingProfilUsername)
    {
        $this->following_profil_username = $followingProfilUsername;

        return $this;
    }

    /**
     * Get followingProfilUsername
     *
     * @return string
     */
    public function getFollowingProfilUsername()
    {
        return $this->following_profil_username;
    }

    /**
     * Set accepted
     *
     * @param boolean $accepted
     *
     * @return Tweet
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return boolean
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

    /**
     * Set twitterId
     *
     * @param string $twitterId
     *
     * @return Tweet
     */
    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    /**
     * Get twitterId
     *
     * @return string
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * Set profilBackgroundImage
     *
     * @param string $profilBackgroundImage
     *
     * @return Tweet
     */
    public function setProfilBackgroundImage($profilBackgroundImage)
    {
        $this->profil_background_image = $profilBackgroundImage;

        return $this;
    }

    /**
     * Get profilBackgroundImage
     *
     * @return string
     */
    public function getProfilBackgroundImage()
    {
        return $this->profil_background_image;
    }
}
