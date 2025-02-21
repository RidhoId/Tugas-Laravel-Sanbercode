<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function create(){
        return view('cast.create');
    }
    public function store(request $request){
        $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'bio' => 'required',
        ],
    [
        'required' => 'inputan :attribute harus diisi',
        'min' => 'inputan :attribute minimal 3 karakter'
    ]);
    DB::table('casts')->insert([
        'name' => $request['name'],
        'age' => $request['age'],
        'bio' => $request['bio']
    ]);

    return redirect('/cast');
    }

    public function index(){
        $cast = DB::table('casts')->get();

        return view('cast.index', ['cast' => $cast]);
    }

    public function show($id){
        $cast = DB::table('casts')->find($id);

        return view('cast.detail', ['cast' => $cast]);
    }

    public function edit($id){
        $cast = DB::table('casts')->find($id);

        return view('cast.edit', ['cast' => $cast]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'bio' => 'required',
        ],
    [
        'required' => 'inputan :attribute harus diisi',
        'min' => 'inputan :attribute minimal 3 karakter'
    ]);
    DB::table('casts')
    ->where('id', 1)
    ->update([
        'name' => $request['name'],
        'bio' => $request['bio'],
        'age' => $request['age']
    ]);
    
    return redirect('/cast');
    }

    public function destroy($id){
        DB::table('casts')->where('id', $id)->delete();

        return redirect('/cast');
    }
}
