@extends('layouts.master')

@section('title')
Halaman Genre
@endsection

@section('content')
<h1 class="text-primary">{{ $genre->name }}</h1>
<p>{{$genre->description}}</p>

<h4>List Film</h4>

<div class="row">
    @forelse ($genre->FilmGenre as $item)
    <div class="card">
        <img src="{{asset('uploads/'. $item->poster)}}" width="200px" class="mx-auto" alt="...">
        <div class="card-body">
          <h5><b>{{$item->title}}</b></h5>
          <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
          <a href="/film/{{$item->id}}" class="btn btn-primary btn-sm btn-block">Detail</a>
          @auth    
          <div class="row mt-3">
            <div class="col">
                <a href="/film/{{$item->id}}/edit" class="btn btn-sm btn-warning btn-block">Edit</a>
            </div>
            <div class="col">
                <form action="/film/{{$item->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                </form>
            </div>
          </div>
        </div>
          @endauth
        </div>
      </div>
    @empty
        <h5>--Tidak ada film untuk genre ini--</h5>
    @endforelse
</div>

<a href="/genre" class="btn btn-secondary btn-sm">back</a>
@endsection