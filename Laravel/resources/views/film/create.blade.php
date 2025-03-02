@extends('layouts.master')

@section('title')
Add Film
@endsection

@section('content')
<form action="/film" method="POST" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    <div class="mb-3">
      <label>Film Title</label>
      <input type="text" class="form-control" name="title" value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label>Summary</label>
        <textarea name="summary" class="form-control" cols="30" rows="10">{{old('summary')}}</textarea>
    </div>
    <div class="mb-3">
        <label>Release Year</label>
        <input type="number" name="release_year" class="form-control" value="{{old('release_year')}}">
      </div>
      <div class="mb-3">
        <label>Poster</label>
        <input type="file" class="form-control" name="poster">
      </div>
      <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" id="" class="form-control">
            <option value="">--Choose Genre--</option>
            @forelse ($genre as $genrefilm)
                <option value="{{$genrefilm->id}}">{{$genrefilm->name}}</option>
            @empty
                <option value="">--None--</option>
            @endforelse
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection