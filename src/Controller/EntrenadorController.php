<?php

namespace App\Controller;

use App\Entity\Entrenador;
use App\Form\EntrenadorType;
use App\Repository\EntrenadorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/entrenador')]
class EntrenadorController extends AbstractController
{
    #[Route('/', name: 'entrenador_index')]
    public function index(EntrenadorRepository $repository)
    {
        return $this->render('entrenador/index.html.twig', [
            'entrenadores' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'entrenador_new')]
    public function new(Request $request, EntityManagerInterface $em)
    {
        $entrenador = new Entrenador();
        $form = $this->createForm(EntrenadorType::class, $entrenador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($entrenador);
            $em->flush();
            return $this->redirectToRoute('entrenador_index');
        }

        return $this->render('entrenador/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'entrenador_edit')]
    public function edit(Entrenador $entrenador, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(EntrenadorType::class, $entrenador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('entrenador_index');
        }

        return $this->render('entrenador/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'entrenador_delete')]
    public function delete(Entrenador $entrenador, EntityManagerInterface $em)
    {
        $em->remove($entrenador);
        $em->flush();
        return $this->redirectToRoute('entrenador_index');
    }
}
