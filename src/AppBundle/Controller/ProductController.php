<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProductController extends Controller
{
    /**
     * @Route("/list")
     * @Template()
     */
    public function listAction()
    {
        return array(
                // ...
            );    
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

}
