@extends('layouts.app')

@section('content')
    <h1>Ajout d'un nouvel article</h1>

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
            <textarea name="summary" placeholder="Résumé de l'article" required></textarea>
        </div>
        <div>
            <input type="text" name="image_url" placeholder="URL de l'image" required>
        </div>
        <div>
            <input type="date" name="published_at" placeholder="Date de publication" required>
        </div>
        <hr>
        <button type="submit">Créer l'article</button>
    </form>
@endsection
