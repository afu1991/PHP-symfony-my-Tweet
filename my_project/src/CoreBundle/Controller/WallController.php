<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Tweet;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Entity\Wall;
use CoreBundle\Form\WallType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Wall controller.
 *
 */
class WallController extends Controller
{
    protected $option;
    /**
     * Lists all Wall entities.
     *
     */
    public function indexAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $datas = $request->request->all();
            foreach($datas['wall'] as $key => $value) {
                $this->get('core.manager.wall_manager')->remove($key);
            }
        }
        return $this->render('CoreBundle:wall:index.html.twig', array(
            'walls' => $this->get('core.manager.wall_manager')->getWallByUserAuth($this->getUser()),
            'users' => $this->getUser(),
        ));
    }

    /**
     * Creates a new Wall entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $wall = new Wall();
        $form = $this->createForm('CoreBundle\Form\WallType', $wall);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $wall->setUser($user);
            $em->persist($wall);
            $em->flush();
            return $this->redirectToRoute('wall_index');
        }

        return $this->render('CoreBundle:wall:new.html.twig', array(
            'wall' => $wall,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Wall entity.
     *
     */
    public function showAction(Wall $wall)
    {
        if ($wall->getType()->getId() === 1) {
            $this->option = "#";
        } elseif ($wall->getType()->getId() === 2) {
            $this->option = "@";
        } else {
            $this->option = "";
        }
        $this->get('core.service.twitter_service')->getWallTweet($this->option , $wall);

        if ($wall->getActive() != true) {
            return $this->render('CoreBundle:wall:show.html.twig', array(
            'tweets' => $this->get('core.manager.twitter_manager')->findBy('wall',$wall),
            ));
        } else {

            return $this->redirectToRoute('param_wall_show', array('id' => $wall->getId()));
        }
    }

    public function showWallAction($id)
    {
        $wall = $this->get('core.manager.wall_manager')->find($id);
        return $this->render('CoreBundle:wall:showafter.html.twig', ['tweets' => $wall->getTweet(), 'Wall_id' => $id]);

    }

    public function activeParamAction(Request $request, $id)
    {
        $wall = $this->get('core.manager.wall_manager')->find($id);
        $tweet = $this->get('core.manager.twitter_manager')->findBy('wall', $wall);

        if ($request->isMethod('POST')) {
            $datas = $request->request->all();
            if ($datas['choices'] === "accept") {
                //dump($datas['checkbox']);
                foreach ($datas['checkbox'] as $key => $value) {
                    $this->get('core.manager.twitter_manager')->acceptOrRefuseTweet($key, true);
                }
            } else {
                foreach ($datas['checkbox'] as $key => $value) {
                    $this->get('core.manager.twitter_manager')->acceptOrRefuseTweet($key, false);
                }
            }
        }
        return $this->render('CoreBundle:wall:activeparam.html.twig', ['tweets' => $tweet, 'Wall_id' => $id]);
    }

    public function acceptedAction($id, $bool)
    {
        $em = $this->getDoctrine()->getManager();
        $tweet = $em->getRepository('CoreBundle:Tweet')->find($id);
        $wallId = $tweet->getWall()->getId();
        $tweet->setAccepted($bool);
        $em->persist($tweet);
        $em->flush();
        return $this->redirectToRoute('param_wall_show', ['id' => $wallId]);
    }

    /**
     * Displays a form to edit an existing Wall entity.
     *
     */
    public function editAction(Request $request, Wall $wall)
    {
        $editForm = $this->createForm('CoreBundle\Form\WallType', $wall);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($wall);
            $em->flush();
            $security = $this->get('security.context');
            if ($security->isGranted('ROLE_ADMIN') || $security->isGranted('ROLE_SUPER_ADMIN')) {
                return $this->redirectToRoute('admin_wall_index');
            }
            return $this->redirectToRoute('wall_index');
        }

        return $this->render('CoreBundle:wall:edit.html.twig', array(
            'wall' => $wall,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Wall entity.
     *
     */
    public function deleteAction(Request $request, Wall $wall)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($wall);
        $em->flush();
        $security = $this->get('security.context');
        if ($security->isGranted('ROLE_ADMIN') || $security->isGranted('ROLE_SUPER_ADMIN')) {
            return $this->redirectToRoute('admin_wall_index');
        }
        return $this->redirectToRoute('wall_index');
    }

}
