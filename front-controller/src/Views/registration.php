<div class="offset-4 col-4">
    <h3>Заполните форму регистрации</h3>
    <form method="post" action="/account/registration">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="введите имя" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="введите E-mail" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="введите пароль" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-secondary">Регистрация</button>
    </form>
</div>



<script>
    $('#phone').mask('+7(000)000-00-00', {placeholder: "(111)111-11-11" });
</script>