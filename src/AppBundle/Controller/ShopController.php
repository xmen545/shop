<?php

namespace AppBundle\Controller;
     
use Symfony\Component\HttpFoundation\Request;     
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 

class ShopController extends Controller 
{   public function categoriesGet(){
        return $categories= [
                [ 'id' => 1,
                    'title' => 'Phones',
                     
                ],
                ['id' => 2,
                    'title' => 'Notebooks',
                     
                ], 
                     
            ];
    }
    public function reviewsGet($product){
         $reviews= [
            [ 'id' => 1,
               'productId' => 1,
                'fio' => 'Andrey',
                 'text' => 'Very nice!',
                'date' => date("Y-m-d"),
                 
            ], 
            [ 'id' => 2,
               'productId' =>3,
                'fio' => 'Viktoria',
                 'text' => 'Bad!!!',
                'date' => date("Y-m-d"),
                 
            ], [ 'id' => 3,
               'productId' =>2,
                'fio' => 'Anna',
                 'text' => 'Fucked shit!!!',
                'date' => date("Y-m-d"),
                 
            ], [ 'id' => 4,
               'productId' =>2,
                'fio' => 'Valera',
                 'text' => 'Norm =)',
                'date' => date("Y-m-d"),
                 
            ], [ 'id' => 5,
               'productId' =>4,
                'fio' => 'Alesha =))',
                 'text' => 'Wow!!!!!',
                'date' => date("Y-m-d"),
                 
            ],[ 'id' => 6,
               'productId' =>4,
                'fio' => 'Nikolay',
                 'text' => 'Shit!!!!!',
                'date' => date("Y-m-d"),
                 
            ],
        ];
        
        //Возьму отзывы только для определенного товара
        $sorted_reviews[] = array();
        foreach ($reviews as $key=>$review)
        {  
            if($review['productId'] == $product)
            {
               array_push($sorted_reviews, $review);
            }
        }
        unset($sorted_reviews[0]);
        
        return $sorted_reviews;
        
    }
    public function productsGet(){
        return     $products= [   
            [ 'id' => 1,  
               'categoryId' => 1,
               'rating' => 4,
                'title' => 'iPhone 7',
                'desc' => 'Super phone!!!',
                 'price' => '335 $',
                  'img' => 'http://www.macdigger.ru/wp-content/uploads/2016/12/drop-price-2.jpg',
                'date' => date("Y-m-d"),
                 
            ],
            ['id' => 2,
                'categoryId' => 2,
                'rating' => 2,
                'title' => 'macbook pro 2017',
                'desc' => 'Super Notebook',
                 'price' => '555 $',
                  'img' => 'https://cdn.cultofmac.com/wp-content/uploads/2016/11/MacBook-Pro-with-Touch-Bar-2-780x520.jpg',
               'date' => date("Y-m-d"),
                 
            ], 
              ['id' => 3,
                'categoryId' => 2,
                'rating' => 3,
                'title' => 'Asus r33',
                'desc' => 'Super Notebook',
                 'price' => '665 $',
                 'img' => 'http://img.mvideo.ru/Pdb/30025788b.jpg',
               'date' => date("Y-m-d"),
                 
            ],  [ 'id' => 4,
               'categoryId' => 1,
               'rating' => 1,
                'title' => 'Samsung s7',
                'desc' => 'Super phone!',
                 'price' => '5 $',
                  'img' => 'https://www.kickmobiles.com/content/images/thumbs/0006074_samsung-galaxy-s7-edge-sm-g935f-32gb-gold-platinum_420.jpeg',
                'date' => date("Y-m-d"),
                 
            ],  
                  
        ];  
    }
    public function categoriesAction()
    {
        return $this->render('/shop/categories.html.twig', ['categories'=> $this->categoriesGet()]);
    }
    public function productsAction($category) 
    {
        //Достану название категории
        $categoryNow = $this->categoriesGet()[$category-1];
         
        //Фильтрую продукты
        $sorted_products[] = array();
        foreach ($this->productsGet() as $key=>$product)
        {  
            if($product['categoryId'] == $category)
            {
               array_push($sorted_products, $product);
            }
        }
   
        unset($sorted_products[0]);
  
        return $this->render('/shop/products.html.twig', ['products'=>$sorted_products, 'category'=>$categoryNow]);

    }
    
    public function productAction($category, $product)
    {
        //Достану название категории
        $categoryNow = $this->categoriesGet()[$category-1];
         
        //Достану определенный продукт
         $productNow = $this->productsGet()[$product-1];
         
         //Достану комменты
         $reviewsNow =  $this->reviewsGet($product);
       
  
       return $this->render('/shop/product.html.twig', ['product'=>$productNow, 'category'=>$categoryNow, 'reviews'=>$reviewsNow]);
    }
}?>