<?php

namespace App\Http\Controllers;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers;



class RestaurantsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $restaurant = Restaurant::all();
      return $this-> showAll($restaurant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      $restaurant = $request->all();
      $restaurant = Restaurant::create($campos);
      
      return response()->json(['data' =>$restaurant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $restaurant = Restaurant::findOrfail($id);
      return $this->showOne($restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $restaurant = Restaurant::findOrfail($id);
        if ($request->has('nombre')){
            $restaurant->nombre =$request->nombre;
        }
        if ($request->has('direccion')){
            $restaurant->direccion =$request->direccion;
        }
        if ($request->has('telefono')){
            $restaurant->telefono =$request->telefono;
        }
        if ($request->has('horario')){
            $restaurant->horario =$request->horario;
        }

      if (!$restaurant->isDirty()) {
          return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }

      // if ($agend->stringify()) {
      //     return response()->json(['error'=>'No se puede actualizar campos vacios', 'code'=> 423], 423);
      //   }

      $restaurant->save();
      return response()->json(['data'=> $restaurant], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $restaurant = Restaurant::findOrfail($id);
      $restaurant->delete();
      return response()->json(['data' => $restaurant], 200);
    }
}
