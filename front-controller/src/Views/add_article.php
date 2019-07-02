<form method="post" action="/article/add">
    <div class="form-group">
        <label for="title">Название статьи</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="название" required>
    </div>
    <div class="form-group">
        <label for="text">Текст статьи </label>
        <textarea class="form-control" id="text" name="text" placeholder="текст" required></textarea>
    </div>
    <div class="form-group">
        <label for="yearCreated">Дата написания статьи</label>
        <input type="date" id="yearCreated" name="yearCreated" required>
    </div>
    <button type="submit" class="btn btn-secondary">Добавить</button>
</form>