<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuctionController extends AbstractController
{
    /**
     * @Route("/auctions/category/{category}", name="auctions_category")
     */
    public function categoryView(EntityManagerInterface $em, $category){

        $repository = $em->getRepository(Category::class);
        $auctions = [];
        if( !$repository->findOneBy(['name'=>$category]) ){
            $repository = $em->getRepository(Product::class);
            $distinctData = $repository->findOneBy(['name'=>$category])->getDistinctData();
            $parent = $repository->findOneBy(['name'=>$category])->getCategory();
            $subCategories = "";

        }
        else {
            $parent = $repository->findOneBy(['name' => $category])->getParent();
            if ($repository->findOneBy(['name' => $category])->getChildren()->count() != 0) {
                $subCategories = $repository->findOneBy(['name' => $category])->getChildren();
            } else {
                $subCategories = $repository->findOneBy(['name' => $category])->getProducts();
            }
        }
        return $this->render('auction/index.html.twig', [
            'categories' => $subCategories,
            'parent' => $parent,
        ]);
    }
}
