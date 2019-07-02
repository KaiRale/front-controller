<div>
    <?php foreach ($articles as $article): ?>
        <div>
            <a href="/article/show/<?php echo $article['idarticle'];?>">
                <h2><?php  echo $article['title']; ?></h2>
            </a>
        </div>
        <div>
            <p><?php $str=$article['text'];
                $str=substr($str,0,200);
                $str=rtrim($str,"!,.-");
                $str=substr($str,0,strrpos($str,' '));
                echo $str.'... '?></p>
        </div>
    <?php endforeach; ?>
</div>