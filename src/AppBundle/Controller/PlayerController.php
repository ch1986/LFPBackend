<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Player;
use AppBundle\Entity\Club;
use AppBundle\Form\PlayerType;

class PlayerController extends FOSRestController
{
    /**
    * @Rest\Get("/players/{clubId}")
    */
    public function getAction($clubId)
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('AppBundle:Player')->findBy(array('club' => $clubId));
        return $players;
    }
    
    /**
    * @Rest\Post("/player/{clubId}")
    */
    public function postAction(Request $request, $clubId)
    {
        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository('AppBundle:Club')->find($clubId);
        if($club instanceof Club)
        {
            $data = json_decode($request->getContent(), true);
            $player = new Player();
            $form = $this->createForm(PlayerType::class, $player);
            $form->handleRequest($request);
            $form->submit($data);
            if ($form->isValid())
            {
                $player->setClub($club);
                $em->persist($player);
                $em->flush();
            }
            else
            {
                echo "invalid";
                foreach ($form->getErrors(true) as $error) {
                       echo "\n".$form->getName()." ".$error->getMessage();
                    }
                foreach ($form as $child) {
                    foreach ($child->getErrors(true) as $error) {
                       echo "\n".$child->getName()." ".$error->getMessage();
                    }
               }
            }
        }
    }
}
