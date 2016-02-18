<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\HttpFoundation\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class DefaultController extends Controller
{


    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();


      //  $ok = $this->get('core.manager.wall_manager')->findOneByLast('wall', $user->getWall());


        return $this->render('CoreBundle:Default:index.html.twig');
    }
}
