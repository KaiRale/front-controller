<?php
namespace Web\FrontController\Controllers;
use Web\FrontController\Core\Controller;
use Web\FrontController\Models\ArticleRepository;
class ArticleController extends Controller
{
    private $articleRepository;
    public function __construct()
    {
        $this->articleRepository=new ArticleRepository();
    }
    public function addAction(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            header('Location: /');
        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                session_start();
                // если post запрос, обрабатываем данные
                $post = $_POST;
                $files = $_FILES;
                $params = [
                    'title' => $post['title'],
                    'text' => $post['text'],
                    'yearCreated' =>  $post['yearCreated'],
                ];
                if ($this->articleRepository->save($params) === false) {
                    $addResult = 'Статья не была добавлена';
                } else {
                    $addResult = 'Статья добавлена';
                }
                session_start();
                $data = [
                    'title'=>'Добавление статьи',
                    'addResult' => $addResult,
                    'auth' => isset($_SESSION['name'])
                ];
                echo parent::renderPage('admin_account.php',
                    'template.php', $data);
            }
    }
    public function showAllAction(){
//        echo "Генерация страницы статей";
        $articles=$this->articleRepository->getAll();
        session_start();
        $content='articles.php';
        $template='template.php';
        $data=[
            'title'=>'Статьи',
            'articles'=>$articles,
            'auth' => isset($_SESSION['name'])
        ];
        //вывели страничку $page
        echo $this->renderPage($content,$template,$data);
    }
    public function showAction($id) {
        $article = $this->articleRepository->getById($id);
        session_start();
        $data = [
            'title'=>$article['title'],
            'article' => $article
        ];
        echo parent::renderPage('article.php',
            'template.php', $data);
    }
}