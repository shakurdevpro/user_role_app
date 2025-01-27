@extends('layouts.app') <!-- Remplace par ton layout principal si nécessaire -->

@section('content')
<div class="container">
    <h2 class="text-center">Réinitialiser le mot de passe</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <!-- Champ caché pour le token -->
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <!-- Mot de passe -->
        <div class="mb-3">
            <label for="password" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Bouton de soumission -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
        </div>
    </form>
</div>
@endsection
