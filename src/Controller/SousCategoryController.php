<?php

namespace App\Controller;

use App\Entity\SousCategory;
use App\Form\SousCategoryType;
use App\Repository\SousCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sous/category')]
class SousCategoryController extends AbstractController
{
    #[Route('/', name: 'app_sous_category_index', methods: ['GET'])]
    public function index(SousCategoryRepository $sousCategoryRepository): Response
    {
        return $this->render('sous_category/index.html.twig', [
            'sous_categories' => $sousCategoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sous_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sousCategory = new SousCategory();
        $form = $this->createForm(SousCategoryType::class, $sousCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sousCategory);
            $entityManager->flush();

            return $this->redirectToRoute('app_sous_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_category/new.html.twig', [
            'sous_category' => $sousCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sous_category_show', methods: ['GET'])]
    public function show(SousCategory $sousCategory): Response
    {
        return $this->render('sous_category/show.html.twig', [
            'sous_category' => $sousCategory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sous_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SousCategory $sousCategory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SousCategoryType::class, $sousCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sous_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_category/edit.html.twig', [
            'sous_category' => $sousCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sous_category_delete', methods: ['POST'])]
    public function delete(Request $request, SousCategory $sousCategory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sousCategory->getId(), $request->request->get('_token'))) {
            $entityManager->remove($sousCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sous_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
