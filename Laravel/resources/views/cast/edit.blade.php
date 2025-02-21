@extends('layouts.master')

@section('title')
Add Cast
@endsection

@section('content')
<form action="/cast/{{$cast->id}}" method="POST">
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
      <label>Cast Name</label>
      <input type="text" class="form-control" name="name" value="{{old('name', $cast->name)}}">
    </div>
    <div class="mb-3">
        <label>Age</label>
        <input type="number" name="age" class="form-control" value="{{old('name', $cast->age)}}">
      </div>
    <div class="mb-3">
      <label>Bio</label>
      <textarea name="bio" class="form-control" cols="30" rows="10">{{old('name', $cast->bio)}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection