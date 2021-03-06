<?php

namespace CodersLabBundle\Controller;

use CodersLabBundle\Entity\Author;
use CodersLabBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/book")
 */
class BookController extends Controller
{
    /**
     * @Route("/new")
     * @Template()
     */
    public function newAction()
    {
       $repo = $this->getDoctrine()->getRepository('CodersLabBundle:Author');
       $authors = $repo->findAll();
        
       return array('authors'=>$authors);
    }
    
    /**
     * @Route("/create")
     */
    public function createAction(Request $request) 
    {
        $title = $request->request->get('title');
        $description = $request->request->get('description');
        $rating = $request->request->get('rating');
        $authorId=$request->request->get('author_id');
        $author = $this->getDoctrine()->getRepository('CodersLabBundle:Author')->find($authorId);
        
        $book = new Book();
        $book->setTitle($title);
        $book->setDescription($description);
        $book->setRating($rating);
        $book->setAuthor($author);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($book);
        $em->flush();
        
        return $this->redirectToRoute("coderslab_book_show", ['id' => $book->getId()]);
    }
    
    /**
     * @Route("/show/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('CodersLabBundle:Book');
        $book = $repo->find($id);
        $title = $book->getTitle();
        $description = $book->getDescription();
        $rating = $book->getRating();
        $author = $book->getAuthor();
        
        return array('title' => $title,
                        'description' =>$description,
                        'rating'=>$rating,
                        'author'=>$author);
    }
    
    /**
     * @Route("/showAll")
     * @Template()
     */
    public function showAllAction()
    {
        $repo = $this->getDoctrine()->getRepository('CodersLabBundle:Book');
        $books = $repo->findAll();
        
        return array('books'=>$books);
    }
    
    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('CodersLabBundle:Book');
        $book = $repo->find($id);
        
        if(!$book) {
            return new Response('Book does not exist!');
        }
        
        $em->remove($book);
        $em->flush();
        return new Response('Book with id = '. $id .' removed!');
        
    }
}
