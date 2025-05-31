@extends('layouts.blog')

@section('content')
    <h1>Ajout d'un nouvel article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <hr>
        <div>
            <input type="text" name="title" placeholder="Titre de l'article" required>
        </div>
        <div>
            <textarea name="content" placeholder="Contenu de l'article" required></textarea>
        </div>
        <div>
            <textarea name="summary" placeholder="Résumé de l'article"></textarea>
        </div>
        <div>
            <input type="text" name="image_url" placeholder="URL de l'image">
        </div>
        <div>
            <input type="date" name="published_at" placeholder="Date de publication">
        </div>
        <hr>
        <button type="submit">Créer l'article</button>
    </form>
@endsection
