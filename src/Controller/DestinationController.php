<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Form\DestinationType;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DestinationController extends AbstractController
{
    /**
     * @Route("/destination", name="destination")
     */
    public function index(): Response
    {
        $em=$this->getDoctrine();
        $destinations=$em->getRepository(Destination::class)->findAll();
        return $this->render('destination/index.html.twig', [
            'controller_name' => 'DestinationController',
            'destinations'=> $destinations,
        ]);
    }
    /**
     * @Route("/destination/add",name="AddDestinationPage")
     */
    public function addDestination(Request $request){
        $c= new Destination();
        $form= $this->createForm(DestinationType:: class,$c);
        $form= $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form['photoFile']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );
            $c->setPhoto($newFilename);
            $em=$this->getDoctrine()->getManager();
            $em->persist($c);
            $em->flush();
        }
        return $this->render('destination/add.html.twig',[
            'DestinationFormType'=>$form->createView()
        ]);
    }
    /**
     * @Route("/destination/get", name="getdestination")
     */
    public function getDestination()
    {
        $em=$this->getDoctrine();
        $circuits=$em->getRepository(Destination::class)->findAll();
        return $this->render('destination/Crud.html.twig', [
            'controller_name' => 'DestinationController',
            'destinations'=> $circuits,
        ]);
    }
}
