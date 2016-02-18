<?php
namespace ClientBundle\Controller;

use HWI\Bundle\OAuthBundle\Controller\ConnectController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\User;

class ConnectController extends BaseController
{


    public function connectServiceAction(Request $request, $service)
    {
        $response = parent::connectServiceAction($request, $service);
        $accesToken = $this->getSessionAccesToken();

        $em =  $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $user->setTwitterAccessToken($accesToken['oauth_token']);
        $user->setTwitterAccessSecretToken($accesToken['oauth_token_secret']);
        $em->persist($user);
        $em->flush();
        return $response;
    }

    private function getSessionAccesToken()
    {
        $sessionAll = $this->get('session')->all();
   
        $sessionAccesToken = '_hwi_oauth.connect_confirmation';
        foreach($sessionAll as $key => $value)
        {
            if(stripos($key, $sessionAccesToken) !== false)
            {
                return $value;
            }
        }
    }
}