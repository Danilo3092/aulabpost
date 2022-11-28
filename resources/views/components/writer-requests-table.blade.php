<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($writerRequests as $user)
        <tr>
            <th scope="row">{{ $user->id}}</th>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>
                <a href="{{ route('admin.makeUserWriter', $user) }}" class="btn btn-success">Rendi scrittore</a>
            </td>
            <td>
                <a href="{{ route('admin.rejectWriterRequest', $user) }}" class="btn btn-danger">Rifiuta richiesta</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
