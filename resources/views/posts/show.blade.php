@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>

    <p>{{ $post->content }}</p>

    <a href="/posts">Retour à la liste des articles</a>
@endsection
