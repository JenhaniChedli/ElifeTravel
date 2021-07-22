<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(): Response
    {
        $em=$this->getDoctrine();
        $destinations=$em->getRepository(Destination::class)->findAll();
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'destinations'=> $destinations,
        ]);
    }
    /**
     * @Route("/participe/destination/{idU}/{idD}", name="participedestination")
     */
    public function participedestination(Request $request, $idU ,$idD): Response
    {
        $dd=new Destination();
        $user = new User();
        $em=$this->getDoctrine();
        $dd=$em->getRepository(Destination::class)->find($idD);
        $user=$em->getRepository(User::class)->find($idD);


        return $this->render('test.html.twig', [
            'controller_name' => 'DefaultController',

        ]);
    }
}
