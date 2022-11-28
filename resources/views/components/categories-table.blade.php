<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Categoria</th>
            <th scope="col">Articoli</th>
            <th scope="col">Modifica</th>
            <th scope="col">Elimina</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id}}</th>
            <td>{{ $category->name }}</td>
            <td>{{ count($category->articles) }}</td>
            <td>
                <form action="{{ route('category.edit', $category)}}" method="post" class="w-50">
                    @csrf
                    <input type="text" class="form-inline p-2" placeholder="nuovo nome" name="name">
                    <button class="btn btn-success mx-2" type="submit">Salva</button>
                </form>
            </td>
            <td>
                <form action="{{ route('category.delete', $category)}}" method="post" class="w-50">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Elimina</button>
                    </form>
            </td>

        </tr>
        @endforeach
    </tbody>
    </table>
