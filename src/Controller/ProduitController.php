<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(Request $request,ProductRepository $repositoryProduit,CategoryRepository $repositoryCategory): Response
    {

        $categoryId = $request->query->get('category');
        $selectedCategory = null;

        if ($categoryId) {
            $selectedCategory = $repositoryCategory->find($categoryId);
            $produits = $repositoryProduit->findBy(['categorie' => $selectedCategory]);
        } else {
            $produits = $repositoryProduit->findAll();
        }

        $categories = $repositoryCategory->findAll();




        return $this->render('/pages/produit/index.html.twig', [
            'produits'=>$produits,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}
