@extends('layouts.master')

@section('title')
Halaman Film
@endsection

@section('content')
<div class="d-flex justify-content-center">
    <img src="{{asset('uploads/'. $film->poster)}}" alt="">
</div>
<h1 class="text-primary mt-3"><b>{{ $film->title }}</b></h1>
<h3>Tahun Rilis : {{$film->release_year}}</h3>
<p>{{$film->summary}}</p>

<hr>
<h4 class="text-info text-center">Review</h4>

@forelse ($film->listreview as $item)
      <blockquote class="blockquote mb-0">
        <p>{{$item->content}}</p>
        <footer class="blockquote-footer">{{$item->user->name}}<br><cite title="Source Title">Rating : {{$item->point}}/5</cite></footer>
      </blockquote>
@empty
    <h5>Tidak Ada Review</h5>
@endforelse

<hr>
<form action="/review/{{$film->id}}" method="POST">
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
<div class="form-group">
    <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Isi Review"></textarea>
</div>
<label class="text-info">Rating</label>
<div class="form-group">
    <input type="number" min="1" max="5" name="point">
</div>
<button type="submit" class="btn btn-primary btn-block">Add Review</button>
</form>

<a href="/film" class="btn btn-secondary btn-sm mt-2">back</a>
@endsection