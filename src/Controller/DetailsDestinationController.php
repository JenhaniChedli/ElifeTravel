<?php

namespace App\Controller;

use App\Entity\DetailsDestination;
use App\Form\DetailsDestinationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsDestinationController extends AbstractController
{
    /**
     * @Route("/details/destination", name="details_destination")
     */
    public function index(): Response
    {
        return $this->render('details_destination/index.html.twig', [
            'controller_name' => 'DetailsDestinationController',
        ]);
    }
    /**
     * @Route("/details/destination/add",name="Adddetails_destination")
     */
    public function adddetailsDestination(Request $request){
        $dd= new DetailsDestination();
        $form= $this->createForm(DetailsDestinationType:: class,$dd);
        $form= $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($dd);
            $em->flush();

        }
        return $this->render('details_destination/add.html.twig',[
            'DDType'=>$form->createView()
        ]);
    }
}
