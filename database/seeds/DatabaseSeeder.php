<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Comentary;
use App\Restaurant;
use App\Rol;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');  //Desactiva llaves foraneas

      Comentary::truncate();
      Restaurant::truncate();
      Rol::truncate();
      User::truncate();

      Comentary::flushEventListeners();
      Restaurant::flushEventListeners();
      Rol::flushEventListeners();
      User::flushEventListeners();

      $cantidadComentary = 10;
      $cantidadRestaurant = 10;
      $cantidadRol = 10;
      $cantidadUser = 10;

      factory(Comentary::class, $cantidadComentary)->create();
      factory(Restaurant::class, $cantidadRestaurant)->create();
      factory(Rol::class, $cantidadRol)->create();
      factory(User::class, $cantidadUser)->create();

    }
}
