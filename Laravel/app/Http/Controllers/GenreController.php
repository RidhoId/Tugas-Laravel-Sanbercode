<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Genre;


class GenreController extends Controller
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
        $genres = Genre::all();

        return view('genre.index', ["genres" => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $casts = Cast::all();

        return view('genre.create', ["casts" => $casts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required'
        ],
    [
        'required' => 'inputan :attribute harus diisi',
        'min' => 'inputan :attribute minimal 3 karakter'
    ]);

    $genres = new Genre;

    $genres->name = $request['name'];
    $genres->description = $request['description'];
    $genres->save();

    return redirect('/genre');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = Genre::find($id);

        return view('genre.detail', ["genre" => $genres]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genre::find($id);
        $casts = Cast::all();

        return view('genre.edit', ["casts" => $casts, "genres" => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ],
    [
        'required' => 'inputan :attribute harus diisi',
        'min' => 'inputan :attribute minimal 3 karakter'
    ]);

    $genres = Genre::find($id);
    $genres->name = $request['name'];
    $genres->description = $request['description'];
    $genres->update();
    return redirect('/genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = Genre::find($id);

        $genres -> delete();
        return redirect('/genre');
    }
}
