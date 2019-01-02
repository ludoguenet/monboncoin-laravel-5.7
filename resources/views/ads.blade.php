@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Bien joué!</strong>  {{ session()->get('success') }}
                </div>
            @endif
            <h1>Annonces : Toute la France</h1>
            <form action="{{ route('search.index') }}" class="mb-5" method="POST" onsubmit="searchFunction(event)" id="searchForm">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" placeholder="Que recherchez-vous ?" class=" form-control" name="query" id="query">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Rechercher</button>
            </form>
            <div id="results">
                @foreach ($ads as $ad)
                <div class="card mb-3">
                    <img class="card-img-top" src="https://via.placeholder.com/600x150" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <div class="mb-3">
                            <small class="badge badge-secondary">Publiée {{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</small>
                        </div>
                        Localisation: <small class="card-text text-info">{{ $ad->localisation }}</small>
                        <p class="card-text mt-3">{{ $ad->description }}</p>
                        <p class="card-text"><div class="badge badge-pill badge-light">{{ $ad->price / 100 }} €</div></p>
                        <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="btn btn-primary">Voir l'annonce</a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $ads->links() }}
        </div>
    </div>
</div>
@endsection

@section('extra-js')
    <script>
        function searchFunction (event) {
            event.preventDefault()
            const q = document.querySelector('#query').value
            const url = document.querySelector('#searchForm').getAttribute('action')
            axios.patch(`${url}`, {
                words: q,
            })
            .then(function (response) {
                let ads = response.data.data
                let resultsDiv = document.querySelector('#results')
                let pagination = document.querySelector('.pagination')
                pagination.innerHTML = ''
                resultsDiv.innerHTML = ''

                for (let i = 0; i < ads.length; i++) {
                    let card = document.createElement('div')
                    card.classList.add('card', 'mb-3')
                    let img = document.createElement('img')
                    img.classList.add('card-img-top')
                    img.src = 'https://via.placeholder.com/600x150'
                    let cardBody = document.createElement('div')
                    cardBody.classList.add('card-body')
                    let h5 = document.createElement('h5')
                    h5.classList.add('card-title')
                    let small = document.createElement('small')
                    let h3 = document.createElement('h3')
                    h3.innerHTML = ads[i].price / 100 + ' €'
                    small.classList.add('text-info')
                    let p = document.createElement('p')
                    p.classList.add('card-text')
                    let p2 = document.createElement('p')
                    p2.classList.add('card-text')
                    let a = document.createElement('a')
                    a.classList.add('btn', 'btn-primary')
                    a.href = '#'
                    a.innerHTML = "Voir l'annonce"
                    resultsDiv.appendChild(card)
                    h5.innerHTML = ads[i].title
                    p.innerHTML = ads[i].description
                    p2.appendChild(h3)
                    small.innerHTML = ads[i].localisation
                    card.appendChild(img)
                    card.appendChild(cardBody)
                    cardBody.appendChild(h5)
                    cardBody.appendChild(small)
                    cardBody.appendChild(p)
                    cardBody.appendChild(p2)
                    cardBody.appendChild(a)
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection
