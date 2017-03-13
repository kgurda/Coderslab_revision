<?php

namespace CodersLabBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ViewsController extends Controller
{
    /**
     * @Route("/repeatSentence/{n}/{sentence}")
     * @Template("CodersLabBundle:Views:repeatSentence.html.twig")
     */
    public function repeatSentenceAction($sentence, $n)
    {
        return array('sentence' => $sentence, 'n' => $n);
    }
    
    /**
     * @Route("/createRandoms/{start}/{end}/{n}")
     * @Template("CodersLabBundle:Views:createRandoms.html.twig")
     */
    public function createRandomAction($start, $end, $n)
    {
        $array = [];
        for($i=1; $i<=$n; $i++) {
           $array[] = rand($start, $end);
        }
        return array('array'=>$array);
    }
}
