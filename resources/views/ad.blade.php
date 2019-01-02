@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-3">
        <img class="card-img-top" src="https://via.placeholder.com/600x150" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $ad->title }}</h5>
          <div class="mb-3">
            <small class="badge badge-secondary">Publiée {{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</small>
          </div>
          Localisation: <small class="card-text text-info">{{ $ad->localisation }}</small>
          <p class="card-text mt-3">{{ $ad->description }}</p>
          <p class="card-text">
            <div class="badge badge-pill badge-light">{{ $ad->price / 100 }} €</div>
          </p>
          <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="btn btn-primary">Voir l'annonce</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Annonce de {{ $ad->user->name }}</h3>
      <a href="{{ route('contact.index', ['seller_id' => $ad->user->id, 'ad_id' => $ad->id]) }}" class="btn btn-block btn-success">Envoyez un message</a>
    </div>
  </div>
</div>
@endsection
