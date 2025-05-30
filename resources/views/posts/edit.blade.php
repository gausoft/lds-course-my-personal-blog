@extends('layouts.app')

@section('content')
    <h1>Édition de l'article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <hr>
        <div>
            <input
                type="text"
                name="title"
                placeholder="Titre de l'article"
                required
                value="{{ $post->title }}"
            />
        </div>
        <div>
            <textarea
                name="content"
                placeholder="Contenu de l'article"
                required
                value="{{ $post->content }}"
            >
            </textarea>
        </div>
        <div>
            <textarea
                name="summary"
                placeholder="Résumé de l'article"
                value="{{ $post->summary }}"
            >
            </textarea>
        </div>
        <div>
            <input
                type="text"
                name="image_url"
                placeholder="URL de l'image"
                value="{{ $post->image_url }}"
            >
        </div>
        <div>
            <input
                type="date"
                name="published_at"
                placeholder="Date de publication"
                value="{{ $post->published_at }}"
            >
        </div>
        <hr>
        <button type="submit">Éditer l'article</button>
    </form>
@endsection
