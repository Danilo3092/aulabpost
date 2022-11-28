<x-layout>

    <x-slot name="header">Dashboard</x-slot>

    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h2>Richieste di amministratore</h2>
                <x-admin-requests-table :adminRequests="$adminRequests" />
            </div>
        </div>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h2>Richieste di revisore</h2>
                <x-revisor-requests-table :revisorRequests="$revisorRequests" />
            </div>
        </div>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h2>Richieste di scrittore</h2>
                <x-writer-requests-table :writerRequests="$writerRequests" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 my-2">
                <h2>Crea categoria</h2>
                <x-categories-form/>
            </div>
            <div class="col-12">
                <h2>Gestisci le categorie</h2>
                <x-categories-table :categories="$categories"/>
            </div>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-12 my-2">
                <h2>Crea tag</h2>
                <x-tags-form/>
            </div>
            <div class="col-12">
                <h2>Gestisci i tag</h2>
                <x-tags-table :tags="$tags"/>
            </div>
        </div>
    </div>

    
</x-layout>