<form method="POST" action="{{ route('articles.store')}}" enctype="multipart/form-data">
   @csrf
   <div class="mb-3">
      <label class="form-label">Titolo</label>
      <input type="text" name="title" class="form-control" />
   </div>
   <div class="mb-3">
      <label class="form-label">Descrizione</label>
      <input type="text" name="description" class="form-control" />
   </div>
   <div class="mb-3">
      <label class="form-label">Categoria</label>
      <select name="category_id" id="" class="form-control">
         @foreach($categories as $category)
         <option value="{{ $category->id }}">{{ $category->name }}</option>
         @endforeach
      </select>
   </div>
   <div class="mb-3">
      <label class="form-label">Immagine</label>
      <input type="file" name="img" class="form-control" />
   </div>
   <div class="mb-3">
      <label class="form-label">Corpo del testo</label>
      <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
   </div> 
   
   <div class="mb-3">
      <label class="form-label">Tags</label>
      <select name="tags[]" class="form-control" multiple>
         @foreach($tags as $tag)
         <option value="{{ $tag->id }}">{{ $tag->name }}</option>
         @endforeach
      </select>
   </div>
   
   <button type="submit" class="btn btn-primary button">Invia</button>

  
</form>