<?php

namespace App\Controller;

use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(Request $rq):Response
    {
        //dump($User::class);
        //dump($this->getDoctrine()->getManager()->getRepository(User::class)->findAll());
        return $this->render('main/index.html.twig',[
            'data'=>$this
        ]);
    }
}
