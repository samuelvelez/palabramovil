<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\User;
use App\Libro;
use App\Notificacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {

        //Verificar estado de la solicitud
        $id_user = Auth::user()->id;

        $notificacions = DB::table('notificacions')->where([['estado', '=' , 'aceptada'],['id_emisor','=',$id_user]])->get();
       


        //if(count($notificacions) > 0){
            // All threads, ignore deleted/archived participants
            //$threads = Thread::getAllLatest()->get();
            // All threads that user is participating in
             $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
            // All threads that user is participating in, with new messages
            // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
            //dd($threads);
            return view('messenger.index', compact('threads'));
        /*}else{ 
            $threads = [];
            return view('messenger.index', compact('threads'));
        }*/
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        //$id   = Crypt::decrypt($id);
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('messenger.show', compact('thread', 'users'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create($id)
    {
        $id   = Crypt::decrypt($id);
        $notificacions = DB::table('notificacions')->where('id', '=' , $id)->first();
        //dd($notificacions->id_receptor);
        $users = User::where('id', '=', $notificacions->id_receptor)->get();

        return view('messenger.create', compact('users','notificacions'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Request::all();
        
        //$notificacions = App\Notificacion::find(1);
        $notificacions = Notificacion::where('id', $input['notificacion'])->first();
        if($notificacions) {
            $notificacions->estado_conversacion = 'iniciada';
            $notificacions->save();    
        }
        
        $libro = Libro::where('id', $notificacions->id_libro)->first();
        $asunto = 'Peticion del libro';
        $cadena = $asunto.' '.$libro->titulo;
        //dd($cadena);
        
        $thread = Thread::create([
            //'subject' => $input['subject'],
            'subject' => $cadena,
            'id_libro' => $notificacions->id_libro,
        ]);
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $input['message'],
            //'body' => 'hola buen día',
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);
        
        // Recipients
        if (Request::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }

        return redirect()->route('messages');
        
        
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        //$id   = Crypt::decrypt($id);

        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Request::input('message'),
        ]);
        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Request::has('recipients')) {
            $thread->addParticipant(Request::input('recipients'));
        }
        //$encrypted = Crypt::encrypt($id);
        //return redirect()->route('messages.show', $encrypted);
        return redirect('messages');
    }

    
}
