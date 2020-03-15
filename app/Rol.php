<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformer\RolTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
  use SoftDeletes;

  public $transformer = RolTransformer::class;
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'rol',
  ];
  public function users()//un usuario puede recibir muchos rololes
  {
    return $this->hasMany(User::class);
  }
  
}
