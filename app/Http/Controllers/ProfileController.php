<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function index(){
    	$user = User::FindOrFail(Auth::user()->id);
    	return view('profile.index', ['user' => $user]);
    }

    public function edit(){
       $user = User::findOrFail(Auth::user()->id);
       return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request){
       
       $user = User::FindOrFail($request->id);

       $user->name     = $request->name;
       $user->nickname = $request->nickname;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);


       $imageFile = $request->file('image');
       $pathImage = 'uploads/imageProfile/images/';
       $imageName = $user->picture;

       $imageFile->move($pathImage, $imageName);

       if($user->save()){
       	return redirect('/images')
       	  ->with('success', 'Perfil atualizado com sucesso');
       }
    }

    public function show($nickname){
      
       $user   = User::FindOrFail(Auth::user()->id);
       $user2  = User::where('nickname', '=', $nickname)->first();

       return view('profile.show', 
            [
               'user' =>  $user, 
               'user2' => $user2
          ]);
    }

}
