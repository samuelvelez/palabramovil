<?php

namespace App\Http\Controllers;


use Request;
use App\Libro;
use App\Notificacion;
use App\Persona;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $encrypted = Crypt::encrypt($id_user);
        $message   = Crypt::decrypt($encrypted);
       
        
        //$usuario = DB::table('personas')->where('user_id', '=' , $id_user);
        $generos = DB::table('genero_user')->join('generos', 'generos.id' , '=', 'genero_user.genero_id')->where('user_id', '=' , $id_user)->get();
        $persona = DB::table('personas')->where('user_id', '=' , $id_user)->first();
        
        
        if($persona == null){
            //dd('holas');
        }else{
            //dd($id_user);
        }
        //$libros = DB::table('libros')->get();
        $libros = DB::table('libros')->where([['user_id', '=' , $id_user],['estado','=','disponible']])->get();

        

        return view('perfil',compact('libros','persona','generos'));
    }
    public function registro()
    {
        $id_user = Auth::user()->id;
        //$libros = DB::table('libros')->where('user_id', '=' , $id_user)->get();
        $persona = DB::table('personas')->where('user_id', '=' , $id_user)->first();
        //dd($persona);
        $generos = DB::table('generos')->get();

        if($persona == null){
           
            return view('registro',compact('generos'));
        }else{
            return redirect('perfil');
           
        }
        //return view('registro');
        
    }

    public function biblioteca()
    {
        $id_user = Auth::user()->id;
        $libros = DB::table('libros')->where([['user_id', '=' , $id_user],['estado', '=' ,'disponible']])->get();
        return view('biblioteca',compact('libros'));
    }
    
    
    public function confirmarPeticion()
    //public function confirmarPeticion($id)
    {
        
        $input = Request::all();
        
        $id = $input['thread'];
        //$id_webmaster = 23;
        $id_user = Auth::user()->id;
        //$id = al id del thread
        $thread = Thread::where('id', $id)->first();
        $libro = DB::table('libros')->where('id', '=',  $thread->id_libro)->update(['estado' => 'donado']);
        //dd($libro);
        //Elimina de forma logica el mensaje
        $threads = DB::table('threads')->where('id', '=',  $id)->update(['deleted_at' => new Carbon]);

        if(isset($input['check'])){ 
            $libro = DB::table('libros')->where('id', '=',  $thread->id_libro)->update(['user_id' => $id_user]);
        }
        return redirect('/messages');
    }

    public function prestamo($id,$idlibro)
    {
        $id_user = Auth::user()->id;
        $id = Crypt::decrypt($id);
        $idlibro = Crypt::decrypt($idlibro);
        //dd($id,$id_user,$idlibro);

        $notificacions = DB::table('notificacions')->where([['id_emisor', '=' , $id_user],['id_receptor', '=' , $id],['id_libro', '=' , $idlibro]])->first();
        //dd($notificacion);

        if($notificacions == null){
            //dd('es vacio');

            $notificacion = Notificacion::create([
            'estado'  => 'pendiente',
            'id_emisor' => $id_user,
            'id_receptor' => $id,
            'id_libro' => $idlibro,
            'mensaje_respuesta' => 'En espera',
            'estado_notificacion' => 'en_proceso',
            'estado_conversacion' => 'pendiente',
            ]);
            $notificacion->save();
            return redirect()->back()->with('error_code', 2);
        }else{
            //dd('no es vacio');
            return redirect()->back()->with('error_code', 1);
        }

        
        //
    }
    /*
        SELECT users.NAME , notificacions.id_libro , libros.titulo , personas.celular , personas.direccion FROM notificacions
        INNER JOIN users ON users.id = notificacions.id_receptor
        INNER JOIN libros ON libros.id = notificacions.id_libro
        INNER JOIN personas ON personas.id = users.id
        WHERE notificacions.id_receptor = 1  
        */
    public function pedidos()
    {
        $id_user = Auth::user()->id;
        
        $personas = DB::table('personas')->where('user_id', '=' , $id_user)->get();
        //dd($id_user);
       
        $solicitudes = DB::table('notificacions')
        ->select('notificacions.*','libros.titulo','users.name','libros.imagen')
        ->join('libros', 'libros.id', '=', 'notificacions.id_libro')
        ->join('users', 'users.id', '=', 'notificacions.id_receptor')
        ->where([['notificacions.id_emisor','=',$id_user]/*,['notificacions.estado','=','pendiente']*/])
        //->orWhere('notificacions.id_receptor','=',$id_user)
        ->orderBy('id', 'desc')
        
        ->get();

        $solicitudes2 = DB::table('notificacions')
        ->select('notificacions.*','libros.titulo','users.name','libros.imagen')
        ->join('libros', 'libros.id', '=', 'notificacions.id_libro')
        ->join('users', 'users.id', '=', 'notificacions.id_emisor')
        ->where([['notificacions.id_receptor','=',$id_user]/*,['notificacions.estado','<>','pendiente']*/])
            //->orWhere('notificacions.id_emisor','=',$id_user)
        ->orderBy('id', 'desc')
        ->paginate(5);
        //->get();


        return view('pedidos',compact('solicitudes','solicitudes2'));

    }
    public function registrosolicitudes()
    {
        $id_user = Auth::user()->id;
        
        $personas = DB::table('personas')->where('user_id', '=' , $id_user)->get();
        //dd($personas);

        $solicitudes = DB::table('notificacions')
            ->select('notificacions.*','libros.titulo','users.name','libros.imagen')
            ->join('libros', 'libros.id', '=', 'notificacions.id_libro')
            ->join('users', 'users.id', '=', 'notificacions.id_emisor')
            ->where([['notificacions.id_receptor','=',$id_user],['notificacions.estado','<>','pendiente']])
            //->orWhere('notificacions.id_emisor','=',$id_user)
            ->orderBy('id', 'desc')
            ->get();

        //dd($solicitudes);

        return view('registrosolicitudes',compact('solicitudes'));

    }
    public function editarperfil($id)
    {
         $id = Crypt::decrypt($id);
         $personas = DB::table('personas')->where('user_id', '=' , $id)->first();
         //dd($personas);

        return view('editarperfil',compact('personas'));

    }
    public function notificacion()
    {
        $id_user = Auth::user()->id;
        //dd($id_user);

        /*
        SELECT * FROM notificacions
        INNER JOIN users ON users.id = notificacions.id_emisor
        INNER JOIN libros ON libros.id = notificacions.id_libro
        INNER JOIN personas ON personas.id = notificacions.id_receptor
        WHERE notificacions.id_receptor = 1 && notificacions.estado_notificacion = 'en_proceso' && notificacions.estado = 'pendiente'
        */

        $solicitudes = DB::table('notificacions')
            ->select('users.*','notificacions.*','libros.titulo'/*'personas.imagen'*/)
            ->join('users', 'users.id', '=', 'notificacions.id_emisor')
            ->join('libros', 'libros.id', '=', 'notificacions.id_libro')
            //->join('personas', 'personas.id', '=', 'notificacions.id_receptor')
            ->where([['notificacions.id_receptor','=',$id_user],['notificacions.estado_notificacion','=','en_proceso'],['notificacions.estado','=','pendiente']])
            //->orWhere('notificacions.id_receptor','=',$id_user)
            //->orderBy('notificacions.id', 'desc')
            ->get();

        //dd($solicitudes);
        $confirmacion = 'default';



        foreach ($solicitudes as $solicitude) {
            if($solicitude->id_receptor == $id_user){
                //dd($solicitudes);
                //Persona que debe aceptar solicitudes
                $confirmacion = 'poraceptar';
            }else{
                //dd($id_user);
                $confirmacion = 'enespera';
                if($solicitude->estado == 'rechazada' || $solicitude->estado == 'pendiente'){
                    $solicitude->celular = '**********';
                }
            }
    
        }
        
        return view('notificacion',compact('solicitudes','confirmacion'));
        //return view('solicitud');
    }
    public function perfilpublico($name)
    {
        $id_user = Auth::user()->id;

        $usuario = DB::table('users')->select('id')->where('name', '=' , $name)->first();  
        $persona = DB::table('personas')->where('user_id', '=' , $usuario->id)->first();
        //$libros = DB::table('libros')->get();
        $libros = DB::table('libros')->where([['user_id', '=' , $usuario->id],['estado', '=' , 'disponible']])->get();

        $generos = DB::table('genero_user')->join('generos', 'generos.id' , '=', 'genero_user.genero_id')->where('user_id', '=' , $id_user)->get();

        if($id_user == $persona->user_id){
            
            //return view('perfil',compact('libros','persona'));
            return redirect('perfil');

        }else{
            return view('perfilpublico',compact('libros','persona','generos'));
        }
        
    }
    public function confirmacionlibro($id){
        //dd($id);
       
        $user = Notificacion::find($id);

        $user->estado = 'aceptada';
        $user->mensaje_respuesta = 'Solicitud Aceptada';
        $user->estado_notificacion = 'finalizada';

        $user->save();  

      
        //return redirect('/messages/create');
        return redirect()->back()->with('alert', 'Tu solicitud de libro ha sido enviada');
   
    }

    public function negacionlibro($id,$valor){
        
        $user = Notificacion::find($id);
        $user->estado = 'rechazada';
        
        switch ($valor) {
            case '1':
                $user->mensaje_respuesta = 'Bajo rating del usuario';
                break;
            case '2':
                $user->mensaje_respuesta = 'Me genera desconfianza';
                break;
            case '3':
                $user->mensaje_respuesta = 'Removeré el libro de mi biblioteca';
                break;
        }

        //$user->mensaje_respuesta = 'Falta informacion personal';
        $user->save();  

        return redirect()->back()->with('alert', 'Tu solicitud de libro ha sido enviada');
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
