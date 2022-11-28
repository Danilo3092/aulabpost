<x-layout>
    <x-slot name="header" class="title title-sm-screens">I miei articoli</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Bentornato, {{ Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(count(Auth::user()->articles) > 0)
            <div class="col-12">
                <h2>Tutti i tuoi articoli</h2>
            </div>
            <div class="col-12 my-3">
                <x-articles-table :articles="Auth::user()->articles"/>
            </div>
            @else
            <div class="col-12 my-3">
                <h2>Non hai scritto alcun articolo</h2>
                <a href="{{route('articles.create')}}" class="btn btn-primary button">Crea il tuo primo articolo</a>
            </div>
            @endif
        </div>
    </div>




</x-layout>