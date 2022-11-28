<x-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>Bentornato {{ Auth::user()->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <x-revisor-table :articles="$articles"/>
            </div>
        </div>
    </div>
</x-layout>