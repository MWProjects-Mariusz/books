<?php

namespace App\Controller;

use App\Entity\Books;
use App\Form\BooksType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/books")
 */
class BooksController extends AbstractController
{
    /**
     * @Route("/", name="books_index", methods={"GET"})
     */
    public function index(): Response
    {
        $books = $this->getDoctrine()
            ->getRepository(Books::class)
            ->findAll();

        return $this->render('books/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/new", name="books_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $book = new Books();
        $form = $this->createForm(BooksType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('books_index');
        }

        return $this->render('books/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{bookId}", name="books_show", methods={"GET"})
     */
    public function show(Books $book): Response
    {
        return $this->render('books/show.html.twig', [
            'book' => $book,
        ]);
    }

    /**
     * @Route("/{bookId}/edit", name="books_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Books $book): Response
    {
        $form = $this->createForm(BooksType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('books_index');
        }

        return $this->render('books/edit.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{bookId}", name="books_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Books $book): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getBookId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($book);
            $entityManager->flush();
        }

        return $this->redirectToRoute('books_index');
    }
}
