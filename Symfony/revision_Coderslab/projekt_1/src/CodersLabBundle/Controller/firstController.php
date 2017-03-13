<?php

namespace CodersLabBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class firstController extends Controller
{
    /**
     * @Route("/hello/{username}")
     */
    public function helloAction($username) 
    {
        return new Response('hello '. $username);
    }
    
    /**
     * 
     * @Route("/welcome/{name}/{surname}")
     */
    public function welcomeAction($name, $surname)
    {
        return new Response('hello '. $name. ' ' . $surname);
    }
    
    /**
     * @Route("show/{id}", requirements={"id"="\d+"})
     */
    public function showPostsAction($id)
    {
        return new Response('Show posts: '. $id);
    }
    
    /**
     * @Route("/form")
     * @Method({"GET"})
     */
    public function getFormAction(Request $request)
    {
        return new Response('<html><body><form method="post"><label>Text: <input name="text_value"></input><input type="submit"></label></form></body></html>');
    }
    
    /**
     * @Route("/form")
     * @Method({"POST"})
     */
    public function postFormAction(Request $request)
    {
        $text = $request->request->get('text_value');
        return new Response('Wprowadzono: '.$text);
    }
    
    /**
     * @Route("/setSession/{value}")
     */
    public function setSessionAction(Request $request, $value) 
    {
        $session = $request->getSession();
        $session->set("usertext", $value);
        
        return new Response('Sesja ustawiona.');
    }
    
    /**
     * @Route("/getSession")
     */
    public function getSessionAction(Request $request) 
    {
        $session = $request->getSession();
        $value = $session->get("usertext");
        
        return new Response('Sesja: '.$value);
    }
    
    /**
     * @Route("/setCookie/{value}")
     */
    public function setCookieAction(Request $request, $value) 
    {
        $cookie = new Cookie('myCookie', $value, time() + 3600);
        $resp = new Response('Ciasteczko ustawione.');
        $resp->headers->setCookie($cookie);
        return $resp;
    }
    
    /**
     * @Route("/getCookie")
     */
    public function getCookieAction(Request $request) 
    {
        $cookie = $request->cookies->all();
        if(!isset($cookie['myCookie'])) {
            return new Response('Brak ciasteczka');
        }
        return new Response('Ciasteczko: '.$cookie['myCookie']);
    }
    
    /**
     * @Route("/deleteCookie")
     */
    public function deleteCookieAction(Request $request) 
    {
        $cookie = new Cookie('myCookie', '', time() - 3600);
        $resp = new Response('Ciasteczko usunięte.');
        $resp->headers->setCookie($cookie);
        return $resp;
    }
    
    /**
     * @Route("/redirectMe")
     */
    public function redirectMeAction() 
    {
        $response = $this->redirect('/deleteCookie');
        return $response;
    }
}
