@extends('layouts.master')

@section('title')
Add Cast
@endsection

@section('content')
<form action="/cast" method="POST">
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
      <label>Cast Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3">
        <label>Age</label>
        <input type="number" name="age" class="form-control">
      </div>
    <div class="mb-3">
      <label>Bio</label>
      <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection