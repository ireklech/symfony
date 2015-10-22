<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProductController extends Controller
{
    /**
     * @Route("/list",name="product_list")
     */
    public function listAction()
    {
        $products = $this->getProducts();
        return $this->render('product/list.html.twig',[
            'products' => $products

            ]);
    }

    /**
     * @Route("/{id}/add-to-cart")
     * @Template()
     */
    public function addToCartAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/basket")
     * @Template()
     */
    public function basketAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/{id}/remove-from-cart")
     * @Template()
     */
    public function removeFromCartAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/clear-basket")
     * @Template()
     */
    public function clearBasketAction()
    {
        return array(
                // ...
            );    }

     private function getProducts(){

        $file = file('product.txt');
        $products = array();
        foreach ($file as $p){
            $e = explode(':', trim($p));
            $products[$e[0]] = array(
                'id' => $e[0],
                'name' => $e[1],
                'price' => $e[2],
                'description' => $e[3],

            );
        }
        return $products;

     }   

}
