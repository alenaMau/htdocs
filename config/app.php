<?php
return [
   //Класс аутентификации
   'auth' => \Src\Auth\Auth::class,
   //Клас пользователя
<<<<<<< HEAD
   'identity' => \Model\User::class,
   'routeMiddleware' => [
      'auth' => \Middlewares\AuthMiddleware::class,
   ],

   'validators' => [
      'required' => \Validators\RequireValidator::class,
      'unique' => \Validators\UniqueValidator::class
   ],

   'routeAppMiddleware' => [
      'csrf' => \Middlewares\CSRFMiddleware::class,
      'trim' => \Middlewares\TrimMiddleware::class,
      'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
   ],
   

=======
   'identity'=>\Model\User::class,
   'routeMiddleware' => [
      'auth' => \Middlewares\AuthMiddleware::class,
   ]
>>>>>>> 922d5582f57a50a9c5658a4662fd49f74440b609
];
