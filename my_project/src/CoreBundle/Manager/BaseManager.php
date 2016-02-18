<?php

namespace CoreBundle\Manager;

abstract class BaseManager
{
    protected function persistAndFlush($entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }
    public function findBy($key, $value)
    {
        return $this->getRepository()->findBy([$key => $value]);
    }
    public function findOneByLast($key, $value)
    {
        return $this->getRepository()->findOneBy([$key => $value], ['id' => "DESC"]);
    }

}