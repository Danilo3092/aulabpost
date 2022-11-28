<x-layout> 
    <x-slot name="header">Revisione Articolo</x-slot>

    <div class="container my-5"> 
        <div class="row"> 
            
        </div> 
        <div class="row my-5"> 
            <div class="col-12 col-md-6"> 
                <img src="{{ Storage::url($article->img) }}" alt="" class="img-fluid"> 
            </div> 
            <div class="col-12 col-md-6"> 
                <h3>  Titolo :   </h3> 
                <h5 class="review-text">{{ $article->title }}</h5>
                <h3 class="my-3">  Descrizione : <h3> 
                <h5 class="review-text">{{ $article->description }}</h5>
                <h3 class="my-3">  Autore : <span class="review-text">{{ $article->user->name }}</span></h3> 
                <h3 class="my-3">  Categoria : <span class="review-text">{{ $article->category->name }}</span></h3> 
                <h3 class="my-3">  Creato :  <span class="review-text">{{ $article->created_at->diffForHumans() }}</span></h3> 
                <div class="d-flex"> 
                    <a href="{{ route('revisor.accept', $article) }}" class="btn btn-success">Accetta</a> 
                    <a href="{{ route('revisor.reject', $article) }}" class="btn btn-danger mx-3">Rifiuta</a> 
                </div> 
            </div> 
        </div> 
    </div>
</x-layout> 
