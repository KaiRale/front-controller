<!--<h2>Главная страница</h2>-->
<!--$pictures-->

<div class="grid">
    <?php foreach ($pictures as $picture): ?>
    <div>
<!--        заголовок статьи-->
        <h2><?php echo $picture['title']; ?></h2>
        <a href="/picture/show/<?php echo $picture['idpicture'];?>">
            <img src="/img/<?php echo $picture['img']; ?>">
        </a>
    </div>
    <?php endforeach; ?>
</div>