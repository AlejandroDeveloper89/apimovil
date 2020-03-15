<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers;



class UsersController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::all();
      return $this-> showAll($user);
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
      
      $user = $request->all();
      $user = User::create($campos);
      

      return response()->json(['data' =>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrfail($id);
      return $this->showOne($user);
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

      $user = User::findOrfail($id);
        if ($request->has('nombre')){
          $user->nombre =$request->nombre;
        }
        if ($request->has('apellido')){
          $user->apellido =$request->apellido;
        }
        if ($request->has('email')){
          $user->email =$request->email;
        }
        if ($request->has('password')){
          $user->password =$request->password;
        }
        if ($request->has('id_rols')){
          $user->id_rols =$request->id_rols;
       }

      if (!$user->isDirty()) {
          return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }

      // if ($agend->stringify()) {
      //     return response()->json(['error'=>'No se puede actualizar campos vacios', 'code'=> 423], 423);
      //   }

      $user->save();
      return response()->json(['data'=> $user], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrfail($id);
      $user->delete();
      return response()->json(['data' => $user], 200);
    }
}