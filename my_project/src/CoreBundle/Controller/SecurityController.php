<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CoreBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Security;

use Symfony\Component\Security\Core\Exception\AuthenticationException;


class SecurityController extends BaseController
{
    public function loginAction(Request $request)
    {
        $response = parent::loginAction($request);

        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER') === TRUE) {

            return $this->redirectToRoute('fos_user_profile_show');
        }
       // return $this->redirectToRoute('fos_user_profile_show');

        return $response;
    }
}
