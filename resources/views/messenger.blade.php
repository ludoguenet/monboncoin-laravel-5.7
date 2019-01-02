@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h3>Écrire à {{ $seller->name }}</h3>
      <hr>
      <form action="{{ route('contact.store', ['ad_id' => $ad->id, 'seller_id' => $seller->id]) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Votre Message</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">Bonjour, je vous contacte au sujet de "{{ $ad->title }}".</textarea>
        </div>
        <button type="submit" class="btn btn-dark">Envoyer mon message</button>
      </form>
    </div>
  </div>
</div>
@endsection
