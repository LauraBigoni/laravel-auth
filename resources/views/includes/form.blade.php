<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end align-items-center col-12 pt-3">
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.posts.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>

            <h1 class="text-center">Crea un nuovo post</h1>
            @if ($errors->any())
                <div class="alert alert-info text-center" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.posts.store') }}" method="POST"
                class="col-12 d-flex flex-wrap align-items-center" novalidate>
                @csrf

                <div class="form-group col-6">
                    <label for="title">Titolo:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <div class="invalid-feedback">
                        Inserisci un titolo corretto.
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="content">Contenuto:</label>
                    <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                    <div class="invalid-feedback">
                        Campo invalido
                    </div>
                </div>
                <div class="form-group col-11">
                    <label for="image">Immagine:</label>
                    <input type="url" class="form-control" id="image" name="image">
                    <div class="valid-feedback">
                        Campo valido
                    </div>
                </div>
                <div class="col-1">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw_HeSzHfBorKS4muw4IIeVvvRgnhyO8Gn8w&usqp=CAU"
                        width="60px" class="img-fluid rounded" alt="image placeholder" id="preview">
                </div>

                <div class="d-flex justify-content-end align-items-center ml-auto pt-3">
                    <button type="reset" class="btn btn-sm btn-info mr-2">Reset <i
                            class="fa-solid fa-arrow-rotate-left"></i></button>
                    <button type="submit" class="btn btn-sm btn-info">Aggiungi <i class="fa-solid fa-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
