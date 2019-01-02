@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>Déposer une annonce</h1>
      <hr>
      <form action="{{ route('ads.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Titre de l'annonce</label>
          <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" aria-describedby="title">
          @if ($errors->has('title'))
              <div class="invalid-feedback">{{  $errors->first('title') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="description">Texte de l'annonce</label>
          <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" cols="30" rows="10"></textarea>
          @if ($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="price" for="price">Prix</label>
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">€</div>
            </div>
            <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price">
            @if ($errors->has('title'))
              <div class="invalid-feedback">{{ $errors->first('price') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="localisation">Ville</label>
          <input type="text" class="form-control {{ $errors->has('localisation') ? 'is-invalid' : '' }}" name="localisation" id="localisation" aria-describedby="localisation">
          @if ($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('localisation') }}</div>
          @endif
        </div>
        @guest
          <div class="form-group">
            <h2>Vos informations</h2>
            <hr>
            <div class="form-group">
              <label for="pseudo">Pseudo</label>
              <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="pseudo" aria-describedby="pseudo">@if ($errors->has('name'))
              <div class="invalid-feedback">{{ $errors->first('name') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" aria-describedby="email">@if ($errors->has('email'))
              <div class="invalid-feedback">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password">
              @if ($errors->has('password'))
                  <span class="invalid-feedback">{{  $errors->first('password') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirmation</label>
              <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">
              @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">{{  $errors->first('password_confirmation') }}</span>
              @endif
            </div>
          </div>
        @endguest
        <button type="submit" class="btn btn-primary btn-block">Valider</button>
      </form>
    </div>
  </div>
</div>
@endsection
