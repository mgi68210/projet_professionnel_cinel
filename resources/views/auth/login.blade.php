@extends('layouts.app')
@section('title', 'Connexion Utilisateur')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-container">
    <h1>Connexion</h1>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email') <div role="alert">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
            @error('password') <div role="alert">{{ $message }}</div> @enderror
        </div>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
    <!-- Lien caché pour login admin -->
     <a href="{{ route('admin.login') }}"
     style="display:block; width:20px; height:20px; opacity:0; position:relative; z-index:1;"
     title="Connexion admin"
     aria-label="Connexion administrateur">
     CONNEXION ADMIN
    </a>
</div>
@endsection
