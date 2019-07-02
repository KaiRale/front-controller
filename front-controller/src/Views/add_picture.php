<!--форма добавления картины-->
<?php if (isset($addResult)):?>
<h4><?php echo $addResult; ?></h4>
<?php endif; ?>


<form method="post" action="/picture/add" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Название статьи</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="название" required>
    </div>
    <div class="form-group">
        <label for="description">Описание статьи</label>
        <textarea class="form-control" id="description" name="description" placeholder="описание" required></textarea>
    </div>
    <div class="form-group">
        <label for="yearCreated">Год написания картинны</label>
        <input type="date" id="yearCreated" name="yearCreated" required>
    </div>
    <div class="form-group">
        <label for="img">Загрузите фотографию картины</label>
        <input type="file" id="img" name="img" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-secondary">Добавить</button>
</form>

