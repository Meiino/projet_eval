<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployesController extends AbstractController{
    #[Route('/employes' , name:'employes_list')]
    public function index(EmployesRepository $repository):Response{

        $employes = $repository->findAll();
        

        return $this->render('employes/index.html.twig' , [
            'employes' => $employes
        ]);
    }

    #[Route('/employes/new', name:'new_employes')]
    public function new(Request $request , EntityManagerInterface $manager):Response{

        $employes = new Employes();
        $form = $this->createForm(EmployesType::class , $employes);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $employes = $form->getData();

            $manager->persist($employes);
            $manager->flush();

            $this->addFlash(
                'Success',
                'Votre compte a bien été ajouté a l\'annuaire !'
            );

            return $this->redirectToRoute('employes');
        }

        return $this->render('employes/new.html.twig' , [
            'form' => $form->createView()
        ]);
    }

    #[Route('/employes/edition/{id}', name:'edit_employes', methods:['GET' , 'POST'])]
    public function edit( Employes $employes, Request $request, EntityManagerInterface $manager): Response{

        $form = $this->createForm(EmployesType::class , $employes);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $employes = $form->getData();

            $manager->persist($employes);
            $manager->flush();

            $this->addFlash(
                'Success',
                'Votre compte a bien été modifié avec succès !'
            );

            return $this->redirectToRoute('employes');
        } 

        return $this->render('employes/edit.html.twig ' , [
            'form' => $form->createView() 
        ]);
    } 

    #[Route('/employes/suppression/{id}' , name:'delete_employes' , methods:['GET' , 'POST'])]
    public function delete(EntityManagerInterface $manager, Employes $employes):Response{

        $manager->remove($employes);
        $manager->flush();

        return $this->redirectToRoute('employes');

    }
}