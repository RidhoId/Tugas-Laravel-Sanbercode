<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Genre;
use App\Models\Film;
use Illuminate\Support\Facades\File;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $film = Film::all();

        return view('film.index', ["film" => $film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();

        return view('film.create', ["genre" => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'poster' => 'required|image|mimes:png,jpg,jpeg'
        ],
    [
        'required' => 'inputan :attribute harus diisi',
        'min' => 'inputan :attribute minimal 3 karakter',
        'exists' => 'inputan :attribute tidak terdaftar',
        'image' => 'inputan :attribute harus berupa gambar'
    ]);

    $filmPosterName = time() . '.' . $request->poster->extension();

    $request->poster->move(public_path('uploads'), $filmPosterName);

    $film = new Film;

    $film->title = $request['title'];
    $film->summary = $request['summary'];
    $film->release_year = $request['release_year'];
    $film->poster = $filmPosterName;
    $film->genre_id = $request['genre_id'];
    $film->save();

    return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $genre = Genre::all();
        $film = Film::find($id);
        $genre = Genre::find($id);

        return view('film.detail', ["film" => $film, "genre" => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::all();
        $film = Film::find($id);

        return view('film.edit', ["film" => $film, "genre" => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'poster' => 'image|mimes:png,jpg,jpeg'
        ],
    [
        'required' => 'inputan :attribute harus diisi',
        'min' => 'inputan :attribute minimal 3 karakter',
        'exists' => 'inputan :attribute tidak terdaftar',
        'image' => 'inputan :attribute harus berupa gambar'
    ]);
    $film = Film::find($id);
    
    if($request->has('poster')) {
        File::delete('uploads/'. $film->poster);

        $filmPosterName = time() . '.' . $request->poster->extension();

        $request->poster->move(public_path('uploads'), $filmPosterName);

        $film->poster = $filmPosterName;

    }
    $film->title = $request['title'];
    $film->summary = $request['summary'];
    $film->release_year = $request['release_year'];
    $film->genre_id = $request['genre_id'];
    $film->update();
    return redirect('/film');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);

        if($film->poster){
            File::delete('uploads/'. $film->poster);
        }

        $film -> delete();
        return redirect('/film');
    }
}
