<?php

namespace Web\FrontController\Controllers;


use Web\FrontController\Core\Controller;
use Web\FrontController\Models\ArticleRepository;
use Web\FrontController\Models\CartRepository;
use Web\FrontController\Models\OrderRepository;

class CartController extends Controller
{
    private $articleRepository;
    private $cartRepository;
    private $orderRepository;
    public function __construct()
    {
        $this->cartRepository=new CartRepository();
        $this->articleRepository=new ArticleRepository();
        $this->orderRepository=new OrderRepository();
    }

    public function addPictureAction($id){
        session_start();
        $idPicture=$id;
        $idUser=$_SESSION['id'];
        $this->cartRepository->getById($idUser);
        $idCart=$this->cartRepository->getById($idUser)['idbasket'];
        $params=[
            'basket_idbasket'=>$idCart,
            'picture_idpicture'=>$idPicture,
            'status'=>'NOT START',
        ];
        $this->orderRepository->save($params);
        header('Location: /account');
        /*$this->orderRepository->getById($idUser);*/

    }



}