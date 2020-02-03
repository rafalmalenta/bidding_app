<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     * @param EntityManagerInterface $em
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EntityManagerInterface $em )
    {
//        $repository = $em->getRepository(Category::class);
//        $category = $repository->findOneBy(['name'=>"computer components"]);
//        $x = new Product();
//        $procesordata= [
//            "taktowanie",
//            "ilość rdzeni",
//        ];
//        $x->setCategory($category);
//        $x->setName("Processors");
//        $x->setDistinctData($procesordata);
//        $em->persist($x);
//        $em->flush();
        //dd($x);

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
