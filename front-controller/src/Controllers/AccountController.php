<?php

namespace Web\FrontController\Controllers;

use Web\FrontController\Core\Controller;
use Web\FrontController\Models\CartRepository;
use Web\FrontController\Models\OrderRepository;
use Web\FrontController\Models\UserRepository;

//контроллеры собирает от пользователя данные и получают ответ от сервера,
//все репозитории формируют sql запросы по данным от контроллера, класс db берет запросы и выполняет их

class AccountController extends Controller
{
    private $userRepository; //чтобы все методы UserRepository были доступны в AccountController создали объект userRepository
    private $addCard;
    private $orderRepository;
    public function __construct()
    {
        $this->orderRepository=new OrderRepository();
        $this->userRepository = new UserRepository();
        $this->addCard=new CartRepository();
    }

    public function registrationAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = [
                'title' => 'Регистрация',
            ];
            echo $this->renderPage('registration.php', 'template.php', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $_POST;
            $params = [
                'username' => $post['name'],
                'email' => $post['email'],
                'phone' => $post['phone'],
                'role' => 'USER',
                'hash' => password_hash($post['password'], PASSWORD_DEFAULT),
            ];
            $userId=$this->userRepository->save($params);
            if ($userId === false) {
                $data = [
                    'title' => 'Регистрация',
                ];
                echo $this->renderPage('registration.php', 'template.php', $data);
            } else {
                //здесь вызываем метод создания корзины
                $this->addCard->save($userId);

                header('Location: /');
            }
        }
    }

    public function authAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $_POST;
            if (!$this->userRepository->isAuth($post)) {
                header('Location: /');
            }
            header('Location: /account');
        }
    }

    public function indexAction()
    {
        session_start();
        if (!isset($_SESSION['name'])) {
            header('Location: /');
        }
        $accountPage = ($_SESSION['role'] == 'ADMIN') ? 'admin_account.php' : 'user_account.php';
        $data = [
            'title' => 'Личный кабинет',
            'name' => $_SESSION['name'],
            'auth' => isset($_SESSION['name']),
            'info' => $this->orderRepository->getById($_SESSION['id']),

        ];
        echo $this->renderPage($accountPage, 'template.php', $data);
    }

    public function logoutAction()
    {
        session_start();
        session_destroy();
        $_SESSION = [];
        header('Location: /');
    }
}