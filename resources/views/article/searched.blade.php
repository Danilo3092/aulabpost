<x-layout>
   
    <x-slot name="header">Risultati di ricerca</x-slot>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1>Articoli per : {{ $key }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($articles as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card-custom">
                    <img src="{{Storage::url($article->img)}}" class="card-img" alt="{{ $article->title }}">
                    <div class="card-body">
                        <a href="{{route('articles.category', $article->category)}}" class="card-text">{{$article->category->name }}</a>
                        <br><br>
                        <a href="{{route('articles.show', $article)}}" class="h5 card-title">{{ $article->title }}</a>
                        <br>
                        <p class="card-text">{{ substr($article->description, 0, 50)}}...</p>
                            <a href="{{route('articles.user', $article->user)}}" class="card-text">{{$article->user->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>