<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 02/02/16
 * Time: 14:27
 */
namespace CoreBundle\Manager;
use Doctrine\ORM\EntityManager;
use CoreBundle\Manager\BaseManager;

class WallManager extends BaseManager
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getWallByUserAuth($user)
    {
        $query = $this->getRepository()->getWallByUserAuth()->getQuery();
        $query->setParameter('user', $user);
        return $query->execute();

    }

    public function remove($id)
    {
        $tweet = $this->getRepository()->find($id);
        $this->entityManager->remove($tweet);
        $this->entityManager->flush();
    }

    public function getRepository()
    {
        return $this->entityManager->getRepository('CoreBundle:Wall');
    }
}