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

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
/**
 * Controller managing the registration
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class RegistrationController extends BaseController
{
    public function registerAction(Request $request)
    {
        $response = parent::registerAction($request );
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER') === TRUE) {
            $user = $this->get('security.context')->getToken()->getUser();

            if($user->getTwitterId() === null)
                return $this->redirectToRoute('hwi_oauth_connect');
            else
                return $this->redirectToRoute('fos_user_profile_show');
        }
        return $response;
    }

}
