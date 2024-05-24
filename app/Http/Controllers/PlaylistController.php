<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the playlists.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $playlists = Playlist::all(); 

        return Inertia::render('playlists/playlist', [
            'playlists' => $playlists,
        ]);
    }

    public function view(Playlist $playlist)
    {
        return Inertia::render('playlists/view', ['playlist' => $playlist]);
    }
}
