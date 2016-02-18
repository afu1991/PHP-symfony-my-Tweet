<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TwitterController extends Controller
{

    public $search;

    public function indexAction(Request $request)
    {
        //$type = $form["type"]->getData();

        if ($request->getMethod() == 'POST') {
            $datas = $request->request->all();
            if (!empty($datas['group1']) && !empty($datas['text']) ){
                $this->search = $this->get('core.service.twitter_service')->getTwitterSearch($datas['group1'], $datas['text']);
            }
        }

        return $this->render('CoreBundle:Twitter:index.html.twig', array(
            'tweets' => $this->search,
        ));
    }

}
