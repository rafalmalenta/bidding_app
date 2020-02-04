<?php

namespace App\Controller;

use App\Entity\Attribute;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     * @param EntityManagerInterface $em
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EntityManagerInterface $em, Request $rq )
    {
//    $repository = $em->getRepository(Category::class);
//    //$attributes = $em->getRepository(Attributes::class);
//    $category = $repository->findOneBy(['name'=>"processors"]);
//    $attribute = new Attribute();
//    $attribute->setName('Threa')
//    $procesordata= [
//
//    ];
//    $x->setCategory($category);
//    $x->setName("mainboards");
//    $x->setDistinctData($procesordata);
//    $em->persist($x);
//    $em->flush();
//    dd($x);

    return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
