<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformer\ComentaryTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentary extends Model
{
  use SoftDeletes;

  public $transformer = ComentaryTransformer::class;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'comentario',
      'estrellas',
      'aprobado',
      'id_users',
      'id_restaurants'
  ];
  public function users()//Muchos comentario puede hacer un usuario
  {
    return $this->hasMany(User::class);
  }
  public function restaurants()//Muchos comentario puede hacer a un restaurante
  {
    return $this->hasMany(Restaurant::class);
  }
}
