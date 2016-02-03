<?php

namespace App;

use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   
    protected $table = 'images';
    protected $fillable = ['image', 'title', 'description', 'id_user'];
    public    $timestamps = true;
    
    // hasUser Relationship
    public function hasUser(){ 
    	return $this->belongsTo('App\User', 'id_user');   
    }
       
    // hasComment Relationship
    public function hasComment(){
    	return $this->hasMany('App\Comment', 'id_image');
    }
    
  

}
