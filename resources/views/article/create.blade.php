<x-layout>

    <x-slot name="header">Inserisci un nuovo articolo</x-slot>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 ">
                <h1>Crea articolo</h1>
            </div> 
        </div>
    </div> 

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <x-form :tags="$tags"/>                
            </div> 
        </div>
    </div> 

    {{-- <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-form :tags="$tags" />
            </div>
        </div>
    </div> --}}
</x-layout>