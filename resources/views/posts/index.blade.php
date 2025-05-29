@extends('layouts.app')

@section('content')
    <h1>Liste des article de mon blog !</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <h4>
                    <a href="{{ route('posts.show', $post->id) }}">
                        {{ $post->title }}

                        @if ($post->image_url)
                            <img src="{{ $post->image_url }}" width="200" alt="">
                        @endif
                    </a>
                </h4>
                <p>{{ $post->content }}</p>
            </li>
        @endforeach
    </ul>
@endsection
