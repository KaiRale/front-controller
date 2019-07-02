<?php
namespace Web\FrontController\Controllers;

use Web\FrontController\Core\Controller;

class InfoController extends Controller
{

    public function rulesAction(){
        session_start();
//        echo "Генерация страницы с правилами покупки картин";
        $content='rules.php'; // имя файла с контентом
        $template='template.php'; // имя шаблона, в который будем вставлять контент
        $data=[
            'title'=>'Правила', // данные, которые необходимо добавить на страницу
            'auth'=>isset($_SESSION['name']),
        ];
        // вызываем метод renderPage, который возвращает сгенерированную страницу с правилами покупки картин
        // и отображаем ее на экране (это и есть ответ сервера)
        echo $this->renderPage($content, $template, $data);
}

    public function contactsAction(){
        session_start();
//         echo "Генерация страницы с контактами";
        $content='contacts.php'; // имя файла с контентом
        $template='template.php'; // имя шаблона, в который будем вставлять контент
        $data=[
            'title'=>'Контакты', // данные, которые необходимо добавить на страницу
            'data' => 'data.php',
            'auth'=>isset($_SESSION['name']),
        ];
        // вызываем метод renderPage, который возвращает сгенерированную страницу с правилами покупки картин
        // и отображаем ее на экране (это и есть ответ сервера)
        echo $this->renderPage($content, $template, $data);
}

// метод генерации страниц
    public function renderPage($content,$template,$data=[]){
        // разбивает массив на $data на переменные, ключи становятся имянами переменных,
        // значения - значениями этих переменных
        extract($data);

        // для нашего примера из массива получим переменную $title = 'Правила'

        ob_start();
        include_once __DIR__.'/../Views/'.$template;
        // подключили файл template.php (получили все содержимое этого файла)
        // в файле template.php на место переменной $content подставится ее значение - rules.php, получается, что
        // в файле template.php подключили файл rules.php (содержимое этого файла)
        // в файле template.php на место переменной $title подставится ее значение Правила,
        // и в теге title сформируется заголовок страницы

        // читаем html в переменную $page
        $page=ob_get_contents();
        ob_end_clean();
        // возвращаем значение переменной $page
        return $page;
    }
}