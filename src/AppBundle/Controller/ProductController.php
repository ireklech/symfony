<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProductController extends Controller{

   /**
	* @Route("/list", name="product_list")
	*/
	public function listAction(){
		$products = $this->getProducts();
		return $this->render('product/list.html.twig', [
		'products' => $products
		]);
	}

	//TEST GITLAB

   /**
	* @Route("/{id}/add-to-cart", name="product_add_to_cart")
	* @Template()
	*/
	public function addToCartAction($id){
		if (!$product = $this->getProduct($id)) {
			throw $this->createNotFoundException("Produkt nie znaleziony!");
		}
		// sesja
		$session = $this->get('session');
		// koszyk
		$basket = $session->get('basket', []);
		
		if (!array_key_exists($id, $basket)) {
			$basket[$id] = [
			'name' => $product['name'],
			'price' => $product['price'],
			'quantity' => 1
			];
		} else {
			$basket[$id]['quantity']++;
		}
		// aktualizujemy koszyk
		$session->set('basket', $basket);
		//$session->remove('basket',$basket);
		$this->addFlash('success', 'Produkt został pomyślnie dodany do koszyka.');
		
		return $this->redirectToRoute('product_basket');
	}

   /**
	* @Route("/basket", name="product_basket")
	*/
	public function basketAction(){
		
		$products = $this->get('session')->get('basket', []);
		return $this->render('product/basket.html.twig', [
		'products' => $products
		]);

	}

	/**
	* @Route("/{id}/remove-from-cart", name="product_remove_from_cart")
	* @Template()
	*/
	public function removeFromCartAction($id){
		
		// sesja
		$session = $this->get('session');
		// koszyk
		$basket = $session->get('basket', [$id]);

		// usuwanie produktu
		unset($basket[$id]);
		
		//aktualizacja
		$session->set('basket', $basket);
		
		$this->addFlash('success', 'Usuniety produkt');
		
		return $this->redirectToRoute('product_basket');
	
	}

	/**
	* @Route("/clear-basket")
	* @Template()
	*/
	public function clearBasketAction(){
		return array(
		// ...
		);

		// 		$session = $this->get('session');
		// // koszyk
		// $basket = $session->get('basket', []);
		
		// if (!array_key_exists($id, $basket)) {
		// 	$basket[$id] = [
		// 	'name' => $product['name'],
		// 	'price' => $product['price'],
		// 	'quantity' => 1
		// 	];
		// } 
		// // aktualizujemy koszyk
		// $session->remove('basket',$basket);

		// $this->addFlash('success', 'Produkt został pomyślnie usunięty z koszyka.');
		
		// return $this->redirectToRoute('product_basket');
	}

	/**
	* Zwraca listę produktów
	*
	* @return array
	*/
	private function getProducts(){
		$file = file('product.txt');
		$products = [];
		foreach ($file as $p) {
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

	 /**
	* Pobiera produkt o zadanym $id
	*
	* @param int $id
	* @return array
	*/
	private function getProduct($id){

		$products = $this->getProducts();

		if (array_key_exists($id, $products)) {
			return $products[$id];
		}

		return null;
	}

}
