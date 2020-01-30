<?php

namespace App\Controller;


use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuctionController extends AbstractController
{
    /**
     * @Route("/auctions", name="auctions")
     */
    public function index(EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Category::class);
        $categories = $repository->findBy(['parent'=>NULL]);
        //dd($categories);
        return $this->render('auction/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    /**
     * @Route("/auctions/category/{category}", name="auctions_category")
     */
    public function categoryView(EntityManagerInterface $em, $category){

        $repository = $em->getRepository(Category::class);
        $subCategories = $repository->findOneBy(['name'=>$category])->getChildren();
        return $this->render('auction/index.html.twig', [
            'categories' => $subCategories,
        ]);
    }
}
