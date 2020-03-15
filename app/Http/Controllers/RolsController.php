<?php

namespace App\Http\Controllers;
use App\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers;



class RolsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rol = Rol::all();
      return $this-> showAll($rol);
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
      $campos = $request->all();
      $rol = Rol::create($campos);


      return response()->json(['data' =>$rol]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $rol = Rol::findOrfail($id);
      return $this->showOne($rol);
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

      $rol = Rol::findOrfail($id);
      if ($request->has('rol')){
          $rol->rol =$request->rol;
      }

      if (!$rol->isDirty()) {
          return response()->json(['error'=>'Especificar al menos un valor diferente para actualizar','code'=> 422],422);
        }

      // if ($agend->stringify()) {
      //     return response()->json(['error'=>'No se puede actualizar campos vacios', 'code'=> 423], 423);
      //   }

      $rol->save();
      return response()->json(['data'=> $rol], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $rol = Rol::findOrfail($id);
      $rol->delete();
      return response()->json(['data' => $rol], 200);
    }
}
