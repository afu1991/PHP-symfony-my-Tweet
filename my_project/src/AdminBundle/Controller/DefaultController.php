<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $walls = $this->get('core.manager.wall_manager')->findAll();
        return $this->render('AdminBundle:Default:index.html.twig', array(
            'walls' => $walls,
        ));
    }
}
