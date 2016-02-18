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

use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


/**
 * Controller managing the registration
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class ProfileController extends BaseController
{
    public function showAction()
    {
        $user = $this->getUser();
        if($user->getTwitterId() === null)
            return $this->redirectToRoute('hwi_oauth_connect');


        $acces_token = $user->getTwitterAccessToken();

        $acces_token_secret = $user->getTwitterAccessSecretToken();

        $profil = $this->get('core.service.twitter_service')->getUserProfile($acces_token, $acces_token_secret);

        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        //dump($profil);
        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'profil' => $profil,
        ));
    }

}
