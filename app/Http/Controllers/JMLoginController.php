<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
 
class JMLoginController  extends Controller
{
 
    public function login() {
      return view('login');
    }
    public function loginApi(Request $request) {
      //return "email".$request['email']."pwd".$request['password'];
      $name = $request['name'];
      $pwd = md5($request['pwd']);

      $usr = $this->auth($name,$pwd);
      if($usr) {
        Auth::login($usr, true);
        return Redirect('home');
      } else {
        return Redirect('login')->withError('用户名或密码错误啦 =w=');;
      }
      
     
    }
    public function auth($name,$pwd) {
      return User::where('NAME','=', $name)->where('PASSWORD','=', $pwd)->first();
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}