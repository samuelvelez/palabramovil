<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Persona;
use App\User;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('/perfil');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('Persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_user = Auth::user()->id;
        //dd($id_user);
        
        //$this->validate($request,[ 'nombre'=>'required', 'edad'=>'integer|required',  'descripcion'=>'required', 'celular'=>'required', 'direccion'=>'required', 'imagen' => 'required|image']);
        $this->validate($request,[ 'nombre'=>'required', 'edad'=>'integer|required']);
        //$persona = Persona::create($request->all());
        $myCheckboxes = $request->input('my_checkbox');
        //dd($myCheckboxes);
        $date = date('Y-m-d'); 
        $file = $request->file('imagen');
        if($file == null){
            $path = 'images/users/default.jpg';
        }else{
            $extension = $file->getClientOriginalExtension();
            $fileName = request('nombre') .'_'. $date . '.' . $extension;
            $path = public_path('images/users/'.$fileName);
            //$path = resource_path('images/users/'.$fileName); 
            Image::make($file)->fit(300, 300)->save($path);  
        }
        
        $descip_default = 'Hola mucho gusto, mi nombre es '.request('nombre');
        //dd($descip_default);

        $persona = Persona::create([
            'nombre'  => request('nombre'),
            'edad'  => request('edad'),
            'descripcion'  => $descip_default,
            'celular'  => '',
            'direccion'  => '',
            'imagen'    => $path,
            'user_id'    => Auth::user()->id,
        ]);
        $persona->save();

        foreach($myCheckboxes as $opciones){
            $generosLibros = DB::table('genero_user')->insert(['user_id' => $id_user,'genero_id' => $opciones ]);
        }
        
        $user = User::find(Auth::user()->id);
        $user->estado_usuario = 'activo';
        $user->save();

        //return 'hola';
        return redirect('perfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     //public function update(Request $request, $id)
    public function update(Request $request, $id)
    {
        
        //$id = Crypt::decrypt($id);
        $image = $request->file('imagen');
        //$nombre = request('nombre');
        //$edad = request('edad');
        //$descripcion = request('descripcion');
        //dd($nombre);

        if($image == null){
            //$persona =Persona::where('user_id', $id)->first();
            $destinationPath = '';
            
        }else{
            $name = str_slug($request->input('nombre')).'_'.time();
            $folder = '/images/users/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $path = public_path($filePath);
            Image::make($image)->fit(300, 300)->save($path);
            $destinationPath = substr($path, 33);
        }

        $persona =Persona::where('user_id', $id)
        ->update(['nombre' => request('nombre'),'edad' => request('edad'),'descripcion' => request('descripcion'),'imagen' => $destinationPath]);

        
        return redirect('perfil'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
