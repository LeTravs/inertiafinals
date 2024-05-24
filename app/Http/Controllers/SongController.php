<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the songs.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $songs = Song::all();
        return Inertia::render('Song', [
            'songs' => $songs,
        ]);
    }

    public function view(Song $song)
    {
        return Inertia::render('songs/view', ['song' => $song]);
    }

    public function create()
    {
        return Inertia::render('songs/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imageUrl' => 'nullable|url',
            'title' => 'required',
            'artist' => 'required',
        ]);
    
        $song = new Song();
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->image_url = $request->imageUrl;
        $song->save();
    
        return redirect('/songs')->with('success', 'Song created successfully');
    }
    

    public function update(Request $request, Song $song)
    {
        $validatedData = $request->validate([
            'image_url' => 'nullable|url',
            'title' => 'required',
            'artist' => 'required',
        ]);


        $song->update($validatedData);

        return redirect('/songs');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect('/songs')->with('success', 'Song deleted successfully');
    }

}
