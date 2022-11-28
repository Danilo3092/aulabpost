<form action="{{route('category.store')}}" method="post" >
    @csrf
    <label>Inserisci una nuova cateogoria</label>
    <div class="d-flex d-inline">
        <input type="text" class="form-control w-50" placeholder="nome categoria" name="name">
        <button class="btn btn-success mx-2" type="submit">Salva</button>
    </div>
</form>