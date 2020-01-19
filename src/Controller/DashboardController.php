<?php

namespace App\Controller;

use App\Entity\Habit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function index(Request $request, EntityManagerInterface $em)
    {

        $habit = new Habit();
        $form = $this->createForm('App\Forms\NewHabitFormType', $habit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($habit->setUser($this->getUser()));
            $em->persist($habit);
            $em->flush();
        }

        return $this->render('habbit.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("new")
     */

    public function newHabit(Request $request)
    {


    }

}