<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Club;

class ClubController extends FOSRestController
{
    /**
     * @Rest\Get("/club")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clubs = $em->getRepository('AppBundle:Club')->findBy([], ['name' => 'ASC']);
        return $clubs;
    }
    
    /**
     * @Rest\Get("/club/{clubId}")
     */
    public function getAction($clubId)
    {
        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository('AppBundle:Club')->find($clubId);
        if($club instanceof  Club)
        {
            return $club;
        }
        return array();
    }
}
