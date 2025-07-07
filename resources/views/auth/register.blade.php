@extends('layouts.app')

@section('title', 'Inscription')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-container">
    <h1>Inscription</h1>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div>
            <label>Nom :</label>
            <input type="text" name="nom" value="{{ old('nom') }}" required>
            @error('nom') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Prénom :</label>
            <input type="text" name="prenom" value="{{ old('prenom') }}" required>
            @error('prenom') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Email :</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Mot de passe :</label>
            <input type="password" name="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Confirmation :</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
</div>
@endsection
