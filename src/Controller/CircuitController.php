<?php

namespace App\Controller;

use App\Entity\Circuit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CircuitController extends AbstractController
{
    /**
     * @Route("/circuit", name="circuit")
     */
    public function index(): Response
    {
        $em=$this->getDoctrine();
        $circuits=$em->getRepository(Circuit::class)->findAll();
        return $this->render('circuit/index.html.twig', [
            'controller_name' => 'CircuitController',
            'circuits'=>$circuits
        ]);
    }


}
