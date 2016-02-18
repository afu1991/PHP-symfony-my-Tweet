<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 04/02/16
 * Time: 10:48
 */
namespace CoreBundle\Manager;

use Doctrine\ORM\EntityManager;
use CoreBundle\Manager\BaseManager;
use CoreBundle\Entity\Tweet;
class TwitterManager extends BaseManager
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function insertTweets($tweets, $wall)
    {
        foreach(array_reverse($tweets->statuses) as $value) {
            $tweet = new Tweet();
            $tweet->setTwitterId($value->id);
            $tweet->setContent($value->text);
            $tweet->setFollowingProfilImage($value->user->profile_image_url_https);
            $tweet->setFollowingProfilUsername($value->user->screen_name);
            $tweet->setProfilBackgroundImage($value->user->profile_background_image_url_https);
            $tweet->setWall($wall);
            $this->persistAndFlush($tweet);
        }
    }
    public function acceptOrRefuseTweet($id, $bool)
    {
        $tweet = $this->getRepository()->find($id);
        $tweet->setAccepted($bool);
        $this->persistAndFlush($tweet);
    }

    public function getRepository()
    {
        return $this->entityManager->getRepository('CoreBundle:Tweet');
    }
}