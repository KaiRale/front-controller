<h2>В Вашей корзине лежат: </h2>
<?php $pictures=$data['info'];?>
<div >
    <?php foreach ($pictures as $picture): ?>
        <div>
            <h2><?php echo $picture['title']; ?></h2>
            <h2><?php echo $picture['yearCreated']; ?></h2>
            <a href="/picture/show/<?php echo $picture['idpicture'];?>">
                <img src="/img/<?php echo $picture['img']; ?>">
            </a>
        </div>
    <?php endforeach; ?>
</div>
