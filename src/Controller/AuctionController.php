<?php

namespace App\Controller;

use App\Entity\Category;
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
        //dd($category);
        $category = str_replace(" ","_",$category);

        $parent = $repository->findOneBy(['name'=>$category])->getParent();
        if($repository->findOneBy(['name'=>$category])->getChildren()->count() != 0)
            $subCategories = $repository->findOneBy(['name'=>$category])->getChildren();
        else {
            $subCategories = $repository->findOneBy(['name' => $category])->getProducts();
            //dd($subCategories = $repository->findOneBy(['name' => $category])->getProducts()->count());
        }

        return $this->render('auction/index.html.twig', [
            'categories' => $subCategories,
            'parent' => $parent,
        ]);
    }
}
