<?php

namespace App\Controller;

use App\Entity\Socio;
use App\Form\SocioType;
use App\Repository\SocioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/socio')]
class SocioController extends AbstractController
{
    #[Route('/', name: 'socio_index')]
    public function index(SocioRepository $repository)
    {
        return $this->render('socio/index.html.twig', [
            'socios' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'socio_new')]
    public function new(Request $request, EntityManagerInterface $em)
    {
        $socio = new Socio();
        $form = $this->createForm(SocioType::class, $socio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($socio);
            $em->flush();

            $this->addFlash('success', 'Socio creado correctamente');
            return $this->redirectToRoute('socio_index');
        }

        return $this->render('socio/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'socio_edit')]
    public function edit(Socio $socio, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(SocioType::class, $socio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Socio actualizado');
            return $this->redirectToRoute('socio_index');
        }

        return $this->render('socio/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'socio_delete')]
    public function delete(Socio $socio, EntityManagerInterface $em)
    {
        $em->remove($socio);
        $em->flush();

        $this->addFlash('success', 'Socio eliminado');
        return $this->redirectToRoute('socio_index');
    }
}
