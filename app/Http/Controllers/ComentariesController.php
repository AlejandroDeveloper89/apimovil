<?php

namespace App\Http\Controllers;
use App\Comentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers;



class ComentariesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comentary = Comentary::all();
      return $this-> showAll($comentary);
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
      
      $comentary = $request->all();
      $comentary = Comentary::create($campos);
      

      return response()->json(['data' =>$comentary]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $comentary = Comentary::findOrfail($id);
      return $this->showOne($comentary);
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

      $comentary = Comentary::findOrfail($id);
        if ($request->has('comentario')){
           $comentary->comentario =$request->comentario;
        }
        if ($request->has('estrellas')){
           $comentary->estrellas =$request->estrellas;
        }
        if ($request->has('aprobado')){
           $comentary->aprobado =$request->aprobado;
        }
        if ($request->has('id_users')){
           $comentary->id_users =$request->id_users;
        }
        if ($request->has('id_restaurants')){
          $comentary->id_restaurants =$request->id_restaurants;
       }

      if (!$comentary->isDirty()) {
          return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }

      // if ($agend->stringify()) {
      //     return response()->json(['error'=>'No se puede actualizar campos vacios', 'code'=> 423], 423);
      //   }

      $comentary->save();
      return response()->json(['data'=> $comentary], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comentary = Comentary::findOrfail($id);
      $comentary->delete();
      return response()->json(['data' => $comentary], 200);
    }
}
