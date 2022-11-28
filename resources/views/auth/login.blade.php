<x-layout>

    <x-slot name="header">Accedi</x-slot>
    <x-validation_errors />
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-5 shadow" method="POST" action="{{ route('login')}}">
                @csrf
    
                    <div class="mb-3">
                      <label for="email" class="form-label">Indirizzo e-mail</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
    
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary button">Accedi</button>
                  </form>
            </div>
        </div>
    </div>
    
</x-layout>