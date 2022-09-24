<?php

namespace App\Controller\Admin;

use App\Entity\Solevant;
use App\Form\SolevantType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.produit.index")
     * @return Response
     */
    public function index(ManagerRegistry $repo): Response
    {
        $solevants = $repo->getRepository(Solevant::class)->findAll();
        return $this->render('admin/produit/index.html.twig', [
            'solevants'          => $solevants
        ]);
    }

    /**
     * @Route("/admin/new", name="admin.produit.new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $solevant = new Solevant();
        $form = $this->createForm(SolevantType::class, $solevant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($solevant);
            $this->em->flush();
            $this->addFlash('succes', 'L\'Article a bien été créé avec succès');
            return $this->redirectToRoute("admin.produit.index");
        }

        return $this->render('admin/produit/produitNew.html.twig', [
            'solevant'          => $solevant,
            'form'              => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/edit/{id}", name="admin.produit.edit", methods="GET|POST")
     * @return Response
     */
    public function edit(Solevant $solevant, Request $request): Response
    {
        $form = $this->createForm(SolevantType::class, $solevant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success', 'Le produit a été modifié avec succès');
            return $this->redirectToRoute('admin.produit.index');
        }
        return $this->render('admin/produit/produitEdit.html.twig', [
            'solevant'          => $solevant,
            'form'              => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/delete/{id}", name="admin.produit.delete")
     * @return Response
     */
    public function delete(Solevant $solevant, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $solevant->getId(), $request->get('_token'))) {
            $this->em->remove($solevant);
            $this->em->flush();
            $this->addFlash('success', 'Le produit a bien été supprimé avec succès');
        }
        return $this->redirectToRoute('admin.produit.index');
    }
}
