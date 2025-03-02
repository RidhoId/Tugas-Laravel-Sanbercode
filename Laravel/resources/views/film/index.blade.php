@extends('layouts.master')

@section('title')
Halaman Film
@endsection

@section('content')
    <a href="/film/create" class="btn btn-sm btn-primary mb-3">Add Film</a>
            
    <div class="row">
        @foreach ($film as $nfilm)
        <div class="card">
            <img src="{{asset('uploads/'. $nfilm->poster)}}" width="200px" class="mx-auto" alt="...">
            <div class="card-body">
              <h5><b>{{$nfilm->title}}</b></h5>
              <span class="badge badge-pill badge-success">{{$nfilm->genre->name}}</span>
              <p class="card-text">{{Str::limit($nfilm->summary, 50)}}</p>
              <a href="/film/{{$nfilm->id}}" class="btn btn-primary btn-sm btn-block">Detail</a>
              @auth    
              <div class="row mt-3">
                <div class="col">
                    <a href="/film/{{$nfilm->id}}/edit" class="btn btn-sm btn-warning btn-block">Edit</a>
                </div>
                <div class="col">
                    <form action="/film/{{$nfilm->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                    </form>
                </div>
              </div>
              @endauth
            </div>
          </div>
        @endforeach
    </div>
@endsection