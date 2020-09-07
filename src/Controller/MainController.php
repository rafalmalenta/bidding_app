<?php

namespace App\Controller;

use App\Entity\User;
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
        //dd(phpinfo());
        return $this->render('main/index.html.twig',[
            'data'=>$this
        ]);
    }
}
