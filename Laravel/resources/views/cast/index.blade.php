@extends('layouts.master')

@section('title')
Halaman Cast
@endsection

@section('content')
    <a href="/cast/create" class="btn btn-sm btn-primary mb-3">Add Cast</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($cast as $casts)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$casts->name}}</td>
                <td>
                    <form action="/cast/{{$casts->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')">
                        @csrf
                        @method('delete') 
                        <a href="/cast/{{$casts->id}}" class="btn btn-sm btn-info">Detail</a>
                        <a href="/cast/{{$casts->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>    
                </td> 
            </tr>
@empty
    <tr>
        <th scope="row">Cast data is empty!</th>
    </tr>
@endforelse
        </tbody>
      </table>
@endsection