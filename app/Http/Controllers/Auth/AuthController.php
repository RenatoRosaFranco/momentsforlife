<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin(){
        return view('layout.login');
    }

    public function postLogin(Request $request){
        
       $email    = $request->email;
       $password = $request->password;  

       if(Auth::attempt(['email' => $email, 'password' => $password])){
          return redirect()
              ->intended('/images')
                 ->with('success', 'Login efetuado com sucesso.');
       }
        else{
            return redirect('/login')
              ->withInput()
              ->with('error', 'Usuario e/ou senha inválidos.');
        }

    }


    public function getRegister(){
        return view('layout.register');
    }

    public function postRegister(Request $request ){
        
        if(User::create([
              'picture'  => str_random(10) . ".png",
              'name'     => $request->name,
              'nickname' => $request->nickname,
              'email'    => $request->email,
              'password' => bcrypt($request->password)
            ])){
            return redirect('/login')
              ->with('success', 'Usuario cadastrado com sucesso.');
            }
            else{
                return redirect('/register')
                ->withInput()
                ->with('error', 'Falha ao efetuar o cadastro.');
            }
    }

    public function getLogout(){
       
        Auth::logout();
        return redirect('/login')
          ->with('success', 'Usuario desconectado com sucesso.');
        
    }


}
