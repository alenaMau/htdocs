<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Post;
use Src\Request;
use Src\View;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;


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

}
