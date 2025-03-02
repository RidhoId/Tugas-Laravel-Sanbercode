@extends('layouts.master')

@section('title')
Edit Genre
@endsection

@section('content')
<form action="/genre/{{$genres->id}}" method="POST">
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
    @method('put')
    <div class="mb-3">
      <label>Genre Name</label>
      <input type="text" class="form-control" name="name" value="{{old('name', $genres->name)}}">
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" cols="30" rows="10">{{old('description', $genres->description)}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection