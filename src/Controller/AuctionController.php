<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Items;
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
        $parent = [];
        $subCategories = [];
        $currentCategory = $repository->findOneBy(['name' => $category]);
        $parent = $currentCategory->getParent();
        $items = $currentCategory->getItems();
        if ($currentCategory->getChildren()->count() != 0) {
            $subCategories = $repository->findOneBy(['name' => $category])->getChildren();
            foreach ($subCategories as $cat){
                $items = $cat->getItems();
            }
        }

        return $this->render('auction/index.html.twig', [
            'categories' => $subCategories,
            'parent' => $parent,
            'items' => $items,
        ]);
    }
}
