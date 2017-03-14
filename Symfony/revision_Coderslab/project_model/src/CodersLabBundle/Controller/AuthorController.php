<?php

namespace CodersLabBundle\Controller;

use CodersLabBundle\Entity\Author;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/author")
 */
class AuthorController extends Controller
{
    /**
     * @Route("/new")
     * @Template()
     */
    public function newAction()
    {
       
    }
    
    /**
     * @Route("/create")
     */
    public function createAction(Request $request) 
    {
        $name = $request->request->get('name');
        $description = $request->request->get('description');
        
        $author = new Author();
        $author->setName($name);
        $author->setDescription($description);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($author);
        $em->flush();
        
        return $this->redirectToRoute("coderslab_author_show", ['id' => $author->getId()]);
    }
    
    /**
     * @Route("/show/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('CodersLabBundle:Author');
        $author = $repo->find($id);
        $name = $author->getName();
        $description = $author->getDescription();
        
        return array('name' => $name,
                        'description' =>$description);
    }
    
    /**
     * @Route("/showAll")
     * @Template()
     */
    public function showAllAction()
    {
        $repo = $this->getDoctrine()->getRepository('CodersLabBundle:Author');
        $author = $repo->findAll();
        
        return array('authors'=>$author);
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
