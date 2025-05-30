@extends('layouts.app')

@section('content')
    <h1>Liste des article de mon blog !</h1>

    @session('message')
        {{ $value }}
    @endsession

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

                <a href="{{ route('posts.edit', $post->id) }}" role="button">Éditer</a>
                <form
                    action="{{ route('posts.delete', $post->id) }}"
                    method="POST"
                    onsubmit="return confirm('Supprimer cet article ?')"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>

            </li>
        @endforeach
    </ul>
@endsection
