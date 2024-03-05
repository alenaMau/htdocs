<h2>Регистрация нового пользователя</h2>
<<<<<<< HEAD
<pre><?= $message ?? ''; ?></pre>
<form method="post">
   <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
=======
<h3><?= $message ?? ''; ?></h3>
<form method="post">
>>>>>>> 922d5582f57a50a9c5658a4662fd49f74440b609
   <label>Имя <input type="text" name="name"></label>
   <label>Логин <input type="text" name="login"></label>
   <label>Пароль <input type="password" name="password"></label>
   <button>Зарегистрироваться</button>
</form>
