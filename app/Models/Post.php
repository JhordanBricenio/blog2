<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory;

/*     Asignacion masiva con esta variable colocamos los campos que no querermos que se asignen */
    protected $guarded=['id','created_at','updated-at'];

    //Relacion uno a muchos inversa
    //Relacion con User
    public function user(){
        return $this->belongsTo(User::class);
    }


    //relacion con Catgeorias
    public function category(){
        return $this->belongsTo(Category::class);
    }


    //Relacion muchos a muchos 
    //relacion con las etiuqetas o tags
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relacion uno a uno Polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
