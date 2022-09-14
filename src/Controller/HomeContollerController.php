<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Solevant;
use Doctrine\Persistence\ManagerRegistry;
use SoapVar;

class HomeContollerController extends AbstractController
{
    /**
     * @Route("/home", name="home.index")
     */
    public function index(ManagerRegistry $repo): Response
    {
        $solevants = $repo->getRepository(Solevant::class)->findAll();
        dump($solevants);
        die();

        return $this->render('home_contoller/index.html.twig', [
            'controller_name' => 'HomeContollerController',
            'solevant'          => $solevants
        ]);
    }
}
