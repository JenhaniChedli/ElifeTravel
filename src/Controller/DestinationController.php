<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Entity\Participtions;
use App\Entity\User;
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
        $destinations=$em->getRepository(Destination::class)->findOneBydatedepart();
        return $this->render('destination/index.html.twig', [
            'controller_name' => 'DestinationController',
            'destinations'=> $destinations,
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

            return $this->getDestination();
        }
        return $this->render('destination/add.html.twig',[
            'DestinationFormType'=>$form->createView()
        ]);
    }
    /**
     * @Route("/destination/update/{id}", name="update_destination")
     */
    public function update_destination(Request $request, $id): Response
    {
        $destination = new Destination();
        $destination = $this->getDoctrine()->getRepository(Destination::class)->find($id);

        $form= $this->createForm(DestinationType:: class,$destination);
        $form= $form->handleRequest( $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form['photoFile']->getData();
            $urlphotos = $this->getParameter('kernel.project_dir').'/public/uploads';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $urlphotos,
                $newFilename
            );
            $destination->setPhoto($newFilename);
            $em=$this->getDoctrine()->getManager();
            $em->persist($destination);
            $em->flush();

            return $this->getDestination();
        }

        return $this->render('destination/update.html.twig', array(
            'DestinationFormType' => $form->createView()
        ));
    }
    /**
     * @Route("/destination/delete/{id}", name="deletedestination")
     */
    public function deletedestination(Request $request, $id): Response
    {
        $destination = $this->getDoctrine()->getRepository(Destination::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($destination);
        $entityManager->flush();

        $response = new Response();
        $response->send();
        return $this->getDestination();
    }
    /**
     * @Route("/destination/details/{id}", name="detailsdestination")
     */
    public function getdestinationbyid(Request $request, $id): Response
    {
        $destination = new Destination();
        $destination = $this->getDoctrine()->getRepository(Destination::class)->find($id);

        return $this->render('destination/details.html.twig', array(
            'destination'=>$destination,'testparticipe'=>0
        ));
    }
    /**
     * @Route("/destination/participe/{idU}/{idD}", name="participe")
     */
    public function participe(Request $request, $idU,$idD): Response
    {
        $destination = new Destination();
        $destination = $this->getDoctrine()->getRepository(Destination::class)->find($idD);
        $particiption= new Participtions();
        $tt = $this->getDoctrine()->getRepository(Participtions::class)->validationdeparticiption($idU,$idD);
        if($tt[0][1]==0){
            $particiption->setIdUser($idU);
            $particiption->setIdDestination($idD);
            $particiption->setPayment(false);
            $em=$this->getDoctrine()->getManager();
            $em->persist($particiption);
            $em->flush();
        }

        return $this->render('destination/details.html.twig', array(
            'testparticipe'=>$tt[0][1],'destination'=>$destination
        ));
    }
    /**
     * @Route("/particiption/get/{idD}", name="getparticiptions")
     */
    public function getparticiptions(Request $request,$idD): Response
    {
        $destination = new Destination();
        $destination = $this->getDoctrine()->getRepository(Destination::class)->find($idD);
        $participtions= $this->getDoctrine()->getRepository(Participtions::class)->getparticiptionsbydestination($idD);
        $users= $this->getDoctrine()->getRepository(User::class)->findparticiption($participtions);
        $data = array();
        foreach ($users as $key => $val ) {
            foreach ($val as $key1 => $val1 ) {
                $data[$key1]=$val1;
            }
        }
        $dt = array();
        foreach ($data as $key => $val ) {
            $dt[$key]=$val;
            foreach ($participtions as $key2 => $val2) {
                if ($val2['idUser']==$val) {
                    $dt['payment']=$val2['payment'];
                }
            }
        }
        $user=array($dt);
        return $this->render('destination/participtions.html.twig', array(
            'users'=>$user ,'destination'=>$destination
        ));
    }
    /**
     * @Route("/particiption/paid/{idD}/{idU}", name="paidparticiption")
     */
    public function paidparticiption(Request $request,$idD,$idU)
    {
        $particiption = new Participtions();
        $particiption= $this->getDoctrine()->getRepository(Participtions::class)->getparticiptionsbyids($idD,$idU);
        if($particiption[0]->getPayment()){
            $particiption[0]->setPayment(false);
        }else{
            $particiption[0]->setPayment(true);
        }

        $em=$this->getDoctrine()->getManager();
        $em->persist($particiption[0]);
        $em->flush();
        return $this->redirect("/destination/get");
    }
}
