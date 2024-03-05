<h2>Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
   ?>
   <form method="post">
<<<<<<< HEAD
       <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
=======
>>>>>>> 922d5582f57a50a9c5658a4662fd49f74440b609
       <label>Логин <input type="text" name="login"></label>
       <label>Пароль <input type="password" name="password"></label>
       <button>Войти</button>
   </form>
<?php endif;


