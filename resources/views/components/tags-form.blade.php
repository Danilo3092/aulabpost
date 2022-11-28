<form action="{{route('tag.store')}}" method="post">
@csrf
<label>Inserisci un nuovo tag</label>
<div class="d-flex d-inline">
    <input type="text" class="form-control w-50" placeholder="nome tag" name="name">
    <button class="btn btn-success mx-2" type="submit">Salva</button>
</div>
</form>