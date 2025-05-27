# Mon Blog Personnel - Un Projet Laravel MVC

Ce projet est un blog personnel construit avec Laravel, démontrant l'architecture MVC, le routage avancé et le moteur de templates Blade.

## Table des matières

- [Installation](#installation)
- [Configuration du projet](#project-setup)
- [Architecture MVC](#mvc-architecture)
- [Contrôleurs et Modèles](#controllers-and-models)
- [Structure de la base de données](#database-structure)
- [Routage avancé](#advanced-routing)
- [Templates Blade](#blade-templating)
- [Exécution de l'application](#running-the-application)

## Installation

### Prérequis

- PHP >= 8.1
- Composer
- Node.js & NPM
- Base de données (MySQL, SQLite, PostgreSQL)

### Étape 1 : Cloner le dépôt

```bash
git clone <repository-url>
cd my-personal-blog
```

### Étape 2 : Installer les dépendances

```bash
composer install
npm install
```

### Étape 3 : Configuration de l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

Modifiez le fichier `.env` pour configurer votre connexion à la base de données.

### Étape 4 : Migrer la base de données

```bash
php artisan migrate
```

### Étape 5 : Compiler les ressources (optionnel)

```bash
npm run dev
```

## Configuration du projet

### Créer un projet Laravel

Si vous commencez à partir de zéro :

```bash
composer create-project laravel/laravel my-personal-blog
cd my-personal-blog
```

## Architecture MVC

Laravel suit le modèle MVC (Modèle-Vue-Contrôleur) :

| Élément | Rôle dans Laravel |
| --- | --- |
| **Model** | Manipule les données (via Eloquent ORM) |
| **View** | Affiche les données (via Blade) |
| **Controller** | Fait le lien entre la requête, les modèles et les vues |

## Contrôleurs et Modèles

### Créer un contrôleur et un modèle d'article

```bash
php artisan make:controller PostController
php artisan make:model Post -m
```

L'option `-m` crée automatiquement un fichier de migration pour le modèle.

### Exemple de contrôleur d'article

Créez le fichier `app/Http/Controllers/PostController.php` avec :

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
```

## Structure de la base de données

### Migration des articles

Le fichier de migration `database/migrations/2025_05_27_195625_create_posts_table.php` devrait ressembler à ceci :

```php
public function up(): void
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}
```

## Routage avancé

Modifiez le fichier `routes/web.php` pour ajouter des routes :

### Route de base

```php
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);
```

### Route avec paramètre

```php
Route::get('/posts/{id}', [PostController::class, 'show']);
```

### Routes nommées

```php
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
```

### Groupes de routes

```php
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Tableau de bord admin';
    });
});
```

## Templates Blade

### Création de layouts

Créez le fichier `resources/views/layouts/app.blade.php` :

```html
<!DOCTYPE html>
<html>
<head>
    <title>My Personal Blog</title>
</head>
<body>
    <header>
        <h2>Bienvenue sur mon blog Laravel</h2>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Mon Blog</p>
    </footer>
</body>
</html>
```

### Création de la vue d'index des articles

Créez le fichier `resources/views/posts/index.blade.php` :

```html
@extends('layouts.app')

@section('content')
    <h1>Liste des articles</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ Str::limit($post->content, 100) }}</p>
            <a href="{{ route('posts.show', $post->id) }}">Lire la suite</a>
        </div>
    @endforeach
@endsection
```

### Directives Blade utiles

- `@if`, `@else`, `@foreach`, `@include`, `@csrf`, `@method('PUT')`
- Afficher des données : `{{ $variable }}`
- Appeler des fonctions PHP : `{{ strtoupper($post->title) }}`

## Exécution de l'application

```bash
php artisan serve
```

Cela démarrera un serveur de développement sur `http://localhost:8000`

### Remplissage de la base de données (Optionnel)

Pour créer des données d'exemple :

```bash
php artisan make:seeder PostSeeder
```

Modifiez le fichier `database/seeders/PostSeeder.php`, puis exécutez :

```bash
php artisan db:seed --class=PostSeeder
```

## Additional Resources

- [Laravel Routing – Documentation](https://laravel.com/docs/routing)
- [Laravel Controllers](https://laravel.com/docs/controllers)
- [Laravel Blade](https://laravel.com/docs/blade)
- [Laravel Documentation](https://laravel.com/docs)
