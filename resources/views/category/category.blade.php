<x-layout>
    <x-slot name="header"></x-slot>
    <h1 class="title-custom">Categoria:<br>{{$articles[0]->category->name}}</h1>

    <div class="container">
        <div class="row justify-content-center">
            @foreach($articles as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card-custom">
                    <img src="{{Storage::url($article->img)}}" class="card-img" alt="{{ $article->title }}">
                    <div class="card-body">
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