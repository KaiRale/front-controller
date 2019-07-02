<div class="row margin-50">
    <div class="col-7">
        <h1>
            <?php echo $picture['title']?>
        </h1>
        <p><?php echo $picture['yearCreated']?> год</p>
    </div>

    <div class="col-5">
        <p class="price">Стоимость: <span><?php echo $picture['price']?></span> руб.</p>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <img src="/img/<?php echo $picture['img']?>">
    </div>
    <div class="col-5">
        <?php if($auth):?>
            <p  class="text-center"><a class="btn btn-block btn-warning" href="/cart/addPicture/<?php echo $picture['idpicture']?>">Заказать</a></p>
        <?php else: ?>
            <p>Авторизуйтесь, чтобы заказать картину</p>
        <?php endif; ?>
        <p><?php echo $picture['description']?></p>
    </div>
</div>