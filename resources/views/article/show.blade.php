<x-layout>
    <x-slot name="header">Dettaglio Articolo</x-slot>



<div class="container ">
    <div class="row justify-content-center">
      <img src="{{Storage::url($article->img)}}" class="card-img detail-img " alt="{{ $article->title }}">
        <div class="col-12 col-md-8 col-lg-6 article-text">
            <br>
            <h1 class="fw-bold">{{ $article->title }}</h1>
            <h3>{{$article->description}}</h3>
            <br>
            <p class="review-text">{{$article->body}}</p>
            <p>Categoria: <a href="{{route('articles.category', $article->category)}}" class="card-text">{{$article->category->name}}</a></p>
            <p>Pubblicato da : {{$article->user->name}}</p>
            <p>Pubblicato il : {{$article->created_at->format('d-m-y')}}</p>
            <div class="d-flex">
                <p class="h5">Tag: </p>
                @foreach($article->tags as $tag)
                    <span>&nbsp;#{{$tag->name}}</span>
                @endforeach
            </div>
</div>
    </div>  
</div>



</x-layout>