@extends('layouts.master')

@section('title')
Halaman Genre
@endsection

@section('content')
    <a href="/genre/create" class="btn btn-sm btn-primary mb-3">Add Genre</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genre)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$genre->name}}</td>
                <td>
                    <form action="/genre/{{$genre->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')">
                        @csrf
                        @method('delete') 
                        <a href="/genre/{{$genre->id}}" class="btn btn-sm btn-info">Detail</a>
                        @auth  
                        <a href="/genre/{{$genre->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        @endauth
                </form>    
                </td> 
            </tr>
@empty
    <tr>
        <th scope="row">Genre data is empty!</th>
    </tr>
@endforelse
        </tbody>
      </table>
@endsection