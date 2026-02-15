<?php

namespace App\Controller;

use App\Entity\Clase;
use App\Form\ClaseType;
use App\Repository\ClaseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/clase')]
class ClaseController extends AbstractController
{
    #[Route('/', name: 'clase_index')]
    public function index(ClaseRepository $repository)
    {
        return $this->render('clase/index.html.twig', [
            'clases' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'clase_new')]
    public function new(Request $request, EntityManagerInterface $em)
    {
        $clase = new Clase();
        $form = $this->createForm(ClaseType::class, $clase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($clase);
            $em->flush();
            return $this->redirectToRoute('clase_index');
        }

        return $this->render('clase/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'clase_edit')]
    public function edit(Clase $clase, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(ClaseType::class, $clase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('clase_index');
        }

        return $this->render('clase/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'clase_delete')]
    public function delete(Clase $clase, EntityManagerInterface $em)
    {
        $em->remove($clase);
        $em->flush();
        return $this->redirectToRoute('clase_index');
    }
}
