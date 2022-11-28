<x-layout>
    <x-slot name="header" class="title title-sm-screens">Modifica articolo</x-slot>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="card p-5 shadow" action="{{route('article.update', compact('article'))}}" method="post" enctype="multipart/form-data">
                @csrf

                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{$article->title}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Sottotitolo:</label>
                    <input name="description" type="text" class="form-control" id="description" value="{{$article->description}}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria:</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category) 
                            <option value="{{ $category->id }}" {{ $category->id == $article->category->id ? 'selected' : '' }}>{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags:</label>
                    <select name="tags[]" class="form-control" multiple>
                        @foreach($tags as $tag) 
                            <option value="{{ $tag->id }}" {{ $article->tags->contains($tag) ? 'selected' : '' }}>{{ $tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Copertina attuale:</label> <br>
                    <div class="text-center">
                        <img width="300" src="{{Storage::url($article->img)}}" alt="{{$article->title }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Copertina:</label>
                    <input name="img" type="file" class="form-control" id="image">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Corpo del testo:</label>
                    <textarea name="body" id="body" cols="30" rows="6" class="form-control">{{$article->body}}</textarea>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary button">Pubblica articolo</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-layout>