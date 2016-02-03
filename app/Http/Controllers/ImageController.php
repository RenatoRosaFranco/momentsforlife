<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Image;
use App\Comment;
use App\User;
use Storage;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    // metodo index [GET]
    public function index(){

      $user   = User::FindOrFail(Auth::user()->id);
      $images = Image::paginate(9);
      $users  = User::all();
      $myimages = Image::where("id_user", "=", Auth::user()->id)->get();

      
      return view('image.index', 
           [
             'images'   => $images, 
             'user'     => $user, 
             'myimages' => $myimages,
             'users'    => $users,
             
           ])
       ->with('success', 'Sucesso');
    } 

    public function show($id){
       $user     = User::FindOrFail(Auth::user()->id);
       $image    = Image::findOrFail($id);
       $comments = Comment::where('id_image', 'like', $id)->simplePaginate(4);
       $count    = Comment::where('id_image', 'like', $id)->get(); // count
       return view('image.show', 
              [
                'image'    => $image, 
                'user'     => $user, 
                'comments' => $comments,
                'count'    => $count]);
    }
    
    public function edit($id){
      $user   = User::FindOrFail(Auth::user()->id);
      $image = Image::FindOrFail($id);
      return view('image.edit', ['image' => $image, 'user' => $user]);
    }

    public function update(Request $request){

       
       $image = Image::FindOrFail($request->id);
       $image->title = $request->title;
       $image->description = $request->description;

       $imageFile = $request->file('image');
       $pathImage = 'uploads/imageGallery/images/';
       $imageName = $image->image;

       $imageFile->move($pathImage, $imageName);

       if($image->save()){
       	return redirect('/images')
       	  ->with('sucess', 'Imagem atualizada com sucesso');
       }
        

    }

    public function create(){
    	$user   = User::FindOrFail(Auth::user()->id);
        return view('image.create', ['user' => $user]);
    }

    public function store(Request $request){
       
       $validator = Validator::make($request->all(), [
           'image'       => 'required|mimes:jpeg,bmp,png',
           'title'       => 'required|min:5|max:15',
           'description' => 'required|min:5|max:15',
       	]);

       if ($validator->fails()) {
            return redirect('image/create')
                        ->withErrors($validator)
                        ->withInput();
        }

       // Atributos 
       $imageFile = $request->file('image');
       $pathImage = 'uploads/imageGallery/images/';
       $imageName = str_random(10) . $imageFile->getClientOriginalName();
      

       if(Image::create([
          'image'       => $imageName,
          'title'       => $request->title,
          'description' => $request->description,
          'id_user'     => Auth::user()->id,
       	])){
       	  
       	  // Move o Aquivo
          $imageFile->move($pathImage, $imageName);

       	  return redirect('/images')
       	      ->with('success', 'Imagem cadastrada com sucesso');
       }
       else{
       	   return redirect('/images/create') 
       	       ->with('error',  'Erro ao cadastrar imagem, tente novamente.');
       }

    
    }

    
    public function destroy($id){

        $image = Image::FindOrFail($id);
        /* Deleta a imagem de capa do livro
        e o arquivo pdf associado ao registro */
        $deleteImage = Storage::disk('imageGallery')->delete($image->image);
       
        // Ao deletar o Livro
        if($image->delete()){
            return redirect('/images')
              ->with('success', 'Livro Removido com sucesso.');
        }


    }

    
    public function search(Request $request)
    {   
        $user   = User::FindOrFail(Auth::user()->id);   
    	  $query = $request->search;
        $images = Image::where("title", "like", "%$query%")->get();
        return view('image.search', ['images' => $images, 'query' => $query, 'user' => $user]);
    }

    public function myPics(){
         $user   = User::findOrFail(Auth::User()->id);
         $images = Image::where("id_user", "like", Auth::user()->id)->get();
         return view('my.pics',
        [
          'user' =>   $user,
          'images' => $images,
        ]);
    }

}
