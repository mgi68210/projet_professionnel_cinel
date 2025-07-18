@extends('layouts.app')

@section('title', 'Connexion')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-container">
    <h1>Connexion</h1>

<form method="POST" action="{{ route('login.submit') }}"> 
        @csrf

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

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
</div>
@endsection
