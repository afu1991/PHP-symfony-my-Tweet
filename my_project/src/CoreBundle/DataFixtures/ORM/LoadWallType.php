<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 01/02/16
 * Time: 15:15
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Type;

class LoadWallType extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $params = array('#hashtag','@Compte Twitter', 'Mot clé');
        foreach($params as $value){
            $type = new Type();
            $type->setName($value);
            $manager->persist($type);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}