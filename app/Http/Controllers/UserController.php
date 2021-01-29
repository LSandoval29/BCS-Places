<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(3);

        if($users){
            return view('admin.users_index',compact('users'));
        }
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
       return $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
       ]);

       $request['password'] = bcrypt($request['password']);//Ciframos la contraseña que recibimos
       $newUser = User::create($request->all());

       if($newUser){
         return redirect()->back()->with('message','Registro agregado con éxito');
       }
       return redirect()->back()->with('error','error servidor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $user = User::where('id',$id)
                     ->first();

            if($user){

                return response()->json([
                    'message' => "Registro consultado correctamente",
                    'code' => 4,
                    'data' => $user
                ], 200);
            }   
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
    public function update(Request $request)
    {
        $user = User::where('id',$request->id)->first();

        if($user->update($request->all())){

            //Redireccion
            return redirect()->back()->with('message','Registro actualizado con éxito');

        }

        return redirect()->back()->with('error','error servidor');

    }

    public function update_password(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $user->password = bcrypt($request->password);
    
        $user->save();

        return redirect()->back()->with('message','Contraseña actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

            if($user){

                if($user->delete()){

                    return response()->json([
                        'message' => "Registro Eliminado correctamente",
                        'code' => 2,
                        'data' => null
                    ], 200);

                }
            }

            return response()->json([
                'message' => "No se ha podido eliminar",
                'code' => -2,
                'data' => null
            ], 200);
    }
}
