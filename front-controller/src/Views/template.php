<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">ХУДОЖНИК</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/info/rules">Правила заказа картин</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article/showAll">Статьи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/info/contacts">Контакты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/info/contacts">Контакты</a>
            </li>
        </ul>
            <?php if ($auth):?>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="/account">Личный кабинет</a>
                </li>
            <li class="nav-item">
                    <a class="nav-link" href="/account/logout">Выйти</a>
              </li>

           </ul>
            <?php else: ?>
            <form method="post" action="/account/auth" class="form-inline my-2 my-lg-0">
                <input name="email" class="form-control mr-sm-2" type="email" placeholder="e-mail">
                <input name="password" class="form-control mr-sm-2" type="password" placeholder="password">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Войти</button>
            </form>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="/account/registration">Регистрация</a>
                </li>
            </ul>
        <?php  endif;?>



    </div>
</nav>

<div class="margin-50 container-fluid">
    <?php include_once $content;?>
</div>

</body>
</html>