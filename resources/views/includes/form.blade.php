<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end align-items-center col-12 pt-3">
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.posts.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>

            <h1 class="text-center">Crea un nuovo post</h1>
            @if ($errors->any())
                <div class="alert alert-{{ session('type') ?? 'info' }} text-center" role="alert">
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
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title', $post->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label for="content">Contenuto:</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"
                        required>{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-11">
                    <label for="image">Immagine:</label>
                    <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        value="{{ old('image', $post->image) }}">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-1">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw_HeSzHfBorKS4muw4IIeVvvRgnhyO8Gn8w&usqp=CAU"
                        width="50px" class="img-fluid rounded" alt="image placeholder" id="preview">
                </div>
                <hr>

                <div class="d-flex justify-content-end align-items-center ml-auto pt-3">
                    <button type="reset" class="btn btn-sm btn-info mr-2">Reset <i
                            class="fa-solid fa-arrow-rotate-left"></i></button>
                    <button type="submit" class="btn btn-sm btn-info">Salva <i
                            class="fa-solid fa-floppy-disk"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        const placeholder =
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw_HeSzHfBorKS4muw4IIeVvvRgnhyO8Gn8w&usqp=CAU";
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('preview');

        imageInput.addEventListener('change', (e) => {
            const preview = imageInput.value ?? placeholder;
            imagePreview.setAttribute('src', preview);
        })
    </script>
@endsection
