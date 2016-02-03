<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['id_image', 'id_user', 'comment'];
    public $timestamps = true;
    
    public function hasImage(){
    	return $this->belongsTo('App\Image', 'id_image');
    }

    public function hasUser(){
    	return $this->belongsTo('App\User', 'id_user');
    }

}
