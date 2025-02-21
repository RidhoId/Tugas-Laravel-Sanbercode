@extends('layouts.master')

@section('title')
Halaman Cast
@endsection

@section('content')
<h1 class="text-primary">{{ $cast->name }}</h1>
<p>{{$cast->bio}}</p>
<p>Age : {{$cast->age}}</p>

<a href="/cast" class="btn btn-secondary btn-sm">back</a>
@endsection