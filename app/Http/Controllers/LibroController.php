<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function eliminarlogico($id){

        $id = Crypt::decrypt($id);
        //dd($id);
        DB::table('libros')->where('id', $id)->update(['estado' => 'eliminado_logico']);

        return redirect('biblioteca'); 

    }
    public function resultados(Request $request)
    {
        //dd('scope: ' . $request->get('name'));
        $letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $categorias = DB::table('generos')->get();



        $nombre = $request->get('name');

        $tipo = $request->get('tipo');
        
        //$libros = Libro::name($request->get('name'))->orderBy('id', 'DESC')->paginate();
        switch($tipo) {
            case 1:
                $libros = DB::table('libros')->where('titulo', 'LIKE',  $nombre .'%')->get();
                
                break;
            case 2:
                
                $libros = DB::table('libros')
                ->join('genero_libro', 'libros.id' , '=', 'genero_libro.libro_id')
                ->join('generos', 'generos.id' , '=', 'genero_libro.genero_id')
                ->select('libros.*','generos.*')
                ->where([['generos.name','=', $nombre],['estado','=','disponible']])
                ->get();

                //SELECT * FROM Libros INNER JOIN genero_libro ON Libros.id = genero_libro.libro_id INNER JOIN generos ON generos.id = genero_libro.genero_id WHERE generos.NAME = 'Humor';
                //$libros = Libro::find(7)->generos()->where('name','=','Terror')->get();
                //$libros = DB::table('libros')->get();

                //dd($libros);
                break;
            case 3:
                $libros = DB::table('libros')->where('autor', 'LIKE',  $nombre .'%')->get();
                break;
            default:
               if(trim($nombre) != ''){
                    $libros = DB::table('libros')->where('titulo', 'LIKE',  '%' . $nombre . '%')->get();
                }else{
                    $libros = [];
                }
            }
        //dd($libros);
        return view('resultados', compact('libros','categorias','letras'));
        //return view('resultados');
    }
    /* MUESTRA LIST DE  LIBROS*/
    public function libros()
    {

      
        /*$libros = DB::table('libros')->get();
        $id_user = DB::table('libros')->select('user_id')->get();
        dd($libros);
        dd($id_user);*/
        $letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        $categorias = DB::table('generos')->get();

        $libros = DB::table('users')
        ->join('libros', 'users.id', '=', 'libros.user_id')
        //->join('personas', 'users.id', '=', 'personas.id')
        ->select('users.name','users.id','libros.id','libros.user_id','libros.titulo','libros.descripcion','libros.autor','libros.imagen'/*,'personas.imagen as personaimagen'*/)
        ->where('estado','=','disponible')
        ->orderBy('libros.id', 'desc')
        ->paginate(10);



        //dd($libros);
        return view('libros',compact('libros','categorias','letras'));
        //return view('resultados');
    }
    public function panelcontrol()
    {

      
        /*$libros = DB::table('libros')->get();
        $id_user = DB::table('libros')->select('user_id')->get();
        dd($libros);
        dd($id_user);*/
        $letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        $categorias = DB::table('generos')->get();

        $libros = DB::table('users')
        ->join('libros', 'users.id', '=', 'libros.user_id')
        //->join('personas', 'users.id', '=', 'personas.id')
        ->select('users.name','users.id','libros.id','libros.user_id','libros.titulo','libros.descripcion','libros.autor','libros.imagen'/*,'personas.imagen as personaimagen'*/)
        ->orderBy('libros.id', 'desc')
        ->paginate(6);



        //dd($libros);
        return view('panelcontrol',compact('libros','categorias','letras'));
        //return view('resultados');
    }
    public function subirlibros()
    {

        $id_user = Auth::user()->id;
        $generos = DB::table('generos')->get();
        
        //$persona = DB::table('personas')->where('user_id', '=' , $id_user)->first();
        //$libros = DB::table('libros')->get();
       

        //return view('resultados',compact('libros'));
        return view('subirlibros',compact('generos'));
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
        
        $this->validate($request,[ 'titulo'=>'required','descripcion'=>'required','imagen' => 'required|image','autor'=>'required','paginas'=>'required',]);
        //$this->validate($request,[ 'titulo'=>'required','descripcion'=>'required','autor'=>'required','paginas'=>'required',]);
        $myCheckboxes = $request->input('my_checkbox');
        $date = date('Y-m-d'); 
        $file = $request->file('imagen');
        $extension = $file->getClientOriginalExtension();
        $fileName = request('titulo') .'_'. $date . '.' . $extension;
        //$destinationPath = 'public/image/libros';
        $path = public_path('/images/libros/'.$fileName);
        Image::make($file)->fit(300, 300)->save($path);
        $destinationPath = substr($path, 33);



        /*******************************************************/
        //$files = $request->file('image') 
        //$destinationPath = 'public/image/libros'; // upload path
        //$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //$files->move($destinationPath, $profileImage);
        //$insert['image'] = "$profileImage";
        
        //$check = Image::insertGetId($insert);

        /*******************************************************/




        $libro = Libro::create([
            'titulo'  => request('titulo'),
            'descripcion'  => request('descripcion'),
            'estado'  => 'disponible',
            'imagen'    => $destinationPath,
            'autor'  => request('autor'),
            'paginas'  => request('paginas'),
            //'persona_id'  => Auth::user()->id
            'user_id'  => Auth::user()->id
        ]);
        
        //dd($libro->id);
        foreach($myCheckboxes as $opciones){
            $generosLibros = DB::table('genero_libro')->insert(['libro_id' => $libro->id,'genero_id' => $opciones ]);
        }

        $libro->save();

        
        return redirect('biblioteca');

        /*try {
            $libro->save();   
            return response()->json(['alert' => 'success','message' => 'Formulario enviado exitósamente']);
        } catch (Exception $e) {
            return response()->json(['alert' => 'error','message' => 'Ocurrió un error al intentar guardar. '.$e]);
        }*/
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
    public function editarlibro($id){

        $id = Crypt::decrypt($id);
        $libros = DB::table('libros')->where('id', '=' , $id)->first();
        //dd($libros);

        return view('editarlibro',compact('libros'));

    }
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $image = $request->file('imagen');
        $titulo = request('titulo');
        //dd($id);

        if($image == null){
            $libro = Libro::where('id', $id)->first();
            $destinationPath = $libro->imagen;
            
        }else{
            $name = str_slug($request->input('titulo')).'_'.time();
            $folder = '/images/libros/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $path = public_path($filePath);
            Image::make($image)->fit(300, 300)->save($path);
            $destinationPath = substr($path, 33);
        }
        //DB::table('libros')->where('id' ,'=', $id)->update('titulo' => $titulo);
        //DB::table('libros')->where('id', $id)->update(['titulo' => $titulo]);
        DB::table('libros')->where('id', $id)->update(['titulo' => request('titulo'),'autor' => request('autor'),'paginas' => request('paginas'),'descripcion' => request('descripcion'),'imagen' => $destinationPath]);

        
        return redirect('biblioteca'); 
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
