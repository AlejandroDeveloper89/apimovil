<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformer\RestaurantTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
  use SoftDeletes;

  public $transformer = RestaurantTransformer::class;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'nombre',
      'direccion',
      'telefono',
      'horario',
  ];
  public function comentarys()//Muchos comentarios puede recibir un restaurante
  {
    return $this->hasMany(Comentary::class);
  }
}
