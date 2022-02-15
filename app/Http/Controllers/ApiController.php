<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Videogame;
use App\Mail\EventDeleteMail;



class ApiController extends Controller
{
    public function getGames() {

        $videogames = Videogame::all();

        return json_encode($videogames);
    }

    public function deleteVideogame($id) {

        $videogame = Videogame::findOrFail($id);

        $videogame -> delete();

        // DOPO L'ELIMINAZIONE MANDO EMAIL ALL'UTENTE COLLEGATO
        Mail::to(Auth::user() -> email ) -> send(new EventDeleteMail($videogame));
        // ANCHE ALL'AMMINISTRATORE PER AVVISARLO
        Mail::to('admin@gmail.com') -> send(new EventDeleteMail($videogame));

        return json_encode($videogame);
    }
}
