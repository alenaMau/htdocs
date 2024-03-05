<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Post;
use Src\Request;
use Src\View;
use Model\User;
use Src\Auth\Auth;
<<<<<<< HEAD
use Src\Validator\Validator;

=======
>>>>>>> 922d5582f57a50a9c5658a4662fd49f74440b609

class Site
{
    public function index(Request $request): string
    {
       $posts = Post::where('id', $request->id)->get();
       return (new View())->render('site.post', ['posts' => $posts]);
    }
    
   public function hello(): string
   {
       return new View('site.hello', ['message' => 'hello working']);
   }  
   
<<<<<<< HEAD
   public function login(Request $request): string
   {
       if ($request->method === 'POST') {
           $validator = new Validator($request->all(), [
               'login' => ['required'],
               'password' => ['required'],
           ], [
               'required' => 'Поле :field пусто',
               'unique' => 'Поле :field должно быть уникально',
               'russian' => 'Поле :field должно содержать только русский алфавит',
               'number' => 'Поле :field должно содержать только цифры',
               'not_number' => 'Поле :field должно содержать только буквы'
           ]);

           if ($validator->fails()) {
               return new View('site.login',
                   ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
           }
       }

       if ($request->method === 'GET') {
           return new View('site.login');
       }

       if (Auth::attempt($request->all())) {
           app()->route->redirect('/hello');
       }
       //Если аутентификация не удалась, то сообщение об ошибке
       return new View('site.login', ['message' => 'Неправильные логин или пароль']);
   }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function signup(Request $request): string
    {
   if ($request->method === 'POST') {

       $validator = new Validator($request->all(), [
           'name' => ['required'],
           'login' => ['required', 'unique:users,login'],
           'password' => ['required']
       ], [
           'required' => 'Поле :field пусто',
           'unique' => 'Поле :field должно быть уникально'
       ]);

       if($validator->fails()){
           return new View('site.signup',
               ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
       }

       if (User::signup($request->all())) {
           app()->route->redirect('/login');
       }
   }
   return new View('site.signup');
}
=======
   public function signup(Request $request): string
   {
      if ($request->method === 'POST' && User::create($request->all())) {
          app()->route->redirect('/go');
      }
      return new View('site.signup');
   }
>>>>>>> 922d5582f57a50a9c5658a4662fd49f74440b609

   public function login(Request $request): string
    {
   //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
   //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
   //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
}
