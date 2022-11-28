<x-layout>
    <x-slot name="header">Lavora con noi</x-slot>

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Lavora come scrittore</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga sapiente minus quo. Nostrum voluptatibus earum eius animi omnis rerum nam in praesentium quos, quod accusamus. Deleniti minima magni sit molestias.</p>

            <h3>Lavora come revisore</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores voluptates maxime voluptas, laboriosam accusamus fuga ut dolor dolore nobis magnam deserunt atque earum iste provident beatae iure obcaecati amet enim?</p>

            <h3>Lavora come amministratore</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad inventore veritatis, dolore nobis ex in id debitis adipisci illum fugit earum distinctio officia odit esse. Consectetur deleniti voluptatem quis vel!</p>
        </div>

        <div class="col-12 col-md-6">
            <form action="{{route('user.role.request')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label h3">Per quale posizione vuoi candidarti?</label>
                    <select class="form-control" name="role" id="">
                        <option value="admin">Amministratore</option>
                        <option value="revisor">Revisore</option>
                        <option value="writer">Scrittore</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label h5">Inviaci la tua email</label>
                    <input type="email" class="form-control" name="email" @auth value="{{Auth::user()->email}}"
                        @endauth>
                </div>

                <div class="mb-3">
                    <label class="form-label h5">Perchè dovremmo assumerti?</label>
                    <textarea name="presentation" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <button class="btn-btn-primary button" type="submit">Invia candidatura</button>

                </form>



            
        </div>
    </div>
</div>

</x-layout>