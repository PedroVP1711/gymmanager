<?php
namespace App\Controller;

use App\Entity\Inscripcion;
use App\Form\InscripcionType;
use App\Repository\InscripcionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class InscripcionController extends AbstractController
{
    #[Route('/inscripcion', name: 'inscripcion_index')]
    public function index(InscripcionRepository $repo): Response
    {
        $inscripciones = $repo->findAll();
        return $this->render('inscripcion/index.html.twig', [
            'inscripciones' => $inscripciones,
        ]);
    }

    #[Route('/inscripcion/new', name: 'inscripcion_new')]
    public function new(Request $request, \Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $inscripcion = new Inscripcion();
        $form = $this->createForm(InscripcionType::class, $inscripcion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inscripcion->setFecha(new \DateTime());

            // Obtenemos el EntityManager desde ManagerRegistry
            $em = $doctrine->getManager();
            $em->persist($inscripcion);
            $em->flush();

            $this->addFlash('success', 'Inscripción creada correctamente!');
            return $this->redirectToRoute('inscripcion_index');
        }

        return $this->render('inscripcion/inscripcion.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/inscripcion/{id}', name: 'inscripcion_delete', methods: ['POST'])]
    public function delete(Request $request, Inscripcion $inscripcion, \Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        // Comprobar token CSRF opcional
        if ($this->isCsrfTokenValid('delete'.$inscripcion->getId(), $request->request->get('_token'))) {
            $em->remove($inscripcion);
            $em->flush();
            $this->addFlash('success', 'Inscripción eliminada correctamente!');
        }

        return $this->redirectToRoute('inscripcion_index');
    }

}
