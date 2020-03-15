<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformer\UserTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
  use SoftDeletes;

  public $transformer = UserTransformer::class;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'nombre',
      'apellido',
      'email',
      'password',
      'id_rols'

  ];
  public function rol()
  {
    return $this->belongsTo(Rol::class);//Relacion de a uno a uno
  }
 
  public function comentarys()//Un usuario puede hacer muchos coemtnarios
  {
    return $this->hasMany(Comentary::class);
  }
}
